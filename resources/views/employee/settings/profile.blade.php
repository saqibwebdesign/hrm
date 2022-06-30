@extends('employee.includes.layout')
@section('title', 'Basic Information')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
            <div class="row"> 
            <div class="col-lg-12 col-md-6 col-12 section-2-1"> 
                <div class="section-2-2">
                    <img src="{{URL::to('/public/employee')}}/assets/image/image7.png"  width="100%" />
                </div>
                <div class="row">       
                    <div class="col-lg-3 col-md-6 col-5">
                       <div class="small-12 medium-2 large-2 columns">
                            <form method="post" action="{{route('employee.settings.profile.updateImage')}}" id="profile-picture-form" enctype="multipart/form-data">
                                @csrf
                                <div class="circle">
                                  <img class="profile-pic" src="{{URL::to('public/storage/users/'.$user->profile_img)}}" width="100%" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';"/>
                                </div>
                                <div class="p-image">
                                <i class="fa fa-camera upload-button"></i>
                                  <input class="file-upload" type="file" name="profile_pic" accept="image/*"/>
                                </div>
                            </form>
                        </div> 
                    </div>
                    <div class="col-lg-9 col-md-6 col-7">    
                        <div class="section-2-10">
                           <h2>{{Auth::user()->firstname.' '.Auth::user()->lastname}}</h2>
                           <h3>{{Auth::user()->designation}}</h3>
                        </div>
                    </div>
                </div>
       
       

                <form method="post">
                    @csrf
                    <div class="section-2-4">
                        <h2>Personal Information</h2>
                    </div>  
                    <div class="section-2-5"> 
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="section-2-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault01">First name</label>
                                                  <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" disabled>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault02">Last name</label>
                                                  <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault01">Designation</label>
                                                  <input type="text" class="form-control" value="{{$user->designation}}" disabled>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                    <label for="validationDefault02">Gender</label>
                                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" disabled>
                                                        <option value="">Select</option>
                                                            <option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault02">Maritial Status</label>
                                                  <select class="select2 form-control custom-select" name="maritial_status" style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        <option value="Single" {{$user->maritial_status == 'Single' ? 'selected' : ''}}>Single</option>
                                                        <option value="Married" {{$user->maritial_status == 'Married' ? 'selected' : ''}}>Married</option>
                                                        <option value="Widowed" {{$user->maritial_status == 'Widowed' ? 'selected' : ''}}>Widowed</option>
                                                        <option value="Separated" {{$user->maritial_status == 'Separated' ? 'selected' : ''}}>Separated</option>
                                                        <option value="Divorced" {{$user->maritial_status == 'Divorced' ? 'selected' : ''}}>Divorced</option>
                                                  </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault02">Date of Birth</label>
                                                  <input class="form-control" type="date" name="dob" value="{{$user->dob}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                    </div>    
                    <div class="section-2-7">
                        <h2>Contact Information</h2>
                    </div>  

                    <div class="section-2-8"> 
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="section-2-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault01">Phone</label>
                                                  <input type="number" class="form-control" name="phone" value="{{$user->phone}}" required>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault01">Emergency Phone</label>
                                                  <input type="number" class="form-control" name="emergency_phone" value="{{$user->emergency_phone}}" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-lg-5 col-md-6 mb-3">
                                                  <label for="example-email">Email</label>
                                                  <input type="email" class="form-control" value="{{$user->email}}" disabled>
                                                </div>
                                                <div class="col-lg-7 col-md-6 mb-3">
                                                  <label for="validationDefault01">Address</label>
                                                  <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-lg-4 col-md-6 mb-3">
                                                   <label for="validationDefault01">City</label>
                                                  <input type="text" class="form-control"  name="city" value="{{$user->city}}">
                                                </div>
                                                <div class="col-lg-4 col-md-6 mb-3">
                                                  <label for="validationDefault01">State/Provice</label>
                                                  <input type="text" class="form-control"  name="state" value="{{$user->state}}">
                                                </div>
                                                <div class="col-lg-4 col-md-6 mb-3">
                                                  <label for="validationDefault01">Country</label>
                                                  <input type="text" class="form-control"  name="country" value="{{$user->country}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                  <label for="validationDefault01">Postal Code</label>
                                                  <input type="number" class="form-control"  name="postal_code" value="{{$user->postal_code}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                    </div>          
                    <div class="section-2-9">
                       <span>
                         <a href="{{route('employee.dashboard')}}" class="btn-1">Cancel</a> <button class="btn-2" type="submit">Save</button>
                       </span>        
                    </div>
                </form>
            </div>  
        </div>  
    </div>
</div>

@endsection
@section('addScript')
<script type="text/javascript">
  $(document).ready(function() {

    $(".file-upload").on('change', function(){
        $('#profile-picture-form').submit() 
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
@endsection