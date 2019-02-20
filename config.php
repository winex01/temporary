<?php 

if(session_status() == PHP_SESSION_NONE)//php 5.5 above only lower version not working
{
	session_start();//start session if session not start
}//end if

require_once('database/Database.php');//database 
require_once('class/Movie.php'); 
require_once('class/User.php'); 

$movies = new Movie();
$user = new User();



function alert_msg($type, $title, $msg) {
	echo '
		<div class="alert alert-'.$type.'">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>'.$title.'!</strong> '.$msg.'.
		</div>
	';
}