<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/dataTables.js"></script>
		    <!--pagination-->
<script src="../bootstrap/js/jquery.dataTables2.js"></script>


<script type="text/javascript">
	// active class
	var url = window.location;
	// Will only work if string in href matches with location
	$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

	// Will also work for relative and absolute hrefs
	$('ul.nav a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');
	// end active class

	function read_admin_notification() {
		$.ajax({
			url: 'read_admin_notification.php',
			type: 'post',
			dataType: 'json',
			// data: {param1: 'value1'},
		})
		.done(function(response) {
			// console.log(response);
			if (response) {
				$('#badge-notif').hide();
			}
		});
		
	}
</script>
