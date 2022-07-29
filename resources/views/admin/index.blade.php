@extends('admin.includes.master')
@section('title', 'Dashboard')

@section('content')

<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	<div class="row">
               <div class="col-lg-6 col-md-6 col-12 hrm-5">
                    <div class="hrm-1">
                      <h2 class="pad-bot-20">Employees Availability </h2>  
                       <div class="row">
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-2">
                                <h2>{{$total_employees}}</h2>
                                <h4>Total Employees</h4>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-2">
                                <h2>{{$total_present}}</h2>
                                <h4>Total Present</h4>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-2">
                                <h2>{{$total_absent}}</h2>
                                <h4>Total Absent</h4>
                             </div>
                          </div>
                       </div>
                       <div class="row m-t-30 hrm-4">
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-2">
                                <h2>{{$total_late}}</h2>
                                <h4>Late Coming</h4>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-2">
                                <h2>{{$total_halfday}}</h2>
                                <h4>Today Half Day</h4>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-2">
                                <h2>{{$total_leave}}</h2>
                                <h4>Today Leave</h4>
                             </div>
                          </div>
                       </div>
                    </div>
               </div>
               <div class="col-lg-6 col-md-6 col-12">
                    <div class="hrm-1">
                      <h2 class="pad-bot-20">Employees Salary</h2>  
                       <div class="row">
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-3">
                                <h4>Web Developer</h4>
                                <h2>18960 PKR</h2>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-3">
                                <h4>Web Developer</h4>
                                <h2>18960 PKR</h2>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-3">
                                <h4>Web Developer</h4>
                                <h2>18960 PKR</h2>
                             </div>
                          </div>
                       </div>
                       <div class="row m-t-30 hrm-4">
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-3">
                                <h4>Web Developer</h4>
                                <h2>18960 PKR</h2>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                             <div class="hrm-3">
                                <h4>Web Developer</h4>
                                <h2>18960 PKR</h2>
                             </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-12">
                            
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
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work', 8],
          ['Eat', 2],
          ['TV', 4],
          ['Gym', 2],
          ['Sleep', 8]
        ]);

          // Optional; add a title and set the width and height of the chart
          var options = {'title':'My Average Day', 'width':370, 'height':300};

          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }

        
        // for order rate

        var xValues = [100,200,300,400,500,600,700,800,900,1000];

        new Chart("myChart", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{ 
              data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
              borderColor: "red",
              fill: false
            }, { 
              data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
              borderColor: "green",
              fill: false
            }, { 
              data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
              borderColor: "blue",
              fill: false
            }]
          },
          options: {
            legend: {display: false}
          }
        });


        // close

    </script>
@endsection