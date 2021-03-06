@extends('employee.includes.layout')
@section('title', 'Dashboard')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid custom-container1">
        <div class="row"> 
           <div class="col-lg-8 col-md-12 col-12 section-1-7"> 
               <div class="section-1-6">
                    <img src="{{URL::To('/public/employee')}}/assets/image/image4.jpg"  width="100%" />
               </div>
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-12"> 
                        <div class="row banner-profile">
                           <div class="col-lg-6 col-md-6 col-12"> 
                             <div class="section-1-8 banner-profile-image">
                               <img  src="{{URL::to('public/storage/users/'.Auth::user()->profile_img)}}" width="80%" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';"  width="80%" />
                             </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12"> 
                              <div class="section-1-9 banner-profile-text">
                                 <h2>{{Auth::user()->firstname.' '.Auth::user()->lastname}}</h2> 
                                 <p>{{Auth::user()->designation}}</p>
                              </div>
                           </div>
                        </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-12"> 
                      <div class="section-1-10 buttons-holder1">
                         <span> 
                            @php $type = 1; @endphp
                            @if(!empty($lastClock))
                                <button class="custom-btn1">{{date('d M Y', strtotime($lastClock->attempt_time))}}</button> 
                                <button class="custom-btn1">{{date('h:i a', strtotime($lastClock->attempt_time))}}</button>
                            @endif 
                            @if(Auth::user()->clock_type == 2)
                                <button class="custom-btn2 section-1-11 clockIn">Clock in</button>
                            @else
                                <button class="custom-btn2 btn btn-default clockOut">Clock out</button>
                            @endif
                        </span>
                      </div>
                   </div>
               </div>

              

               <div class="row m-t-20 m-b-20">

               <div class="col-md-3 col-lg-3 col-sm-6 col-6">
               <div class="icon-box1">
               <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
               <h2>Current Salary</h2>
                    <p>{{Auth::user()->basic_salary == 0 ? 'Un-Paid' : number_format(Auth::user()->basic_salary)}}</p>
               </div> 
               </div> 


               <div class="col-md-3 col-lg-3 col-sm-6 col-6">
               <div class="icon-box1">
               <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                <h2>Holidays</h2>
                    <p>{{count($holidays)}}</p>
               </div> 
               </div> 


               <div class="col-md-3 col-lg-3 col-sm-6 col-6">
               <div class="icon-box1">
                <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                <h2>Annual leaves</h2>
                    <p>{{($annualLeaves-$availed_leave).' | '.$annualLeaves}}</p>
               </div> 
               </div> 



               <div class="col-md-3 col-lg-3 col-sm-6 col-6">
               <div class="icon-box1">
               <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                 <h2>Awards</h2>
                    <p>Gold</p>
               </div> 
               </div> 

               </div>


               @foreach($notification as $val)
                   <div class="row section-1-19">
                        <div class="col-lg-12 col-md-12 col-12">
                             <div class="section-1-16">
                                 <div class="row">
                                     <div class="col-lg-4 col-md-8 col-12">
                                         <div class="section-1-17">
                                             <h2>{{$val->title}}</h2> 
                                         </div>
                                     </div>
                                     <div class="col-lg-8 col-md-8 col-12">
                                        <div class="section-1-18">
                                          <h3>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</h3>
                                        </div>  
                                     </div>
                                     <div style="padding:15px;" class="para-text1 col-lg-12"> {!! $val->description !!} </div>
                                     <span>
                                        @if(!empty($val->department_id))
                                            <button class="custom-btn3">
                                                {{$val->department_id == '0' ? 'All Departments' : @$val->depart->name}}
                                            </button> 
                                        @endif
                                        <!-- <button class="btn custom-btn3">
                                            View &nbsp;<i class="fa fa-eye" aria-hidden="true"></i> 
                                        </button> -->
                                    </span>
                                 </div>
                             </div>
                        </div>
                   </div>
               @endforeach
               @if(count($notification) == 0)
                    <div class="row section-1-19">
                        <div class="col-lg-12 col-md-12 col-12">
                             <h4>Nothing to show here.</h4>
                        </div>
                    </div>
               @endif
           </div>
            <div class="col-lg-4 col-md-12 col-12 section-1-20 right-sidebar2">                        
                <!-- <div class="accordion sidebar-accord">
                    <div class="accordion-item">
                      <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">Recent Projects</span>
                        <span class="icon" aria-hidden="true"></span>
                      </button>
                      <div class="accordion-content">
                          <div class="row section-1-21 projects-head">
                             <div class="col-lg-6 col-md-8 col-8">
                                <div class="section-1-22">
                                  <h2>Projects Title</h2>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-4 col-4">
                                <div class="section-1-23">
                                  <h2>Request Status</h2>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21 projects-card">
                             <div class="col-lg-7 col-md-8 col-8">
                                <div class="section-1-24">
                                  <h2>Html Business Template</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-4 col-4">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21 projects-card">
                             <div class="col-lg-7 col-md-8 col-8">
                                <div class="section-1-24">
                                  <h2>Adobe XD Eduction Template</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-4 col-4">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21 projects-card">
                             <div class="col-lg-7 col-md-8 col-8">
                                <div class="section-1-24">
                                  <h2>Js recent Plugin Updated</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-4 col-4">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div> 
                            <div class="row section-1-21 projects-card">
                             <div class="col-lg-7 col-md-8 col-8">
                                <div class="section-1-24">
                                  <h2>Js recent Plugin Updated</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-4 col-4">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div>
                          <div class="row section-1-21 projects-card">
                             <div class="col-lg-7 col-md-8 col-8">
                                <div class="section-1-24">
                                  <h2>Angular Development</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-4 col-4">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Complete</a>
                                </div>  
                             </div>
                          </div>  
                      </div>
                    </div>
                </div> -->
                @if(Auth::user()->basic_salary != 0)
                    <div class="accordion sidebar-accord">
                        <div class="accordion-item">
                          <button id="accordion-button-1" aria-expanded="true">
                            <span class="accordion-title">
                                <label class="badge badge-primary"><i class="fa fa-dollar"></i></label>&nbsp;&nbsp;Salary Snapshot
                            </span>
                            <a href="{{route('employee.payroll.current')}}" class="btn btn-info btn-sm salary_snapshot_details">View Details</a>
                          </button>
                          <div class="accordion-content no-scroll">
                              <div class="row section-1-21 projects-head">
                                 <div class="col-lg-12 col-md-12 col-8">
                                    <div class="salary_snapshot">
                                        <ul>
                                            <li>
                                                <label>>&nbsp;Gross Salary</label>
                                                <label>{{number_format(Auth::user()->basic_salary)}}</label>  
                                            </li>
                                            <li class="line_break"></li>     
                                            <li class="text-success">
                                                <label>>&nbsp;Addition</label>
                                                <label>{{number_format($ss_addition)}}</label> 
                                            </li>
                                            <li class="line_break"></li>
                                            <li class="text-danger">
                                                <label>>&nbsp;Deduction</label>
                                                <label>{{number_format($ss_deduction)}}</label>        
                                            </li>
                                            <li class="line_break"></li>
                                            <li class="text-bold text-black">
                                                <label>Net Payable</label>
                                                <label>{{number_format((Auth::user()->basic_salary+$ss_addition)-$ss_deduction)}}</label>         
                                            </li>
                                        </ul>
                                    </div>   
                                 </div>
                              </div>  
                          </div>
                        </div>
                    </div>
                @endif
                <div class="accordion">
                    <div class="accordion-item">
                      <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">Up Comming Birthdays</span>
                        <span class="icon" aria-hidden="true"></span>
                      </button>
                      <div class="accordion-content">
                        @foreach($birthdays as $val)
                          <div class="row section-1-21 center-row1 birth-card">  
                             <div class="col-lg-8 col-md-8 col-9">
                                <div class="section-1-26 card-textual">
                                  <img src="{{URL::to('public/storage/users/'.$val->profile_img)}}" width="100%" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" width="100%" />  
                                  <h2>{{$val->firstname.' '.$val->lastname}}</h2>
                                  <p>{{date('d-M-Y', strtotime($val->dob))}} &nbsp; 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-4 col-3">
                                <div class="section-1-27 card-textual-btn">
                                    <a href="javascript:void(0)" class="btn btn-default">
                                        @php
                                            $d = date('d', strtotime($val->dob));
                                            $m = date('m', strtotime($val->dob));
                                            $y = date('Y');
                                            $future = strtotime($y.'-'.$m.'-'.$d); //Future date.
                                            $timefromdb = strtotime(date('Y-m-d'));
                                            $timeleft = $future-$timefromdb;
                                            $daysleft = round((($timeleft/24)/60)/60); 
                                            echo $daysleft.' day left';
                                        @endphp
                                    </a>
                                </div>  
                             </div>
                          </div> 
                        @endforeach 
                      </div>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-item">
                      <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">Up Comming Holidays</span>
                        <span class="icon" aria-hidden="true"></span>
                      </button>
                      <div class="accordion-content">
                        @foreach($holidays as $val)
                          <div class="row section-1-30 center-row1 holiday-card">  
                             <div class="col-lg-3 col-md-3 col-3">
                                <div class="section-1-29 holiday-date">
                                   <h3>{{date('d', strtotime($val->date))}}<br>{{date('M', strtotime($val->date))}}</h3> 
                                </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-6 no-pad">
                                <div class="section-1-28 holiday-title">
                                  <h2>{{$val->title}}</h2>
                                  <p>{{date('l', strtotime($val->date))}}</p>
                                </div>  
                             </div>
                             <div class="col-lg-3 col-md-3 col-3">
                                <div class="section-1-31 holiday-desc">
                                    <a href="javascript:void(0)">
                                        <h2>
                                            @php
                                                $future = strtotime($val->date); //Future date.
                                                $timefromdb = strtotime(date('Y-m-d'));
                                                $timeleft = $future-$timefromdb;
                                                $daysleft = round((($timeleft/24)/60)/60); 
                                                echo $daysleft.' day left';
                                            @endphp
                                        </h2>
                                    </a> 
                                </div>  
                             </div>
                          </div> 
                        @endforeach 
                        @if(count($holidays) == 0)
                            <div class="row section-1-30">  
                             <div class="col-lg-12 col-md-12 col-3">
                                <h4>No Holidays.</h4>
                             </div>
                          </div>
                        @endif                        
                      </div>
                    </div>
                </div>
                <div class="section-1-34">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-4">
                                    <div class="section-1-35">
                                        <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" />  
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8">
                                    <div class="section-1-36 awards-textual">
                                        <h3>Awards</h3>
                                         <h2>Gold </h2>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                <button class="btn btn-1 custom-btn4">Completed</button>
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
const items = document.querySelectorAll('.accordion button');

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach((item) => item.addEventListener('click', toggleAccordion));
</script>
@endsection
