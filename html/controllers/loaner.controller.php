<?php

class ControllerLoaner{

	/*=============================================
	SHOW SALES
	=============================================*/

	public static function ctrShowCheckout($item, $value){

		$table = "checkout";

		$answer = ModelCheckout::mdlShowCheckout($table, $item, $value);

		return $answer;

	}

	/*=============================================
	CREATE CATEGORY
	=============================================*/
	
	public static function ctrCreateCheckout(){

		if(isset($_POST['sUserName'])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["oldSerial"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["newSerial"])){

				date_default_timezone_set("America/Bogota");

				$date = date('Y-m-d');
				$hour = date('H:i:s');

				$actualDate = $date.' '.$hour;

				$item1 = "last_issued";
				$value1 = $actualDate; 

				$table = 'checkout';
				$test = $_POST["damage"]; 
				$testLen = count($test);
				$comTest ="";
				for ($index = 0; $index < $testLen; $index++) {
   					$comTest = $test[$index] .", ".$comTest ; 
				}
				$cosmetic = "no";
 				$cosTest = $_POST['physical'];

 				if($cosTest == "yes"){
 					$cosmetic = "yes";
 				}
 				
				$first =$_POST['selectSchool'];  
				$second ="_loaners";
				$comp   = $first .= $second;
				$tableTwo   = $comp;
				$itemOne    = "loaner_serial";
				$valueOne   = $_POST['newSerial'];
 				$loanerShow = ModelCheckout::mdlShowCheckout($tableTwo, $itemOne, $valueOne);
 				
 				if($loanerShow == null){
 					echo '<script>
						
						swal({
							type: "error",
							title: "Cant find loaner please try again",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "loanergiveout";
								}
							});
 				}
						
				</script>';
				
 				}
 				$loanerName = $loanerShow['cb_name'];

				$user = $_POST['sUserNameSaved'];
				
 				$showIns = ModelCheckout::mdlShowIns($user);
 				$showInsTest = $_POST['textHas'];
				
				$data = array('old_serial' => $_POST['oldSerial'],'loaner_serial' => $_POST['newSerial'],'loaner_name' => $loanerName, 's_user' => $user, 'description' => $_POST['description'], 'c_user' => $_POST['cUser'], 'school' => $_POST['selectSchool'], 'damage_type' => $comTest, 'cosmetic' => $cosmetic,
					'has_ins' => $showInsTest, 'princ_auth' => $_POST['pAuth'],'is_returned' => "no", 'occurrence' => $actualDate );

				$answer = ModelCheckout::mdlAddCheckout($table, $data);
				$first  =$_POST['selectSchool'];
				$second ="_loaners";
				$comp   = $first .= $second;
				$tableTwo   = $comp;
				$itemOne    = "loaner_serial";
				$valueOne   = $_POST['newSerial'];

				$loanerShow = ModelCheckout::mdlShowCheckout($tableTwo, $itemOne, $valueOne);
				 
				$oldIDUser  =  "c_user";
				$oldUser    =  $loanerShow["c_user"];
				$newUser    =  $user;

				$updateUser = ModelCheckout::mdlUpdateLoaner($tableTwo, $oldIDUser, $newUser , $itemOne, $valueOne);

				$newIDUser  =  "last_user";

				$updateNUser= ModelCheckout::mdlUpdateLoaner($tableTwo, $newIDUser, $oldUser , $oldIDUser, $oldUser);
				$stat = 0;
				$statName = "status";
				$updateNUser= ModelCheckout::mdlUpdateLoaner($tableTwo, $statName, $stat ,  $itemOne, $valueOne);
				/*=============================================
					registers loaner being checked out
				 =============================================*/



				$lastLogin = ModelCheckout::mdlUpdateLoaner($tableTwo, $item1, $value1, $itemOne, $valueOne);



				$tableThree = "safeware"; 
				$sameUser = "email"; 
				$newLoaner = "last_loaner";
				$numTimes = "num_check";
				$serialrepair = "serialrepair";
				$old = $_POST['oldSerial'];
			

