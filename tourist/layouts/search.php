<div id ="info"  ></div>

<?php if ( isset($_SESSION['change_password']) && $_SESSION['change_password'] ): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Notification:</strong> Your password has been changed successfully.
	</div>
<?php unset($_SESSION['change_password']) ?>
<?php endif; ?>

<div class="row">
	<div class="col-lg-6 col-md-6">
		
	<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="input-group">
		<input type="text" name="search" value="<?= ( isset($_POST['search']) && !empty($_POST['search']) ) ? $_POST['search'] : ''; ?>" class="form-control" placeholder="Search for movies,genres...">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-info" type="button">Search!</button>
		</span>
		</div><!-- /input-group -->
	</form>

	</div><!-- /.col-lg-6 -->
	<div class="col-lg-6 col-md-6"></div><!-- /.col-lg-6 -->
</div><!-- /.row -->

