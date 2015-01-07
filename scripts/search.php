<?php
    require "connect.php";
    $sql_kw; //keyword search variable
    $sql_search = mysqli_query("SELECT artitext FROM artiInfo WHERE artitext LIKE '%$sql_kw%'");
?>
