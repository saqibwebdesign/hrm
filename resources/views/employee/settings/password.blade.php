@extends('employee.includes.layout')
@section('title', 'Change Password')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
           <div class="col-lg-12 col-md-12 col-12 section-5-3"> 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="section-5-1">
                            <h2 class="page-title-text3">Password</h2>
                            <p class="page-para-text1">Please enter your Current password to change your password </p>                        
                            <div class="section-5-2">
                              <div class="card">
                                  <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <br>
                                    @endif
                                    <form method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-lg-12 col-md-6 mb-3">
                                              <label class="label-tag1" for="validationDefault01">Current Password</label>
                                              <input type="password" class="form-control field-style1" name="old_password" required>
                                            </div>
                                            <div class="col-lg-12 col-md-6 mb-3">
                                              <label class="label-tag1" for="example-email">New Password</label>
                                              <input type="password" class="form-control field-style1" name="password" required>
                                            </div>
                                            <div class="col-lg-12 col-md-6 mb-3">
                                              <label class="label-tag1" for="example-email">Confirm Password</label>
                                              <input type="password" class="form-control field-style1" name="password_confirmation" required>
                                            </div>
                                        </div>    
                                        <div class="section-2-9">
                                           <span>
                                             <a href="{{route('employee.dashboard')}}" class="btn-1 custom-btn5">Cancel</a> <button class="btn-2 custom-btn6" type="submit">Update Password</button>
                                           </span>        
                                        </div>                                                                 
                                    </form>
                                  </div>
                               </div>
                            </div> 
                        </div>
                    </div> 
                </div>
           </div>  
        </div>   
    </div>
</div>
@endsection
@section('addScript')
<script type="text/javascript">
</script>
@endsection