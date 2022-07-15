<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\attendance;
use Auth;

class attendanceController extends Controller
{
    public function clockAttempt($type){
        $a = new attendance;
        $a->user_id = Auth::id();
        $a->type = $type;
        $a->attempt_time = date('Y-m-d H:i:s');
        $a->save();

        return redirect()->back();
    }

    public function monthly(){

        return view('employee.attendance.monthly');
    }
}
