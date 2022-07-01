@extends('admin.includes.master')
@section('title', 'Dashboard')

@section('content')

<div class="main_content_iner">
    <div class="container-fluid">
      	<div class="order-section-chart ">
          	
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