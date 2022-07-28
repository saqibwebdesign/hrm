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
        $type = leaveType::find($data['type_id']);
        $leaves = leaveAssigned::where('user_id', Auth::id())
                                ->where('type_id', '1')
                                ->where('year', date('Y'))
                                ->first();
        if(empty($leaves->id)){
            return redirect()->back()->with('error', 'You don`t have enough '.$type->type.' to avail.');
        }
        $availed = leaves::where('user_id', Auth::id())
                                ->where('type_id', $data['type_id'])
                                ->whereYear('from_date', date('Y'))
                                ->sum('days');
        if(!empty($leaves->id) && $data['days'] > ($leaves->available-$availed)){
            return redirect()->back()->with('error', 'You don`t have enough '.$type->type.' to avail.');
        }
        $data['status'] = '0';
        $data['user_id'] = Auth::id();
        leaves::create($data);

        return redirect()->back()->with('success', 'Leave submitted successfully!');
    }
}
