<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\departments;
use App\Models\holidays;
use App\Models\employee\attendance;
use App\Models\shifts;

class attendanceController extends Controller
{
    public function employee($id){
        $id = base64_decode($id);
        $data['emp'] = User::find($id);
        return view('admin.attendance.emp')->with($data);
    }

    public function today(){
        $employees = User::orderBy('id')->get();
        $data['employees'] = array();
        $h = holidays::where('date', date('Y-m-d'))->first();
        $data['holiday'] = empty($h->id) ? '0' : '1';
        foreach ($employees as $key => $value) {
            $ad1 = attendance::whereDate('attempt_time', '=', date('Y-m-d'))
                                ->where('user_id', $value->id)
                                ->where('type', '1')
                                ->orderBy('attempt_time', 'desc')
                                ->first();
            $ad2 = attendance::whereDate('attempt_time', '=', date('Y-m-d'))
                                ->where('user_id', $value->id)
                                ->where('type', '2')
                                ->orderBy('attempt_time', 'desc')
                                ->first();
            $val = array(
                'id' => $value->id,
                'profile_img' => $value->profile_img,
                'name' => $value->firstname.' '.$value->lastname,
                'designation' => $value->designation,
                'department' => @$value->department->name,
                'clock_in' => empty($ad1->id) ? '-' : date('h:i a', strtotime($ad1->attempt_time)),
                'break' => '-',
                'clock_out' => ((!empty($ad2->id) && !empty($ad1->id)) && strtotime($ad1->attempt_time) >= strtotime($ad2->attempt_time)) || (empty($ad2->id) || empty($ad1->id)) ? '-' : date('h:i a', strtotime($ad2->attempt_time)),
                'status' => empty($ad1->id) ? '0' : '1'
            );

            array_push($data['employees'], $val);
        }

        return view('admin.attendance.today')->with($data);
    }

    public function todayFilter(Request $request){
        $req = $request->all();
        $employees = User::orderBy('id')->get();
        $data['search_date'] = $req['date'];
        $data['employees'] = array();
        $h = holidays::where('date', date('Y-m-d', strtotime($req['date'])))->first();
        $data['holiday'] = empty($h->id) ? '0' : '1';
        foreach ($employees as $key => $value) {
            $ad1 = attendance::whereDate('attempt_time', '=', date('Y-m-d', strtotime($req['date'])))
                                ->where('user_id', $value->id)
                                ->where('type', '1')
                                ->orderBy('attempt_time', 'desc')
                                ->first();
            $ad2 = attendance::whereDate('attempt_time', '=', date('Y-m-d', strtotime($req['date'])))
                                ->where('user_id', $value->id)
                                ->where('type', '2')
                                ->orderBy('attempt_time', 'desc')
                                ->first();
            $val = array(
                'id' => $value->id,
                'profile_img' => $value->profile_img,
                'name' => $value->firstname.' '.$value->lastname,
                'designation' => $value->designation,
                'department' => @$value->department->name,
                'clock_in' => empty($ad1->id) ? '-' : date('h:i a', strtotime($ad1->attempt_time)),
                'break' => '-',
                'clock_out' => ((!empty($ad2->id) && !empty($ad1->id)) && strtotime($ad1->attempt_time) >= strtotime($ad2->attempt_time)) || (empty($ad2->id) || empty($ad1->id)) ? '-' : date('h:i a', strtotime($ad2->attempt_time)),
                'status' => empty($ad1->id) ? '0' : '1'
            );

            array_push($data['employees'], $val);
        }

        return view('admin.attendance.today')->with($data);
    }

    public function sheet(){
        $employees = User::orderBy('id')->get();
        $data['employees'] = array();
        $data['holiday'] = holidays::where('date', '>=', date('Y-m-1'))->where('date', '<=', date('Y-m-31'))->get();
        //dd($data['holiday']);
        foreach ($employees as $key => $value) {
            $ad1 = attendance::whereDate('attempt_time', '>=', date('Y-m-1'))->whereDate('attempt_time', '<=', date('Y-m-31'))
                                ->where('user_id', $value->id)
                                ->where('type', '1')
                                ->orderBy('attempt_time', 'desc')
                                ->get();
            $ad2 = attendance::whereDate('attempt_time', '>=', date('Y-m-1'))->whereDate('attempt_time', '<=', date('Y-m-31'))
                                ->where('user_id', $value->id)
                                ->where('type', '2')
                                ->orderBy('attempt_time', 'desc')
                                ->get();
            $val = array(
                'id' => $value->id,
                'profile_img' => $value->profile_img,
                'name' => $value->firstname.' '.$value->lastname,
                'designation' => $value->designation,
                'department' => @$value->department->name,
                'clock_in' => $ad1,
                'clock_out' => $ad2,
            );

            array_push($data['employees'], $val);
        }

        return view('admin.attendance.sheet')->with($data);
    }

    //Shift
    public function shift(){
        $data['shifts'] = shifts::where('status', '1')->get();
        return view('admin.attendance.shift')->with($data);
    }

    public function shiftAdd(Request $request){
        $data = $request->all();
        $data['status'] = '1';
        shifts::create($data);

        return redirect()->back()->with('success', 'Shift successfully added.');
    }

    function shiftDelete($id){
        $id = base64_decode($id);
        $d = shifts::find($id);
        if(count($d->emp) > 0){
            return redirect()->back()->with('error', 'Cannot delete, this shift had employees.');
        }else{
            shifts::destroy($id);
        }
        return redirect()->back()->with('success', 'Shift Successfully Deleted.');
    }
    function shiftEdit($id){
        $id = base64_decode($id);
        $data['data'] = shifts::find($id);

        return view('admin.attendance.response.editShift')->with($data);
    }
    public function shiftUpdate(Request $request){
        $data = $request->all();
        $s = shifts::find(base64_decode($data['shift_id']));
        $s->title = $data['title'];
        $s->check_in = $data['check_in'];
        $s->check_out = $data['check_out'];
        $s->grace_time = $data['grace_time'];
        $s->save();

        return redirect()->back()->with('success', 'Shift successfully updated.');
    }
}
