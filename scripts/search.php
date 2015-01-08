<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <table width = "900" border = "0.5" cellpadding = "1">
            <?php
                require "connect.php";
                if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                $start_from = ($page-1) * 20;
                $sql_kw = $_REQUEST['sqlkw']; //keyword search variable
                $sql_search = "SELECT * FROM artiInfo WHERE artitext LIKE '%$sql_kw%'";
                $result = $mysqli->query($sql_search);
                $rows = mysqli_num_rows($result);
            ?>
            <tr><td>ID</td><td>content</td></tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td><? echo $row["artiID"]; ?></td>
                    <td><? echo $row["artitext"]; ?></td>
                </tr>
            <? }; ?>
        </table>
        <?php
            $sql = "select count(*) FROM artiInfo";
            $result = $mysqli->query($sql);
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / 20);

            for ($i=1; $i<=$total_pages; $i++) {
                echo "<a href='search.php?page=".$i."'>".$i."</a> ";
            };
        ?>
    </body>
</html>
