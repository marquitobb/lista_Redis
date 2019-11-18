<?php
    $redis = new Redis();
    $conn = $redis->connect('127.0.0.1', 6379);

    if ($conn) {
        //echo "si jalooo loko";
    }else{
        echo "no jala tu programa";
        exit();
    }

?>