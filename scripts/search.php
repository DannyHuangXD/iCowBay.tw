<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <table width = "900" border = "0.5" cellpadding = "1">
            <?php
                require "connect.php";
                $sql_kw = $_REQUEST['sqlkw']; //keyword search variable
                $sql_search = "SELECT * FROM artiInfo WHERE artitext LIKE '%$sql_kw%'";
                $result = $mysqli->query($sql_search);
                $pageCount = celi($rows/3);
                mysqli_free_result($result);
                $mysqli->close($mysqli);
            ?>
             </table>
        <p>AAAAAAAA?</p>
    </body>
</html>
