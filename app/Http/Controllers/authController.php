<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;
use Auth;
use URL;
use Carbon;

class authController extends Controller
{
    public function login(){
        
        return view('login');
    }
    public function loginAttempt(Request $request){

        $data = $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $dob['m'] = date('m', strtotime(Auth::user()->dob));
            $dob['d'] = date('d', strtotime(Auth::user()->dob));
            if($dob['m'] == date('m') && $dob['d'] == date('d')){
 
                $n = notification::where('user_id', Auth::id())->where('title', 'Happy Birthday.')->whereDate('created_at', Carbon::today())->first();
                if(empty($n->id)){
                    $description = '
                        <img src="'.URL::to("/public/birthday.gif").'" style="width:200px; height:200px">
                        <p>The warmest wishes to a great member of our team. May your special day be full of happiness, fun and cheer!</p>
                    ';
                    $noti = new notification;
                    $noti->user_id = Auth::id();
                    $noti->title = 'Happy Birthday.';
                    $noti->description = $description;
                    $noti->status = '1';
                    $noti->save();
                }

                return redirect(route('employee.dashboard'))->with('birthday', 'The whole team wishes you the happiest of birthdays and a great year.'); 
            }else{
                return redirect(route('employee.dashboard'))->with('success', 'Login Successful.');
            }
        }else{
            return redirect()->back()->with('error', 'Authentication Failed.');
        }
        dd($data);
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function check(){
        return redirect(route('employee.dashboard'));
    }
}
