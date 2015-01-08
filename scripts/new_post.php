<?php
    require 'connect.php';
    $contents = $_POST["content"];
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext) VALUES(100,$contents);";
    $result = $mysqli->query($insert_sql);
?>
