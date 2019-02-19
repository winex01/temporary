<?php 
require_once('../database/Database.php');

class User extends Database{

    protected $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function new_password($confirm)
    {
        $tour_id = $_SESSION['tourID'];

        if (empty($confirm) || empty($tour_id)) {
            return;
        }        

        $sql = 'UPDATE user
                SET password = ?
                WHERE tour_id = ?';


        $query = $this->insertRow($sql, [ md5($confirm), $tour_id]);
    
        if ($query) {
            $_SESSION['change_password'] = true;            
        
            return $query;
        }
    }    
}
