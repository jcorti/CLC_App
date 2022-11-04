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
    
    	<h3 class="box-title">Most Calls</h3>
  
  	</div>

  	      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Student</th>
             <th>loaner</th>  
             <th>Description</th>  

           </tr> 

          </thead>

          <tbody>

          <?php
	
            $answer = ControllerLoaner::ctrShowCBAuth($school);

            foreach ($answer as $key => $value) {

                if($value['princ_auth'] == 1){
            echo '
                <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["old_serial"].'</td>
                  <td>'.$value["s_user"].'</td> 
                                    <td>'.$value["description"].'</td> ';
                  if($value["princ_auth"] != 0){

                      echo '<td><button class="btn btn-danger btnApprove btn-xs" userId="'.$value["s_user"].'" userStatus="0">Un-Approved</button></td>';

                    }else{

                      echo '<td><button class="btn btn-success btnApprove btn-xs" userId="'.$value["s_user"].'" userStatus="1">Approved</button></td>';
                    }
                '</tr>';                       
            }
}
        ?> 
          </tbody>

        </table> 
      </div>
    
    </div>

  </section>

</div>

