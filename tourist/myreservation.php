<?php 
	include_once('../config.php');//database
	include_once('layouts/header.php'); 
	include_once('layouts/navbar.php');
	
	$db = new Database();
?>

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

<?php include_once('layouts/footer.php') ?>

<?php 
$db->Disconnect();
?>