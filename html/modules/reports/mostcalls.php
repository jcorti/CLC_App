<?php

error_reporting(0);
$school = $_SESSION["school"];
if($school == "all"){
  $school = 'ms'; 
}  
?>
<!--=====================================
Sellers
======================================-->

<div class="box box-success">
	
	<div class="box-header with-border">
    
    	<h3 class="box-title">Times Visited</h3>
  
  	</div>

  	<div class="box-body">
  		
		<div class="chart-responsive">
			
			<div class="chart" id="bar-chart1" style="height: 300px;"></div>

		</div>

  	</div>

</div>

<script>
    var bar = new Morris.Bar({
      element: 'bar-chart1',
      resize: true,
      data: [ 
  
    <?php
      $answer = ControllerLoaner::ctrnumberOfcalls($school); 
       
       $studentOne = $answer[0]["s_user"];
       $studentOneFixed = explode('@', $studentOne); 
       $studentTwo = $answer[1]["s_user"];
       $studentTwoFixed = explode('@', $studentTwo); 
       $studentThree = $answer[2]["s_user"];
       $studentThreeFixed = explode('@', $studentThree);  
       $studentFour = $answer[3]["s_user"];
       $studentFourFixed = explode('@', $studentFour); 

       $numOne = $answer[0]["total_calls"]; 
       $numOneB = ControllerLoaner::ctrNumberOfcallsProblem($school,$studentOne); 

       $numTwo = $answer[1]["total_calls"];
       $numTwoB = ControllerLoaner::ctrNumberOfcallsProblem($school,$studentTwoFixed); 

       $numThree = $answer[2]["total_calls"];
       $numThreeB = ControllerLoaner::ctrNumberOfcallsProblem($school,$studentThreeFixed);  

       $numFour = $answer[3]["total_calls"];
       $numFourB = ControllerLoaner::ctrNumberOfcallsProblem($school,$studentFourFixed);  

       $sumOne = $numOne - $numOneB[1]['total_repair'];
       $sumTwo = $numTwo - $numTwoB[1]['total_repair'];
       $sumThree = $numThree - $numThreeB[1]['total_repair'];
       $sumFour = $numFour - $numFourB[1]['total_repair'];


      
      echo
       "{y: '".$studentOneFixed[0]."', a: '".$numOne."', b: '".$sumOne."'},
        {y: '".$studentTwoFixed[0]."', a: '".$numTwo."', b: '".$sumTwo."'},
        {y: '".$studentThreeFixed[0]."', a:'".$numThree."', b: '".$sumThree."'},
        {y: '".$studentFourFixed[0]."', a: '".$numFour."', b: '".$sumFour."'}";
      

    ?>
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Calls', 'Sent Out'],
      hideHover: 'auto'
    });
</script>
