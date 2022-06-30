<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">   
    <meta name="host" content="{{URL::to('/employee')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/public/employee')}}/assets/image/image2.jpg">
    <title> @yield('title') | Employee | {{env('APP_NAME')}}</title>  
    @include('employee.includes.style')
    @yield('addStyle')
</head>
<body class="fix-header fix-sidebar card-no-border">
   
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>
    
    <div id="main-wrapper">
        
        @include('employee.includes.topbar')
        
        @include('employee.includes.sidebar')
        
        @yield('content')

    @include('employee.includes.script')
    @yield('addScript')

</body>
</html>