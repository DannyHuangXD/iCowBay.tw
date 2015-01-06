<?php
    require "/scripts/connect.php";
    $artiID = mysqli->query("SELECT COUNT(*) from artiInfo;");
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext)". "VALUES('$artiID','{content}')";
    mysqli_query($insert_sql);
    echo <p id="success"> SUCCESS! your post id is $artiID </p>
?>
