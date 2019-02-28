<?php 
	require_once('../config.php');//database
	require_once('layouts/header.php'); 
	require_once('layouts/navbar.php');
	
	$db = new Database();
	$notification = new Notification();
?>

 <div class="container">
			
			<br />
			<br />

			<?php
			// delete reserved
			if(isset($_GET['delr_id']) && isset($_GET['confirm'])){
				$delrid = $_GET['delr_id'];
				$tid = $_SESSION['tourID'];

				$notification->insert_admin($delrid, 'cancelled');

				$sql = "DELETE FROM reservation WHERE tour_id = ? AND r_id = ?";
				$res = $db->deleteRow($sql, [$tid, $delrid]);

					echo '
							<div class="alert alert-success">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Notification:</strong> Reservation has been cancelled.
							</div>
						';
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
				<a href="<?= (isset($_GET['delr_id'])) ? 'myreservation.php?delr_id='.$_GET['delr_id'].'&confirm=t' : '#' ?>" class="btn btn-danger">Yes</a>
			</div>
		</div>
	</div>
</div>


<?php include_once('layouts/footer.php') ?>

<script type="text/javascript">
	<?php if (isset($_GET['delr_id']) && !isset($_GET['confirm'])): ?>
		$('#modal-confirm-delete').modal();
	<?php endif; ?>
</script>

<?php 
$db->Disconnect();
