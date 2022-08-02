<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\departments;
use App\Models\shifts;
use App\Models\role;

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
        $data['shifts'] = shifts::where('status', '1')->orderBy('title')->get();
        $data['roles'] = role::orderBy('role')->get();

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
        $data['shifts'] = shifts::where('status', '1')->orderBy('title')->get();
        $data['roles'] = role::orderBy('role')->get();

        return view('admin.employees.edit')->with($data);
    }
    function employeeUpdate(Request $request){
        $data = $request->all();
        $id = base64_decode($data['emp_id']);
        User::updateUser($id, $data);
        if ($request->hasFile('logo_img')) {
            $file = $request->file('logo_img');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/users/'), $filename);

            User::updateImage($id, $filename);
        }
        return redirect(route('admin.employee'))->with('success', 'Portfolio Updated.');
    }

    function portfolioDelete($id){
        $id = base64_decode($id);
        portfolio::destroy($id);
        portfolioDetail::where('portfolio_id', $id)->delete();

        return redirect()->back()->with('success', 'Portfolio Successfully Deleted.');
    }
}
