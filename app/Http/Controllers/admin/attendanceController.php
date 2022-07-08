<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\departments;
use App\Models\employee\attendance;

class attendanceController extends Controller
{
    public function employee($id){
        $id = base64_decode($id);
        $data['emp'] = User::find($id);
        return view('admin.attendance.emp')->with($data);
    }

    public function today(){
        $employees = User::orderBy('id')->get();
        $data['employees'] = array();
        foreach ($employees as $key => $value) {
            $ad1 = attendance::whereDate('attempt_time', '=', date('Y-m-d'))
                                ->where('user_id', $value->id)
                                ->where('type', '1')
                                ->first();
            $ad2 = attendance::whereDate('attempt_time', '=', date('Y-m-d'))
                                ->where('user_id', $value->id)
                                ->where('type', '2')
                                ->first();
            $val = array(
                'id' => $value->id,
                'profile_img' => $value->profile_img,
                'name' => $value->firstname.' '.$value->lastname,
                'designation' => $value->designation,
                'department' => @$value->department->name,
                'clock_in' => empty($ad1->id) ? '-' : date('h:i a', strtotime($ad1->attempt_time)),
                'break' => '-',
                'clock_out' => empty($ad2->id) ? '-' : date('h:i a', strtotime($ad2->attempt_time)),
                'status' => empty($ad1->id) && empty($ad2->id) ? '0' : '1'
            );

            array_push($data['employees'], $val);
        }

        return view('admin.attendance.today')->with($data);
    }
}
