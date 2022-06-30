<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">   
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/public/employee')}}/assets/image/image2.jpg">
    <title>Login | {{env('APP_NAME')}}</title>  
    <link href="{{URL::to('/public/employee')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/public/employee')}}/assets/plugins/morrisjs/morris.css" rel="stylesheet"> 
    <link href="{{URL::to('/public/employee')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/public/employee')}}/css/custom.css" rel="stylesheet">
    <link href="{{URL::to('/public/employee')}}/css/custom2.css" rel="stylesheet">
    <link href="{{URL::to('/public/employee')}}/css/colors/blue.css" id="theme" rel="stylesheet">   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
</head>
<body class="fix-header fix-sidebar card-no-border">
   
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>
      

       <div class="section-4-1"> 
            <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-6 col-md-6 col-12"> 
                        <div class="section-4-2">
                             <img src="{{URL::to('/public/employee')}}/assets/image/image9.png"  />
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-12 section-4-3"> 
                        <div class="section-4-4">
                            <h2>LOGIN</h2>
                         <div class="card">
                            <div class="card-body">  
                                <form method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-lg-12 col-md-6 mb-3">
                                          <label for="validationDefault01">Email</label>
                                          <div class="section-4-5">
                                              <i class="fa fa-user" aria-hidden="true"></i>
                                          </div>
                                          <input  type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="col-lg-12 col-md-6 mb-3">
                                          <div class="section-4-5">
                                            <i class="icon-lock"></i> 
                                          </div>
                                          <label for="validationDefault02">Password</label>
                                          <input type="password" class="form-control" name="password" required>
                                          <button class="btn-1" type="submit">Login</button> 
                                          <a href="#"><p>Forgot password ?</p></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> 

                        </div>
                     </div>
                 </div>
            </div>
       </div> 
        
        



    <script src="{{URL::to('/public/employee')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/js/jquery.slimscroll.js"></script>
    <script src="{{URL::to('/public/employee')}}/js/waves.js"></script>
    <script src="{{URL::to('/public/employee')}}/js/sidebarmenu.js"></script> 
    <script src="{{URL::to('/public/employee')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/js/custom.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{URL::to('/public/employee')}}/assets/plugins/morrisjs/morris.min.js"></script>
    <script src="{{URL::to('/public/employee')}}/js/dashboard1.js"></script>
    <script src="{{URL::to('/public/employee')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session()->has('success'))
        <script type="text/javascript">
            Swal.fire(
                'Success!',
                '{{ session()->get("success") }}',
                'success'
            );
        </script>
    @endif
    @if(session()->has('error'))
        <script type="text/javascript">
            Swal.fire(
                'Alert!',
                '{{ session()->get("error") }}',
                'error'
            );
        </script>
    @endif

</body>
</html>