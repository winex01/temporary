<?php 

	include_once('../config.php');//database
	$db = new Database();

?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Suggestions</title>
		<link rel="icon" href="websiteicon.png"/>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

		 <!--pagination-->
	    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
	    <script src="../bootstrap/	js/jquery.dataTables2.js"></script>


	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }

		td.align-img {
			line-height: 3 !important;
		}
	</style>

	<body>

		<!-- begin whole content -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only"style="font-family: Helvetica;">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/boatlogo.png" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Helvetica; font-size: 30px;">Admin Panel</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
						     <li>
								<a href="index.php"style="font-family:Helvetica;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Movies List</a>
							</li>
							
							
							
							<li>
								<a href="reservation.php"style="font-family:Helvetica;">&nbsp &nbsp View Reservations</a>
							</li>
							
							<li class="active">
								<a href="#"style="font-family:Helvetica;">View Users</a>
							</li>
							<li>
								<a href="../chatsupport/index.php"style="font-family:Helvetica;">&nbsp &nbsp Live Support</a>
							</li>
							<li>
								<a href="../adminlogout.php"style="font-family:Helvetica;">&nbsp &nbsp Log-out</a>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Helvetica;">
							
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />
		<br />
		<br />
		<br />
		
		


		 <div class="container">
		     
				
			
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>NAME</th>
					<th>EMAIL</th>
					<th>SUGGESTION/CONCERNS</th>
				
					
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM suggestions ORDER BY suggestionid";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$name = $row['name'];
							$email = $row['email'];
							$message = $row['message'];
						   
							;
						

					?>
					<tr>
						<td class="align-img"><?php echo $name; ?></td>
						<td class="align-img"><?php echo $email; ?></td>
						<td class="align-img"><?php echo $message; ?></td>
						
						
												
					</tr>
					<?php } ?>

				</tbody>
			</table>

		 </div>

			
		<!-- main cntent -->

	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		    <!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>


    <script>
//script for pagination
$(document).ready(function(){
    $('#myTable').dataTable();
});
    </script>


</html>



<?php 
$db->Disconnect();
?>