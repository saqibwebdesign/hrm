@extends('employee.includes.layout')
@section('title', 'Create Projects | Sales')
@section('addStyle')
    <style type="text/css">
    
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
                

            </div> 
          </div>
        </div>
      </div>  
    </div>   
  </div>
</div>

@endsection
@section('addScript')

@endsection