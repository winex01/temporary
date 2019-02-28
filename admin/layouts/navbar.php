<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img src="../img/boatlogo.png" height="50" width="50"> &nbsp;
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="#" style="font-family:Helvetica; font-size: 30px;">Admin Panel</a></li>
			</ul>

			<ul class="nav navbar-nav" style="font-family:Helvetica;">
			    
				<li>
					<a href="dashboard.php" style="font-family:Helvetica;">Dashboard</a>
				</li>

				<li>
					<a href="index.php" style="font-family:Helvetica;">Movie List</a>
				</li>
				
				<li>
					<a href="reservation.php"style="font-family:Helvetica;">&nbsp &nbsp View Reservations</a>
				</li>

				<li>
					<a href="viewsuggestions.php"style="font-family:Helvetica;">&nbsp &nbsp View Suggestions</a>
				</li>

				<li>
					<a href="manageusers.php"style="font-family:Helvetica;">&nbsp &nbsp View Users</a>
				</li>
			
				<li>
					<a href="../chatsupport/index.php"style="font-family:Helvetica;">&nbsp &nbsp Live Support</a>
				</li>

				<?php require_once('layouts/notification.php') ?>

				<li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" style="font-family:Helvetica;" href="#"><?php echo $_SESSION['usr']; ?>
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <!-- <li><a data-toggle="modal" href='#modal-change-pass' style="font-family:Helvetica;">Change Password</a></li> -->
			          <li><a href="../adminlogout.php" style="font-family:Helvetica;">Log-out</a></li>
			        </ul>
		      	</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right" style="font-family:Helvetica;">
				
			
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>

	