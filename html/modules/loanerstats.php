<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Loaner History

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border"> 
        <button type="button" class="btn btn-default pull-right" id="daterange-btn2">
           
            <span>
              <i class="fa fa-calendar"></i> Date Range
            </span>

            <i class="fa fa-caret-down"></i>

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Student</th>
             <th>loaner Name</th>
             <th>CB</th>
             <th>Has Insurance</th>
             <th>Cosmetic Issues</th>
             <th>Date of issue</th>  
             <th>Damage Catagorys</th>
             <th>Returned</th> 

                                                                                                                      
           </tr> 

          </thead>

          <tbody>

          <?php

            if(isset($_GET["initialDate"])){

              $initialDate = $_GET["initialDate"];
              $finalDate = $_GET["finalDate"];

            }else{

              $initialDate = null;
              $finalDate = null;

            }

            $answer = ControllerLoaner::ctrLoanerDatesRange($initialDate, $finalDate);

            foreach ($answer as $key => $value) {
           

            echo '
                <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["s_user"].'</td>
                  <td>'.$value["loaner_serial"].'</td>
                  <td>'.$value["old_serial"].'</td>
                  <td>'.$value["has_ins"].'</td>
                  <td>'.$value["cosmetic"].'</td>
                  <td>'.$value["occurrence"].'</td> 
                  <td>'.$value["damage_type"].'</td>
                  <td>'.$value["is_returned"].'</td> 
                </tr>'; 
            }

        ?> 
          </tbody>

        </table> 
      </div>
    
    </div>

  </section>

</div>
