<?php
$db = new PDO('mysql:host=localhost;dbname=root; charset=utf8mb4','webhost','',
        array(PDO::ATTR_EMULATE_PREPARES => false, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
