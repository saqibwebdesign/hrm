<!DOCTYPE html>
<html>
   <head>
   <title> @yield('title') | Admin | {{env('APP_NAME')}} </title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="host" content="{{URL::to('/admin')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400&display=swap" rel="stylesheet">
       <link rel="icon" type="image/png" href="{{URL::to('public/website')}}/images/favicon.png">
      
      @yield('meta')
      
      @include('admin.includes.style')
      @yield('addStyle')

   </head>

  <!--  <div id="websiteOverlay">
      <div class="loader"></div>
   </div> -->
   
   <body class="crm_body_bg">

      <!-- Header Section Starts Here -->
      @include('admin.includes.sidebar')
   
      <section class="main_content dashboard_part default_content" >
      @include('admin.includes.header')
      <!-- Header Section Ends Here -->

      @yield('content')

      </section>

      @include('admin.includes.modals')
      @include('admin.includes.script')
      @if(session()->has('success'))
         <script>
            $(document).ready(function(){
               Swal.fire(
                  "Success!",
                  "{{ session()->get('success') }}",
                  "success"
               );
            });
         </script>
      @endif
      @if(session()->has('error'))
         <script>
            $(document).ready(function(){
               Swal.fire(
                  "Alert!",
                  "{{ session()->get('error') }}",
                  "warning"
               );
            });
         </script>
      @endif
      @yield('addScript')
   </body>
</html>