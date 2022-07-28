<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\attendance;
use App\Models\employee\leaves;
use App\Models\holidays;
use Auth;

class payrollController extends Controller
{
    public function current(){
        $start = strtotime(date('Y-m-1'));
        $end = strtotime(date('Y-m-31'));
        $count = 0;
        while(date('Y-m-d', $start) <= date('Y-m-d', $end)){
            $count += date('N', $start) <= 6 ? 1 : 0;
            $start = strtotime("+1 day", $start);
        }
        $data['workingDays'] = $count;

        $salaryUnit = Auth::user()->basic_salary/30;
        $data['e_basic_salary'] = Auth::user()->basic_salary;
        $data['e_bonus'] = 0;
        $data['e_allowance'] = 0;
        $data['e_loan'] = 0;

        $data['d_fullday'] = 0;
        $data['d_fullday_no'] = 0;
        $data['d_halfday'] = 0;
        $data['d_halfday_no'] = 0;
        $data['d_latecoming'] = 0;
        $data['d_latecoming_no'] = 0;
        $data['d_loan'] = 0;


        $_clockIn = Auth::user()->shift->check_in;
        $_clockOut = Auth::user()->shift->check_out;
        $_buffer = Auth::user()->shift->grace_time;
        $clockInUpt = date('H:i:s', strtotime("+".$_buffer." minutes", strtotime($_clockIn)));
        $_clockInUpt = date('H:i:s', strtotime("+150 minutes", strtotime($_clockIn)));

        $holiday = holidays::where('date', '>=', date('Y-m-1'))->where('date', '<=', date('Y-m-31'))->get();
        
        $ad1 = attendance::whereDate('attempt_time', '>=', date('Y-m-1'))->whereDate('attempt_time', '<=', date('Y-m-31'))
                            ->where('user_id', Auth::id())
                            ->where('type', '1')
                            ->orderBy('attempt_time', 'desc')
                            ->get();
        $ad2 = attendance::whereDate('attempt_time', '>=', date('Y-m-1'))->whereDate('attempt_time', '<=', date('Y-m-31'))
                            ->where('user_id', Auth::id())
                            ->where('type', '2')
                            ->orderBy('attempt_time', 'desc')
                            ->get();
        $employees = array(
            'clock_in' => $ad1,
            'clock_out' => $ad2,
        );

        $leave = leaves::where('user_id', Auth::id())
                            ->where('status', '1')
                            ->where('is_halfday', '0')
                            ->get();
        $leave_half = leaves::where('user_id', Auth::id())
                            ->where('status', '1')
                            ->where('is_halfday', '1')
                            ->get();
        for($i=1; $i<=31; $i++){
            if(date('l', strtotime(date('Y-m-'.$i))) !== 'Sunday'){
                $holi = 0;
                foreach($holiday as $hol){
                    if($hol->date == date('Y-m-'.sprintf("%02d", $i))){
                        $holi = $hol->title;
                    }
                }
                if($holi == 0){
                    if(strtotime(date('Y-m-'.sprintf("%02d", $i))) <= strtotime(date('Y-m-d'))){
                        $present = 0; $checkIn = '';
                        foreach($employees['clock_in'] as $clIn){
                            if(date('Y-m-d', strtotime($clIn->attempt_time)) == date('Y-m-'.sprintf("%02d", $i))){
                                $present = 1; $clockIn = date('h:ia', strtotime($clIn->attempt_time));
                                $cs = date('H:i:s', strtotime($clIn->attempt_time));
                                if($cs > $clockInUpt && $cs < $_clockInUpt){
                                    $data['d_latecoming_no']++;
                                    $data['d_latecoming'] += $data['d_latecoming_no'] > 3 ? $salaryUnit*0.5 : 0;
                                }elseif($cs > $_clockInUpt){
                                    $l = 0; 
                                    foreach($leave_half as $le){
                                        if($le->from_date <= date('Y-m-'.sprintf("%02d", $i)) && $le->to_date >= date('Y-m-'.sprintf("%02d", $i))){
                                            $l = 1;
                                        }
                                    }      
                                    if($l == 0){
                                        $data['d_halfday_no']++;
                                        $data['d_halfday'] += $salaryUnit*0.5;
                                    }
                                }
                            }
                        } 
                        if($present !== 1){
                            $l = 0; 
                            foreach($leave as $le){
                                if($le->from_date <= date('Y-m-'.sprintf("%02d", $i)) && $le->to_date >= date('Y-m-'.sprintf("%02d", $i))){
                                    $l = 1;
                                }
                            }      
                            if($l == 0){
                                $data['d_fullday'] += $salaryUnit;
                                $data['d_fullday_no']++;
                            }
                        }
                    }
                }  
            }
        }
        return view('employee.payroll.current')->with($data);
    }
}
