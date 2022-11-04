<div class="content-wrapper">

  <section class="content-header"> 
    <h1> 
      Homepage
    </h1> 
    <ol class="breadcrumb"> 
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">CB report</li> 
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="input-group">

          <button type="button" class="btn btn-default" id="daterange-btn2">

            <span>
              <i class="fa fa-calendar"></i> Date range
            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>
	<div class="box-body">
	       <div class="row">

          <div class="col-xs-12">
            
            <?php

            include "reports/callgraph.php";

            ?>

           <div class="col-md-6 col-xs-12">
             
            <?php

            include "reports/mostwanted.php";

            ?>

          </div>    
          <div class="col-md-6 col-xs-12">

            <?php

            include "reports/princeauth.php";

            ?>

          </div>    
           <div class="col-md-6 col-xs-12">
             
            <?php

            include "reports/typepie.php";

            ?>

          </div>    

           <div class="col-md-6 col-xs-12">

            <?php
		if($_SESSION["profile"] =="principal" ||$_SESSION["profile"] =="administrator"  ){
           // include "reports/mostcalls.php";
}

            ?>

          </div>    
 
          <div class="col-md-6 col-xs-12">

            <?php
		if($_SESSION["profile"] =="principal"){
            include "reports/typepie.php";
}

            ?>

          </div>               
        </div>

      </div>

    </div>

  </section>
 
 </div>
</div>
