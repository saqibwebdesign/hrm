<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\attendance;
use App\Models\employee\leaveAssigned;
use App\Models\employee\leaves;
use App\Models\payroll;
use App\Models\payrollDetail;
use App\Models\User;
use App\Models\holidays;
use App\Models\leaveType;
use App\Models\shifts;

class payrollController extends Controller
{
    public function index(){
        $data['payroll'] = payroll::orderBy('created_at', 'desc')->paginate(12);

        return view('admin.payroll.index')->with($data);
    }

    public function generate(){
        $payroll = payroll::where('month', date('F-Y'))->first();
        if(!empty($payroll->id)){
            return redirect()->back()->with('error','Current month payroll is already generated.');
        }else{
            $total_payroll = 0;
            $total_deduction = 0;
            $net_payroll = 0;
            $start = strtotime(date('Y-m-1'));
            $end = strtotime(date('Y-m-31'));
            $count = 0;
            while(date('Y-m-d', $start) <= date('Y-m-d', $end)){
                $count += date('N', $start) <= 6 ? 1 : 0;
                $start = strtotime("+1 day", $start);
            }
            $data['workingDays'] = $count;
            $users = User::where('basic_salary', '!=', 0)->get();
            
            $payroll = new payroll;
            $payroll->month = date('F-Y');
            $payroll->employees = count($users);
            $payroll->working_days = $count;
            $payroll->save();

            foreach($users as $val){
                $salaryUnit = $val->basic_salary/30;
                $e_basic_salary = $val->basic_salary;
                $e_bonus = 0;
                $e_allowance = 0;
                $e_loan = 0;

                $d_fullday = 0;
                $d_halfday = 0;
                $d_latecoming = 0;
                $d_latecoming_no = 0;
                $d_loan = 0;


                $_clockIn = $val->shift->check_in;
                $_clockOut = $val->shift->check_out;
                $_buffer = $val->shift->grace_time;
                $clockInUpt = date('H:i:s', strtotime("+".$_buffer." minutes", strtotime($_clockIn)));
                $_clockInUpt = date('H:i:s', strtotime("+150 minutes", strtotime($_clockIn)));

                $holiday = holidays::where('date', '>=', date('Y-m-1'))->where('date', '<=', date('Y-m-31'))->get();
                
                $ad1 = attendance::whereDate('attempt_time', '>=', date('Y-m-1'))->whereDate('attempt_time', '<=', date('Y-m-31'))
                                    ->where('user_id', $val->id)
                                    ->where('type', '1')
                                    ->orderBy('attempt_time', 'desc')
                                    ->get();
                $ad2 = attendance::whereDate('attempt_time', '>=', date('Y-m-1'))->whereDate('attempt_time', '<=', date('Y-m-31'))
                                    ->where('user_id', $val->id)
                                    ->where('type', '2')
                                    ->orderBy('attempt_time', 'desc')
                                    ->get();
                $employees = array(
                    'clock_in' => $ad1,
                    'clock_out' => $ad2,
                );

                $leave = leaves::where('user_id', $val->id)
                                    ->where('status', '1')
                                    ->where('is_halfday', '0')
                                    ->get();
                $leave_half = leaves::where('user_id', $val->id)
                                    ->where('status', '1')
                                    ->where('is_halfday', '1')
                                    ->get();
                for($i=1; $i<=date('d'); $i++){
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
                                            $d_latecoming_no++;
                                            $d_latecoming += $d_latecoming_no > 3 ? $salaryUnit*0.5 : 0;
                                        }elseif($cs > $_clockInUpt){
                                            $lh = 0; 
                                            foreach($leave_half as $le){
                                                if($le->from_date <= date('Y-m-'.sprintf("%02d", $i)) && $le->to_date >= date('Y-m-'.sprintf("%02d", $i))){
                                                    $lh = 1;
                                                }
                                            }      
                                            if($lh == 0){
                                                $d_halfday += $salaryUnit*0.5;
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
                                        $d_fullday += $salaryUnit;
                                    }
                                }
                            }
                        }  
                    }
                }

                $pd = new payrollDetail;
                $pd->payroll_id = $payroll->id;
                $pd->user_id = $val->id;
                $pd->e_basic_salary = $e_basic_salary;
                $pd->e_bonus = $e_bonus;
                $pd->e_allowance = $e_allowance;
                $pd->e_loan = $e_loan;
                $pd->total_earning = ($e_basic_salary+$e_bonus+$e_allowance+$e_loan);
                $pd->d_fullday_off = $d_fullday;
                $pd->d_halfday_off = $d_halfday;
                $pd->d_latecoming = $d_latecoming;
                $pd->d_loan = $d_loan;
                $pd->total_deduction = ($d_fullday+$d_halfday+$d_latecoming+$d_loan);
                $pd->net_salary = ($e_basic_salary+$e_bonus+$e_allowance+$e_loan)-($d_fullday+$d_halfday+$d_latecoming+$d_loan);
                $pd->save();

                $total_payroll += ($e_basic_salary+$e_bonus+$e_allowance+$e_loan);
                $total_deduction += ($d_fullday+$d_halfday+$d_latecoming+$d_loan);
                $net_payroll += ($e_basic_salary+$e_bonus+$e_allowance+$e_loan)-($d_fullday+$d_halfday+$d_latecoming+$d_loan);

            }

            $payroll->payroll = $total_payroll;
            $payroll->deduction = $total_deduction;
            $payroll->net_payroll = $net_payroll;
            $payroll->save();

            //return
            return redirect()->back()->with('success', 'Payroll successfully generated.');
        }
    }

    public function details($id){
        $id = base64_decode($id);
        $data['payroll'] = payroll::find($id);
        $data['payslip'] = payrollDetail::where('payroll_id', $id)->get();

        return view('admin.payroll.payslip')->with($data);
    }

    public function payslip($id){
        $id = base64_decode($id);
        $data['payslip'] = payrollDetail::find($id);

        return view('admin.payroll.response.slip')->with($data);
    }
}
