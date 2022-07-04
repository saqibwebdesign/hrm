<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notification;
use App\Models\User;
use App\Models\departments;

class notificationController extends Controller
{
    function notification()
    {
        $cat = isset($_GET['depart']) ? $_GET['depart'] : 0;
        if($cat > 0){
            $data['notification'] = notification::where('department_id', $cat)->orderBy('id', 'desc')->get();
        }else{
            $data['notification'] = notification::orderBy('id', 'desc')->paginate(15);
        }
        $data['cat'] = $cat;
        $data['departs'] = departments::orderBy('name')->get();
        return view('admin.notification.index')->with($data);
    }
    function notificationAdd(Request $request){
        $data = $request->all();
        //dd($data);
        $id = notification::addNotification($data);

        return redirect()->back()->with('success', 'New Notification Added.');
    }
    function notificationEdit($id){
        $id = base64_decode($id);
        $data['data'] = notification::find($id);
        $data['departs'] = departments::orderBy('name')->get();

        return view('admin.notification.response.edit')->with($data);
    }
    function notificationUpdate(Request $request){
        $data = $request->all();
        $id = base64_decode($data['noti_id']);
        notification::updateNotification($id, $data);

        return redirect()->back()->with('success', 'Notification Updated.');
    }

    function notificationDelete($id){
        $id = base64_decode($id);
        notification::destroy($id);

        return redirect()->back()->with('success', 'Notification Successfully Deleted.');
    }
}
