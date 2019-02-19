<?php
include_once('../config.php');

    if ( isset($_POST['user-email']) && !empty($_POST['user-email']) ) {
        $email = trim($_POST['user-email']);
        if ($user->verify_email($email)) {
            if ($user->send_reset_password($email)) {
                $success_message = 'Please check email to reset password.';
            }
        }else{
            $error_message = 'No Email Found';
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login / Registration Form</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <div id="loginContainer">
                <form id="frmForget" name="frmForget" method="post">
                    <h3>Forget Password ? </h3>
                    <?php if(!empty($success_message)) { ?>
                    <div class="success_message"><?php echo $success_message ?>
                    <?php } ?>
                    <?php if(isset($error_message)) { ?> 
                    <div class="error_message"><?php echo $error_message; ?></div>
                    <?php } ?>
                    <input type="email" name="user-email" placeholder="Enter a valid email" required>
                    <input type="submit" value="submit" name="forget-password" id="forget-password">
                </form>
            </div>
        </div>
    </body>
</html>

