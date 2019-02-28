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

	<?php require_once('layouts/movies.php') ?>
</div>

<?php include_once('layouts/modal.php') ?>
<?php include_once('layouts/footer.php') ?>