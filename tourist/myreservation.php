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
		<title>Bookings</title>
		<link rel="icon" href="../websiteicon.png"/>

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
							<li><a href="#" style="font-family:Helvetica; font-size: 30px;">Welcome to FC Movie House</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family:Helvetica;" >
							<li>
								<a href="index.php"style="font-family:Helvetica;">Home</a>
							</li>
							<li  class="active">
								<a href="myreservation.php"style="font-family:Helvetica;">My Bookings</a>
							</li>
							<li>
								<a href="../userlogout.php"style="font-family:Helvetica;">Log-out</a>
							</li>
							<li><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUser:</h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION['usr']; ?></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family:Helvetica;">
							
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />
		<br />
		<br />
		<br />
		
		<!-- main cntent -->
		
		
 <div class="container">
			
			<br />
			<br />

			<?php
		// delete reserved
			if(isset($_GET['delr_id']))
				{
					$delrid = $_GET['delr_id'];
					$tid = $_SESSION['tourID'];

					$sql = "DELETE FROM reservation WHERE tour_id = ? AND r_id = ?";
					$res = $db->deleteRow($sql, [$tid, $delrid]);

						echo '
								<div class="alert alert-success">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Success!</strong> Cancel Reservation Successfully.
								</div>
							';
							// header('Location: myreservation.php');
				}
		 ?>

		 <br />
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th><center>MOVIE POSTER</center></th>
					<th>MOVIE NAME</th>
					<th>DIRECTOR</th>
					
					<th>DATE</th>
					<th>TIME</th>
					<th>PRICE</th>
					<th>ACTION</th>
				</thead>
				<tbody>
					<?php 
			$tid = $_SESSION['tourID'];
			$sql = "SELECT * FROM reservation r INNER JOIN movie b ON b.b_id = r.b_id
			INNER JOIN user t ON t.tour_id = r.tour_id
			WHERE t.tour_id = ? ";
			$res = $db->getRows($sql, [$tid]);

			// echo print_r($res);

			foreach ($res as  $r) {

				$r_id = $r['r_id'];
				$img = $r['b_img'];
				$bn = $r['moviename'];
				$bon = $r['director'];
				
				$bprice = $r['b_price'];
				$rdate = $r['r_date'];
				$rhr = $r['r_hr'];
				$rampm = $r['r_ampm'];

				$oras = $rhr.' '.$rampm;
		?>
					<tr>
						<td class="align-img"><center><img src="<?php echo $img; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
						
						<td class="align-img"><?php echo $rdate; ?></td>
						<td class="align-img"><?php echo $oras; ?></td>
						<td class="align-img"><?php echo 'Php '.number_format($bprice, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-danger  btn-xs" href="myreservation.php?delr_id=<?php echo $r_id; ?>">
								Cancel Reservation
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php
			}//end foreach loop of display all resevdbation


		?>



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


		
		<!-- main cntent -->

	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		    <!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>






</html>



<?php 
$db->Disconnect();
?>