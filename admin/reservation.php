<?php 

	include_once('../config.php');//database
	$db = new Database();

?>

<?php require_once('layouts/header.php') ?>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }

		td.align-img {
			line-height: 3 !important;
		}
	</style>

	<body>

		<?php require_once('layouts/navbar.php') ?>

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
			if(isset($_GET['delr_id']) && isset($_GET['confirm'])){
				$delrid = $_GET['delr_id'];

				$sql = "DELETE FROM reservation WHERE r_id = ?";
				$res = $db->deleteRow($sql, [$delrid]);

					echo '
							<div class="alert alert-success">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Notification:</strong> Reservation has been cancelled.
							</div>
						';
						// header('Location: myreservation.php');
			}
		 ?>

			
		 <br />
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>USER EMAIL</th>
					<th>POSTER</th>
					<th>MOVIE NAME</th>
					
					<th><center>RESERVATION DATE</center></th>
					<th>RESERVATION TIME</th>
					<th>ACTION</th>
					
					
					
				</thead>
				<tbody>
					<?php 
			$sql = "SELECT * FROM reservation r INNER JOIN movie b ON b.b_id = r.b_id
			INNER JOIN user t ON t.tour_id = r.tour_id
			";
			$res = $db->getRows($sql);

			// echo print_r($res);

			foreach ($res as  $r) {

				$r_id = $r['r_id'];
				$email = $r['tour_un'];
				
			
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
						<td class="align-img"><?php echo $email; ?></td>
						
						<td class="align-img"><img src="<?php echo $img; ?>" width="100" height="100"></td>
						
						<td class="align-img"><?php echo $bon; ?></td>
						
						<td class="align-img"><?php echo $rdate; ?></td>
						<td class="align-img"><?php echo $oras; ?></td>

						<td class="align-img">
							<a class = "btn btn-danger  btn-xs" href="reservation.php?delr_id=<?php echo $r_id; ?>">
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


<div class="modal fade" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-danger">Confirm Cancellation</h4>
			</div>
			<div class="modal-body">
				<h4 class="text-danger">Are you sure you want to cancel reservation?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<a href="<?= (isset($_GET['delr_id'])) ? 'reservation.php?delr_id='.$_GET['delr_id'].'&confirm=t' : '#' ?>" class="btn btn-danger">Yes</a>
			</div>
		</div>
	</div>
</div>

	
	<?php require_once('layouts/footer.php') ?>			

    <script>
		//script for pagination
		$(document).ready(function(){
		    $('#myTable').dataTable();
		});

		<?php if (isset($_GET['delr_id']) && !isset($_GET['confirm'])): ?>
			$('#modal-confirm-delete').modal();
		<?php endif; ?>
    </script>

	</body>

</html>



<?php 
$db->Disconnect();
?>