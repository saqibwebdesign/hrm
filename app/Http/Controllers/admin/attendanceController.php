<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class attendanceController extends Controller
{
    public function employee($id){
        $id = base64_decode($id);
        $data['emp'] = User::find($id);
        return view('admin.attendance.emp')->with($data);
    }
}
