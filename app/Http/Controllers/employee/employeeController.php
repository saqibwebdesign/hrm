<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\employee\bankAccount;
use App\Models\employee\experience;
use App\Models\employee\qualification;
use App\Models\employee\attendance;
use App\Models\eduLevel;
use App\Models\banks;
use Auth;
use Hash;

class employeeController extends Controller
{
    public function index(){
        $data['lastClock'] = attendance::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        $data['shift'] = array('in' => '17:00:00', 'out' => '02:00:00');
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
