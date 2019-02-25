<?php 

	include_once('../config.php');//database
	$db = new Database();
?>

<?php require_once('layouts/header.php') ?>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

	<body>

		<br />
		<br />
		<br />
		
	
		<?php require_once('layouts/navbar.php') ?>

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
							//vie3w boat
							if(isset($_GET['editid']))
							{
								$editid = $_GET['editid'];

								$sql = "SELECT * FROM movie WHERE b_id = ?";
								$res = $db->getRow($sql, [$editid]);
								$bname =  $res['moviename'];
								$bon =  $res['director'];
								$actor = $res['actor'];
								$datereleased = $res['datereleased'];
								$youtubelink = $res['youtubelink'];
								$bcpcty =  $res['genre'];
								
								$getoldbimg = $res['b_img'];
							
							 }


							 //update boat
							if(isset($_POST['updateboat']))
						 	{
						 		$editid = $_POST['editid'];

						 		$bname = $_POST['bN'];
						 		$bon = $_POST['bON'];
						 		$bcpcty = $_POST['bC'];
						 		$oldbimg = $_POST['oldbimg'];
						 		$actor = $_POST['actor'];
						 		$datereleased = $_POST['datereleased'];
						 		$youtubelink = $_POST['youtubelink'];

						 		// var_dump($youtubelink);

						 		
								$bPrice = null;
								if($bcpcty == 'Romance'){
									$bPrice = 180;
								}else if($bcpcty == 'Horror'){
									$bPrice = 180;
								}else{
									$bPrice = 180;
								}//end if else of bc price


								$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
								// do some checks to make sure the file you have is an image and if you can trust it
								move_uploaded_file($_FILES["bimg"]["tmp_name"], "../boat_image/".$new_image_name);
								$new_image_name = '../boat_image/'.$new_image_name;

								if(empty($_FILES["bimg"]["tmp_name"])){
									$sql = "UPDATE movie SET moviename = ?, genre = ?, director = ?, actor = ?, b_price = ? , datereleased= ? , youtubelink=? WHERE b_id = ?";
						 			$res = $db->updateRow($sql, [$bname, $bcpcty,$bon, $actor, $bPrice,$datereleased,$youtubelink,  $editid]);
								}else{
						 			$sql = "
						 				UPDATE movie 
						 				SET 
						 					moviename = ?, 
						 					genre = ?, 
						 					director = ?, 
						 					actor = ?, 
						 					b_img = ?, 
						 					b_price = ?, 
						 					datereleased = ?, 
						 					youtubelink = ? 
						 				WHERE b_id = ?";
						 			$res = $db->updateRow($sql, [$bname, $bcpcty,$bon, $actor, $new_image_name, $bPrice,$datereleased,$youtubelink, $editid]);
						 			if($oldbimg != '../boat_image/default.png'){
						 				unlink($oldbimg);
						 			}
								}


					 			echo '
					 				<div class="alert alert-success">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <strong>Success!</strong> Edit Successfully.
									</div>
					 			';
						 	}//end if isset updateboat
						?>


					<form action="" method = "POST" enctype="multipart/form-data">
					   <div class="form-group">
					    <label for="inputdefault">Movie Name:</label>
					    <input class="form-control" id="inputdefault"  name="editid" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="bN" type="text" value ="<?php echo $bname; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Director:</label>
					    <input class="form-control" id="inputdefault" name="bON" type="text" value ="<?php echo $bon; ?>">
					  </div>

					  <div class="form-group">
					    <label for="youtubelink">Youtube Link:</label>
					    <textarea class="form-control" id="youtubelink" name="youtubelink"><?php echo $youtubelink; ?></textarea>
					  </div>

                       <div class="form-group">
					    <label for="inputdefault">Cast:</label>
					    <input class="form-control" id="inputdefault" name="actor" type="text" value ="<?php echo $actor; ?>">
					  </div>
					   <div class="form-group">
					    <label for="inputdefault">Date:</label>
					    <input class="form-control" id="inputdefault" name="datereleased" type="date" value ="<?php echo $datereleased; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Genre:</label><br />
					    <select name = "bC" class = "btn-lg" style = "width:250px;">
					    	<option <?php if($bcpcty == '15 Persons'){echo 'selected';} ?> value = "Romance">Romance</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "Horror">Horror</option>
					    	<option <?php if($bcpcty == '30 Persons'){echo 'selected';} ?> value = "Comedy">Comedy</option>
					    	<option <?php if($bcpcty == '15 Persons'){echo 'selected';} ?> value = "Documentary">Documentary</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "Action">Action</option>
					    	<option <?php if($bcpcty == '15 Persons'){echo 'selected';} ?> value = "Sci-Fi">Sci-Fi</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "Sci-Fi Action">Sci-Fi Action</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "Anime">Anime</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "Musical">Musical</option>
					    	
					    </select>
					  </div>

					  <input type="hidden" name="oldbimg" value="<?php echo $getoldbimg; ?>">

					   <div class="form-group">
				    	  <label for="inputdefault">Movie Poster:</label>
					      <input class="form-control" id="inputdefault" name="bimg" type="file">
					    </div>

					  <button class="btn btn-info" name="updateboat" value="updateboat">
					  		Save
					  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					  </button>
				</form>	
			</div>
			<div class="col-md-3"></div>
		</div>
		<!-- main cntent -->

 		<?php require_once('layouts/footer.php') ?>

	</body>
</html>