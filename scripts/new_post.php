<?php
    require 'connect.php';
    $artiID = ＄mysqli->query("SELECT COUNT(*) from artiInfo;");
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext) VALUES('$_POST[artiID]','$_POST[content]')";
    mysqli_query($insert_sql);
    echo "SUCCESS! your post id is $artiID.";
?>
