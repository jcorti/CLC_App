<?php 
$selectSchool = $_SESSION["school"];
if($selectSchool == "all"){
  $selectSchool = 'ms';
}    
   

          
?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Technology Repair List

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border"> 
       

            <i class="fa fa-caret-down"></i>

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Student Last Name</th>
             <th>Student First Name</th>
             <th>Email</th>
             <th>School</th>
             <th>Reason for Repair</th>
             <th>Amount Due</th>  
             <th>Letter Sent</th>
             <th>Follow Up Attemps</th> 
             <th>Description</th>
                                                                                                                      
           </tr> 

          </thead>

          <tbody>

<?php
	$answer = ControllerLoaner::ctrShowRepair();
	
foreach ($answer as $key => $value) {

                echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["student_last"].'</td>
                    <td>'.$value["student_first"].'</td>
                    <td>'.$value["emails"].'</td>
                    <td>'.$value["school"].'</td>
                    <td>'.$value["reason"].'</td>
                    <td>'.$value["due"].'</td>
                    <td>'.$value["letter"].'</td>
                    <td>'.$value["follow_up"].'</td>
                    <td>'.$value["notes"].'</td>';

        ?> 
 </tr>';
              }

            ?>
          </tbody>

        </table>

      </div>
    
    </div>

  </section>

</div>
