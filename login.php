<?php
	include('conn.php');
	session_start();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}

		$email=check_input($_POST['email']);
		$password=md5(check_input($_POST['password']));

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$_SESSION['log_msg'] = "Invalid email format";
  			header('location:userlogin.php');
		}
		else{
			$query=mysqli_query($conn,"select * from user where tour_un='$email' and password='$password'");
			if(mysqli_num_rows($query)==0){
				$_SESSION['log_msg'] = "Invalid email or password";
  				header('location:userlogin.php');
			}
			else{
				$row=mysqli_fetch_array($query);
				if($row['verify']==0){
					$_SESSION['log_msg'] = "User not verified. Please activate account";
  					header('location:userlogin.php');
				}
				else{
				  
					$_SESSION['tourID'] = $row['tour_id'];
					$_SESSION['usr']=$email;

					// $dashboard->increment_visit();
					$_SESSION['visit']= true;
					
					header('location:../tourist/index.php');
				}
			}
		}

	}
?>