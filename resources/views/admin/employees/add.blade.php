@extends('admin.includes.master')
@section('title', 'Add Employees')

@section('content')
<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
	            <div class="col-lg-12 col-md-12 col-12 sec-45">
	                <div class="white_box">
	                   <form  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">                                    
                                <div class="col-lg-12 no-margin">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <img src="{{URL::to('/public/admin/assets')}}/images/placeholder.png" class="previewProfilePhoto previewProfilePhotoCat img-thumbnail">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <div id="msg"></div>
                                            <input type="file" name="logo_img" class="profilePic profilePicCat" accept="image/*" required>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button type="button" class="browseProfilePhoto browseProfilePhotoCat btn btn-primary">Change photo</button>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <br><hr><br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">First Name <span>*</span></label>
                                                <input type="text" name="firstname" class="form-control" required>
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Last Name <span>*</span></label>
                                                <input type="text" name="lastname" class="form-control" required>
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Gender <span>*</span></label>
                                                <select name="gender" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Maritial Status <span>*</span></label>
                                                <select name="maritial_status" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Date of Birth <span>*</span></label>
                                                <input type="date" name="dob" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Email <span>*</span></label>
                                                <input type="email" name="email" class="form-control" required>
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Password <span>*</span></label>
                                                <input type="password" name="password" class="form-control" required>
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Phone <span>*</span></label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Em. Phone</label>
                                                <input type="text" name="emergency_phone" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Address</label>
                                                <input type="text" name="address" class="form-control">
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">City <span>*</span></label>
                                                <input type="text" name="city" class="form-control" value="Karachi" required>
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">State/Provice <span>*</span></label>
                                                <input type="text" name="state" class="form-control" value="Sindh" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Country <span>*</span></label>
                                                <input type="text" name="country" class="form-control" value="Pakistan" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Postal Code</label>
                                                <input type="text" name="postal_code" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Department <span>*</span></label>
                                                <select name="department_id" class="form-control" required>
                                                    <option value=""></option>
                                                    @foreach($departs as $val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Designation <span>*</span></label>
                                                <input type="text" name="designation" class="form-control" required>
                                                <span class="text-danger" id="CurrentPasswordErrorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Basic Salary (pkr) <span>*</span></label>
                                                <input type="number" name="basic_salary" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-form res-section-1">
                                                <label for="inputCurrentPassword"  class="no-margin pad-bot-10">Joining Date <span>*</span></label>
                                                <input type="date" name="joining_date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">                                    
                                            <div class="sav-button pad-top-30 pad-right-20">
                                                <input type="Submit" value="Submit" class="bg-yellow">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>                  		
	                </div>
	            </div>
            </div>
        </div>
    </div>
</div>

@endsection