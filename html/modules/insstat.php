<?php 
$selectSchool = $_SESSION["school"];
          
?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Student Insurance Status

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border"> 
 
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Last</th>
             <th>First</th>
             <th>Email</th>
             <th>CB</th>
             <th>Has Ins</th>

 
                                                                                                                      
           </tr> 

          </thead>

          <tbody>
	<?php
           
           if($selectSchool == 'all'){
	     $answer = ControllerLoaner::ctrStudentIns();
	       foreach ($answer as $key => $value) {
            echo '
                <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["last"].'</td>
                  <td>'.$value["first"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["serial"].'</td> 
                  <td>'.$value["has"].'</td> 
                </tr>'; 
            }
	}
	   
            
           
              $answer = ControllerLoaner::ctrStudentIns();
		
		foreach ($answer as $key => $value) {
           if($selectSchool == $value['School code']){
	      echo '
                <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["last"].'</td>
                  <td>'.$value["first"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["serial"].'</td> 
                  <td>'.$value["has"].'</td> 
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
