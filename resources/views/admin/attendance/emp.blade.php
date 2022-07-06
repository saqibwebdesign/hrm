@extends('admin.includes.master')
@section('title', 'Monthly Attendance')
@section('addStyle')
    <!-- CALENDER CSS -->
    <link rel="stylesheet" href="{{URL::to('/public/admin')}}/assets/vendors/calender_js/core/main.css">
    <link rel="stylesheet" href="{{URL::to('/public/admin')}}/assets/vendors/calender_js/daygrid/main.css">
    <link rel="stylesheet" href="{{URL::to('/public/admin')}}/assets/vendors/calender_js/timegrid/main.css">
    <link rel="stylesheet" href="{{URL::to('/public/admin')}}/assets/vendors/calender_js/list/main.css">

@endsection
@section('content')
<div class="main_content_iner">
    <div class="container-fluid">
        <div class="order-section-chart ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 sec-45">
                    <div class="white_box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-image">
                                    <div class="user-tray">
                                        <img src="{{URL::to('public/storage/users/'.$emp->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/public/user.jpg')}}';" alt="Profile">
                                        <p>{{$emp->firstname.' '.$emp->lastname}}</p>
                                        <span>{{$emp->designation}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><hr><br>
                        <div class="row">
                            <div class="col-12">
                                <div id='calendar'></div>
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
    <!-- CALENDER JS  -->
    <script src="{{URL::to('/public/admin')}}/assets/vendors/calender_js/core/main.js"></script>
    <script src="{{URL::to('/public/admin')}}/assets/vendors/calender_js/interaction/main.js"></script>
    <script src="{{URL::to('/public/admin')}}/assets/vendors/calender_js/daygrid/main.js"></script>
    <script src="{{URL::to('/public/admin')}}/assets/vendors/calender_js/timegrid/main.js"></script>
    <script src="{{URL::to('/public/admin')}}/assets/vendors/calender_js/list/main.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            height: 'parent',
            header: {
              left: 'prev next',
              center: 'title',
              right: ''
            },
            defaultView: 'dayGridMonth',
            defaultDate: '2020-05-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
              {
                title: 'All Day Event',
                start: '2020-05-01',
                color: '#9267FF' // override!
              },
              {
                title: 'Long Event',
                start: '2020-05-07',
                end: '2020-05-10',
                color: '#4BE69D' // override!
              },
              {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-05-09T16:00:00',
                color: '#9267FF' // override!
              },
              {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-05-16T16:00:00',
                color: '#F13D80' // override!
              },
              {
                title: 'Conference',
                start: '2020-05-11',
                end: '2020-05-13',
                color: '#9267FF' // override!
              },
              {
                title: 'Meeting',
                start: '2020-05-12T10:30:00',
                end: '2020-05-12T12:30:00',
                color: '#9267FF' // override!
              },
              {
                title: 'Lunch',
                start: '2020-05-12T12:00:00',
                color: '#B235DC' // override!
              },
              {
                title: 'Meeting',
                start: '2020-05-12T14:30:00',
                color: '#9267FF' // override!
              },
              {
                title: 'Happy Hour',
                start: '2020-05-12T17:30:00'
              },
              {
                title: 'Dinner',
                start: '2020-05-12T20:00:00',
                color: '#9267FF' // override!
              },
              {
                title: 'Birthday Party',
                start: '2020-05-13T07:00:00',
                color: '#9267FF' // override!
              }
            ]
          });

          calendar.render();
        });
    </script>
@endsection