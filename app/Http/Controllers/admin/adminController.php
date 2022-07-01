<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class adminController extends Controller
{
    function index()
    {
        return view('admin.index');
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
