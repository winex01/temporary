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

	<div style="margin-bottom: 160px;"></div>			

	<div class="container">
		<div class="row">

	      <div class="col-lg-3">
	        <div class="panel panel-info">
	          <div class="panel-heading">
	            <div class="row">
	              <div class="col-xs-6">
	                <i class="fa fa-address-card-o fa-5x"></i>
	              </div>
	              <div class="col-xs-6 text-right">
	                <p class="announcement-heading"><?= $dashboard->total_reservations() ?></p>
	                <p class="announcement-text">Reservations</p>
	              </div>
	            </div>
	          </div>
	          <a href="reservation.php">
	            <div class="panel-footer announcement-bottom">
	              <div class="row">
	                <div class="col-xs-6">
	                  Expand
	                </div>
	                <div class="col-xs-6 text-right">
	                  <i class="fa fa-arrow-circle-right"></i>
	                </div>
	              </div>
	            </div>
	          </a>
	        </div>
	      </div>


	      <div class="col-lg-3">
	        <div class="panel panel-warning">
	          <div class="panel-heading">
	            <div class="row">
	              <div class="col-xs-6">
	                <i class="fa fa-barcode fa-5x"></i>
	              </div>
	              <div class="col-xs-6 text-right">
	                <p class="announcement-heading"><?= $dashboard->total_movies() ?></p>
	                <p class="announcement-text"> Movies</p>
	              </div>
	            </div>
	          </div>
	          <a href="index.php">
	            <div class="panel-footer announcement-bottom">
	              <div class="row">
	                <div class="col-xs-6">
	                  Expand
	                </div>
	                <div class="col-xs-6 text-right">
	                  <i class="fa fa-arrow-circle-right"></i>
	                </div>
	              </div>
	            </div>
	          </a>
	        </div>
	      </div>


	      <div class="col-lg-3">
	        <div class="panel panel-danger">
	          <div class="panel-heading">
	            <div class="row">
	              <div class="col-xs-6">
	                <i class="fa fa-users fa-5x"></i>
	              </div>
	              <div class="col-xs-6 text-right">
	                <p class="announcement-heading"><?= $dashboard->total_users() ?></p>
	                <p class="announcement-text">Users</p>
	              </div>
	            </div>
	          </div>
	          <a href="manageusers.php">
	            <div class="panel-footer announcement-bottom">
	              <div class="row">
	                <div class="col-xs-6">
	                  Expand
	                </div>
	                <div class="col-xs-6 text-right">
	                  <i class="fa fa-arrow-circle-right"></i>
	                </div>
	              </div>
	            </div>
	          </a>
	        </div>
	      </div>


	      <div class="col-lg-3">
	        <div class="panel panel-success">
	          <div class="panel-heading">
	            <div class="row">
	              <div class="col-xs-6">
	                <i class="fa fa-tv fa-5x"></i>
	              </div>
	              <div class="col-xs-6 text-right">
	                <p class="announcement-heading"><?= $dashboard->total_visits() ?></p>
	                <p class="announcement-text">Website Visits</p>
	              </div>
	            </div>
	          </div>
	          <a href="#">
	            <div class="panel-footer announcement-bottom">
	              <div class="row">
	                <div class="col-xs-6">
	                  Not Expandable
	                </div>
	                <div class="col-xs-6 text-right">
	                  <i class="fa fa-arrow-circle-right"></i>
	                </div>
	              </div>
	            </div>
	          </a>
	        </div>
	      </div>


	    </div><!-- /.row -->
    </div>

<?php require_once('layouts/footer.php') ?>

</body>
</html>



<?php 
$db->Disconnect();
