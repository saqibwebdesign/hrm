<?php

namespace App\Http\Controllers\employee\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class projectController extends Controller
{
    public function detail(){

        return view('employee.manager.detail');
    }
}
