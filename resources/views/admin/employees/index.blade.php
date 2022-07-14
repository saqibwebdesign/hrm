@extends('admin.includes.master')
@section('title', 'Employees')

@section('content')
<style type="text/css">
.img-thumbnail {
    height: auto;
}
.sec-46 h5 {
    font-size: 22px;
}
@media screen and (max-width:519px) and (min-width:320px) { 
.browseProfilePhoto {
    margin-top: 10px;
    margin-left: 8px;
}
}
@media screen and (max-width:992px) and (min-width:768px) { 
.browseProfilePhoto {
    margin-top: 80px;
}
}

</style>
<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
	            <div class="col-lg-12 col-md-12 col-12 sec-45">
	                <div class="white_box">
	                   <div class="QA_section">
                            <div class="white_box_tittle list_header no-margin">
                                <form class="filter-form" method="get">
                                    <select class="form-control" name="depart">
                                        <option value="">All Departments</option>
                                        @foreach($departs as $val)
                                            <option value="{{$val->id}}"
                                                {{isset($_GET['depart']) && $_GET['depart'] == $val->id ? 'selected' : ''}}
                                            >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default btn-filter"><i class="fa fa-search"></i></button>
                                </form>
                                <div class="add_button m-b-20 pad-top-10">
                                    <a href="{{route('admin.employee.add')}}" class="bg-yellow">Add New</a>
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width:40%">Employee</th>
                                            <th scope="col" style="width:20%">Department</th>
                                            <th scope="col" style="width:10%">Gender</th>
                                            <th scope="col" style="width:10%">Phone</th>
                                            <th scope="col" style="width:10%">Basic Salary</th>
                                            <th scope="col" style="width:10%; text-align: right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <div class="card-image">
                                                        <div class="user-tray">
                                                            <img src="{{URL::to('public/storage/users/'.$val->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="Profile">
                                                            <p>{{$val->firstname.' '.$val->lastname}}</p>
                                                            <span>{{$val->designation}}</span>
                                                        </div>
                                                    </div> 
                                                </td>
                                                <td><label class="badge badge-primary">{{@$val->department->name}}</label></td>
                                                <td>{{$val->gender}}</td>
                                                <td>{{$val->phone}}</td>
                                                <td>{{number_format($val->basic_salary)}}</td>
                                                <td style=" text-align: right;">
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                      </button>
                                                      <div class="dropdown-menu dropdown-menu-left" style="">
                                                        <a class="dropdown-item editEmployee" href="javascript:void(0)" data-id="{{base64_encode($val->id)}}">Edit</a>
                                                        <a class="dropdown-item" href="{{route('admin.attendance.employee', base64_encode($val->id))}}">Attendance</a>
                                                      </div>
                                                    </div>
                                                </td>
                                            </tr>                               
                                        @endforeach
                                        @if(count($employees) == 0)
                                            <tr>
                                                <td colspan="7">&nbsp;&nbsp;&nbsp;No Employee found.</td>
                                            </tr>
                                        @endif             
                                    </tbody>
                                </table>
                            </div>
                        </div>                    		
	                </div>
	            </div>
            </div>
            @if($cat == 0)
                {{$employees->links()}}
            @endif
        </div>
    </div>
</div>

@endsection