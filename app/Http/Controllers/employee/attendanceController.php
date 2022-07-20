<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\attendance;
use App\Models\User;
use Auth;

class attendanceController extends Controller
{
    public function clockAttempt($type){
        $clockIn = Auth::user()->shift->check_in;
        $clockInUpt = date('H:i:s', strtotime("-30 minutes", strtotime($clockIn)));
        //dd($clockIn.' | '.$clockInUpt);
        if(date('H:i:s') < $clockInUpt){
            return redirect()->back()->with('error', 'Cannot clock-in too early! Clock In after: '.date('h:i a', strtotime($clockInUpt)));
        }else{
            $a = new attendance;
            $a->user_id = Auth::id();
            $a->type = $type;
            $a->attempt_time = date('Y-m-d H:i:s');
            $a->save();

            $u = User::find(Auth::id());
            $u->clock_type = $type;
            $u->save();

            return redirect()->back();
        }
    }

    public function attendanceCheck(){
        $users = User::all();
        foreach($users as $val){
            $shift_in = $val->shift->check_in;
            $shift_out = $val->shift->check_out;
        }
    }

    public function monthly(){

        return view('employee.attendance.monthly');
    }
}
