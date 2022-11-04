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




</script> 

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

</style>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Loaner Misuse

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Loaner Misuse</li>

    </ol>

  </section>

  <section class="content"> 
      <!--=============================================
      THE FORM
      =============================================--> 
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="saleForm">

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

                                        echo"<option value='".$value['email']."'>".$value['email']."</option>";
                                       }
}
 ?>
                                 </select>
 

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
                        <label>Please enter the students broken serial</label>
                        <input type="text" class="form-control" name="oldSerial" id="oldSerial"required>
                        <input type="hidden" name="cUser" id="cUser" value="<?php echo $_SESSION["name"]; ?>"> 
                        <input type="hidden" name="selectSchool" id="selectSchool" value="<?php echo $_SESSION["school"]; ?>"> 
                      </div>


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
              <button type="submit" class="btn btn-primary pull-right" >Submit Claim</button>
            </div> 
          </form>

          <?php

            $saveSale = new ControllerLoaner();
            $saveSale -> ctrCreateMisuseCheckout();
            
          ?>

        </div>

      </div>


       
            </div>

          </div>


      </div>

    </div>

  </section>
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectjs').select2();
});
</script>

</div>

<!--====  End of module add Customer  ====-->
