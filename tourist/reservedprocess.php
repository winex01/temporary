<?php 
include_once('../config.php');
$db = new Database();

	if(isset($_POST['bid'])){

		$bid	= $_POST['bid'];
		$tid	= $_POST['tid'];
		$date 	= $_POST['rdate'];
		$hr 	= $_POST['hr'];
		$ampm 	= $_POST['ampm'];
		

		// max reservation
		if ($user->reservation_limit()) {
			alert_msg('danger', 'Notification:', 'You can only reserve 3x');
			exit;
		}

		// can only book today and next following days
		if (strtotime($date) < strtotime(date('Y-m-d')) ) {
			alert_msg('danger', 'Warning', 'Invalid date');
			exit;	
		}

		if(!$ampm){
			echo '
				<div class="alert alert-danger">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Warning!</strong> Time of Reservation is Required.
				</div>
			';
		}
		else if(!$date){
			echo '
				<div class="alert alert-danger">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Warning!</strong> Date of Reservation is Required.
				</div>
			';
		}else{
			$sql = 'SELECT * FROM reservation WHERE b_id = ? AND r_date = ? AND r_hr = ? AND r_ampm = ?';
			$res = $db->getRows($sql, [$bid, $date, $hr, $ampm]);

	     	if($res){
				foreach ($res as $r){
					$rbid = $r['b_id'];
					$rd = $r['r_date'];
					$rh = $r['r_hr'];
					$rampm = $r['r_ampm'];
														
					if(($rd == $date) AND ($rh == $hr) AND ($rampm == $ampm) AND ($rbid == $bid)){
						    echo '
							<div class="alert alert-danger">
					     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Notification:</strong>This schedule has already been reserved by another user.Please choose another schedule.
							</div>
									';
					}
				}
			}else{
				$sql = "INSERT INTO reservation(r_hr, r_ampm, b_id, tour_id, r_date)
												VALUES (?,?,?,?,?) ";
				$res = $db->insertRow($sql, [$hr, $ampm, $bid, $tid, $date]);

					echo '
					<div class="alert alert-success">
					 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Success!</strong> Reserved Successfully.
					</div>
						';
			}
		}
	}