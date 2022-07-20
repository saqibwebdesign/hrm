@extends('admin.includes.master')
@section('title', 'Shifts')
@section('addStyle')
    <link rel="stylesheet" href="{{URL::to('/public/admin')}}/assets/vendors/html5-editor/bootstrap-wysihtml5.css" />

@endsection
@section('content')
<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
	            <div class="col-lg-12 col-md-12 col-12 sec-45">
	                <div class="white_box">
	                   <div class="QA_section">
                            <div class="white_box_tittle list_header no-margin">
                                <h3></h3>
                                <div class="add_button m-b-20 pad-top-10">
                                    <a href="#" class="bg-yellow" data-toggle="modal" data-target="#add-shift">Add New</a>
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width:25%">Title</th>
                                            <th scope="col" style="width:20%">Check-In</th>
                                            <th scope="col" style="width:20%">Check-Out</th>
                                            <th scope="col" style="width:20%">Enrolled Employee</th>
                                            <th scope="col" style="width:10%; text-align: right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shifts as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$val->title}}</td>
                                                <td>{{date('h:i a', strtotime($val->check_in))}}</td>
                                                <td>{{date('h:i a', strtotime($val->check_out))}}</td>
                                                <td>{{count($val->emp)}}</td>
                                                <td style=" text-align: right;">
                                                    <div class="action-tray" style=" text-align: right;">
                                                    	<a href="javascript:void(0)" class="btn btn-sm btn-primary editShift" data-id="{{base64_encode($val->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                                    	<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteShift" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>                               
                                        @endforeach             
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

<!-- General add popup -->

    <div class="modal fade" id="add-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 30%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Shift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.attendance.shift.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">                                    
                            <div class="col-lg-12 col-md-4 col-12 no-margin">
                                <div class="row">
                                    <div class="col-12 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Check-In</label>
                                            <input type="time" name="check_in" class="form-control" required>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                    <div class="col-6 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Check-Out</label>
                                            <input type="time" name="check_out" class="form-control" required>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Grace Time <small>(min)</small></label>
                                            <input type="number" name="grace_time" value="20" class="form-control" required>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sav-button pad-top-30 pad-right-20">
                                    <input type="Submit" value="Submit" class="bg-yellow">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                 
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Shift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                </div>                 
            </div>
        </div>
    </div>
@endsection
@section('addScript')
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="{{URL::to('/public/admin')}}/assets/vendors/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="{{URL::to('/public/admin')}}/assets/vendors/html5-editor/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.textarea_editor').wysihtml5();
        });
    </script>
@endsection