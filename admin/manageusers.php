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
		
		
		 <div class="container">
		     
				
			
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>USER ID</th>
					<th>FIRST NAME</th>
					<th>LAST NAME</th>
					<th>EMAIL</th>
					<th>CONTACT</th>
					<th>VERIFIED/UNVERIFIED</th>
					<th>CREATED</th>
					
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM user ORDER BY tour_id";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$tid = $row['tour_id'];
							$name = $row['name'];
							$lastname = $row['lastname'];
							$email = $row['tour_un'];
							$verify = $row['verify'];
							$contactnumber = $row['contactnumber'];
							$datecreated = $row['datecreated'];
							;
						

					?>
					<tr>
						<td class="align-img"><?php echo $tid; ?></td>
						<td class="align-img"><?php echo $name; ?></td>
						<td class="align-img"><?php echo $lastname; ?></td>
						<td class="align-img"><?php echo $email; ?></td>
						<td class="align-img"><?php echo $contactnumber; ?></td>
						<td class="align-img"><?php echo $verify; ?></td>
						<td class="align-img"><?php echo $datecreated; ?></td>
						
												
					</tr>
					<?php } ?>

				</tbody>
			</table>

		 </div>

			
	<?php require_once('layouts/footer.php') ?>

    <script>
		//script for pagination
		$(document).ready(function(){
		    $('#myTable').dataTable();
		});
    </script>

	</body>
</html>



<?php 
$db->Disconnect();
?>