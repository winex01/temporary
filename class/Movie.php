<?php 
require_once('../database/Database.php');

class Movie extends Database{

    protected $table = 'movie';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_movies($search, $genre = null)
    {
        $sql = "SELECT * FROM $this->table ORDER BY datereleased DESC LIMIT 25";

        if (!empty($genre) && $genre != null) {
            $sql = "SELECT * FROM $this->table WHERE genre like '%$genre%' ORDER BY datereleased DESC";
        }

        $params = [];
        if (!empty($search) && $search != '') {
            $sql = "
                SELECT * 
                FROM movie
                WHERE moviename like ?
                OR genre like ?
                OR director like ?
                OR actor like ?
                OR datereleased like ?
                OR b_price <= ?
                ORDER by datereleased DESC
            ";

            $params = [
                '%'.$search.'%',
                '%'.$search.'%',
                '%'.$search.'%',
                '%'.$search.'%',
                '%'.$search.'%',
                    $search,
            ];
        }

        return $this->getRows($sql, $params);
    }
    

}
