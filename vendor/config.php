<?php 

if(session_status() == PHP_SESSION_NONE)//php 5.5 above only lower version not working
{
	session_start();//start session if session not start
}//end if

require_once('database/Database.php');//database 
require_once('class/Notification.php'); 
require_once('class/Movie.php'); 
require_once('class/User.php'); 


function alert_msg($type, $title, $msg) {
	echo '
		<div class="alert alert-'.$type.'">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>'.$title.'!</strong> '.$msg.'.
		</div>
	';
}

function dd($param) {
    echo '<pre>';
        var_dump($param);
    echo '</pre>';
    die;
}



$notification = new Notification();
$movies = new Movie();
$user = new User();


// adminlogin.php
// fcadmin
// akiadmin