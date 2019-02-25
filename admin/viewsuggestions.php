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