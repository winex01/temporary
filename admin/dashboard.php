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
    
	    <div class="row">
	    	<div class="col-md-6">
	    		<div id="reservation"></div>
	    	</div>
	    	<div class="col-md-6">
	    		<div id="genre"></div>
	    	</div>
	    </div>

	    <div class="row">
    		<div id="top_x_div2"></div>
	    </div>

	    <div style="margin-bottom: 100px;"></div>

	    <div class="row">
			<div id="top_x_div"></div>
	    </div>
    </div>


    <div style="margin-bottom: 200px;"></div>


<?php //dump($user->reservations()) ?>

<?php require_once('layouts/footer.php') ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Movies', 'Genre'],
  <?php foreach($movies->genres()  as $key => $data): ?>
  	['<?= $key ?>', <?= $data ?>],
  <?php endforeach; ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Movie\'s Genre', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('genre'));
  chart.draw(data, options);
}




// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart2);

function drawChart2() {
  var data = google.visualization.arrayToDataTable([
  ['Users', 'Reservation'],
  <?php foreach($user->reservations()  as $key => $data): ?>
  	['<?= $key ?>', <?= $data ?>],
  <?php endforeach; ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'User\'s Reservation', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('reservation'));
  chart.draw(data, options);
}


// bar movies genre
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
var data = new google.visualization.arrayToDataTable([
  ['Movies', 'Genre'],
  <?php foreach($movies->genres()  as $key => $data): ?>
  	['<?= $key ?>', <?= $data ?>],
  <?php endforeach; ?>
]);

var options = {
  title: 'Movie\'s Genre',
  height: 500,
  legend: { position: 'none' },
  chart: { title: 'Movie\'s Genre',
           subtitle: 'popularity by percentage' },
  bars: 'horizontal', // Required for Material Bar Charts.
  axes: {
    x: {
      0: { side: 'top', label: 'Percentage'} // Top x-axis.
    }
  },
  bar: { groupWidth: "90%" }
};

var chart = new google.charts.Bar(document.getElementById('top_x_div'));
chart.draw(data, options);
};


google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff2);


// bar users reservation
function drawStuff2() {
var data = new google.visualization.arrayToDataTable([
  ['Users', 'Reservation'],
  <?php foreach($user->reservations()  as $key => $data): ?>
  	['<?= $key ?>', <?= $data ?>],
  <?php endforeach; ?>
]);

var options = {
  title: 'User\'s Reservation',
  height: 500,
  legend: { position: 'none' },
  chart: { title: 'User\'s Reservation',
           subtitle: 'popularity by percentage' },
  bars: 'horizontal', // Required for Material Bar Charts.
  axes: {
    x: {
      0: { side: 'top', label: 'Percentage'} // Top x-axis.
    }
  },
  bar: { groupWidth: "90%" }
};

var chart = new google.charts.Bar(document.getElementById('top_x_div2'));
chart.draw(data, options);
};
</script>

</body>
</html>



<?php 
$db->Disconnect();
