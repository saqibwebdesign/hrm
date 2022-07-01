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
    function portfolioAdd(Request $request){
        $data = $request->all();
        $id = portfolio::addPortfolio($data);
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

        if(isset($request->album)){
            for ($i=0; $i < count($request->album); $i++) { 
                $image_source = date('dmyHis').'-'.$request->album[$i]->getClientOriginalName();
                $request->album[$i]->move(public_path('/public/storage/portfolio/album/'),$image_source);

                $c = new portfolioDetail;
                $c->portfolio_id = $id;
                $c->image = $image_source;
                $c->save();
            }
        }


        return redirect()->back()->with('success', 'New Portfolio Added.');
    }
    function portfolioEdit($id){
        $id = base64_decode($id);
        $data['data'] = portfolio::find($id);
        $data['categories'] = categories::orderBy('name')->get();

        return view('admin.response.editPortfolio')->with($data);
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
