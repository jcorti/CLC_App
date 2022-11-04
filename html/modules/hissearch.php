<?php 
$selectSchool = $_SESSION["school"];
if($selectSchool == "all"){
  $selectSchool = 'ms';
}    
$test = strtoupper($selectSchool);
 var_dump($test);       

          
?>

<script type="text/javascript">

  function ddSelect()
  {
    var d = document.getElementById("newSerial").value; 
    document.getElementById("textvl").value = d;
  } 

$(function() {
    $("#skill_input").autocomplete({
        source: "fetchData.php",
    });
});


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

     Search History

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Loaner Checkout</li>

    </ol>

  </section>


  <section class="content">

    <div class="row">
      
                    
    
      <!--=============================================
      THE FORM
      =============================================-->
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">

          <div class="box-header with-border"></div>


            <div class="box-body">
                
                <div class="box">

                    <!--=====================================
                     =              CLC INPUT               =
                     ======================================-->

 <form role="form" method="post" class="saleForm" name = "myform">
 
 
                    <!--=====================================
                    =            School Select              =
                    ======================================-->
                  
                    
                    <div class="form-group">
                      <div class="input-group"> 
                        <br>
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                        <label>What are you looking up</label>
                        <select class="form-control" name="selectType" id="selectType" >      
                            <option value="">Select A Type</option>
                            <option value="serial">serial</option>
                            <option value="email">email</option> 
                        </select>

                      </div>

                    </div>


                    <!--=====================================
                    =            Old Serial                 =
                    ======================================-->
                    <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                        
                        <label>Please enter email</label> 
                        <br />
           
                        <input type="email" class="form-control" name="userName" id="userName" style="display: none;"/>  
                      </div> 
                    </div>
 
                    <div class="form-group">

                      <div class="input-group">
                        <br> 
                        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                        <label>Please enter the serial</label>
                        <input type="text" class="form-control" name="oldSerial" id="oldSerial" style="display: none;"/>  
                      </div>


                    </div> 

                   
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right" >Search</button>
            </div> 
          </form>
</div>
</div>

              </div>
              <br /><br /><br />
 
  <script type="text/javascript">
$(document).ready(function () {
        $('#selectType').change(function () {
            if ($('#selectType').val() == 'serial') {
                $('#oldSerial').show();
            }
            else {
                $('#oldSerial').hide();
            }
            if ($('#selectType').val() == 'email') {
                $('#userName').show();
            }
            else {
                $('#userName').hide();
            }
        });
    });
</script>
          <?php

            $saveSale = new ControllerLoaner();
            $saveSale -> ctrCheckStudent();
            
          ?>
              </div>  
 
      <!--=============================================
      =            PRODUCTS TABLE                   =
      =============================================-->


       
  </section>

</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectjs').select2();
});
</script>
