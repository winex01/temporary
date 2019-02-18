<?php 
include_once('../config.php');
$db = new Database();
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
	    <div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=2023388327730496&autoLogAppEvents=1"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Booking Process</title>
		

		<!-- Bootstrap CSS -->
		<link rel="icon" href="../websiteicon.png"/>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
	    <script src="../bootstrap/	js/jquery.dataTables2.js"></script>

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>


	<body>

		<!-- begin whole content -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/boatlogo.png" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Helvetica; font-size: 30px;">FC Movie House</a></li>
						</ul>

			<ul class="nav navbar-nav" style="font-family: Times New Roman;">
			<li class="active">
			<a href="index.php" style="font-family:Helvetica;">Home</a>
			</li>
			<li>
	    	<a href="myreservation.php" style="font-family:Helvetica;">My Bookings</a>
			</li>
			<li>
			<a href="romance2.php"style="font-family:Helvetica;">Romance</a>
			</li>
			<li>
    		<a href="horror2.php"style="font-family:Helvetica;">Horror</a>
			</li>
			<li>
			<a href="action2.php"style="font-family:Helvetica;">Action</a>
			</li>
			<li>
			<a href="scifi2.php"style="font-family:Helvetica;">Sci-Fi</a>
			</li>
	     	<li>
			<a href="comedy2.php"style="font-family:Helvetica;">Comedy</a>
			</li>
			<li>
			<a href="../userlogout.php"style="font-family:Helvetica;">Log-out</a>
			</li>
			<li style="font-family:Helvetica;"><?php echo $_SESSION['usr']; ?></li>
		</ul>
		<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
						

			</ul>
	     	</div><!-- /.navbar-collapse -->
	    	</div>
			</nav>
		<!-- end -->
	
		
 		
	<br/>
	<br/>
	<br/>
	<br/>

		<div id ="info"  ></div>
<!-- begin content -->
	<div class="container-fluid">
			
		<div class="panel panel-info">
		  <div class="panel-heading">HORROR MOVIES</div>
		  <div class="panel-body">
		  	
		  	<!-- search box -->
			<?php require_once('layouts/search.php') ?>
			<!-- end search box -->

		  	<?php 
		  	$params = ( isset($_POST['search']) && !empty($_POST['search']) ) ? $_POST['search'] : null;
			$res = $movies->get_movies($params, 'horror');

		  	if($res){
		  	foreach ($res as $r) {
		  	$b_id = $r['b_id'];
	  		$bName = $r['moviename'];
	  		$bCap = $r['genre'];
	  		$bON = $r['director'];
	  		$actor = $r['actor'];
	  		$bImage = $r['b_img'];
	     	$bPrice = $r['b_price'];
	  		$datereleased = $r['datereleased'];
	  		$dateadded = $r['dateadded'];
	  		 	?>	
	  			<a href="#"  data-toggle="modal" data-target="#myModal<?php echo $b_id; ?>">
			<img class="img-rounded" src="<?php echo $bImage; ?>" height="350" width="350">
	  			</a>
 			<!-- Modal -->
				<div id="myModal<?php echo $b_id; ?>" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			  <!-- Modal content-->
			 <div class="modal-content">
		   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
		 </div>
		 <div class="modal-body">
		<div class="row">
	    <div class="col-md-6">
	    <img src="<?php echo $bImage; ?>" height="250" width="250">
		</div>
		
			<div class="col-md-6">
			<form>
			<strong>Movie Name: </strong><?php echo $bName; ?><br />
			<strong>Genre: </strong><?php echo $bCap; ?><br />
			<strong>Price: </strong><?php echo 'Php '.number_format($bPrice, 2); ?><br />
			<strong>Director: </strong><?php echo $bON; ?> <br />
			<strong>Cast: </strong><?php echo $actor; ?> <br />
			<strong>Date Added: </strong><?php echo $dateadded; ?> <br />
			<strong>Date Released: </strong><?php echo $datereleased; ?> <br />
			<br>
							      	
							      				
				<h4>---RESERVATION---</h4>
				<strong>Date of Reservation: </strong>&nbsp;
				<br/> 
				<input class="btn-default" id="rdate<?php echo $b_id; ?>" size="30" name="rdate" type="date" autocomplete="off">
				<br/>
				<strong>Time: </strong>
				<br/>
				<select class="btn-default" id="hr">
				<option value="9">9</option>
                <option value="12">12</option>
                <option value="3">3</option>
                <option value="6">6</option>
				</select>
				<select class="btn-default" id="ampm">
				<option value="AM">AM</option>
				<option value="PM">PM</option>
			    </select>
			    <div class="fb-comments" data-href="http://akimovies.online" data-width="30px" data-numposts="5"></div>
			    
	  <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fakimovies.online/tourist/index.php&layout=button_count&size=small&mobile_iframe=true&appId=2023388327730496&width=69&height=20" width="69" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
										    
		<a class="twitter-share-button"
                href="https://twitter.com/intent/tweet?text=Go to FC Movie house with me <3 Go to this link:http://akimovies.online/tourist/index.php"
                     data-size="large">
                   Tweet</a>

				</form>
				</div>
				</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
						        	Close
				<span class="glyphicon glyphicon-remove-sign"></span>
			     </button>
				 <input type="submit" value="Reserve" onclick="bogkot('<?php echo $b_id; ?>')" class="btn btn-success" data-dismiss="modal">
				</div>
				</div>
				</div>
		      	</div>

						<!-- modal END -->
	  		 	<?php
		  		 		}//end foreacyh of select all boats
		  		 	}//
		  		 ?>
		  </div>
		</div>

	</div>
<!-- end content -->
	<script type="text/javascript">
		function boat(str){
			// alert(str);
		}
	</script>

 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		<!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>

	</body>
</html>


<script type="text/javascript">

function bogkot(str){

	

	var bid = str;
	var tid = '<?php echo $_SESSION['tourID']; ?>';
	
	var rdate = $('#rdate'+str).val();
	var hr = $('#hr').val();
	var ampm = $('#ampm').val();
	var actor = $('#actor').val();
	var datereleased = $('#datereleased').val();


	var datas = "bid="+bid+"&tid="+tid+"&rdate="+rdate+"&datereleased"+datereleased+"&hr="+hr+"&ampm="+ampm+"&actor"+actor;

	$.ajax({
		   type: "POST",
		   url: "reservedprocess.php",
		   data: datas
		}).done(function( data ) {
		  $('#info').html(data);
		});

}

// alert("outside");
// .
// $('#bogkot').click(function(){
// 		alert("ni gana");
// });

</script>