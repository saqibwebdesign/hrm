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
                               <p>{{Auth::user()->basic_salary == 0 ? 'Un-Paid' : number_format(Auth::user()->basic_salary)}}</p>
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
                               <p>{{count($holidays)}}</p>
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
               @foreach($notification as $val)
                   <div class="row section-1-19">
                        <div class="col-lg-12 col-md-8 col-4">
                             <div class="section-1-16">
                                 <div class="row">
                                     <div class="col-lg-4 col-md-8 col-4">
                                         <div class="section-1-17">
                                             <h2>{{$val->title}}</h2> 
                                         </div>
                                     </div>
                                     <div class="col-lg-8 col-md-8 col-4">
                                        <div class="section-1-18">
                                          <h3>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</h3>
                                        </div>  
                                     </div>
                                     <p>{{$val->description}}</p>
                                     <span><button>{{@$val->depart->name}}</button> <button class="btn">View &nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </button></span>
                                 </div>
                             </div>
                        </div>
                   </div>
               @endforeach
               @if(count($notification) == 0)
                    <div class="row section-1-19">
                        <div class="col-lg-12 col-md-8 col-4">
                             <h4>Nothing to show here.</h4>
                        </div>
                    </div>
               @endif
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
                        @foreach($birthdays as $val)
                          <div class="row section-1-21">  
                             <div class="col-lg-8 col-md-8 col-3">
                                <div class="section-1-26">
                                  <img src="{{URL::to('public/storage/users/'.$val->profile_img)}}" width="100%" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" width="100%" />  
                                  <h2>{{$val->firstname.' '.$val->lastname}}</h2>
                                  <p>{{date('d-M-Y', strtotime($val->dob))}}<br>26 Years old</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-4 col-3">
                                <div class="section-1-27">
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
                          <div class="row section-1-30">  
                             <div class="col-lg-3 col-md-8 col-3">
                                <div class="section-1-29">
                                   <h3>{{date('d', strtotime($val->date))}}<br>{{date('M', strtotime($val->date))}}</h3> 
                                </div>
                             </div>
                             <div class="col-lg-5 col-md-8 col-3 no-pad">
                                <div class="section-1-28">
                                  <h2>{{$val->title}}</h2>
                                  <p>{{date('l', strtotime($val->date))}}</p>
                                </div>  
                             </div>
                             <div class="col-lg-4 col-md-8 col-3">
                                <div class="section-1-31">
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
