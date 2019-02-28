<?php 
require_once('../config.php');

$temp = $_SESSION['tourID'];

if (empty($temp)) {
	exit;
}


$temp = $notification->read();

 echo json_encode($temp);

