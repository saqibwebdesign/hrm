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
            return redirect(route('employee.dashboard'))->with('success', 'Login Successful.');
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
