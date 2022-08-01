<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\employee\bankAccount;
use App\Models\employee\experience;
use App\Models\employee\qualification;
use App\Models\employee\attendance;
use App\Models\employee\leaveAssigned;
use App\Models\employee\leaves;
use App\Models\notification;
use App\Models\holidays;
use App\Models\eduLevel;
use App\Models\banks;
use Auth;
use Hash;
use DB;

class employeeController extends Controller
{
    public function index(){
        $data['lastClock'] = attendance::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $data['shift'] = array('in' => '17:00:00', 'out' => '02:00:00');
        $data['notification'] = notification::where('department_id', Auth::user()->department_id)
                                                ->orWhere('department_id', '0')
                                                ->orWhere('user_id', Auth::id())
                                                ->orderBy('id', 'desc')
                                                ->limit(5)
                                                ->get();
        $data['holidays'] = holidays::where('date', '>', date('Y-m-d'))
                                        ->where('date', '<=', date('Y-12-25'))
                                        ->orderBy('date', 'asc')
                                        ->get();
        $leave = leaveAssigned::where('user_id', Auth::id())
                                ->where('year', date('Y'))
                                ->sum('available');
        $data['annualLeaves'] = empty($leave) ? 0 : $leave;
        $leave_full = leaves::where('user_id', Auth::id())
                            ->where('status', '1')
                            ->where('is_halfday', '0')
                            ->count();
        $leave_half = leaves::where('user_id', Auth::id())
                            ->where('status', '1')
                            ->where('is_halfday', '1')
                            ->count();
        $data['availed_leave'] = $leave_full+($leave_half*0.5);
        $date = now();
        $data['birthdays'] = DB::select("select * from `tbl_users_info` where month(`dob`) > ".$date->month." or (month(`dob`) = ".$date->month." and day(`dob`) >= ".$date->day.") ORDER BY DATE_FORMAT(`dob`,'%m'), DATE_FORMAT(`dob`,'%d') LIMIT 4");
        
        $salaryUnit = Auth::user()->basic_salary/30;
        $data['ss_addition'] = 0;

        $data['ss_deduction'] = 0;
        $data['d_latecoming_no'] = 0;

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
                                    $data['ss_deduction'] += $data['d_latecoming_no'] > 3 ? $salaryUnit*0.5 : 0;
                                }elseif($cs > $_clockInUpt){
                                    $lh = 0; 
                                    foreach($leave_half as $le){
                                        if($le->from_date <= date('Y-m-'.sprintf("%02d", $i)) && $le->to_date >= date('Y-m-'.sprintf("%02d", $i))){
                                            $lh = 1;
                                        }
                                    }      
                                    if($lh == 0){
                                        $data['ss_deduction'] += $salaryUnit*0.5;
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
                                $data['ss_deduction'] += $salaryUnit;

                            }
                        }
                    }
                }  
            }
        }
        return view('employee.index')->with($data);
    }
    public function profile(){
        $data['user'] = User::find(Auth::id());
        
        return view('employee.settings.profile')->with($data);
    }
    public function profileUpdate(Request $request){
        $data = $request->all();
        $u = User::find(Auth::id());
        $u->maritial_status = $data['maritial_status'];
        $u->phone = $data['phone'];
        $u->emergency_phone = $data['emergency_phone'];
        $u->address = $data['address'];
        $u->city = $data['city'];
        $u->state = $data['state'];
        $u->country = $data['country'];
        $u->postal_code = $data['postal_code'];
        $u->save();

        return redirect()->back()->with('success', 'Profile Successfully Updated.');
    }
    public function updateImage(Request $request){
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = Auth::id().date('dmyHis').'.'.$file->getClientOriginalExtension();
            $file->move(base_path('/public/storage/users/'), $filename);

            $u = User::find(Auth::id());
            $u->profile_img = $filename;
            $u->save();
        }

        return redirect()->back();
    }

    public function social(){

        return view('employee.settings.social');
    }
    public function socialUpdate(Request $request){
        $data = $request->all();
        $u = User::find(Auth::id());
        $u->facebook_link = $data['facebook_link'];
        $u->instagram_link = $data['instagram_link'];
        $u->linkedin_link = $data['linkedin_link'];
        $u->skype_link = $data['skype_link'];
        $u->whatsapp_no = $data['whatsapp_no'];
        $u->twitter_link = $data['twitter_link'];
        $u->save();

        return redirect()->back()->with('success', 'Profile Successfully Updated.');
    }

    public function bank(){
        $data['accounts'] = bankAccount::where('user_id', Auth::id())->get();
        $data['banks'] = banks::all();
        return view('employee.settings.bank')->with($data);
    }

    public function bankAdd(Request $request){
        $data = $request->all();
        $ba = new bankAccount;
        $ba->user_id = Auth::id();
        $ba->bank_id = $data['bank_id'];
        $ba->account_title = $data['account_title'];
        $ba->account_no = $data['account_no'];
        $ba->branch_name = $data['branch_name'];
        $ba->branch_code = $data['branch_code'];
        $ba->save();

        return redirect()->back()->with('success', 'Bank Account Successfully Added.');
    }

    public function experience(){
        $data['experience'] = experience::where('user_id', Auth::id())->get();
        return view('employee.settings.experience')->with($data);
    }

    public function experienceAdd(Request $request){
        $data = $request->all();
        $ba = new experience;
        $ba->user_id = Auth::id();
        $ba->company_name = $data['company_name'];
        $ba->from_date = $data['from_date'];
        $ba->to_date = $data['to_date'];
        $ba->position = $data['position'];
        $ba->description = $data['description'];
        $ba->save();

        return redirect()->back()->with('success', 'Experience Successfully Added.');
    }

    public function qualification(){
        $data['qualification'] = qualification::where('user_id', Auth::id())->get();
        $data['levels'] = eduLevel::all();
        return view('employee.settings.qualification')->with($data);
    }

    public function qualificationAdd(Request $request){
        $data = $request->all();
        $ba = new qualification;
        $ba->user_id = Auth::id();
        $ba->school = $data['school'];
        $ba->level = $data['level'];
        $ba->from_date = $data['from_date'];
        $ba->to_date = $data['to_date'];
        $ba->description = $data['description'];
        $ba->save();

        return redirect()->back()->with('success', 'Qualification Successfully Added.');
    }

    public function changePassword(){

        return view('employee.settings.password');
    }

    public function changePasswordSubmit(Request $request){
        $data = $request->all();
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::find(Auth::id());
        $hashedPassword = Hash::check($request->old_password, $user->password);
        if($hashedPassword){
            
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated.');
        }else{
            return redirect()->back()->with('error', 'Current Password is incorrect.');
        }
    }
}
