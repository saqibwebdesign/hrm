@extends('admin.includes.master')
@section('title', empty($search_date) ? 'Today`s Attendance' : date('d-M-Y', strtotime($search_date)).' - Attendance')

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
                            <form method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input type="date" name="date" class="form-control" value="{{empty($search_date) ? '' : $search_date}}" max="{{date('Y-m-d')}}" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-success">Result</button>
                                        @if(!empty($search_date))
                                            <a href="{{route('admin.attendance.today')}}" class="btn btn-default">
                                                <i class="fa fa-refresh"></i> reset
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width:5%">#</th>
                                            <th scope="col" style="width:30%">Employee</th>
                                            <th scope="col" style="width:10%">Department</th>
                                            <th scope="col" style="width:10%">Clock-in</th>
                                            <th scope="col" style="width:10%">Break</th>
                                            <th scope="col" style="width:10%">Clock-out</th>
                                            <th scope="col" style="width:10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <div class="card-image">
                                                        <div class="user-tray">
                                                            <img src="{{URL::to('public/storage/users/'.$val['profile_img'])}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="Profile">
                                                            <p>{{$val['name']}}</p>
                                                            <span>{{$val['designation']}}</span>
                                                        </div>
                                                    </div> 
                                                </td>
                                                <td><label class="badge badge-warning">{{@$val['department']}}</label></td>
                                                <td>{{$val['clock_in']}}</td>
                                                <td>{{$val['break']}}</td>
                                                <td>{{$val['clock_out']}}</td>
                                                <td>
                                                    @if(date('l') == 'Sunday')
                                                        <label class="btn btn-info btn-sm">Weekend</label>
                                                    @elseif($holiday == '1')
                                                        <label class="btn btn-info btn-sm">Holiday</label>
                                                    @else
                                                        @if($val['status'] == '0')
                                                            <label class="btn btn-danger btn-sm">Absent</label>
                                                        @else
                                                            <label class="btn btn-success btn-sm">Present</label>
                                                        @endif
                                                    @endif
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
        </div>
    </div>
</div>

@endsection
@section('addStyle')
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{URL::to('/public/admin/assets')}}/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="{{URL::to('/public/admin/assets')}}/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="{{URL::to('/public/admin/assets')}}/vendors/datatable/css/buttons.dataTables.min.css" />
@endsection
@section('addScript')
    <!-- responsive table -->
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/jszip.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/buttons.print.min.js"></script>
@endsection