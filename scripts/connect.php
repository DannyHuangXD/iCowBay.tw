<?php
    $mysqli = mysqli_connect('localhost', 'root', 'rpi', 'article');
    if(mysqli_connect_errno()){
    echo "Failed to connect to database" . mysqli_connect_error();
    }
?>
