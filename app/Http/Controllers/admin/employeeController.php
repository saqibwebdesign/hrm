<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\departments;

class employeeController extends Controller
{
    function index()
    {
        $cat = isset($_GET['depart']) ? $_GET['depart'] : 0;
        if($cat > 0){
            $data['employees'] = User::where('department_id', $cat)->orderBy('id')->get();
        }else{
            $data['employees'] = User::orderBy('id')->paginate(15);
        }
        $data['cat'] = $cat;
        $data['departs'] = departments::orderBy('name')->get();
        return view('admin.employees.index')->with($data);
    }
    function employeeAdd(){
        $data['departs'] = departments::orderBy('name')->get();
        return view('admin.employees.add')->with($data);
    }

    function employeeInsert(Request $request){
        $data = $request->all();
        $id = User::addUser($data);
        if ($request->hasFile('logo_img')) {
            $file = $request->file('logo_img');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/users/'), $filename);

            User::updateImage($id, $filename);
        }

        return redirect(route('admin.employee'))->with('success', 'New Employee Added.');
    }
    function employeeEdit($id){
        $id = base64_decode($id);
        $data['data'] = User::find($id);
        $data['departs'] = departments::orderBy('name')->get();

        return view('admin.employees.edit')->with($data);
    }
    function portfolioUpdate(Request $request){
        $data = $request->all();
        $id = base64_decode($data['cid']);
        portfolio::updatePortfolio($id, $data);
        if ($request->hasFile('logo_img')) {
            $file = $request->file('logo_img');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/portfolio/'), $filename);

            portfolio::updateImage($id, $filename);
        }
        if ($request->hasFile('large')) {
            $file = $request->file('large');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/portfolio/large/'), $filename);

            portfolio::updateImageLarge($id, $filename);
        }

        return redirect()->back()->with('success', 'Portfolio Updated.');
    }

    function portfolioDelete($id){
        $id = base64_decode($id);
        portfolio::destroy($id);
        portfolioDetail::where('portfolio_id', $id)->delete();

        return redirect()->back()->with('success', 'Portfolio Successfully Deleted.');
    }
}
