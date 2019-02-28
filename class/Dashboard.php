<?php 
require_once('../database/Database.php');

class Dashboard extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    private function _counts($table)
    {
        if (empty($table)) {
            return;
        }

        $query = $this->getRow("
            SELECT count(*) as total
            FROM $table
        ");

        return $query['total'];
    }

    public function total_reservations()
    {
        return $this->_counts('reservation');
    }

    public function total_movies()
    {
        return $this->_counts('movie');
    }

    public function total_users()
    {
        return $this->_counts('user');
    }

    public function total_visits()
    {
        return $this->_counts('visits');
    }

    public function increment_visit()
    {
        $this->insertRow("
            INSERT INTO visits (user)
            VALUES(?)
        ", [$_SESSION['usr']]);

        unset($_SESSION['visit']);
    }

}
