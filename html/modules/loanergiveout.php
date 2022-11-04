<?php 
$selectSchool = $_SESSION["school"];
if($selectSchool == "all"){
  $selectSchool = 'ms';
}  ?>

<script type="text/javascript">

  function ddSelect()
  {
    var d = document.getElementById("newSerial").value; 
    document.getElementById("textvl").value = d;
  } 

  function ddSelectName()
  {
        var d = document.getElementById("sUserName").value; 
            const myArray = d.split(", ");
    let s = myArray[0];
    let e = myArray[1];
    let o = myArray[2];
    let h = myArray[3]; 
    let os = myArray[4]; 
    if(o == ""){o = "no call yet serial email last has misu";}

    
    

    
    if(os == ""){os = "no misuse";}
    document.getElementById("sUserNameSaved").value = e;

    document.getElementById("serialTest").value = s;
    document.getElementById("textLast").value = o;

    document.getElementById("textMisus").value = os;
    document.getElementById("textHas").value = h;
    var date1 = new Date(o);
    var date2 = new Date();
    var Difference_In_Time = date2.getTime() - date1.getTime();
  
 
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    if(Difference_In_Days <= 12){
      swal({
              type: "error",
              title: "chromebook/student has a call within two weeks",
              text: "if this is a breakage please put in a misuse if this is mechanical please proceed",
              showConfirmButton: true,
              confirmButtonText: "Close"

              }).then(function(result){
               
              });
            
      }
            
           
    }
   



</script> 
<?php
require "vendor/autoload.php";
$school = "";
$testSchool = $_POST['selectSchool'];
if($testSchool == 'hs'){
$school = 'Mahopac High School';
}
if($testSchool == 'ms'){
$school = 'Mahopac Middle School';
}
if($testSchool == 'lv'){
$school = 'Lakeview Elementary School';
}
if($testSchool == 'ar'){
$school = 'Austin Road Elementary School';
}
if($testSchool == 'fr'){
$school = 'Fulmar Road Elementary School';
}
$robo = 'onesync@mahopac.org';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$developmentMode = false;

$mailer = new PHPMailer($developmentMode);

try {
$mailer->SMTPDebug =false;
$mailer->isSMTP();

if ($developmentMode) {
$mailer->SMTPOptions = [
'ssl'=> [
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
]
];
}

if(isset($_POST['submit'])) 
{ 
$mailer->Host = 'smtp-relay.gmail.com';
$mailer->SMTPAuth = false;

$mailer->SMTPSecure = 'tls';
$mailer->Port = 587;
$test = $_POST['selectSchool'];
$teat =strtoupper($test);
$mailer->setFrom('onesync@mahopac.org', 'onesync');
$mailer->addAddress('servicedesk@lhric.org', 'service');
$mailer->isHTML(true);
$mailer->Subject ='school: '.$teat. ' Student: '.$_POST['sUserNameSaved'].'  Serial:  '.$_POST['oldSerial'] ;
$mailer->Body =$_POST['newSerial'].', '.$_POST['selectSchool'].', '.$_POST['description'].'<br> School:'.$school;
$mailer->send();
$mailer->ClearAllRecipients();
}
} catch (Exception $e) {
echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}

?>
<style type="text/css">
ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 2px solid #1bdbf8;
    background-color: #12bbd4;
    color: #fff;
    transition: all .2s;
}

ul.ks-cboxtags li input[type="checkbox"] {
  display: absolute;
}
ul.ks-cboxtags li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.ks-cboxtags li input[type="checkbox"]:focus + label {
  border: 2px solid #e9a1ff;
}


  
  .column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

</style>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>


<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Loaner Checkout

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Loaner Checkout</li>

    </ol>

  </section>

  <section class="content"> 
      <!--=============================================
      THE FORM
      =============================================--> 
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role = "form"  method="post" class="saleForm" name = "checkoutForm">

            <div class="box-body">
                
                <div class="box">
                        
