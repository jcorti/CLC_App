<?php

error_reporting(0);

$school = $_SESSION["school"];
if($school == "all"){
  $school = null;
}

$answer = ControllerLoaner::ctrLoanerDatesRange($initialDate, $finalDate); 
$arrayDates = array("2022-09","2022-10","2022-11","2022-12","2023-01","2023-02","2023-03","2023-04","2023-05");
$arrayClaims= array();
$monthCheckOne = "";
$monthCheckTwo = "";
$claim = 0;

foreach ($answer as $key => $value) {

    $monthCheckTwo = substr($value["occurrence"],0,7);
    if($monthCheckOne == $monthCheckTwo){
        $claim++; 

    } else{
        if($claim == 0){
            $monthCheckOne = $monthCheckTwo;
        }else{
            $arrayDates[] = $monthCheckOne;
            $arrayClaims[] = $claim;
            $claim = 0;
            $claim++;
            $monthCheckOne = $monthCheckTwo;
        } 
    } 
}
            $arrayDates[] = $monthCheckOne;
            $arrayClaims[] = $claim; 
?>

<!--=====================================
SALES GRAPH
======================================-->


<div class="box box-solid bg-teal-gradient">
	
	<div class="box-header">
		
 		<i class="fa fa-th"></i>

  		<h3 class="box-title">Claims Completed Graph</h3>

	</div>

	<div class="box-body border-radius-none newSalesGraph">

		<div class="chart" id="line-chart-year" style="height: 250px;"></div>

  </div>

</div>

<script>
	
var line = new Morris.Line({
    element          : 'line-chart-year',
    resize           : true,
    data             : [
        
    <?php 

            echo "{ y: '".$arrayDates[0]."', Calls: ".$arrayClaims[0]." },
                  { y: '".$arrayDates[1]."', Calls: ".$arrayClaims[1]."},
                  { y: '".$arrayDates[2]."', Calls: 0 },
                  { y: '".$arrayDates[3]."', Calls: 0 },
                  { y: '".$arrayDates[4]."', Calls: 0 },
                  { y: '".$arrayDates[5]."', Calls: 0 },
                  { y: '".$arrayDates[6]."', Calls: 0 },
                  { y: '".$arrayDates[7]."', Calls: 0 },
                  { y: '".$arrayDates[8]."', Calls: 0 },
                  { y: '".$arrayDates[9]."', Calls: 0 },"; 

    ?>

    ],
    xkey             : 'y',
    ykeys            : ['Calls'],
    labels           : ['Calls'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });
</script>
