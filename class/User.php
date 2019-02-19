<?php 
require_once('../database/Database.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class User extends Database{

    protected $table = 'user';

    protected $mail;

    public function __construct()
    {
        parent::__construct();

        $this->mail = new PHPMailer(true);
    }

    public function new_password($confirm)
    {
        $tour_id = $_SESSION['tourID'];

        if (empty($confirm) || empty($tour_id)) {
            return;
        }        

        $sql = "UPDATE $this->table
                SET password = ?
                WHERE tour_id = ?";


        $query = $this->insertRow($sql, [ md5($confirm), $tour_id]);
    
        if ($query) {
            $_SESSION['change_password'] = true;            
        
            return $query;
        }
    }

    public function verify_email($email)
    {
        if (empty($email)) {
            return;
        }

        $sql = "SELECT * FROM $this->table WHERE tour_un = ?";

        return $this->getRow($sql, [$email]);
    }

    public function verify_recovery_token($md5_email, $password)
    {
        if (empty($md5_email) || empty($password)) {
            return;
        }


        $sql = "SELECT * FROM  $this->table WHERE password = ?";
        $query = $this->getRow($sql, [$password]);

        if (!empty($query)) {
            // check email
            if (md5($query['tour_un']) == $md5_email) {
                $_SESSION['tour_id'] = $query['tour_id'];
                return true;
            }
        }

        return false;
    }

    public function save_password($password)
    {
        if (empty($password) || !isset($_SESSION['tour_id'])) {
            return;
        }

        $tour_id = $_SESSION['tour_id'];         
        $password = md5($password);

        $sql = "UPDATE $this->table
                SET password = ?
                WHERE tour_id = ?";
        $query = $this->updateRow($sql, [$password, $tour_id]);

        if ($query) {
            return true;
        }
    }

    public function send_reset_password($email)
    {
        if (empty($email)) {
            return;
        }

        $sql = "SELECT * FROM $this->table WHERE tour_un = ?";
        $query = $this->getRow($sql, [$email]);

        $password = $query['password'];
        $md5_email = md5($email);

        $link = $_SERVER['SERVER_NAME']."/forgetpassword/resetPassword.php?token_p=$password&token=$md5_email";


        try {
            $this->mail->isSMTP();                                  // Set mailer to use SMTP
            $this->mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                           // Enable SMTP authentication
            $this->mail->Username = 'clestopers@gmail.com';         // SMTP username
            $this->mail->Password = 'aQ!09293366718';               // SMTP password
            $this->mail->SMTPSecure = 'tls';                        // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 587;                                // TCP port to connect to

            //Recipients
            $this->mail->setFrom('clestopers@gmail.com', 'FCMovie House');
            $this->mail->addAddress($email);               // Name is optional

            //Content
            $this->mail->isHTML(true);                     // Set email format to HTML
            $this->mail->Subject = 'Password Recovery';

            $message = "
                <html>
                <head>
                <title>Password Recovery</title>
                </head>
                <body>
                <p>Please click the link below to reset your password.</p>
                <a href='$link'>Reset Password</a>

                <p>If link above not working please copy and paste below string to browser.</p>
                <p>$link</p>
                </body>
                </html>
                ";

            $this->mail->Body    = $message;
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            return $this->mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }   

        return true;
    }

    private function dd($param)
    {
        echo '<pre>';
            var_dump($param);
        echo '</pre>';
    }    
}
