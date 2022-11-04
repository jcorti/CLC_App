<?php 
$selectSchool = $_SESSION["school"];
if($selectSchool == "all"){
  $selectSchool = 'ms';
}  ?>

<script type="text/javascript">

  function ddSelect()
  {
    var d = document.getElementById("oldSerial").value; 
    document.getElementById("textvl").value = d;
  } 

  function ddSelectToo()
  {
    var d = document.getElementById("newSerial").value; 
    document.getElementById("textvls").value = d;
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

      Swap Loaner 

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Swap Loaner </li>

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

                         <table class="table">
                          
                          <thead>
                            
                            <th>CB Name</th>
                            <th>CB Loaner</th>

                          </thead>
                          <tbody>
                            
                            <tr>
                              
                              <td style="width: 50%">

                                <div class="input-group">
                                   
                                    <select class="form-control" name="oldSerial" id="oldSerial" onchange="ddSelect();" required>      
                                          
                                    <?php  
                                      $answer = ControllerLoaner::ctrShowLoanerName($selectSchool);
                                      echo "<option value=''>Select Loaner</option>";
                                      foreach ($answer as $key => $value) { 
                                        if($value['status'] == 0){
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
                                   
                                    <select class="form-control" name="newSerial" id="newSerial" onchange="ddSelectToo();" required>      
                                        
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
                                  
                                  <input type="text" class="form-control" name="txtvl" id="textvls" readonly>
 
                                  
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                </div>

                              </td>

                            </tr>

                          </tbody>

                        </table>
                         
                       

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


       
            </div>

          </div>


      </div>

    </div>

  </section>

</div>
 
