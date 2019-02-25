<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Panel</title>
		<link rel="icon" href="websiteicon.png"/>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

	<body>

		<br />
		<br />
		<br />
	
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
							<li><a href="#" style="font-family: Times New Roman; font-size: 30px;">Admin Panel</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li class="active">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="reservation.php">Reservation</a>
							</li>
							<li>
								<a href="../adminlogout.php">Log-out</a>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />

		
		<!-- main cntent -->
		<div class="container-fluid">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

				<?php 

					include_once('../config.php');//database
					$db = new Database();

					if(isset($_POST['newboat']))
						{
							$bN = $_POST['bN'];
							$bC = $_POST['bC'];
							$bON = $_POST['bON'];
							$actor = $_POST['actor'];
							$datereleased = $_POST['datereleased'];
							$youtubelink = $_POST['youtubelink'];


							$bPrice = null;
							if($bC == 'Romance'){
								$bPrice = 180;
							}else if($bC == 'Horror'){
								$bPrice = 180;
							}else{
								$bPrice = 180;
							}//end if else of bc price

							$sql = "INSERT INTO movie (moviename, genre, director, b_img, b_price,actor,datereleased,dateadded,youtubelink)
									VALUES(?,?,?,?,?,?,?,CURRENT_TIMESTAMP,?);
								";
							

							if(!$bN){
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Error!</strong> Movie Title is Required.
										</div>
									';
							}else if(!$bON){
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Error!</strong> Director Name is Required.
										</div>
									';
							}else{

								$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
								// do some checks to make sure the file you have is an image and if you can trust it
								move_uploaded_file($_FILES["bP"]["tmp_name"], "../boat_image/".$new_image_name);
								$new_image_name = '../boat_image/'.$new_image_name;
								//echo $new_image_name;

								if(empty($_FILES["bP"]["tmp_name"])){
									$new_image_name = '../boat_image/'.'default.png'; 
								}

								$res = $db->insertRow($sql, [$bN,$bC,$bON, $new_image_name, $bPrice,$actor,$datereleased,$youtubelink]);
								if($res)
								{
									$notification->insert($bN,$bC,$bON, $new_image_name,$bPrice,$actor,'added');

									echo '
										<div class="alert alert-success">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Success!</strong> New movie added Successfully.
										</div>
									';
								}//end if $ress
							}
						}
				?>



				<form action = "" method = "POST" enctype="multipart/form-data">

					   <div class="form-group">
					    <label for="inputdefault">Movie Title:</label>
					    <input class="form-control" id="inputdefault"  name="bN" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Director:</label>
					    <input class="form-control" id="inputdefault" name="bON" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Actor:</label>
					    <input class="form-control" id="inputdefault" name="actor" type="text">
					  </div>
					  <div class="form-group">
					    <label for="inputdefault">Date Released:</label>
					    <input class="form-control" id="inputdefault" name="datereleased" type="date">
					  </div>
					  <div class="form-group">
					    <label for="inputdefault">Embed Trailer:</label>
					    <input class="form-control" id="inputdefault" name="youtubelink" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Genre:</label><br />
					    <select name = "bC" class = "btn-lg" style = "width:250px;">
					    	<option value = "Romance">Romance</option>
					    	<option value = "Horror">Horror</option>
					    	<option value = "Comedy">Comedy</option>
					    	<option value = "Action">Action</option>
					    	<option value = "Rom-Con">Rom-Con</option>
					    	<option value = "Sci-Fi">Sci-Fi</option>
					    	<option value = "Sci-Fi Action">Sci-Fi Action</option>
					    	<option value = "Documentary">Documentary</option>
					    	<option value = "Musical">Musical</option>
					    	<option value = "Anime">Anime</option>
					    	
					    </select>
					  </div>

					    <div class="form-group">
				    	  <label for="inputdefault">Movie Poster:</label>
					      <input class="form-control" id="inputdefault" name="bP" type="file">
					    </div>

					  <button class="btn btn-info" name = "newboat">
					  		Save
					  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					  </button>
				</form>	
			</div>
			<div class="col-md-3"></div>
		</div>
		<!-- main cntent -->



 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>