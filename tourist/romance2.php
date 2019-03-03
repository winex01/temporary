<?php include_once('layouts/header.php') ?>
<?php include_once('layouts/navbar.php') ?>

		
<div class="container-fluid">
  <!-- end of container-fluid is in layouts/movies -->
  <div class="well">
    <h3>NEWLY RELEASED MOVIES!</h3>
  </div>

<?php 
require_once('layouts/search.php'); # searchbox

$params = ( isset($_POST['search']) && !empty($_POST['search']) ) ? $_POST['search'] : null;
$res = $movies->get_movies($params, 'romance');

require_once('layouts/movies.php');
include_once('layouts/modal.php');
include_once('layouts/footer.php');