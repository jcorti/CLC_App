<?php

error_reporting(0);

if(isset($_GET["initialDate"])){

    $initialDate = $_GET["initialDate"];
    $finalDate = $_GET["finalDate"];

}else{

$initialDate = null;
$finalDate = null;

} 
$school = $_SESSION["school"];
if($school == "all"){
  $school = null;
} 
$colours = array("red","green","yellow","aqua","purple","blue","cyan");
$monthCheckOne = date("Y-m");
$monthCheckTwo = date('Y-m', strtotime("-60 days")); 
$monthCheckThree = date('Y-m', strtotime("-30 days")); 
$answer = ControllerLoaner::ctrLoanerDatesRange($initialDate, $finalDate); 
$answerTwo = ControllerLoaner::ctrLoanerDatesRangeSchool($initialDate, $finalDate); 
$month = date('m');  

$test1 = ControllerLoaner::ctrDamageType($school, $month);
$test2 = ControllerLoaner::ctrDamageType($school, $month -1);
 
 
$screenLM = 1;
$powerLM = 1;
$keyboardLM = 1;
$cameraLM = 1;
$chargerLM = 1;
$wifiLM = 1;
$caseLM = 1;

$screen = 0;
$power = 0;
$keyboard = 0;
$camera = 0;
$charger = 0;
$wifi = 0;
$case = 0;  

$screenPer = 0;
$powerPer = 0;
$keyboardPer = 0;
$cameraPer = 0;
$chargerPer = 0;
$wifiPer = 0;
$casePer = 0;  

$screenPerColor = '';
$powerPerColor ='' ;
$keyboardPerColor = '';
$cameraPerColor = '';
$chargerPerColor = '';
$wifiPerColor = '';
$casePerColor = ''; 

$screenPerCarrot = '';
$powerPerCarrot='' ;
$keyboardPerCarrot = '';
$cameraPerCarrot = '';
$chargerPerCarrot = '';
$wifiPerCarrot = '';
$casePerCarrot = ''; 

$greenText = "text-green";
$redText = "text-red";
$yellowText = "text-yellow";
$problems = array("screen problem","power issue","keyboard issue","camera/mic issue","charger issue","Wifi Malfunction","Case Broken"); 
$testHt = "<i class='fa fa-angle-up'>";
 
foreach ($test1 as $key => $value) {
 
  $test = array( explode( ', ', $value['damage_type'] ) );  
  
    foreach ($test as $key => $content) { 
 
      for($index = 0; $index <= count($content); $index++){
      if($content[$index] == "screen"){
        $screen++; 
      }
      if($content[$index] == "power"){
        $power++; 
      }

      if($content[$index] == "keyboard"){
        $keyboard++; 
      }
      if($content[$index] == "camera/mic"){
        $camera++; 
      }
      if($content[$index] == "charger"){
        $charger++;
      }
      if($content[$index] == "wifi"){
        $wifi++;
      }
      if($content[$index] == "case"){
        $case++;  
      }

    }
     }
   
  }  
