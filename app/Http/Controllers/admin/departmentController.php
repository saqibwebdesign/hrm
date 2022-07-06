<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\departments;

class departmentController extends Controller
{
    function index()
    {
        $data['departments'] = departments::orderBy('name')->paginate(25);
        
        return view('admin.settings.departments.index')->with($data);
    }
    function add(Request $request){
        $data = $request->all();
        $d = new departments;
        $d->name = $data['name'];
        $d->save();

        return redirect()->back()->with('success', 'New Department Added.');
    }
    function edit($id){
        $id = base64_decode($id);
        $data['data'] = departments::find($id);

        return view('admin.settings.departments.response.edit')->with($data);
    }
    function update(Request $request){
        $data = $request->all();
        $d = departments::find(base64_decode($data['depart_id']));
        $d->name = $data['name'];
        $d->save();

        return redirect()->back()->with('success', 'Department Updated.');
    }

    function delete($id){
        $id = base64_decode($id);
        $d = departments::find($id);
        if(count($d->users) > 0){
            return redirect()->back()->with('error', 'Cannot delete, this department had employees.');
        }else{
            departments::destroy($id);
        }
        return redirect()->back()->with('success', 'Department Successfully Deleted.');
    }
}
