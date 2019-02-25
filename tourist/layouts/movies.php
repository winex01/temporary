<?php if ($res): ?>
	<?php foreach ($res as $r): ?>
		<?php 
			$b_id = $r['b_id'];
	  		$bImage = $r['b_img'];
	  		$title = $r['moviename'];
		 ?>
		 <center>
		 	<div class="col-lg-3 col-md-4 col-sm-6">
				<a href="#"  data-toggle="modal" data-target="#myModal<?php echo $b_id; ?>">
					<img class="img-rounded" src="<?php echo $bImage;?>" height="350" width="350">
	  			</a>
	  			<div class="row" style="margin-top: -20px">
	  				<strong><?php echo $title ?></strong>
	  			</div>
		 	</div>
		 </center>
	<?php endforeach; ?>
<?php else: ?>
	No result.
<?php endif; ?>