@extends('admin.includes.master')
@section('title', 'Notifications')
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
                                    <a href="#" class="bg-yellow" data-toggle="modal" data-target="#add-notification">Add New</a>
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped lms_table_active ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width:15%">Department</th>
                                            <th scope="col" style="width:25%">Title</th>
                                            <th scope="col" style="width:40%">Description</th>
                                            <th scope="col" style="width:10%">Date</th>
                                            <th scope="col" style="width:10%; text-align: right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notification as $key => $val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td><label class="badge badge-primary">{{$val->department_id == 0 ? 'All Departments' : @$val->depart->name}}</label></td>
                                                <td>{{$val->title}}</td>
                                                <td>
                                                    <div class="cut-second-line">{!! $val->description !!}</div>
                                                </td>
                                                <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}
                                                <td style=" text-align: right;">
                                                    <div class="action-tray" style=" text-align: right;">
                                                    	<a href="javascript:void(0)" class="btn btn-sm btn-info viewNotification" data-id="{{base64_encode($val->id)}}"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary editNotification" data-id="{{base64_encode($val->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                                    	<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteNotification" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
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
            @if(!isset($_GET['depart']))
                {{$notification->links()}}
            @endif
        </div>
    </div>
</div>

<!-- General add popup -->

    <div class="modal fade" id="add-notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <form class="profile-form pad-top-20 pad-bot-20" id="resetPasswordForm" action="{{route('admin.notification.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">                                    
                            <div class="col-lg-12 col-md-4 col-12 no-margin">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Department</label>
                                            <select name="department" class="form-control" required>
                                                <option value="0">All Departments</option>
                                                @foreach($departs as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                            <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-4 col-12 no-margin">
                                        <div class="input-form res-section-1">
                                            <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Description</label>
                                            <textarea class="form-control textarea_editor" name="description" rows="10" required></textarea>
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

    <div class="modal fade" id="edit-notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                </div>                 
            </div>
        </div>
    </div>

    <div class="modal fade" id="view-notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;" role="document">
            <div class="modal-content">
                <div class="modal-header sec-46" style="border-bottom: 1px solid;">
                    <h5 class="modal-title" id="exampleModalLongTitle">View Notification</h5>
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