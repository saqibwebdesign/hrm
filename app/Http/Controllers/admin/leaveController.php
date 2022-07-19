<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\departments;
use App\Models\leaveType;
use App\Models\employee\leaves;

class leaveController extends Controller
{
    public function index(){
        $data['leaves'] = leaves::latest()->paginate(25);
        return view('admin.leaves.index')->with($data);
    }
}
