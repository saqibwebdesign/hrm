<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\attendance;
use App\Models\notification;
use App\Models\User;
use Carbon\Carbon;
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
            $clockOutUpt = date('H:i:s', strtotime("+50 minutes", strtotime($shift_out)));
            if(date('H:i:s') > $clockOutUpt){
                $checkDate = $shift_in > $shift_out ? Carbon::yesterday() : Carbon::today();
                $att_i = attendance::where('user_id', $val->id)
                                    ->whereDate('attempt_time', $checkDate)
                                    ->where('type', '1')->first();
                $att_o = attendance::where('user_id', $val->id)
                                    ->whereDate('attempt_time', Carbon::today())
                                    ->where('type', '2')->first();
                if(!empty($att_i) && empty($att_o->id)){
                    echo $shift_in.' | '.$shift_out.' --------'.$clockOutUpt.'<br>';
                    
                    $a = new attendance;
                    $a->user_id = $val->id;
                    $a->type = '2';
                    $a->attempt_time = date('Y-m-d').' '.$shift_out;
                    $a->save();

                    $u = User::find($val->id);
                    $u->clock_type = '2';
                    $u->save();

                    $description = '
                        <p>You forgot to clock-out on date <strong>'.date('d-M-Y').'</p>
                    ';

                    $noti = new notification;
                    $noti->user_id = $val->id;
                    $noti->title = 'Forgot Clock-Out. Shift Date: '.date('d-M-Y');
                    $noti->description = $description;
                    $noti->status = '1';
                    $noti->save();
                }
            }
        }
    }

    public function monthly(){

        return view('employee.attendance.monthly');
    }
}
