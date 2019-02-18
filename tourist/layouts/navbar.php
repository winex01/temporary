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
			<img src="../img/boatlogo.png" height="40" width="40"> &nbsp;
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="#" style="font-family: Helvetica; font-size: 30px;">FC Movie House</a></li>
			</ul>

			<ul class="nav navbar-nav" style="font-family: Times New Roman;">
				<li><a href="index.php" style="font-family:Helvetica;">Home</a></li>
				<li><a href="myreservation.php" style="font-family:Helvetica;">My Bookings</a></li>
				<li><a href="romance2.php"style="font-family:Helvetica;">Romance</a></li>
				<li><a href="horror2.php"style="font-family:Helvetica;">Horror</a></li>
				<li><a href="action2.php"style="font-family:Helvetica;">Action</a></li>
				<li><a href="scifi2.php"style="font-family:Helvetica;">Sci-Fi</a></li>
		     	<li><a href="comedy2.php"style="font-family:Helvetica;">Comedy</a></li>

				<li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" style="font-family:Helvetica;" href="#"><?php echo $_SESSION['usr']; ?>
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="../userlogout.php" style="font-family:Helvetica;">Log-out</a></li>
			        </ul>
		      	</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>

	<br/>
	<br/>
	<br/>
	<br/>