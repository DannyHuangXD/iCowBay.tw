<?php
    require "/scripts/connect.php";
    $artiID = mysqli->query("SELECT COUNT(*) from artiInfo;");
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext)". "VALUES('$artiID','{content}')";
    mysqli_query($insert_sql);
    echo "SUCCESS! your post id is $artiID.";
?>
