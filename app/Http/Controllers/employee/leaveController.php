<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leaveType;
use App\Models\employee\leaves;
use Auth;

class leaveController extends Controller
{
    
    public function index(){
        $data['types'] = leaveType::where('status', '1')->get();
        $data['leaves'] = leaves::where('user_id', Auth::id())->latest()->get();

        return view('employee.leaves.index')->with($data);
    }
}
