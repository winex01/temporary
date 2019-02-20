<?php
include_once('../config.php');
  
  if (  !isset($_GET['token']) || !isset($_GET['token_p']) || !isset($_GET['coffee']) || !$user->verify_recovery_token($_GET['token'], $_GET['token_p']) ) {
     echo '<h1>Not Found</h1>';
     echo 'The requested URL was not found on this server.';
     die;
  }

    // token  = password + email md5
    // 202cb962ac59075b964b07152d234b70
    // 5a52e07e43f024e0732445ba2509685c

  if ( isset($_POST['password']) && isset($_POST['confirmPassword']) ) {
      
      $password = $_POST['password'];     
      $confirmPassword = $_POST['confirmPassword'];     
                                                  
      if ($password != $confirmPassword) {
          $error_message = "Password not matched";
      }else {
          $user->save_password($password, $_GET['coffee']);
          $success_message = "Password reset successfully.<br>Now you are redirecting";
          header("Refresh:3; url=../userlogin.php");
      }
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="loginContainer">
            <form id="reserPassword" name="reserPassword" method="post">
                <?php if (isset($_GET['token'])): ?>
                <input type="hidden" name="token" value="<?= (!empty($_GET['token'])) ? $_GET['token'] : '' ?>">
                <?php endif; ?>
                <h3>Reset Password</h3>
                <?php if(!empty($success_message)) { ?>
                <div class="success_message"><?php echo $success_message ?></div>
                <?php } ?>
                <?php if(!empty($error_message)) { ?>
                <div class="error_message"><?php echo $error_message ?></div>
                <?php } ?>
                <input type="password" id="password" name="password" placeholder="Enter a New Password" required>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                <input type="submit" value="Reset Password" name="reset-password" id="reset-password">
            </form>
        </div>
    </body>
</html>
