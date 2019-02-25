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

			
		 <br />
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>USER EMAIL</th>
					<th>POSTER</th>
					<th>MOVIE NAME</th>
					
					<th><center>RESERVATION DATE</center></th>
					<th>RESERVATION TIME</th>
					
					
					
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
						
					</tr>
					<?php
			}//end foreach loop of display all resevdbation


		?>



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