<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Austin RD Loaners

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Austin RD Loaners</li>

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
              $msloan = "ar_loaners";
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

            <!--Input Loaner Name -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newName" placeholder="Add name" required>

              </div>

            </div>

            <!-- input username -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" name="newUser" placeholder="Add username" required>

              </div>

            </div>

            <!-- input password -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" name="newPasswd" placeholder="Add password" required>

              </div>

            </div>

            <!-- input profile -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Select profile</option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- input password -->

            <div class="form-group">

              <div class="panel">Upload image</div>

              <input id="newPhoto" type="file" name="newPhoto">

              <p class="help-block">Maximum size 200Mb</p>

              <img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="100px">

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

    </div>

  </div>

</div>

<!--====  End of module add user  ====-->
