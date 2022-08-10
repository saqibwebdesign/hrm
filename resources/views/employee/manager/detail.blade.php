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
      <div class="col-lg-12 col-md-8 col-12 pro-9"> 
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
              <a class="btn btn-submit-1"> <i class="fa fa-plus"></i> &nbsp;Add Project</a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-6 col-12 col-white">
            <div class="section-2-5 pro-1"> 
                <h2>Hospital Booking App</h2>
                <h3>2 Open tasks, 6 task Completed</h3>
              <div class="pro-2"> 
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
              </div>
            </div> 
          </div>
          <div class="col-lg-4 col-md-6 col-12">
              <div class="pro-3 col-white">              
                <h2>Projects Details</h2>
                <table class="pro-4">
                  <tr>
                    <td style="font-weight: 600;">Cost:</td>
                    <td>$2500</td>
                  </tr>
                   <tr>
                    <th style="font-weight: 600;">Total hours:</th>
                    <th>100 Hours</th>
                  </tr>
                  <tr>
                    <td style="font-weight: 600;">Created:</td>
                    <td>25 Aug, 2022</td>
                  </tr>
                  <tr>
                    <td style="font-weight: 600;">Deadline: </td>
                    <td>12 Oct, 2022</td>
                  </tr>
                  <tr>
                    <td style="font-weight: 600;">Priority:</td>
                    <td style="color: #FF0008">Highest </td>
                  </tr>
                  <tr>
                    <td style="font-weight: 600;">Created by:</td>
                    <td>Barry Cuda</td>
                  </tr>
                  <tr>
                    <td style="font-weight: 600;">Status:</td>
                    <td style="color:#4CAF50">Working</td>
                  </tr>
                </table>
             </div>


             <div class="pro-5 col-white">              
                <h2>Attachments</h2> 
              <div class="pro-6">
                <a href="#"><ul> <li>Images.png</li> </ul> </a>  
                <a href="#"><ul> <li>Downloads.doc</li> </ul> </a>  
                <a href="#"><ul> <li>Requirements.xlcc</li> </ul> </a>  
                <a href="#"><ul> <li>Downloads.doc</li> </ul> </a>  
                <a href="#"><ul> <li>Images.png</li> </ul> </a>  
                <a href="#"><ul> <li>Downloads.doc</li> </ul> </a>  
              </div>
             </div>
          </div>
        </div>



      <div class="row">
         <div class="col-lg-12 col-md-6 col-4">
            <div class="pro-7 col-white">
               <div class="tab">
                   <button class="tablinks" onclick="openCity(event, 'London')">All Tasks</button>
                   <button class="tablinks" onclick="openCity(event, 'Paris')">Pending Tasks</button>
                   <button class="tablinks" onclick="openCity(event, 'Tokyo')">Completed Tasks</button>
               </div>

              <div id="London" class="tabcontent" style="display: block;">
                 <button class="accordion pro-8"><div class="pro-10"><i  class="fa fa-plus"></i> &nbsp;Appointment Booking app</div><div class="pro-11"><span><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" > <i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i> </span></div></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum.</p>
                  <span><i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" >  </span>
                </div>

                <button class="accordion pro-8"><div class="pro-10"><i  class="fa fa-plus"></i> &nbsp;Private Chat Module</div><div class="pro-11"><span><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" > <i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i> </span></div></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                   <span><i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" >  </span>
                </div>
              </div>

              <div id="Paris" class="tabcontent">

                <button class="accordion pro-8"><div class="pro-10"><i  class="fa fa-plus"></i> &nbsp;Private Chat Module</div><div class="pro-11"><span><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" > <i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i> </span></div></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                   <span><i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" >  </span>
                </div>
              </div>

              <div id="Tokyo" class="tabcontent">
                <button class="accordion pro-8"><div class="pro-10"><i  class="fa fa-plus"></i> &nbsp;Appointment Booking app</div><div class="pro-11"><span><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" > <i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i> </span></div></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan at fringilla imperdiet vehicula tincidunt mauris, malesuada. Lorem ipsum dolor sit amet. Lorem ipsum.</p>
                  <span><i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" >  </span>
                </div>

                <button class="accordion pro-8"><div class="pro-10"><i  class="fa fa-plus"></i> &nbsp;Private Chat Module</div><div class="pro-11"><span><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" > <i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i> </span></div></button>
                <div class="panel">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                   <span><i style="color: #17263A;" class="fa fa-user" aria-hidden="true"></i> <i style="color: #FF0008;" class="fa fa-trash" aria-hidden="true"></i><img src="{{URL::to('/public')}}/employee/assets/images/1.png" > <img src="{{URL::to('/public')}}/employee/assets/images/2.png" >  </span>
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
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>


@endsection