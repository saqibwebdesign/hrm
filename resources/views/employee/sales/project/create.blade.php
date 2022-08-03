@extends('employee.includes.layout')
@section('title', 'Create Projects | Sales')
@section('addStyle')
    <link rel="stylesheet" href="{{URL::to('/public/admin')}}/assets/vendors/html5-editor/bootstrap-wysihtml5.css" />
    <style type="text/css">
      .custom-file-button input[type=file] {
  margin-left: -2px !important;
}

.custom-file-button input[type=file]::-webkit-file-upload-button {
  display:  !important;
}

.custom-file-button input[type=file]::file-selector-button {
  display: none !important;
}

.custom-file-button:hover label {
  background-color: #dde0e3 !important;
  cursor: pointer !important;
}
    </style>
@endsection
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row"> 
      <div class="col-lg-12 col-md-8 col-12 section-3-17"> 
        <div class="row">
          <div class="col-lg-10 col-md-6 col-12">
              <div class="section-3-2">
                <div class="sec-head2">
                  <h3> Projects </h3>
                  <ul>
                     <li> <a href="{{route('employee.dashboard')}}"> Dashboard /  </a>  </li>
                     <li> <a href="{{route('employee.sales.project')}}"> Projects /  </a>  </li>
                     <li> Create </li>
                  </ul>
                </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6 col-12">
              
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-6 col-12 no-pad">
            <div class="section-2-5"> 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="section-2-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="section-2-4 card-heading">
                                      <h2>Client Information</h2>
                                    </div>  
                                    <div class="form-row">
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <label class="label-tag1" for="validationDefault02">Platform</label>
                                          <select class="select2 field-style1 form-control custom-select" name="platform" style="width: 100%; height:36px;">
                                                <option value="" selected disabled></option>
                                          </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <label class="label-tag1" for="validationDefault01">Client Name</label>
                                          <input  type="text" class="form-control field-style1" name="client_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12 col-md-12 mb-3">
                                          <label class="label-tag1" for="validationDefault02">Email</label>
                                          <input  type="email" class="form-control field-style1" name="client_email" value="">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="section-2-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="section-2-4 card-heading">
                                      <h2>Project Information</h2>
                                    </div>  
                                    <div class="form-row">
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <label class="label-tag1" for="validationDefault01">Project Name</label>
                                          <input  type="text" class="form-control field-style1" name="project_name" value="">
                                        </div>
                                        <div class="col-lg-3 col-md-3 mb-3">
                                          <label class="label-tag1" for="validationDefault01">Start Date</label>
                                          <input  type="date" class="form-control field-style1" name="start_date" value="">
                                        </div>
                                        <div class="col-lg-3 col-md-3 mb-3">
                                          <label class="label-tag1" for="validationDefault01">End Date</label>
                                          <input  type="date" class="form-control field-style1" name="end_date" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-4 col-md-4 mb-3">
                                          <label class="label-tag1" for="validationDefault02">Rate <small>($)</small></label>
                                          <input  type="number" step="any" class="form-control field-style1" name="rate" value="">
                                        </div>
                                        <div class="col-lg-2 col-md-2 mb-3">
                                          <label class="label-tag1" for="validationDefault02"></label>
                                          <select class="select2 field-style1 form-control custom-select" name="platform" style="width: 100%; height:36px;">
                                                <option value="">Fixed</option>
                                          </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <label class="label-tag1" for="validationDefault02">Priority</label>
                                          <select class="select2 field-style1 form-control custom-select" name="platform" style="width: 100%; height:36px;">
                                                <option value="" selected disabled></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12 col-md-12 mb-3">
                                          <label class="label-tag1" for="validationDefault02">Description</label>
                                          <textarea class="form-control textarea_editor" name="description" rows="10" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-4 col-md-4 mb-3">
                                          <div class="input-group custom-file-button">
                                            <label class="input-group-text" for="inputGroupFile">Choose Files</label>
                                            <input type="file" class="form-control" id="inputGroupFile" multiple>
                                          </div>
                                        </div>
                                        <div class="col-lg-8">
                                          <button type="submit" class="btn btn-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>   
                <br><br> 
            </div> 
          </div>
      </div>
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