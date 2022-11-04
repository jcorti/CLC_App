<?php
error_reporting(0);
$school = $_SESSION["school"];
if($school == "all"){
  $school = 'ms'; 
} 
  $answerTwo = ControllerLoaner::ctrNumberOfcallsProblem($school,'cortij'); 
 ?>
<!--=====================================
Sellers
======================================-->

<div class="box box-success">
	
	<div class="box-header with-border">
    
    	<h3 class="box-title">checked out loaners</h3>
  
  	</div>

  	      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             
             <th>Student</th>
             <th>loaner</th> 
 
                                                                                                                      
           </tr> 

          </thead>

          <tbody>

          <?php
	
            $answer = ControllerLoaner::ctrShowLoanerName($school);

            foreach ($answer as $key => $value) {
                if($value['status'] == 0){
            echo '
                <tr>
                 
                  <td>'.$value["c_user"].'</td>
                  <td>'.$value["cb_name"].'</td> 
                </tr>';                       
            }
}
        ?> 
          </tbody>

        </table> 
      </div>
    
    </div>

  </section>

</div>
