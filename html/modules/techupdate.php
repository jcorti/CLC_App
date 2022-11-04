<?php 
$selectSchool = $_SESSION["school"];
if($selectSchool == "all"){
  $selectSchool = 'ms';
}  
  
?>

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

      Tech Fees

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Tech Fees</li>

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
                                      $answer = ControllerLoaner::ctrShowRepair();
                                      var_dump('expression');
                                      echo "<option value=''>Select Student</option>";
                                      foreach ($answer as $key => $value) { 
                                        echo"<option value='".$value['emails']."'>".$value['emails']."</option>";
                                       
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
                        <label>Please enter parent Email</label>
                        <input type="text" class="form-control" name="oldSerial" id="oldSerial"required>
                    
                        <input type="hidden" name="selectSchool" id="school" value="<?php echo $_SESSION["school"]; ?>">

                      </div>
                      </div>


                    </div>

                    <div class="form-group"> 

                       <div class="input-group"><br>
                        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                        <label>Notes</label>
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
            </div>  
        </div>  


          </form>
          <?php

            $saveSale = new ControllerLoaner();
            $saveSale -> ctrCheckout();

          ?>
 </section>
        </div> </div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectjs').select2();
});
</script>

