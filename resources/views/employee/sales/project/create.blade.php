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
        <form method="post" enctype="multipart/form-data">
            @csrf
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
                                              <label class="label-tag1" for="validationDefault02">Platform <span>*</span></label>
                                              <select class="select2 field-style1 form-control custom-select" name="platform_id" style="width: 100%; height:36px;" required>
                                                    <option value="" selected disabled></option>
                                                    @foreach($platform as $val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                              </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                              <label class="label-tag1" for="validationDefault01">Client Name <span>*</span></label>
                                              <input  type="text" class="form-control field-style1" name="client_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-12 col-md-12 mb-3">
                                              <label class="label-tag1" for="validationDefault02">Email <span>*</span></label>
                                              <input  type="email" class="form-control field-style1" name="client_email" value="" required>
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
                                              <label class="label-tag1" for="validationDefault01">Project Name <span>*</span></label>
                                              <input  type="text" class="form-control field-style1" name="project_name" value="" required>
                                            </div>
                                            <div class="col-lg-3 col-md-3 mb-3">
                                              <label class="label-tag1" for="validationDefault01">Start Date <span>*</span></label>
                                              <input  type="date" class="form-control field-style1" name="start_date" value="" required>
                                            </div>
                                            <div class="col-lg-3 col-md-3 mb-3">
                                              <label class="label-tag1" for="validationDefault01">End Date <span>*</span></label>
                                              <input  type="date" class="form-control field-style1" name="end_date" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-4 col-md-4 mb-3">
                                              <label class="label-tag1" for="validationDefault02">Rate <small>($)</small> <span>*</span></label>
                                              <input  type="number" step="any" class="form-control field-style1" name="rate" value="" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2 mb-3">
                                              <label class="label-tag1" for="validationDefault02"></label>
                                              <select class="select2 field-style1 form-control custom-select" name="rate_type" style="width: 100%; height:36px;">
                                                    <option value="Fixed">Fixed</option>
                                                    <option value="Hourly">Hourly</option>
                                              </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                              <label class="label-tag1" for="validationDefault02">Priority <span>*</span></label>
                                              <select class="select2 field-style1 form-control custom-select" name="priority" style="width: 100%; height:36px;">
                                                    <option value="High">High</option>
                                                    <option value="Medium" selected>Medium</option>
                                                    <option value="Low">Low</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-12 col-md-12 mb-3">
                                              <label class="label-tag1" for="validationDefault02">Description <span>*</span></label>
                                              <textarea class="form-control textarea_editor" name="description" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-4 col-md-4 mb-3">
                                              <div class="input-group custom-file-button">
                                                <label class="input-group-text" for="inputGroupFile">Choose Files</label>
                                                <input type="file" class="form-control" name="attachment[]" id="inputGroupFile" multiple>
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
        </form>
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