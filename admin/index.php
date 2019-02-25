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
		<?php 
			//para delete
			if(isset($_GET['delid']) && isset($_GET['confirm'])){
				$bid = $_GET['delid'];

				// add to notification before completely delete
				$notification->insert_delete_movie($bid);

				$sql = "DELETE FROM movie WHERE b_id = ? ";
				$res = $db->deleteRow($sql,[$bid]);

				$bimg = $_GET['bimg'];
				if($bimg != '../boat_image/'.'default.png'){
					unlink($bimg);
				}
				// header('Location: index.php'$bimg.'.jpg'
			}
		?>


		 <div class="container">
			<a href="newboat.php" class="btn btn-success">
				Add New Movie
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
			<a href="../backupdb/index.php" class="btn btn-success">
				Backup ALL Records
				<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
			</a>
			<a href="../convertexcel/index.php" class="btn btn-success">
				View in Excel
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
			</a>
			<a href="../convertpdf/index.php" class="btn btn-success">
				View in PDF
				<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
			</a>
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>MOVIE NAME</th>
					<th>GENRE</th>
					<th>DIRECTOR</th>
					<th>CAST</th>
					<th>TRAILER</th>
					<th>DATE ADDED</th>
					<th>DATE RELEASED</th>
					<th><center>MOVIE POSTER</center></th>
					

					<th><center>ACTION</center></th>
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM movie ORDER BY datereleased";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$bid = $row['b_id'];
							$bn = $row['moviename'];
							$bcpcty = $row['genre'];
							$bon = $row['director'];
							$actor = $row['actor'];
							$bimg = $row['b_img'];
							$bPrice = $row['b_price'];
							$datereleased = $row['datereleased'];
							$youtubelink = $row['youtubelink'];
							$dateadded = $row['dateadded'];
						

					?>
					<tr>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bcpcty; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
						<td class="align-img"><?php echo $actor; ?></td>
						<td class="align-img"><?php echo $youtubelink; ?></td>
						<td class="align-img"><?php echo $dateadded; ?></td>
						<td class="align-img"><?php echo $datereleased; ?></td>
						
						<td class="align-img"><center><img src="<?php echo $bimg; ?>" width="150" height="150"></center></td>
						
						<td class="align-img">
							<a class = "btn btn-success btn-xs" href="boatsupdate.php?editid=<?php echo $bid; ?>">
								Edit
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a class = "btn btn-danger  btn-xs" href="index.php?delid=<?php echo $bid; ?>&bimg=<?php echo $bimg; ?>">
								Delete
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>

		 </div>


<div class="modal fade" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-danger">Confirm Delete</h4>
			</div>
			<div class="modal-body">
				<h4 class="text-danger">Are you sure you want to delete this movie?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<a href="<?= (isset($_GET['delid'])) ? 'index.php?delid='.$_GET['delid'].'&bimg='.$_GET['bimg'].'&confirm=t' : '#' ?>" class="btn btn-danger">Yes</a>
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

	<?php if (isset($_GET['delid']) && !isset($_GET['confirm'])): ?>
		$('#modal-confirm-delete').modal();
	<?php endif; ?>
</script>

</body>
</html>



<?php 
$db->Disconnect();