				$insUpOne = ModelCheckout::mdlUpdateLoaner($tableThree, $newLoaner,$valueOne,$sameUser,$user);
				
				$insUpTwo = ModelCheckout::mdlShowIns($user);
                                $numTickets = $insUpTwo[0]['num_check'];
				$numTickets++;
				$insUpThree = ModelCheckout::mdlUpdateLoaner($tableThree, $numTimes,$numTickets,$sameUser,$user);
				$insUpFour = ModelCheckout::mdlUpdateLoaner($tableThree, $serialrepair,$old,$sameUser,$user);


				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "chromebook has been successfully saved ",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "loanergiveout";

								}
							});
						
					</script>';
				}
				

			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "No special characters or blank fields",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "loanergiveout";
								}
							});
						
				</script>';
				
			}
		}
	}
     /*===========================================
      = DATES RANGE                              =
      ============================================*/ 

    public static  function ctrLoanerDatesRange($initialDate, $finalDate){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlLoanerDatesRange($table, $initialDate, $finalDate);

    	return $answer;
    
  	}
  	  /*===========================================
      = DATES RANGE                              =
      ============================================*/ 

    public static  function ctrLoanerDatesRangeSchool($initialDate, $finalDate){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlLoanerDatesRangeSchool($table, $initialDate, $finalDate);

    	return $answer;
    
  	}
    public static  function ctrCount($school,$month){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlCount($table,$school,$month);

    	return $answer;
    
  	}
  	public static function ctrLoanerReturn(){
	  		
  		if(isset($_POST['sUserName'])){

			

				$table = 'checkout';
 	                        $item1    = "is_returned";
				$value1   = "Yes";
				$itemOne  = "loaner_serial";
				$valueOne = $_POST['newSerial'];
				$testsplit = explode(", ", $valueOne);
				$testWork = $testsplit[0];

				$tableTwo = "";
				$first =$_POST['selectSchool'];  
				$second ="_loaners";
				$comp   = $first .= $second;
				$tableTwo   = $comp;
				
				$answer = ModelCheckout::mdlUpdateLoaner($table, $item1, $value1, $itemOne, $testWork);
				
					  
				$stat = 1;
				$statName = "status";
				$updateNUser= ModelCheckout::mdlUpdateLoaner($tableTwo, $statName, $stat ,  $itemOne, $testWork);
				
				if($answer == 'ok'){


	  		echo '<script>
			
			swal({
				type: "success",
				title: "chromebook has been successfully saved ",
				showConfirmButton: true,
				confirmButtonText: "Close"

				}).then(function(result){
					if (result.value) {

						window.location = "loanerReturn";

					}
				});
			
		</script>';
	}
	
		}
	}
    public static  function ctrDamageType($school, $month){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlDamageType($table, $school, $month);

    	return $answer;
    
  	}

    public static  function ctrnumberOfcalls($school){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlnumberOfcalls($school);

    	return $answer;
    
  	}

    public static  function ctrNumberOfcallsProblem($school,$student){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlNumberOfcallsProblem($school, $student);

    	return $answer;
    
  	}


    public static  function ctrShowCBName($school){

			$second ="_loaners";
			$table  = $school .= $second;

    	$answer = ModelCheckout::mdlShowCBName($table);

    	return $answer;
    
  	}

  	public static function ctrCheckout($school)
  	{ 


		if(isset($_POST['sUserName'])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["oldSerial"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["newSerial"])){
				$table = "checkout";
				
				$test = $_POST["damage"]; 
				$testLen = count($test);
				$comTest ="";
				for ($index = 0; $index < $testLen; $index++) {
   					$comTest = $test[$index] .", ".$comTest ; 
				}
				$cosmetic = "no";
 				$cosTest = $_POST['physical'];

 				if($cosTest == "yes"){
 					$cosmetic = "yes";
 				}
 				
				$first =$_POST['selectSchool'];  
				$second ="_loaners";
				$comp   = $first .= $second;
				$tableTwo   = $comp;
				$itemOne    = "loaner_serial";
				$valueOne   = $_POST['newSerial'];
 				$loanerShow = ModelCheckout::mdlShowCheckout($tableTwo, $itemOne, $valueOne);
 				if($loanerShow == null){
 					echo '<script>
						
						swal({
							type: "error",
							title: "Cant find loaner please try again",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "loanergiveout";
								}
							});
 				}
						
				</script>';
				
 				}
 

                                date_default_timezone_set("America/Bogota");

                                $date = date('Y-m-d');
                                $hour = date('H:i:s');

                                $actualDate = $date.' '.$hour;

                                $item1 = "last_issued";
                                $value1 = $actualDate; 

				$data = array('old_serial' => $_POST['oldSerial'],'loaner_serial' => $_POST['newSerial'],'s_user' => $_POST['sUserName'], 'description' => $_POST['description'], 'c_user' => $_POST['cUser'], 'school' => $_POST['selectSchool'], 'damage_type' => $comTest, 'cosmetic' => $cosmetic, 'is_returned' => "no",'princ_auth' => 0,'occurrence' =>  $actualDate);

				$answer = ModelCheckout::mdlAddCheckout($table, $data);
				$first  =$_POST['selectSchool'];  
				$second ="_loaners";
				$comp   = $first .= $second;
				$tableTwo   = $comp;
				$itemOne    = "loaner_serial";
				$valueOne   = $_POST['newSerial'];
 
				$loanerShow = ModelCheckout::mdlShowCheckout($tableTwo, $itemOne, $valueOne);
				 
				$oldIDUser  =  "c_user";	
				$oldUser    =  $loanerShow["c_user"];
				$newUser    = $_POST['sUserName'];

				$updateUser = ModelCheckout::mdlUpdateLoaner($tableTwo, $oldIDUser, $newUser , $itemOne, $valueOne);

				$newIDUser  =  "last_user";	


				$updateNUser= ModelCheckout::mdlUpdateLoaner($tableTwo, $newIDUser, $oldUser , $oldIDUser, $oldUser);
				$stat = 0;
				$statName = "status";
				$updateNUser= ModelCheckout::mdlUpdateLoaner($tableTwo, $statName, $stat ,  $itemOne, $valueOne);
				/*=============================================
					registers loaner being checked out
				 =============================================*/

				date_default_timezone_set("America/Bogota");

				$date = date('Y-m-d');
				$hour = date('H:i:s');

				$actualDate = $date.' '.$hour;

				$item1 = "last_issued";
				$value1 = $actualDate; 

				$lastLogin = ModelCheckout::mdlUpdateLoaner($tableTwo, $item1, $value1, $itemOne, $valueOne);


				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "chromebook has been successfully saved ",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "loanergiveout";

								}
							});
						
					</script>';
				}
				

			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "No special characters or blank fields",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "loanergiveout";
								}
							});
						
				</script>';
				
			}
		}
	}
		public static function ctrCreateMisuseCheckout()
		{
			if(isset($_POST['sUserName'])){

					$table = 'checkout';
					$test = $_POST["damage"]; 
					$testLen = count($test);
					$comTest ="";
					for ($index = 0; $index < $testLen; $index++) {
	   					$comTest = $test[$index] .", ".$comTest ; 
					}
					$cosmetic = "no";
	 				$cosTest = $_POST['cosmetic'];
					
	 				if($cosTest == "yes"){
	 					$cosmetic = "yes";
	 				}
	 				date_default_timezone_set("America/Bogota");

					$date = date('Y-m-d');
					$hour = date('H:i:s');

					$actualDate = $date.' '.$hour;

					$item1 = "last_issued";
					$value1 = $actualDate; 

					$data = array('old_serial' => $_POST['oldSerial'],'loaner_serial' => "NA",'s_user' => $_POST['sUserName'], 'description' => $_POST['description'], 'c_user' => $_POST['cUser'], 'school' => $_POST['selectSchool'], 'damage_type' => $comTest, 'cosmetic' => $cosmetic, 'is_returned' => "NA",'princ_auth' => 1,'occurrence' =>  $actualDate);
					
					$answer = ModelCheckout::mdlAddCheckout($table, $data);
					
				 
					if($answer == 'ok'){

						echo '<script>
							
							swal({
								type: "success",
								title: "chromebook has been successfully saved ",
								showConfirmButton: true,
								confirmButtonText: "Close"

								}).then(function(result){
									if (result.value) {

										window.location = "loanermisuse";

									}
								});
							
						</script>';
					}
        	}
	}


    public static  function ctrShowCBAuth($school){

			$table ="checkout"; 

    	$answer = ModelCheckout::mdlShowCBAuth($table,$school);

    	return $answer;
    
  	}
    public static  function ctrStudentIns(){

    	$table = "safeware";

    	$answer = ModelCheckout::mdlStudentIns($table);

    	return $answer;
    
  	} 
  	 public static  function ctrShowCheckoutUser($suser, $sloaner){

    	$table = "checkout";

    	$answer = ModelCheckout::mdlShowCheckoutUser($table, $suser, $sloaner);

    	return $answer;
    
  	}   
  	 public static  function ctrCheckStudent(){
 			$table = "checkout";
 			if(isset($_POST['selectType'])){
 				$selectAn = $_POST['selectType'];
 				if($selectAn == 'serial'){
 					 
 					$serial = $_POST['oldSerial'];
 					 
 					$answer = ModelCheckout::mdlCheckSerial($table,$serial);
 				}
 				
 				if($selectAn == 'email'){
 					 
 					$email = $_POST['userName']; 
 					 
 					$answer = ModelCheckout::mdlCheckStudent($table,$email);
 				}
 				$sEmail = $answer[0]['s_user'];
 				$sSerial = $answer[0]['old_serial'];
 				$sOccurance = $answer[0]['occurrence'];
 				$insTable = "safeware";

 				$ins =  ModelCheckout::mdlStudentSingleIns($insTable, $sEmail);  
 				$sIns = $ins[0]['has']; 
  		echo '</div><div class="col-lg-7 col-xs-12 pull-right" >
        
          <div class="box box-warning">
            
            <div class="box-header with-border"></div>

            <div class="box-body">
              <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        
                        <label>Student email</label> 
                        <br />
                         
                        <label>Students Chromebook</label> 
                        
                        <input type="text" class="form-control" name="sUserNameSaved" id="sUserNameSaved" value = '.$sEmail.' readonly> 
                        <br /><br /> 
                        
                       <br /><br /> 
                        
                      </div> 

                    <hr>

                    <div class="row">

                    </div>
                    <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        
                        <label>Students Chromebook</label> 
                        
                        <input type="text" class="form-control" name="serialTest" id="serialTest" value = '.$sSerial.'  readonly> 
                        <br /><br /> 
                        
                      </div> 

                    <hr> 
                     

                    <div class="row">

                    </div>

                     <div class="form-group">

                      <div class="input-group">
                        
                        <table class="table">
                          
                          <thead>
                            
                            <th>Last Breakage</th> 
                            <th>Has Insurance</th>
                             

                          </thead>
                          <tbody>
                            
                            <tr>
                              
                              <td>

                                <div class="input-group">
                                   
                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textvl" value = '.$sOccurance.'  readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>
                              </td>

                              <td >

                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textvl" value = '.$sIns.'  readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>

                              </td>
                              

                            </tr>

                          </tbody>

                        </table>
                      </div> 
                     <div class="form-group">
                       <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Student</th>
             <th>loaner</th>  
             <th>Date of issue</th>   
             <th>Returned</th> 
             <th style="width:50%">Description</th>
                                                                                                                      
           </tr> 

          </thead>

          <tbody>'; 

            foreach ($answer as $key => $value) {
           
               
            echo '
                <tr style="height:100px">
                  <td>'.($key+1).'</td>
                  <td>'.$value["s_user"].'</td>
                  <td>'.$value["loaner_name"].'</td> 
                  <td>'.$value["occurrence"].'</td>  
                  <td>'.$value["is_returned"].'</td> 
                  <td>'.$value["description"].'</td>
                </tr>'; 
            }

         
          echo '</tbody>

        </table> 
                    <hr>
 
                    <div class="row">

                    </div>';
    	return $answer;
    }
    
  	} 
  	 public static  function ctrShowLoanerUser($sloaner,$school){

			$second ="_loaners";
			$table  = $school .= $second;

    	$answer = ModelCheckout::mdlShowLoanerUser($table, $sloaner);

    	return $answer;
    
  	}   
    public static  function ctrShowLoanerName($school){

			$second ="_loaners";
			$table  = $school .= $second;

    	$answer = ModelCheckout::mdlShowLoanerName($table);

    	return $answer;
    
  	} 

    public static  function ctrShowRepair(){

			

    	$answer = ModelCheckout::mdlShowRepair();

    	return $answer;
    
  	} 
  	   public static  function ctrAddRepair($school){

			$second ="_loaners";
			$table  = $school .= $second;

    	$answer = ModelCheckout::mdlAddRepair($table);

  		echo '

          <form role="form" method="post" class="saleForm" name = "emailForm">
          </div><div class="col-lg-7 col-xs-12 pull-right" >
        
          <div class="box box-warning">
            
            <div class="box-header with-border"></div>

            <div class="box-body">
              <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        
                        <label>Student email</label> 
                        <br />
                         
                        <label>Students Chromebook</label> 
                        
                        <input type="text" class="form-control" name="sUserNameSaved" id="sUserNameSaved" value = '.$sEmail.' readonly> 
                        <br /><br /> 
                        
                       <br /><br /> 
                        
                      </div> 

                    <hr>

                    <div class="row">

                    </div>
                    <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        
                        <label>Students Chromebook</label> 
                        
                        <input type="text" class="form-control" name="serialTest" id="serialTest" value = '.$sSerial.'  readonly> 
                        <br /><br /> 
                        
                      </div> 

                    <hr> 
                     

                    <div class="row">

                    </div>

                     <div class="form-group">

                      <div class="input-group">
                        
                        <table class="table">
                          
                          <thead>
                            
                            <th>Last Brakage</th> 
                            <th>Has Insurance</th>
                             

                          </thead>
                          <tbody>
                            
                            <tr>
                              
                              <td>

                                <div class="input-group">
                                   
                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textvl" value = '.$sOccurance.'  readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>
                              </td>

                              <td >

                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textvl" value = '.$sIns.'  readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>

                              </td>
                              

                            </tr>

                          </tbody>

                        </table>
                      </div> 
                     <div class="form-group">
                       <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Student</th>
             <th>loaner</th>  
             <th>Date of issue</th>   
             <th>Returned</th> 
             <th style="width:50%">Description</th>
                                                                                                                      
           </tr> 

          </thead>

          <tbody>'; 

            foreach ($answer as $key => $value) {
           
               
            echo '
                <tr style="height:100px">
                  <td>'.($key+1).'</td>
                  <td>'.$value["s_user"].'</td>
                  <td>'.$value["loaner_name"].'</td> 
                  <td>'.$value["occurrence"].'</td>  
                  <td>'.$value["is_returned"].'</td> 
                  <td>'.$value["description"].'</td>
                </tr>'; 
            }

         
          echo '</tbody>

        </table> 
                    <hr>
 
                    <div class="row">

                    </div>';
    	return $answer; 
    
  	} 

   	public static function ctrTechInsert()
  	{ 

		if(isset($_POST['bSerial'])){ 
			$table = 'techrepair';

			
 
			$data = array('tech' => $_POST['tech'],'bSerial' => $_POST['bSerial'], 'description' => $_POST['description'],'occurrence' => $occurrence ); 

				$answer = ModelCheckout::mdlTechInsert($table, $data);
				
				if($answer == 'ok'){


	  		echo '<script>
			
			swal({
				type: "success",
				title: "chromebook has been successfully saved ",
				showConfirmButton: true,
				confirmButtonText: "Close"

				}).then(function(result){
					if (result.value) {

						window.location = "techissue";

					}
				});
			
			</script>';
			}
  		}
	}

}
