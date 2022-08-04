<?php

namespace App\Http\Controllers\employee\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sales\platform;
use App\Models\sales\projects;
use App\Models\sales\projectAttachment;
use Auth;

class projectController extends Controller
{
    public function index(){
        $data['total_projects'] = projects::where('created_by', Auth::id())->count();
        $data['total_inprogress'] = projects::where('created_by', Auth::id())->where('status', '1')->count();
        $data['total_pending'] = projects::where('created_by', Auth::id())->where('status', '0')->count();
        $data['total_completed'] = projects::where('created_by', Auth::id())->where('status', '2')->count();
        $data['projects'] = projects::where('created_by', Auth::id())->latest()->get();

        return view('employee.sales.project.index')->with($data);
    }

    public function create(){
        $data['platform'] = platform::all();
        return view('employee.sales.project.create')->with($data);
    }

    public function createSubmit(Request $request){
        $data = $request->all();
        $data['status'] = '0';
        $data['created_by'] = Auth::id();
        $pro = projects::create($data);

        if($request->hasFile('attachment')){
            $files = $request->file('attachment');
            foreach($files as $key => $file){
                $filename = $pro->id.$key.date('dmyHis').'.'.$file->getClientOriginalExtension();
                $file->move(base_path('/public/storage/projects/'), $filename);

                $a = new projectAttachment;
                $a->project_id = $pro->id;
                $a->filename = $filename;
                $a->save();
            }
        }

        return redirect(route('employee.sales.project'))->with('success', 'New project successfully created.');
    }
}
