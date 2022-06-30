@extends('employee.includes.layout')
@section('title', 'Dashboard')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
           <div class="col-lg-8 col-md-6 col-3 section-1-7"> 
               <div class="section-1-6">
                    <img src="{{URL::To('/public/employee')}}/assets/image/image4.jpg"  width="100%" />
               </div>
               <div class="row">
                   <div class="col-lg-7 col-md-6 col-3"> 
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-3"> 
                             <div class="section-1-8">
                               <img  src="{{URL::to('public/storage/users/'.Auth::user()->profile_img)}}" width="100%" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';"  width="90%" />
                             </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-3"> 
                              <div class="section-1-9">
                                 <h2>{{Auth::user()->firstname.' '.Auth::user()->lastname}}</h2> 
                                 <p>{{Auth::user()->designation}}</p>
                              </div>
                           </div>
                        </div>
                   </div>
                   <div class="col-lg-5 col-md-6 col-3"> 
                      <div class="section-1-10">
                         <span> 
                            @php $type = 1; @endphp
                            @if(!empty($lastClock))
                                <button>{{date('d M Y', strtotime($lastClock->attempt_time))}}</button> 
                                <button>{{date('h:i a', strtotime($lastClock->attempt_time))}}</button>
                                @if($lastClock->type == 2)
                                    @php $type = 1; @endphp
                                @else
                                    @if(date('Y-m-d', strtotime($lastClock->attempt_time)) == date('Y-m-d'))
                                        @php $type = 2; @endphp
                                    @else
                                        @php $end = date('Y-m-d H:i:s', strtotime($shift['out'].'+1 hour')); @endphp
                                        @if(date('H:i:s') <= $end)
                                            @php $type = 2; @endphp
                                        @else
                                            @php $type = 1; @endphp
                                        @endif
                                    @endif
                                @endif
                            @endif 
                            @if($type == 1)
                                <button class="section-1-11 clockIn">Clock in</button>
                            @else
                                <button class="btn btn-default clockOut">Clock out</button>
                            @endif
                        </span>
                      </div>
                   </div>
               </div>
               <div class="row section-1-15">
                  <div class="col-lg-3 col-md-8 col-2">
                     <div class="row section-1-12">
                        <div class="col-lg-5 col-md-6 col-3">
                            <div class="section-1-13"> 
                                 <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-3">
                            <div class="section-1-14"> 
                               <h2>Current Salary</h2>
                               <p>{{number_format(Auth::user()->basic_salary)}}</p>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-8 col-2">
                     <div class="row section-1-12">
                        <div class="col-lg-5 col-md-6 col-3">
                            <div class="section-1-13"> 
                                 <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-3">
                            <div class="section-1-14"> 
                               <h2>Holidays</h2>
                               <p>05</p>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-8 col-2">
                     <div class="row section-1-12">
                        <div class="col-lg-5 col-md-6 col-3">
                            <div class="section-1-13"> 
                                 <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-3">
                            <div class="section-1-14"> 
                               <h2>Annual leaves</h2>
                               <p>24 | 05</p>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-8 col-2">
                     <div class="row section-1-12">
                        <div class="col-lg-5 col-md-6 col-3">
                            <div class="section-1-13"> 
                                 <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" /> 
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-3">
                            <div class="section-1-14"> 
                               <h2>Awards</h2>
                               <p>Gold</p>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row section-1-19">
                    <div class="col-lg-12 col-md-8 col-4">
                         <div class="section-1-16">
                             <div class="row">
                                 <div class="col-lg-4 col-md-8 col-4">
                                     <div class="section-1-17">
                                         <h2>NOTICE FOR SALES DEPT</h2> 
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-4">
                                    <div class="section-1-18">
                                      <h3>03-08-2021</h3>
                                    </div>  
                                 </div>
                                 <p>Dear Sales Dept. As per conversation with your team leader you are not allowed to take a break until you didn't complete your bids and gigs in the platform provided to you so if ...</p>
                                 <span><button>Production Department</button> <button class="btn">View &nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </button></span>
                             </div>
                         </div>
                    </div>
               </div>
               <div class="row section-1-19">
                    <div class="col-lg-12 col-md-8 col-4">
                         <div class="section-1-16">
                             <div class="row">
                                 <div class="col-lg-6 col-md-8 col-4">
                                     <div class="section-1-17">
                                         <h2>IMPORTANT NOTICE FOR PRODUCTION TEAM</h2> 
                                     </div>
                                 </div>
                                 <div class="col-lg-6 col-md-8 col-4">
                                    <div class="section-1-18">
                                      <h3>03-08-2021</h3>
                                    </div>  
                                 </div>
                                 <p>All production team must take the notice regarding their jobs , they must complete their task on urgent basis because there is an upcoming big project we have to handle next month so don't show ligancy.</p>
                                 <span><button>Production Department</button> <button class="btn">View &nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </button></span>
                             </div>
                         </div>
                    </div>
               </div>
               <div class="row section-1-19">
                    <div class="col-lg-12 col-md-8 col-4">
                         <div class="section-1-16">
                             <div class="row">
                                 <div class="col-lg-4 col-md-8 col-4">
                                     <div class="section-1-17">
                                         <h2>TAKE UPDATES FROM GROUP</h2> 
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-4">
                                    <div class="section-1-18">
                                      <h3>03-08-2021</h3>
                                    </div>  
                                 </div>
                                 <p>Dear Employee of all Department kindly check the messages in the group for updates which are created on skype or whatsaap because all updates have been posted in the group.</p>
                                 <span><button>Production Department</button> <button class="btn">View &nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </button></span>
                             </div>
                         </div>
                    </div>
               </div>
               <div class="row section-1-19">
                    <div class="col-lg-12 col-md-8 col-4">
                         <div class="section-1-16">
                             <div class="row">
                                 <div class="col-lg-4 col-md-8 col-4">
                                     <div class="section-1-17">
                                         <h2>TAKE UPDATES FROM GROUP</h2> 
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-4">
                                    <div class="section-1-18">
                                      <h3>03-08-2021</h3>
                                    </div>  
                                 </div>
                                 <p>Dear Employee of all Department kindly check the messages in the group for updates which are created on skype or whatsaap because all updates have been posted in the group.</p>
                                 <span><button>Production Department</button> <button class="btn">View &nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </button></span>
                             </div>
                         </div>
                    </div>
               </div>
           </div>
            <div class="col-lg-4 col-md-6 col-3 section-1-20">                        
                <div class="accordion">
                    <div class="accordion-item">
                      <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">Recent Projects</span>
                        <span class="icon" aria-hidden="true"></span>
                      </button>
                      <div class="accordion-content">
                          <div class="row section-1-21">
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-22">
                                  <h2>Projects Title</h2>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-23">
                                  <h2>Request Status</h2>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">
                             <div class="col-lg-7 col-md-8 col-3">
                                <div class="section-1-24">
                                  <h2>Html Business Template</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-8 col-3">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">
                             <div class="col-lg-7 col-md-8 col-3">
                                <div class="section-1-24">
                                  <h2>Adobe XD Eduction Template</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-8 col-3">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">
                             <div class="col-lg-7 col-md-8 col-3">
                                <div class="section-1-24">
                                  <h2>Js recent Plugin Updated</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-8 col-3">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div> 
                            <div class="row section-1-21">
                             <div class="col-lg-7 col-md-8 col-3">
                                <div class="section-1-24">
                                  <h2>Js recent Plugin Updated</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-8 col-3">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Accept</a>
                                </div>  
                             </div>
                          </div>
                          <div class="row section-1-21">
                             <div class="col-lg-7 col-md-8 col-3">
                                <div class="section-1-24">
                                  <h2>Angular Development</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing  tincidunt arcu molestie.</p>
                                </div>  
                             </div>
                             <div class="col-lg-5 col-md-8 col-3">
                                <div class="section-1-25">
                                    <a  class="btn btn-default">Complete</a>
                                </div>  
                             </div>
                          </div>  
                      </div>
                    </div>
                </div>
                 <div class="accordion">
                    <div class="accordion-item">
                      <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">Up Comming Birthdays</span>
                        <span class="icon" aria-hidden="true"></span>
                      </button>
                      <div class="accordion-content">
                          <div class="row section-1-21">  
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::To('/public/employee')}}/assets/image/image5.png"  width="100%" />  
                                  <h2>Mohib Ahmed</h2>
                                  <p>19 Feb 2020 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-27">
                                    <a  class="btn btn-default">Wish Now</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">  
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::To('/public/employee')}}/assets/image/image5.png"  width="100%" />  
                                  <h2>Mohib Ahmed</h2>
                                  <p>19 Feb 2020 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-27">
                                    <a  class="btn btn-default">30 Days to Left</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">  
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::To('/public/employee')}}/assets/image/image5.png"  width="100%" />  
                                  <h2>Mohib Ahmed</h2>
                                  <p>19 Feb 2020 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-27">
                                    <a  class="btn btn-default">Wish Now</a>
                                </div>  
                             </div>
                          </div>  
                          <div class="row section-1-21">  
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::To('/public/employee')}}/assets/image/image5.png"  width="100%" />  
                                  <h2>Mohib Ahmed</h2>
                                  <p>19 Feb 2020 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-27">
                                    <a  class="btn btn-default">10 Days to Left</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">  
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::To('/public/employee')}}/assets/image/image5.png"  width="100%" />  
                                  <h2>Mohib Ahmed</h2>
                                  <p>19 Feb 2020 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-27">
                                    <a  class="btn btn-default">Wish Now</a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-21">  
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::To('/public/employee')}}/assets/image/image5.png"  width="100%" />  
                                  <h2>Mohib Ahmed</h2>
                                  <p>19 Feb 2020 26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-6 col-md-8 col-3">
                                <div class="section-1-27">
                                    <a  class="btn btn-default">22 Days to Left</a>
                                </div>  
                             </div>
                          </div> 
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
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-29">
                                   <h3>03<br>FEb</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>Office Off</h2>
                                  <p>Sunday</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
                                   <a href="#"><h2>3 day left</h2></a> 
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-32">
                                   <h3>03<br>FEb</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>Public Holiday</h2>
                                  <p>Enjoy your day off</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
                                   <a href="#"> <h2>30 day left</h2></a>
                                </div>  
                             </div>
                          </div>
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-33">
                                   <h3>03<br>FEb</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>14th August 2021</h2>
                                  <p>Independence day </p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
                                   <a href="#"> <h2>20 day left</h2></a>
                                </div>  
                             </div>
                          </div>   
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-29">
                                   <h3>03<br>FEb</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>Office Off</h2>
                                  <p>Sunday</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
                                   <a href="#"> <h2>3 day left</h2></a>
                                </div>  
                             </div>
                          </div>
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-32">
                                   <h3>03<br>FEb</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>Public Holiday</h2>
                                  <p>Enjoy your day off</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
                                   <a href="#"> <h2>30 day left</h2></a>
                                </div>  
                             </div>
                          </div> 
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-33">
                                   <h3>03<br>FEb</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>14th August 2021</h2>
                                  <p>Independence day </p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
                                    <a href="#"><h2>20 day left</h2></a>
                                </div>  
                             </div>
                          </div>                          
                      </div>
                    </div>
                </div>
                <div class="section-1-34">
                    <div class="row">
                        <div class="col-lg-10 col-md-6 col-3">
                            <div class="row">
                                <div class="col-lg-3 col-md-8 col-3">
                                    <div class="section-1-35">
                                        <img src="{{URL::To('/public/employee')}}/assets/image/image6.png"  width="100%" />  
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-8 col-3">
                                    <div class="section-1-36">
                                        <h3>Awards</h3>
                                         <h2>Gold </h2>
                                    </div>
                                </div>
                                <button class="btn btn-1">Completed</button>
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
