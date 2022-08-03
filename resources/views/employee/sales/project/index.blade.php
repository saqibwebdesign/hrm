@extends('employee.includes.layout')
@section('title', 'Projects | Sales')
@section('addStyle')
  <style type="text/css">
    .icon-box1 {
        padding: 15px 10px 22px 70px !important;
    }
    .icon-box1 img {
        width: 47px !important;
        left: 12px !important;
        top: 19px !important;
    }
    .icon-box1 p {
        font-size: 30px !important;
        line-height: 35px !important;
    }
    .dropdown-toggle::after {
      display: none !important;
    }
  </style>
@endsection
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row"> 
      <div class="col-lg-12 col-md-8 col-12 section-3-17"> 
        <div class="row">
          <div class="col-lg-9 col-md-6 col-12">
              <div class="section-3-2">
                <div class="sec-head2">
                  <h3> Projects </h3>
                  <ul>
                     <li> <a href="{{route('employee.dashboard')}}"> Dashboard /  </a>  </li>
                     <li> Projects </li>
                  </ul>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
              <a href="{{route('employee.sales.project.create')}}" class="btn btn-submit">
                <i class="fa fa-plus"></i>&nbsp;Create a Project
              </a>
          </div>
        </div>
        <div  class="row m-t-20 m-b-20">
          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="icon-box1">
              <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
              <h2>Total Projects</h2>
              <p>5</p>
            </div> 
          </div> 
          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="icon-box1">
              <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
              <h2>In-Progress</h2>
              <p>5</p>
            </div> 
          </div> 
          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="icon-box1">
              <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
              <h2>Pending Projects</h2>
              <p>5</p>
            </div> 
          </div> 
          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="icon-box1">
              <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
              <h2>Completed Projects</h2>
              <p>5</p>
            </div> 
          </div> 
        </div>
        <div class="section-divider"><hr></div>
        <div  class="row m-t-20 m-b-20">
          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="project_block">
              <div class="project-head">
                <div>
                  <h4>Website Design</h4>
                  <label class="badge badge-success">Completed</label>
                </div>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <span class="fa fa-ellipsis-v"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
              </div>
              <div class="project-body">
                <p class="cut-text-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo odio tortor nunc. Id vulputate cursus vitae, blandit diam. Bibendum hac bibendum dolor, ornare sed ac tortor, proin vitae. Lobortis ut diam iaculis lectus sit dolor sit amet.</p>
                <div class="item">
                  <label>Category</label>
                  <p>Website Designing</p>
                </div>
                <div class="item">
                  <label>Deadline</label>
                  <p>08-Aug-2022</p>
                </div>
                <div class="item">
                  <label>Price</label>
                  <p>$500</p>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="project_block">
              <div class="project-head">
                <div>
                  <h4>Website Design</h4>
                  <label class="badge badge-success">Completed</label>
                </div>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <span class="fa fa-ellipsis-v"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
              </div>
              <div class="project-body">
                <p class="cut-text-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo odio tortor nunc. Id vulputate cursus vitae, blandit diam. Bibendum hac bibendum dolor, ornare sed ac tortor, proin vitae. Lobortis ut diam iaculis lectus sit dolor sit amet.</p>
                <div class="item">
                  <label>Category</label>
                  <p>Website Designing</p>
                </div>
                <div class="item">
                  <label>Deadline</label>
                  <p>08-Aug-2022</p>
                </div>
                <div class="item">
                  <label>Price</label>
                  <p>$500</p>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="project_block">
              <div class="project-head">
                <div>
                  <h4>Website Design</h4>
                  <label class="badge badge-success">Completed</label>
                </div>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <span class="fa fa-ellipsis-v"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
              </div>
              <div class="project-body">
                <p class="cut-text-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo odio tortor nunc. Id vulputate cursus vitae, blandit diam. Bibendum hac bibendum dolor, ornare sed ac tortor, proin vitae. Lobortis ut diam iaculis lectus sit dolor sit amet.</p>
                <div class="item">
                  <label>Category</label>
                  <p>Website Designing</p>
                </div>
                <div class="item">
                  <label>Deadline</label>
                  <p>08-Aug-2022</p>
                </div>
                <div class="item">
                  <label>Price</label>
                  <p>$500</p>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-3 col-lg-3 col-sm-6 col-6">
            <div class="project_block">
              <div class="project-head">
                <div>
                  <h4>Website Design</h4>
                  <label class="badge badge-success">Completed</label>
                </div>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <span class="fa fa-ellipsis-v"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
              </div>
              <div class="project-body">
                <p class="cut-text-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo odio tortor nunc. Id vulputate cursus vitae, blandit diam. Bibendum hac bibendum dolor, ornare sed ac tortor, proin vitae. Lobortis ut diam iaculis lectus sit dolor sit amet.</p>
                <div class="item">
                  <label>Category</label>
                  <p>Website Designing</p>
                </div>
                <div class="item">
                  <label>Deadline</label>
                  <p>08-Aug-2022</p>
                </div>
                <div class="item">
                  <label>Price</label>
                  <p>$500</p>
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