\<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">
		<?php
				echo '
				<li class="active">

				<a href="home">

					<i class="fa fa-home"></i>

					<span>Home</span>

				</a>

			</li>';
			if ($_SESSION["profile"] == "administrator") {
			echo '
				<li>

				<a href="users">

					<i class="fa fa-user"></i>

					<span>User management</span>

				</a>

			</li>

                                <li>

                                <a href="hissearch">

                                        <i class="fa fa-user"></i>

                                        <span>Search calls</span>

                                </a>

                        </li>
                         <li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>Loaner Actions</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
 
			<li>

				<a href="techrepair">

					<i class="fa fa-user"></i>

					<span>Tech Repair Email</span>

				</a>

			</li>

			<li>

				<a href="techemails">

					<i class="fa fa-user"></i>

					<span>Tech List</span>

				</a>

			</li>
			<li>

				<a href="techupdate">

					<i class="fa fa-user"></i>

					<span>Repair Update</span>

				</a>

			</li>
</ul>
</li>';
			}

			if($_SESSION["profile"] == "administrator" || $_SESSION["profile"] == "clc" || $_SESSION["profile"] == "principal"){

				echo '

			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>Loaner Actions</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
 
			<li>

				<a href="loanermisuse">

					<i class="fa fa-user"></i>

					<span>Loaner Misuse</span>

				</a>

			</li>



			<li>

				<a href="loanergiveout">

					<i class="fa fa-user"></i>

					<span>Loaner Checkout</span>

				</a>

			</li>

			<li>

				<a href="loanerReturn">

					<i class="fa fa-user"></i>

					<span>Loaner Return</span>

				</a>

			</li>
			<li>

				<a href="loanerswap">

					<i class="fa fa-user"></i>

					<span>Loaner Swap</span>

				</a>

			</li>

			<li>

				<a href="deacreac">

					<i class="fa fa-user"></i>

					<span>Deactivate or Reactivate</span>

				</a>

			</li>


				</ul>

			</li>';
			}

			if($_SESSION["profile"] == "administrator"){

				echo '
			<li>

				<a href="categories">

					<i class="fa fa-th"></i>

					<span>prefix</span>

				</a>

			</li>';
			}

			if($_SESSION["profile"] == "administrator" || $_SESSION["profile"] == "clc" || $_SESSION["profile"] == "principal"){

				echo '
			<li>
			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>Schools</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="falls">

							<i class="fa fa-circle"></i>

							<span>Falls</span>

						</a>

					</li>

					<li>

						<a href="austin">

							<i class="fa fa-circle"></i>

							<span>Austin Rd</span>

						</a>

					</li>

					<li>

						<a href="fulmar">

							<i class="fa fa-circle"></i>

							<span>Fulmar Rd</span>

						</a>

					</li>

					<li>

						<a href="lakeview">

							<i class="fa fa-circle"></i>

							<span>Lakeview</span>

						</a>

					</li>

					<li>

						<a href="middleschool">

							<i class="fa fa-circle"></i>

							<span>Middle School</span>

						</a>

					</li>

					<li>
						<a href="highschool">

							<i class="fa fa-circle"></i>

							<span>High School</span>

						</a> 
					</li>  
				</ul>

			</li> 
			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>clc reports</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="insstat">

							<i class="fa fa-circle"></i>

							<span>Insurance Check</span>

						</a>

					</li>
			<li>

				<a href="loanerstats">

					<i class="fa fa-circle"></i>

					<span>Loaner History</span>

				</a>

			</li>
		</li>';
		}

	echo '</ul>

	</li>';

		?>
</section>
	
</aside>
