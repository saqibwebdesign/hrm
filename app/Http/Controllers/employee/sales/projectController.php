<?php

namespace App\Http\Controllers\employee\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class projectController extends Controller
{
    public function index(){

        return view('employee.sales.project.index');
    }
    public function create(){

        return view('employee.sales.project.create');
    }
}