<br><br>
                    <!--=====================================
                    =            CLC INPUT           =
                    ======================================-->
                  
                    
                    <div class="form-group">

                      <div class="input-group">
                        <br><br><br>
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        <label>Please enter students email</label> 
                       <br />
                      <select class='selectjs' name='sUserName' id='sUserName'  onchange="ddSelectName();"  required>      
                                        
                                    <?php  
                                      $answer = ControllerLoaner::ctrShowCBName($selectSchool);
                                      echo "<option value=''>Select Student</option>";
                                      foreach ($answer as $key => $value) { 
					if($value['School code'] == $selectSchool){
					
                                        echo"<option value='".$value['serial'].', '.$value['email'].', '.$value['last_repair'].', '.$value['has'].', '.$value['last_misuse']."'>".$value['email']."</option>";
                                       }
                                        }
 ?>
                                 </select>  
                      </div> 
                       
 
           
                    <hr>

                    <div class="row">

                    </div>


                    </div>

 

                    <!--=====================================
                    =            CUSTOMER INPUT           =
                    ======================================-->
                   <!--=====================================
                    CODE INPUT
                    ======================================-->
                  
                    
                    <div class="form-group">

                      <div class="input-group">
                        <br> 
                        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                        <label>Please enter the damaged chromebook serial</label>
                        <input type="text" class="form-control" name="oldSerial" id="oldSerial"required>
                        <input type="hidden" name="cUser" id="cUser" value="<?php echo $_SESSION["name"]; ?>"> 
			<input type="hidden" name="pAuth" id="pAuth" value=0>

                        <input type="hidden" name="selectSchool" id="school" value="<?php echo $_SESSION["school"]; ?>">

                      </div>
                      </div>


                    </div>

                    <div class="form-group"> 

                        <table class="table">
                          
                          <thead>
                            
                            <th>CB Name</th>
                            <th>CB Loaner</th>

                          </thead>
                          <tbody>
                            
                            <tr>
                              
                              <td style="width: 50%">

                                <div class="input-group">
                                   
                                    <select class="form-control" name="newSerial" id="newSerial" onchange="ddSelect();" required>      
                                        
                                    <?php  
                                      $answer = ControllerLoaner::ctrShowLoanerName($selectSchool);
                                      echo "<option value=''>Select Loaner</option>";
                                      foreach ($answer as $key => $value) { 
                                          
                                          if($value['status'] == 1){
                                        echo "<option value='".$value['loaner_serial']."'>".$value['cb_name']."</option>";
                                      }
                                      }
                                         
                                   ?>
                                 </select>

                                </div>
                              </td>

                              <td style="width: 50%">

                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textvl" readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>

                              </td>

                            </tr>

                          </tbody>

                        </table>
                         
                      
                    </div>  
                    <div class="form-group">
                       <ul class="ks-cboxtags">
                        <div class="col-xs-3">              

                          <label for="checkin-reasons">Select Damage Type</br> </label>
                          <li><input type="checkbox" id="checkboxOne" value="screen" name = "damage[]"><label for="checkboxOne">screen problem</label></li>
                      
                          <li><input type="checkbox" id="checkboxTwo" value="power" name = "damage[]"><label for="checkboxTwo">power issue</label></li>
                      
                          <li><input type="checkbox" id="checkboxThree" value="keyboard" name = "damage[]"><label for="checkboxThree">keyboard issue</label></li>
                      
                      </div>
                      <br />
                      <div class="col-xs-4" style="align-content: center;"> 
                          <li><input type="checkbox" id="checkboxFive" value="charge" name = "damage[]"><label for="checkboxFive">charger issue</label></li>
                    
                          <li><input type="checkbox" id="checkboxSeven" value="wifi" name = "damage[]"><label for="checkboxSeven">Wifi Malfunction</label></li>
                      
                          <li><input type="checkbox" id="checkboxEight" value="case" name = "damage[]"><label for="checkboxEight">Case Broken</label></li>

                          <li><input type="checkbox" id="checkboxFour" value="camera/mic"name = "damage[]"><label for="checkboxFour">camera/mic issue</label></li>
                      
                    </div>
                  </ul>
                </div>
                <div class="form-group">
                       <ul class="ks-cboxtags">
                        <div class="col-xs-3">              
                            <label for="checkin-reasons">Has Physical damage?</br> </label>
                          <li><input type="checkbox" id="checkboxc" value="yes" name = "physical"><label for="checkboxc">Physical</label></li>
                      </div>
                    </ul>
                  </div>
<br /> <br /> <br /> 
                    <div class="form-group">


<br /> <br /> <br /> <br /> <br /> <br /> 
                      <div class="input-group"><br>
                        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                        <label>Please explain what is wrong with the chromebook</label>
                        <br>
                        <textarea rows = "5" cols = "50" name = "description" id = "description" required></textarea>

                      </div>

                    </div>  
                      <hr> 
                    <hr>

                    </div>
            <div class="box-footer">
              <button type="submit"name="submit" class="btn btn-primary pull-right" >Submit Claim</button>
</div>
</div>            </div> 
      <!--=============================================
      =            PRODUCTS TABLE                   =
      =============================================-->


      <div class="col-lg-7 col-xs-12 pull-right" >
        
          <div class="box box-warning">
            
            <div class="box-header with-border"></div>

            <div class="box-body">
              <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        
                        
                        <br />
                         
                        <label>Students Email</label> 
                        
                        <input type="text" class="form-control" name="sUserNameSaved" id="sUserNameSaved"readonly> 
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
                        
                        <input type="text" class="form-control" name="serialTest" id="serialTest"  readonly> 
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
                            <th>last Misuse</th>
                            <th>Has Insurance</th>
                             

                          </thead>
                          <tbody>
                            
                            <tr>
                              
                              <td>

                                <div class="input-group">
                                   
                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textLast"  readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>
                              </td>
                              <td>

                                <div class="input-group">
                                   
                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textMisus"  readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>
                              </td>

                              <td >

                                  <div class="input-group">
                                  
                                  <input type="text" class="form-control" name="textHas" id="textHas"   readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>

                              </td>
                              

                            </tr>

                          </tbody>

                        </table>
                      </div>  
                    <hr>
 
                    <div class="row">

                    </div>
          </form>
          <?php

            $saveSale = new ControllerLoaner();
            $saveSale -> ctrCreateCheckout();
            
          ?>
 </section>
        </div>

      </div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.selectjs').select2();
});
</script>
