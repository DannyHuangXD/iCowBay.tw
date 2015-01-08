<?php
    require 'connect.php';
    $artiID = $mysqli->query("SELECT COUNT(*) from artiInfo;");
    $ID = $_POST[artiID];
    $contents = $_POST[content];
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext) VALUES($ID,$contents);";
    $result = $mysqli->query($insert_sql);
?>
