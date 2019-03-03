<?php 

function alert_msg($type, $title, $msg) {
    echo '
        <div class="alert alert-'.$type.'">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>'.$title.'!</strong> '.$msg.'.
        </div>
    ';
}

function dd($param) {
    echo '<pre>';
        var_dump($param);
    echo '</pre>';
    die;
}

function dump($param) {
    echo '<pre>';
        var_dump($param);
    echo '</pre>';
}

