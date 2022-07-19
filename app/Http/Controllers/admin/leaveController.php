<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\departments;
use App\Models\leaveType;
use App\Models\employee\leaves;
use App\Models\notification;

class leaveController extends Controller
{
    public function index(){
        $data['leaves'] = leaves::latest()->paginate(25);
        return view('admin.leaves.index')->with($data);
    }

    public function statusChange($type, $id){
        $id = base64_decode($id);

        $l = leaves::find($id);
        $l->status = $type;
        $l->save();

        $title = $type == 1 ? 'Your leave application accepted.' : 'Your leave application rejected.'; 
        $description = '
            <h4>'.$title.'</h4>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th colspan="2">Application Details</th>
                </tr>
                <tr>
                    <td>Leave Type</td>
                    <td>'.@$l->type->type.'</td>
                <tr>
                <tr>
                    <td>From</td>
                    <td>'.date("d-M-Y", strtotime($l->from_date)).'</td>
                <tr>
                <tr>
                    <td>To</td>
                    <td>'.date("d-M-Y", strtotime($l->to_date)).'</td>
                <tr>
                <tr>
                    <td>No. of Days</td>
                    <td>'.$l->days.'</td>
                <tr>
                <tr>
                    <td>Reason</td>
                    <td>'.$l->reason.'</td>
                <tr>
            </table>
        ';

        $noti = new notification;
        $noti->user_id = $l->user_id;
        $noti->title = 'Leave Application Updates.';
        $noti->description = $description;
        $noti->status = '1';
        $noti->save();

        return redirect()->back()->with('success', 'Status successfully updated.');
    }
}