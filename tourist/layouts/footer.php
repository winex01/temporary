	<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>

<script type="text/javascript">

	function bogkot(str){

		var bid = str;
		var tid = '<?php echo $_SESSION['tourID']; ?>';
		
		var rdate = $('#rdate'+bid).val();
		var hr = $('#hr'+bid).val();
		var ampm = $('#ampm'+bid).val();
		var actor = $('#actor').val();
		var datereleased = $('#datereleased').val();


		var datas = "bid="+bid+"&tid="+tid+"&rdate="+rdate+"&datereleased"+datereleased+"&hr="+hr+"&ampm="+ampm+"&actor"+actor;

		console.log(datas);

		$.ajax({
		   	type: "POST",
		   	url: "reservedprocess.php",
		   	data: datas
		})
		.done(function(data) {
		  $('#info').html(data);
		});
	}
	
	// active class
	var url = window.location;
	// Will only work if string in href matches with location
	$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

	// Will also work for relative and absolute hrefs
	$('ul.nav a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');
	// end active class

	$(document).ready(function(){
	    $('#myTable').dataTable();
	});


	<?php if ( isset($new) ): ?>
		<?php if ($new != $confirm): ?>
			$('#modal-change-pass').modal();
		<?php endif; ?>
	<?php endif; ?>
    
	function read_notification() {
		$.ajax({
			url: 'read_notification.php',
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

	</body>
</html>
