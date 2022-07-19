@extends('admin.includes.master')
@section('title', 'Leaves')
@section('addStyle')

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
                                <h2></h2>
                                <div class="add_button m-b-20 pad-top-10">
                                    <a href="#" class="bg-yellow" data-toggle="modal" data-target="#add-notification">Add New</a>
                                </div>
                            </div>
                            <hr>
                            <div class="QA_table restaurant-section">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           <th> # </th>
                                           <th> Leave Type </th>
                                           <th> From </th>
                                           <th> To </th>
                                           <th> No. of Days </th>
                                           <th> Reason </th>
                                           <th> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($leaves as $key => $val)
                                            <tr>
                                                <td> {{++$key}} </td>
                                                <td> {{@$val->type->type}} </td>
                                                <td> {{date('d-M-Y', strtotime($val->from_date))}} </td>
                                                <td> {{date('d-M-Y', strtotime($val->to_date))}} </td>
                                                <td> {{$val->days}} Days </td>
                                                <td> {{$val->reason}} </td>
                                                <td>
                                                    @switch($val->status)
                                                      @case('0')
                                                        <label class="badge badge-primary">Pending</label>
                                                        @break

                                                      @case('1')
                                                        <label class="badge badge-success">Approved</label>
                                                        @break

                                                      @case('2')
                                                        <label class="badge badge-danger">Rejected</label>
                                                        @break
                                                      @endswitch
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
            {{$leaves->links()}}
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
@endsection
@section('addScript')

@endsection