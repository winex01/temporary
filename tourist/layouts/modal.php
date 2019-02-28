<?php if ($res): ?>
	<?php foreach ($res as $r): ?>
		<?php 
			$b_id = $r['b_id'];
	  		$bName = $r['moviename'];
	  		$bCap = $r['genre'];
	  		$bON = $r['director'];
	  		$actor = $r['actor'];
	  		$bImage = $r['b_img'];
	     	$bPrice = $r['b_price'];
	  		$datereleased = $r['datereleased'];
	  		$dateadded = $r['dateadded'];
	  		$youtubelink = $r['youtubelink'];
		 ?>
	 
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

										<?= $youtubelink ?>
												      				
										<h4>---RESERVATION---</h4>
										<strong>Date of Reservation: </strong>&nbsp;
										<br/> 
										<input class="btn-default" id="rdate<?php echo $b_id; ?>" size="30" name="rdate" type="date" autocomplete="off">
										<br/>
										<strong>Time: </strong>
										<br/>
										<select class="btn-default" id="hr<?php echo $b_id; ?>">
											<option value="9">9</option>
								            <option value="12">12</option>
								            <option value="3">3</option>
								            <option value="6">6</option>
										</select>

										<select class="btn-default" id="ampm<?php echo $b_id; ?>">
											<option value="AM">AM</option>
											<option value="PM">PM</option>
									    </select>

								    	<div class="fb-comments" data-href="http://akimovies.online" data-width="30px" data-numposts="5"></div>
								    
							  			<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fakimovies.online/tourist/index.php&layout=button_count&size=small&mobile_iframe=true&appId=2023388327730496&width=69&height=20" width="69" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
																    
										<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Go to FC Movie house with me <3 Go to this link:http://akimovies.online/tourist/index.php" data-size="large">Tweet</a>
									</form>
								</div>
							</div><!-- end row -->
						</div><!-- end modal -->

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">
									        	Close
							<span class="glyphicon glyphicon-remove-sign"></span>
						     </button>
							 <input type="submit" value="Reserve" onclick="bogkot('<?php echo $b_id; ?>')" class="btn btn-success" data-dismiss="modal">
						</div>
					</div>
				</div><!-- end modal dialogue -->
			</div><!-- modal END -->
	 
	<?php endforeach; ?>
<?php endif; ?>
