<header class="main-header">
	<!--==========================
	=            logo            =
	===========================-->
	<a href="" class="logo">
		
		<!-- mini logo -->

		<span class="logo-mini">

			<img class="img-responsive" src="views/img/template/logo.png" style="padding: 10px" >

		</span>

		<!-- logo -->

		<span class="logo-lg">

			<img class="img-responsive" src="views/img/template/logonametwo.png" style="padding: 10px 0" >

		</span>

	</a>
	
	<!--=====================================
	=            navigation         =
	======================================-->
	
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Navigation button -->

		<a class="sidebar-toggle" data-toggle="push-menu" role="button" href="#">

			<span class="sr-only">Toggle Navigation</span>

		</a>

		<!-- User Profile -->

		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">

					<a class="dropdown-toggle" data-toggle="dropdown" href="#">

						<?php 
								echo '<img class="user-image" src="views/img/users/default/anonymous.png">'; 
						?>
						
						<span class="hidden-xs"><?php echo $_SESSION["name"]; ?></span>

					</a>

					<!-- dropdown toggle -->

					<ul class="dropdown-menu">

						<li class="user-body">

							<div class="pull-right">

								<a class="btn btn-default btn-flat" href="logout">Logout</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>
			
		</div>
		
	</nav>
	
</header>