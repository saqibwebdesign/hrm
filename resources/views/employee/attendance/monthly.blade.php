@extends('employee.includes.layout')
@section('title', 'Attendance')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-12 section-2-1 normal-pad1">
            <div class="section-2-4">
               <div class="sec-head2">
                  <h3> Attendence </h3>
                  <ul>
                     <li> <a href="javascript:void(0)"> Dashboard /  </a>  </li>
                     <li> Attendence </li>
                  </ul>
               </div>
            </div>
            <div class="section-2-5">
               <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                     <div class="event-title">
                        <div class="title-content">
                           <button id="last"></button>
                           <span>
                              <h1 id="month"></h1>
                              <h2 id="year"></h2>
                           </span>
                           <button id="next"></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                     <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-6 col-12">
                           <div class="block-element custom-border1 m-b-20">
                              <div class="timeline-sheet-head">
                                 <h5> <b> TimeSheet: </b>  {{date('d M Y')}} </h5>
                              </div>
                              <div class="art-tag">
                                 <h5> 
                                    Shift Start: <strong>{{date('h:i A', strtotime(Auth::user()->shift->check_in))}}</strong>
                                    &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  
                                    Shift End: <strong>{{date('h:i A', strtotime(Auth::user()->shift->check_out))}}</strong>
                                 </h5>
                                 <p> 
                                    Today Clock-in: 
                                    <strong>
                                       {{!empty($lastClock->type) && $lastClock->type == '1' ? date('h:i A', strtotime($lastClock->attempt_time)) : '-'}}
                                    </strong> 
                                 </p>
                              </div>
                              <div class="timeline-hours">
                                 <span> 
                                    @if(Auth::user()->clock_type == 2)
                                       -
                                    @else
                                       @php
                                          $time1 = strtotime(date('H:i:s', strtotime($lastClock->attempt_time)));
                                          $time2 = strtotime(date('H:i:s'));
                                          $difference = round(abs($time2 - $time1) / 3600,2);
                                          echo $difference.' hours';
                                       @endphp
                                    @endif
                                 </span>
                              </div>
                              <div class="block-element text-center">
                                 @if(Auth::user()->clock_type == 2)
                                    <button class="custom-btn7 clockIn">Clock in</button>
                                 @else
                                    <button class="custom-btn7 danger clockOut">Clock out</button>
                                 @endif    
                              </div>
                              <div class="timeline-tags">
                                 <!-- <div class="break-tag">
                                    Break <br/> 1.12 Hours
                                 </div>
                                 <div class="break-tag">
                                    Overtime  <br/> 3 Hours
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-6 col-12">
                           <div class="block-element custom-border1">
                              <div class="timeline-sheet-head">
                                 <h5> <b> Statistics </b>   </h5>
                              </div>
                              <div class="block-element">
                                 <div class="progress progress-1">
                                    <div class="progress-label">
                                       <b> Today </b> <span> 3.45/8 hrs </span>
                                    </div>
                                    <div class="progress-bar-bg">
                                       <div class="progress-bar progress-bg1" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="progress progress-1">
                                    <div class="progress-label">
                                       <b> This Week </b> <span> 28/40 hrs </span>
                                    </div>
                                    <div class="progress-bar-bg">
                                       <div class="progress-bar progress-bg2" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="progress progress-1">
                                    <div class="progress-label">
                                       <b> This Month </b> <span> 90/140 hrs </span>
                                    </div>
                                    <div class="progress-bar-bg">
                                       <div class="progress-bar progress-bg3" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <!-- <div class="progress progress-1">
                                    <div class="progress-label">
                                       <b> Remaining </b> <span> 90/140 hrs </span>
                                    </div>
                                    <div class="progress-bar-bg">
                                       <div class="progress-bar progress-bg4" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="progress progress-1" style="margin: 0px;">
                                    <div class="progress-label">
                                       <b> Overtime </b> <span> 5 </span>
                                    </div>
                                    <div class="progress-bar-bg">
                                       <div class="progress-bar progress-bg5" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-8 col-sm-12 col-12">
                     <div class="event-title event-title-mobile">
                        <div class="title-content">
                           <button id="last">June</button>
                           <span>
                              <h1 id="month">July</h1>
                              <h2 id="year">2022</h2>
                           </span>
                           <button id="next">August</button>
                        </div>
                     </div>
                     <div class="event-calendar1">
                        <div class="ci-cal-container" id="calendar">  
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row m-t-20">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                     <div class="custom-border1 block-element">
                        <div class="block-element">
                           <div class="search-form1">
                              <div>
                                 <select class="field-style3">
                                    <option> Select Month </option>
                                    <option> Select Month </option>
                                    <option> Select Month </option>
                                 </select>
                              </div>
                              <div>
                                 <select class="field-style3">
                                    <option> Select Month </option>
                                    <option> Select Month </option>
                                    <option> Select Month </option>
                                 </select>
                              </div>
                              <div>
                                 <select class="field-style3">
                                    <option> Select Year </option>
                                    <option> Select Year </option>
                                    <option> Select Year </option>
                                 </select>
                              </div>
                              <div>
                                 <input type="submit" class="submit-btn1" value="Search" name="">
                              </div>
                           </div>
                        </div>
                        <div class="block-element">
                           <div class="table-wrapper">
                              <table class="table-1">
                                 <thead>
                                    <tr>
                                       <th> # </th>
                                       <th> Date </th>
                                       <th> Punch Time </th>
                                       <th> Punch Type </th>
                                       <th> Status </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($attendance as $key => $val)
                                       @php
                                          $status = 1;
                                          $cs = date('H:i:s', strtotime($val->attempt_time));
                                          if($val->type == 1){
                                             if($cs > $clockInUpt){
                                                $status = 0;
                                             }
                                          }else{
                                             if($cs < $clockOut){
                                                $status = 0;
                                             }
                                          }
                                       @endphp
                                       <tr class="{{$status == 0 ? 'danger' : ''}}">
                                          <td> {{++$key}} </td>
                                          <td> {{date('d-M-Y', strtotime($val->attempt_time))}} </td>
                                          <td> {{date('h:i A', strtotime($val->attempt_time))}} </td>
                                          <td> 
                                             @if($val->type == '1')
                                                <label class="badge badge-primary">Clock In</label>
                                             @else
                                                <label class="badge badge-info">Clock Out</label>
                                             @endif
                                          </td>
                                          <td>
                                             @if($status == 1)
                                                <label class="badge badge-success">On Time</label>
                                             @else
                                                <label class="badge badge-danger">{{$val->type == 1 ? 'Late coming' : 'Early Leave'}}</label>
                                             @endif
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           {{$attendance->links('vendor.pagination.default')}}
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
<script src="{{URL::to('/public/employee')}}/js/calender.js"></script>
<script type="text/javascript">
   
   
   var calendar = $('#calendar').ciCalendar({
      dateClick: function($el, $contentEl, dateProperties) {
         console.clear();
         for(var key in dateProperties) {
            console.log(key + ' = ' + dateProperties[key]);
         }
      }
   }),
   
   $month = $('#month').html(calendar._getMonthName()),
   $year = $('#year').html(calendar._getYear()),
   $last = $('#last').html(calendar._getLastMonth()),
   $next = $('#next').html(calendar._getNextMonth());
   
   var events = [
      <?php
         for($i=1; $i<=31; $i++){
             if(date('l', strtotime(date('Y-m-'.$i))) == 'Sunday'){
                 
            }elseif(date('Y-m-'.sprintf("%02d", $i)) == date('Y-m-d') && $clockInUpt > date('H:i:s')){

            }else{
               $holi = 0;
               foreach($holiday as $hol){
                  if($hol->date == date('Y-m-'.sprintf("%02d", $i))){
                     $holi = $hol->title;
                  }
               }
               if($holi != 0){
                  echo 'event = {
                     details: {
                        title: "'.$holi.'",
                        type: "holiday",
                        public: true
                     },
                     start: {
                        time: "12:00am",
                        month: '.date('m').',
                        day: '.$i.',
                        year: '.date('Y').',
                     },
                     end: {
                        time: "11:59pm",
                        month: '.date('m').',
                        day: '.$i.',
                        year: '.date('Y').',
                     }
                  },';
               }else{
                  if(strtotime(date('Y-m-'.$i)) <= strtotime(date('Y-m-d'))){
                     $present = 0; $checkIn = '';
                     foreach($employees['clock_in'] as $clIn){
                        if(date('Y-m-d', strtotime($clIn->attempt_time)) == date('Y-m-'.sprintf("%02d", $i))){
                           $present = 1; $clockIn = date('h:ia', strtotime($clIn->attempt_time));
                        }
                     } 
                     if($present == 1){

                        echo 'event = {
                           details: {
                              title: "Clock-In: <strong>'.$clockIn.'</strong>",
                              type: "clock_in",
                              public: true
                           },
                           start: {
                              time: "12:00am",
                              month: '.date('m').',
                              day: '.$i.',
                              year: '.date('Y').',
                           },
                           end: {
                              time: "11:59pm",
                              month: '.date('m').',
                              day: '.$i.',
                              year: '.date('Y').',
                           }
                        },';
                        echo 'event = {
                           details: {
                              title: "Present",
                              type: "present",
                              public: true
                           },
                           start: {
                              time: "12:00am",
                              month: '.date('m').',
                              day: '.$i.',
                              year: '.date('Y').',
                           },
                           end: {
                              time: "11:59pm",
                              month: '.date('m').',
                              day: '.$i.',
                              year: '.date('Y').',
                           }
                        },';

                     }else{
                        $l = 0; $l_title = 'Leave';
                        foreach($leave as $le){
                           if($le->from_date <= date('Y-m-'.sprintf("%02d", $i)) && $le->to_date >= date('Y-m-'.sprintf("%02d", $i))){
                              $l = 1; $l_title = empty($le->type) ? 'Leave' : $le->type->type;
                           }
                        }      
                        if($l == 0){
                           echo 'event = {
                              details: {
                                 title: "Absent",
                                 type: "absent",
                                 public: true
                              },
                              start: {
                                 time: "12:00am",
                                 month: '.date('m').',
                                 day: '.$i.',
                                 year: '.date('Y').',
                              },
                              end: {
                                 time: "11:59pm",
                                 month: '.date('m').',
                                 day: '.$i.',
                                 year: '.date('Y').',
                              }
                           },';
                        }else{
                           echo 'event = {
                              details: {
                                 title: "'.$l_title.'",
                                 type: "leave",
                                 public: true
                              },
                              start: {
                                 time: "12:00am",
                                 month: '.date('m').',
                                 day: '.$i.',
                                 year: '.date('Y').',
                              },
                              end: {
                                 time: "11:59pm",
                                 month: '.date('m').',
                                 day: '.$i.',
                                 year: '.date('Y').',
                              }
                           },';
                        }
                     }
                  }
               }  
            }
         }
     ?>
   ];
   
   calendar._updateEvents(events);
   
   $last.on('click', function() {
      calendar._gotoPreviousMonth(updateMonthYear);
   });
   
   $next.on('click', function() {
      calendar._gotoNextMonth(updateMonthYear);
   });
   
   $(window).on('resize', function() {
      calendar._updateEvents(events);
   });
   
   function updateMonthYear() {
      $month.html(calendar._getMonthName());
      $year.html(calendar._getYear());
      
      $next.html(calendar._getNextMonth());
      $last.html(calendar._getLastMonth());
      
      calendar._updateEvents(events);
   }
</script>
@endsection