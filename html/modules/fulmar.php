<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Fulmar RD Loaners

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">FR Loaners</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">
          Add Loaner
        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr> 
             <th style="width:10px">#</th> 
             <th>Serial</th>
             <th>CB Name</th>
             <th>cur User</th>
             <th>Last User</th>
             <th>is working</th>  
             <th>Status</th>
             <th>last issued</th>
             <th>last replaced</th>
             <th>times repaired</th>
             <th>times replaced</th>

           </tr>  
          </thead> 
          <tbody> 
             <?php

              $item = null; 
              $value = null;
              $msloan = "fr_loaners";
              $loan = ControllerProducts::ctrShowProductsToo($msloan, $item, $value);

               //var_dump($hsloan);
            
              foreach ($loan as $key => $value) {

                echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["loaner_serial"].'</td>
                    <td>'.$value["cb_name"].'</td>
                    <td>'.$value["c_user"].'</td>
                    <td>'.$value["last_user"].'</td>
                    <td>'.$value["is_working"].'</td>';

                    if($value["status"] != 0){

                      echo '<td><button class="btn btn-success  btnActivate btn-xs"userId="'.$value["id"].'" disabled="disabled" userStatus="0">avalible</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btnActivate btn-xs"userId="'.$value["id"].'"disabled="disabled"  userStatus="1">out</button></td>';
                    }
                    
                    echo '<td>'.$value["last_issued"].'</td>
                          <td>'.$value["last_replaced"].'</td>
                          <td>'.$value["times_repaired"].'</td>
                          <td>'.$value["times_replaced"].'</td>

                    <td>

                    </td>

                  </tr>';
              }

            ?>
          </tbody>

        </table>

      </div>
    
    </div>

  </section>

</div>





<!--=====================================
=            module add Loaner            =
======================================-->

<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/formdata">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Add Loaner</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input CB Serial Name -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newSerial" placeholder="Add Serial" required>

              </div>

            </div>

            <!-- input CB Name -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" name="newcbName" placeholder="Add CB Name" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save</button>

        </div>

      </form>
        <?php

          $createProduct = new ControllerProducts();
          $createProduct -> ctrCreateProducts();

        ?> 
    </div>

  </div>

</div> 
<!--====  End of module add user  ====-->
<!--=====================================
EDIT PRODUCT
======================================-->

<div id="modalEditProduct" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit product</h4>

        </div>

        <!--=====================================
         BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- INPUT FOR THE CODE -->          
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editCode" name="editSerial" readonly required>

              </div>

            </div>

            <!-- INPUT FOR THE DESCRIPTION -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editDescription" name="editcbName" required>

              </div>

            </div>


            </div>

          </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save changes</button>

        </div>

      </form>

        <?php

          $editProduct = new controllerProducts();
          $editProduct -> ctrEditProduct();

        ?>      

    </div>

  </div>

</div>

<?php

  $deleteProduct = new controllerProducts();
  $deleteProduct -> ctrDeleteProduct();

?>
