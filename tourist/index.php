<?php include_once('layouts/header.php') ?>
<?php include_once('layouts/navbar.php') ?>

<?php 
	if (isset($_SESSION['visit'])) {
		$dashboard->increment_visit();
	}
 ?>

		
<div class="container-fluid">
	

	<!-- search box -->
	<?php require_once('layouts/search.php') ?>
	<!-- end search box -->

	<?php 
		$params = ( isset($_POST['search']) && !empty($_POST['search']) ) ? $_POST['search'] : null;
		$res = $movies->get_movies($params);
	?>

	<?php require_once('layouts/movies.php') ?>	
</div>

<?php include_once('layouts/modal.php') ?>
<?php include_once('layouts/footer.php') ?>