<?php 
require_once('../config.php');



$temp = $notification->read_admin();

 echo json_encode($temp);

