<?php 

if(session_status() == PHP_SESSION_NONE)//php 5.5 above only lower version not working
{
	session_start();//start session if session not start
}//end if

// require_once('../vendor/Autoload.php');
require_once('database/Database.php');//database 
require_once('helper.php');

// class
require_once('class/Notification.php'); 
require_once('class/Dashboard.php'); 
require_once('class/Movie.php'); 
require_once('class/User.php'); 


// class objects
$notification = new Notification();
$dashboard = new Dashboard();
$movies = new Movie();
$user = new User();


$paginations = [
	'records_per_page' => 15
];




// adminlogin.php
// fcadmin
// akiadmin