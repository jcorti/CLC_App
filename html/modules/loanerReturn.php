<?php
$selectSchool = $_SESSION["school"];
if($selectSchool == "all"){
  $selectSchool = 'ms';
}  ?>

<script type="text/javascript">

    function ddSelect()
  {
	    var d = document.getElementById("newSerial").value; 
    const myArray = d.split(", ");
    let s = myArray[0];
    let a = myArray[1];
    var d = document.getElementById("newSerial").value; 
    document.getElementById("textvl").value = s;

    document.getElementById("serialOld").value = a;
  } 


</script> 

<style type="text/css">
 * {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}
 

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
  
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

      Loaner Return

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Loaner Return</li>

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
			<br/>
                        <select class='selectjs' name='sUserName' id='sUserName'  onchange="ddSelectName();"  required>      
                                        
                                    <?php  
                                      $answer = ControllerLoaner::ctrShowCBName($selectSchool);
                                      echo "<option value=''>Select Student</option>";
                                      foreach ($answer as $key => $value) { 
                                        echo"<option value='".$value['serial']."'>".$value['email']."</option>";
                                       
                                      }   
 ?>
                                 </select>  

                        <input type="hidden" name="selectSchool" id="selectSchool" value="<?php echo $_SESSION["school"]; ?>">  

                      </div>

                    </div>

 

                    <!--=====================================
                    =            CUSTOMER INPUT           =
                    ======================================-->
                  
                    <!--=====================================
                    CODE INPUT
                    ======================================-->
                  
                    
                    <div class="form-group">

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
                                           
                                        if($value['status'] == 0){
                                          $answerTwo = ControllerLoaner::ctrShowCheckoutUser($value['c_user'],$value['loaner_serial']);
                                        
                                        echo "<option value='".$value['loaner_serial'].', '.$answerTwo[0]['old_serial']."'>".$value['cb_name']."</option>";
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

<label>Old Serial</label>
                        <input type="text" class="form-control" name="serialOld" id="serialOld" readonly>

                        <input type="hidden" name="cUser" id="cUser" value="<?php echo $_SESSION["name"]; ?>"> 
                      </div>


                    </div>

                    <div class="form-group">

                      <div class="input-group">

                        <br>
                        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                        <label>Please enter the repaired CB serial</label>
                        <input type="text" class="form-control" name="repairedSerial" id="repairedSerial"required>

                      </div>
                      </div>
                    <div class="form-group">

                      <div class="input-group"><br>
                        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                        <label>Please put in a short blurb about the condition of the loaner</label>
                        <br>
                        <textarea rows = "5" cols = "50" name = "description" id = "description" required></textarea>

                      </div>

                    </div>   
<div class="form-group">
                       <ul class="ks-cboxtags">
                        <div class="col-xs-3">              
                            <label for="checkin-reasons">Has Physical damage?</br> </label>
                          <li><input type="checkbox" id="checkboxc" value="yes" name = "physical"><label for="checkboxc">Physical</label></li>
                      </div>
                    </ul>
                  </div>
                    
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right" >Submit Return</button>
            </div>
          </form>

          <?php

            $saveSale = new ControllerLoaner();
            $saveSale -> ctrLoanerReturn();
            
          ?>

        </div>

      </div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectjs').select2();
});
</script>

