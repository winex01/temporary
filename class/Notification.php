<?php 
require_once('../database/Database.php');

class Notification extends Database{

    protected $table = 'notifications';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($movie,$genre,$director, $img, $price,$actor, $type = 'added')
    {
        $data = [
            $movie, $genre, $director, $img, $price, $actor, $type
        ];

        return $this->insertRow("
            INSERT INTO notifications (moviename, genre, director, b_img, b_price, actor, type)
            VALUES(?,?,?,?,?,?,?)
        ", $data);
    }

    public function insert_delete_movie($b_id)
    {
        if (empty($b_id)) {
            return;
        }

        $sql = "SELECT * FROM movie WHERE b_id = ?";
        $query = $this->getRow($sql, [$b_id]);

        if (!empty($query)) {
            $this->insert(
                $query['moviename'],
                $query['genre'],
                $query['director'],
                $query['b_img'],
                $query['b_price'],
                $query['actor'],
                'removed'
            );
        }

    }

    public function get_all()
    {
        $sql = "SELECT * FROM notifications ORDER BY created_at DESC";

        return $this->getRows($sql);
    }

    public function count()
    {
        return count($this->get_all());
    }

    public function unread()
    {
        $tour_id = $_SESSION['tourID'];

        if (empty($tour_id)) {
            return 999; #for debugging purposes
        } 

        $sql = "
            SELECT COUNT(id) as total
            FROM notifications
            WHERE id NOT IN (SELECT notification_id FROM notification_user WHERE user_id = ?)
        ";

        $query = $this->getRow($sql, [$tour_id]);

        return $query['total'];
    }

    public function unread_notification()
    {
        $tour_id = $_SESSION['tourID'];

        if (empty($tour_id)) {
            return 999; #for debugging purposes
        } 

        $sql = "
            SELECT id
            FROM notifications
            WHERE id NOT IN (SELECT notification_id FROM notification_user WHERE user_id = ?)
        ";

        $query = $this->getRows($sql, [$tour_id]);
            
        $data = [];
        if (!empty($query)) {
            foreach($query as $temp) {
                $data[] = $temp['id'];
            }
        }

        return $data;
    }

    public function read()
    {
        // read notification = inserting notification to notification_user
        $tour_id = $_SESSION['tourID'];

        if (empty($tour_id)) {
            return 999; #for debugging purposes
        } 

        $sql = "
            SELECT id 
            FROM notifications
            WHERE id NOT IN (SELECT notification_id FROM notification_user WHERE user_id = ?)
        ";

        $query = $this->getRows($sql, [$tour_id]);

        if (empty($query)) {
            return;
        }


        $sql = "INSERT INTO notification_user (notification_id, user_id)
                VALUES(?,?)
        ";

        foreach($query as $notification) {
            $this->insertRow($sql, [$notification['id'], $tour_id]);
        }

        return true;
    }


    // admin notifications
    public function get_admin()
    {
        $sql = "SELECT * FROM notification_admin ORDER BY created_at DESC";

        return $this->getRows($sql);
    }

    public function insert_admin($r_id, $type = 'reserved')
    {
        if (empty($r_id)) {
            return;
        }

        $sql = "
                SELECT moviename, tour_un as user, b_img as img
                FROM reservation
                INNER JOIN movie
                ON reservation.b_id = movie.b_id
                INNER JOIN user 
                ON reservation.tour_id = user.tour_id
                WHERE reservation.r_id = ?
        ";

        $query = $this->getRow($sql, [$r_id]);

        if (empty($query)){
            return;
        }

        $sql = "INSERT INTO notification_admin (moviename, user, b_img, type) VALUES(?,?,?,?)";

        return $this->insertRow($sql, [
            $query['moviename'],
            $query['user'],
            $query['img'],
            $type
        ]);

    }

    public function count_unread_admin()
    {
        $query = $this->getRow("
            SELECT count(*) as total
            FROM notification_admin
            WHERE has_read = 0
        ");

        if (!empty($query)) {
            return $query['total'];
        }

        return 0;
    }

    public function read_admin()
    {
        return $this->updateRow("
            UPDATE notification_admin
            SET has_read = 1
            WHERE has_read = 0;
        ");
        // i added where to execute query faster but not neccessary
    }

    public function test()
    {
        die('whoops test is running!');
    }
}
