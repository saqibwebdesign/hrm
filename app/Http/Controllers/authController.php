<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
