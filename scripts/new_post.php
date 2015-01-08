<?php
    require 'connect.php';
    $artiID = $mysqli->query("SELECT COUNT(*) from artiInfo;");
    $contents = $_POST["content"];
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext) VALUES($artiID,$contents);";
    $result = $mysqli->query($insert_sql);
?>
