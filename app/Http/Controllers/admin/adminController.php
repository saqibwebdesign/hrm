<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\departments;
use App\Models\holidays;
use App\Models\employee\attendance;
use App\Models\employee\leaves;
use App\Models\shifts;
use Auth;

class adminController extends Controller
{
    function index(){
        $employees = User::orderBy('id')->get();
        $data['total_employees'] = count($employees);
        $data['total_present'] = 0;
        $data['total_absent'] = 0;
        $data['total_late'] = 0;
        $data['total_halfday'] = 0;
        $data['total_leave'] = 0;
        $data['departments'] = departments::orderBy('name')->get();
        $h = holidays::where('date', date('Y-m-d'))->first();
        $data['holiday'] = empty($h->id) ? '0' : '1';
        foreach ($employees as $key => $value) {
            $ad1 = attendance::whereDate('attempt_time', '=', date('Y-m-d'))
                                ->where('user_id', $value->id)
                                ->where('type', '1')
                                ->orderBy('attempt_time', 'desc')
                                ->first();
            $ad2 = attendance::whereDate('attempt_time', '=', date('Y-m-d'))
                                ->where('user_id', $value->id)
                                ->where('type', '2')
                                ->orderBy('attempt_time', 'desc')
                                ->first();

            $data['clockIn'] = $value->shift->check_in;
            $data['clockOut'] = $value->shift->check_out;
            $buffer = $value->shift->grace_time;
            $data['clockInUpt'] = date('H:i:s', strtotime("+".$buffer." minutes", strtotime($data['clockIn'])));
            $halfday = date('H:i:s', strtotime("+150 minutes", strtotime($data['clockIn'])));

            $data['total_absent'] += empty($ad1->id) && $data['clockInUpt'] < date('H:i:s') ? 1 : 0;

            $leave = leaves::where('user_id', $value->id)
                                ->where('status', '1')
                                ->where('is_halfday', '0')
                                ->get();

            if(!empty($ad1->id)){
                $data['total_present']++;
                if(date('H:i:s', strtotime($ad1->attempt_time)) > $halfday){
                    $data['total_halfday']++;
                }elseif(date('H:i:s', strtotime($ad1->attempt_time)) > $data['clockInUpt']){
                    $data['total_late']++;
                }
            }else{
                $l = 0; 
                foreach($leave as $le){
                    if($le->from_date <= date('Y-m-d') && $le->to_date >= date('Y-m-d')){
                        $l = 1;
                    }
                }      
                if($l == 1){
                    $data['total_leave']++;
                }
            }
        }

        return view('admin.index')->with($data);
    }

    function login(){

        return view('admin.login');
    }   

    function loginSubmit(Request $request){
        $data = $request->all();
        if(Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password']])){
            return redirect(route('admin.dashboard'));
        }else{
            return redirect()->back()->with('error', 'Username or Password is incorrect.');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();

        return redirect(route('admin.login'));
    }

}
