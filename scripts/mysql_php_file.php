<?php
    require_once("DB_config.php");
    require_once("DB_class.php");

    $db = new DB();
    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
    $db->query("SELECT ....");
    while($result = $db->fetch_array())
    {
        // do something you want...
    }
    mysql_close($conn);
?>
