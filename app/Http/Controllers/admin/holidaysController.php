<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\holidays;

class holidaysController extends Controller
{
    function holidays()
    {
        $data['holidays'] = holidays::where('date', '>=', date('Y-1-1'))->where('date', '<=', date('Y-12-31'))->orderBy('date')->paginate(25);
        
        return view('admin.holidays.index')->with($data);
    }
    function holidaysAdd(Request $request){
        $data = $request->all();
        //dd($data);
        $id = holidays::addHoliday($data);

        return redirect()->back()->with('success', 'New Holiday Added.');
    }
    function holidaysEdit($id){
        $id = base64_decode($id);
        $data['data'] = holidays::find($id);

        return view('admin.holidays.response.edit')->with($data);
    }
    function holidaysUpdate(Request $request){
        $data = $request->all();
        $id = base64_decode($data['holi_id']);
        holidays::updateHoliday($id, $data);

        return redirect()->back()->with('success', 'Holiday Updated.');
    }

    function holidaysDelete($id){
        $id = base64_decode($id);
        holidays::destroy($id);

        return redirect()->back()->with('success', 'Holiday Successfully Deleted.');
    }
}
