<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\leaveAssigned;
use App\Models\leaveType;
use App\Models\employee\leaves;
use Auth;

class leaveController extends Controller
{
    
    public function index(){
        $data['types'] = leaveType::where('status', '1')->get();
        $data['leaves'] = leaves::where('user_id', Auth::id())->latest()->get();
        $data['approved'] = leaves::where('user_id', Auth::id())->where('status', '1')->count();
        
        return view('employee.leaves.index')->with($data);
    }

    public function add(Request $request){
        $data = $request->all();
        //dd($data);
        $pd = date('Y-m-d', strtotime("+3 months", strtotime(Auth::user()->joining_date)));
        if($pd > date('Y-m-d')){
            return redirect()->back()->with('error', 'You can`t submit leave due to incompletion of probation period.');
        }
        $type = leaveType::find($data['type_id']);
        $leaves = leaveAssigned::where('user_id', Auth::id())
                                ->where('type_id', $data['type_id'])
                                ->where('year', date('Y'))
                                ->first();
        if(empty($leaves->id)){
            return redirect()->back()->with('error', 'You don`t have enough '.$type->type.' to avail.');
        }
        $_availed1 = leaves::where('user_id', Auth::id())
                                ->where('type_id', $data['type_id'])
                                ->where('is_halfday', '1')
                                ->whereYear('from_date', date('Y'))
                                ->sum('days');
        $_availed2 = leaves::where('user_id', Auth::id())
                                ->where('type_id', $data['type_id'])
                                ->where('is_halfday', '0')
                                ->whereYear('from_date', date('Y'))
                                ->sum('days');
        $availed = $_availed2+($_availed1*0.5);
        if(!empty($leaves->id) && $data['days'] > ($leaves->available-$availed)){
            return redirect()->back()->with('error', 'You don`t have enough '.$type->type.' to avail.');
        }
        $data['status'] = '0';
        $data['user_id'] = Auth::id();
        $data['is_halfday'] = !empty($data['is_halfday']) ? 1 : 0;
        leaves::create($data);

        return redirect()->back()->with('success', 'Leave submitted successfully!');
    }
}
