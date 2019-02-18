<?php include_once('layouts/header.php') ?>
<?php include_once('layouts/navbar.php') ?>

		
<div class="container-fluid">
	<div class="well">
		<h3>NEWLY RELEASED MOVIES!</h3>
	</div>

	<!-- search box -->
	<?php require_once('layouts/search.php') ?>
	<!-- end search box -->

	<?php 
		$params = ( isset($_POST['search']) && !empty($_POST['search']) ) ? $_POST['search'] : null;
		$res = $movies->get_movies($params, 'comedy');
	?>

	<?php if ($res): ?>
		<?php foreach ($res as $r): ?>
			<?php 
				$b_id = $r['b_id'];
		  		$bImage = $r['b_img'];
			 ?>
			 <center>
			 	<div class="col-lg-3 col-md-4 col-sm-6">
					<a href="#"  data-toggle="modal" data-target="#myModal<?php echo $b_id; ?>">
						<img class="img-rounded" src="<?php echo $bImage;?>" height="350" width="350">
		  			</a>
			 	</div>
			 </center>
		<?php endforeach; ?>
	<?php else: ?>
		No result.
	<?php endif; ?>
</div>

<?php include_once('layouts/modal.php') ?>
<?php include_once('layouts/footer.php') ?>