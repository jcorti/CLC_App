
<?php

error_reporting(0);
$school = $_SESSION["school"];
if($school == "all"){
  $school = 'hs';
} 

?>
<div class="box box-default">
    <div class="box-header with-border">
	  <h3 class="box-title">Calls by school</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <div class="row">
	    <div class="col-md-8">
	      <div class="chart-responsive">
	        <canvas id="pieChart" height="150"></canvas>
	      </div>
	      <!-- ./chart-responsive -->
	    </div>
	    <!-- /.col -->
	    <div class="col-md-4">
	      <ul class="chart-legend clearfix">
	        <li><i class="fa fa-circle-o text-red"></i> High School</li>
	        <li><i class="fa fa-circle-o text-green"></i> Middle School</li>
	        <li><i class="fa fa-circle-o text-yellow"></i> Austin rd</li>
	        <li><i class="fa fa-circle-o text-aqua"></i> Falmur rd</li>
	        <li><i class="fa fa-circle-o text-light-blue"></i> Lakeview</li>
	        <li><i class="fa fa-circle-o text-gray"></i> Falls</li>
	      </ul>
	    </div>
	    <!-- /.col -->
	  </div>
	  <!-- /.row -->
	</div>
	<!-- /.box-body -->
	<div class="box-footer no-padding">
	  <ul class="nav nav-pills nav-stacked">
	    <li><a href="#">High School
	      <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
	    <li><a href="#">Middle School <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 15%</span></a>
	    </li>
	    <li><a href="#">Elementry
	      <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
	  </ul>
	</div>
	<!-- /.footer -->
</div>
<!-- /.box -->

<script>
	 // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
    {
      value    : 150,
      color    : '#f56954',
      highlight: '#f56954',
      label    : 'High School'
    },
    {
      value    : 340,
      color    : '#00a65a',
      highlight: '#00a65a',
      label    : 'Middle School'
    },
    {
      value    : 100,
      color    : '#f39c12',
      highlight: '#f39c12',
      label    : 'Austin'
    },
    {
      value    : 20,
      color    : '#00c0ef',
      highlight: '#00c0ef',
      label    : 'Falmur'
    },
    {
      value    : 89,
      color    : '#3c8dbc',
      highlight: '#3c8dbc',
      label    : 'Lakeview'
    },
    {
      value    : 10,
      color    : '#d2d6de',
      highlight: '#d2d6de',
      label    : 'Falls'
    }
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> Calls'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------

</script>