foreach ($test2 as $key => $value) {
 
  $test = array( explode( ', ', $value['damage_type'] ) );  
  
    foreach ($test as $key => $content) { 
 
      for($index = 0; $index <= count($content); $index++){
      if($content[$index] == "screen"){
        $screenLM++; 
      }
      if($content[$index] == "power"){
        $powerLM++; 
      }

      if($content[$index] == "keyboard"){
        $keyboardLM++; 
      }
      if($content[$index] == "camera/mic"){
        $cameraLM++; 
      }
      if($content[$index] == "charger"){
        $chargerLM++;
      }
      if($content[$index] == "wifi"){
        $wifiLM++;
      }
      if($content[$index] == "case"){
        $caseLM++;  
      }

    }
     }
   
  }  
 

  $screenPer = round(100 * ($screen-$screenLM) / $screenLM);

  if($screenPer > 0){
    $screenPerColor = "text-red";
    $screenPerCarrot = "<i class='fa fa-angle-up'>";

  }
  if($screenPer == 0){
    $screenPerColor = "text-yellow";
    $screenPerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($screenPer < 0){
    $screenPerColor = "text-green";
    $screenPerCarrot = "<i class='fa fa-angle-down'>";
  }
  $powerPer = 100 * round(($power-$powerLM) / $powerLM);

  if($powerPer > 0){
    $powerPerColor = "text-red";
    $powerPerCarrot = "<i class='fa fa-angle-up'>";
  }
  if($powerPer == 0){
    $powerPerColor = "text-yellow";
    $powerPerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($powerPer < 0){
    $powerPerColor = "text-green";
    $powerPerCarrot = "<i class='fa fa-angle-down'>";
  }
  $cameraPer = 100 * round(($camera-$cameraLM) / $cameraLM);

  if($cameraPer > 0){
    $cameraPerColor = "text-red";
    $cameraPerCarrot = "<i class='fa fa-angle-up'>";
  }
  if($cameraPer == 0){
    $cameraPerColor = "text-yellow";
    $cameraPerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($cameraPer < 0){
    $cameraPerColor = "text-green";
    $cameraPerCarrot = "<i class='fa fa-angle-down'>";
  }
  $keyboardPer = 100 * round(($keyboard-$keyboardLM) / $keyboardLM);

  if($keyboardPer > 0){
    $keyboardPerColor = "text-red";
    $keyboardPerCarrot = "<i class='fa fa-angle-up'>";
  }
  if($keyboardPer == 0){
    $keyboardPerColor = "text-yellow";
    $keyboardPerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($keyboardPer < 0){
    $keyboardPerColor = "text-green";
    $keyboardPerCarrot = "<i class='fa fa-angle-down'>";
  }

  $wifiPer = 100 * round(($wifi-$wifiLM) / $wifiLM);

  if($wifiPer > 0){
    $wifiPerColor = "text-red";
    $wifiPerCarrot = "<i class='fa fa-angle-up'>";
  }
  if($wifiPer == 0){
    $wifiPerColor = "text-yellow";
    $wifiPerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($wifiPer < 0){
    $wifiPerColor = "text-green";
    $wifiPerCarrot = "<i class='fa fa-angle-down'>";
  }


  $casePer = round(100 * ($case-$caseLM) / $caseLM);
  if($casePer > 0){
    $casePerColor = "text-red";
    $casePerCarrot = "<i class='fa fa-angle-up'>";
  }
  if($casePer == 0){
    $casePerColor = "text-yellow";
    $casePerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($casePer < 0){
    $casePerColor = "text-green";
    $casePerCarrot = "<i class='fa fa-angle-down'>";
  }

  $chargerPer = round(100 * ($charger-$chargerLM) / $chargerLM);
  if($chargerPer > 0){
    $chargerPerColor = "text-red";
    $chargerPerCarrot = "<i class='fa fa-angle-up'>";
  }
  if($chargerPer == 0){
    $chargerPerColor = "text-yellow";
    $chargerPerCarrot = "<i class='fa fa-angle-left'>";
  }
  if($chargerPer < 0){
    $chargerPerColor = "text-green";
    $chargerPerCarrot = "<i class='fa fa-angle-down'>";
  }

?>
<div class="box box-default">
    <div class="box-header with-border">
    <h3 class="box-title">Categories</h3>
    <div class="box-tools pull-right">
    
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChart1" height="150"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
        <?php

          for($i = 0; $i < 7; $i++){

          echo ' <li><i class="fa fa-circle-o text-'.$colours[$i].'"></i> '.$problems[$i].'</li>';

          }


          ?>
 
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->

  <div class="box-footer no-padding">
    <ul class="nav nav-pills nav-stacked">
       <?php

        echo '
      <li><a href="#">screen problem
        <span class="pull-right

         '.$screenPerColor.'">'.$screenPerCarrot.'</i> '.$screenPer.'%</span></a></li>
      <li><a href="#">power problem <span class="pull-right '.$powerPerColor.'">'.$powerPerCarrot.'</i> '.$powerPer.'%</span></a>
      </li>

      <li><a href="#">camera Broken
        <span class="pull-right '.$cameraPerColor.'">'.$cameraPerCarrot.'</i> '.$cameraPer.'%</span></a></li>
      <li><a href="#">keyboard problem
        <span class="pull-right '.$keyboardPerColor.'">'.$keyboardPerCarrot.'</i> '.$keyboardPer.'%</span></a></li>

      <li><a href="#">case Broken 
      <span class="pull-right '.$casePerColor.'">'.$casePerCarrot.'</i> '.$casePer.'%</span></a></li>

      <li><a href="#">charger Broken
        <span class="pull-right '.$chargerPerColor.'">'.$chargerPerCarrot.'</i> '.$chargerPer.'%</span></a></li>

      <li><a href="#">wifi problem
        <span class="pull-right '.$wifiPerColor.'">'.$wifiPerCarrot.'</i> '.$wifiPer.'%</span></a></li>
        '
?>


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
  var pieChartCanvas = $('#pieChart1').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
  <?php

    echo "{
      value    : ".$screen.",
      color    : 'red',
      highlight: 'red',
      label    : 'screen problem'
    },
    {
      value    : '$power',
      color    : 'green',
      highlight: 'green',
      label    : 'power issue'
    },
    {
      value    : '$keyboard',
      color    : 'yellow',
      highlight: 'yellow',
      label    : 'keyboard issue'
    },           
    {
      value    : '$camera',
      color    : 'aqua',
      highlight: 'aqua',
      label    : 'cam mic issue'
    },
    {
      value    : '$charger',
      color    : 'purple',
      highlight: 'purple',
      label    : 'charger issue'
    },
    {
      value    : '$wifi',
      color    : 'blue',
      highlight: 'blue',
      label    : 'Wifi Malfunction'
    },
    {
      value    : '$case',
      color    : 'magenta',
      highlight: 'magenta',
      label    : 'Case Broken'
    },";
     
    
   ?>
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
