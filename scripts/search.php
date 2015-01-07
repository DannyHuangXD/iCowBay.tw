<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <table width = "900" border = "0.5" cellpadding = "1">
            <?php
                require "connect.php";
                $sql_kw = $_REQUEST['sqlkw']; //keyword search variable
                $sql_kw = mysqli_real_escape_string($sql_kw);
                $sql_search = "SELECT * FROM artiInfo WHERE artitext LIKE '%{$sql_kw}%'";
                $result = $mysqli->query($sql_search);
                $rows = mysqli_num_rows($result);
                mysqli_free_result($result);
                $pageSize = 3;
                $pageCount = celi($rows / pageSize);
                echo $rows;
            ?>
            <tr>
                <td>artiID</td>
                <td>Content</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">
                </td>
            </tr>
            <tr>
                <td> Your search result is rip in pepperonis</td>
            </tr>
        </table>
    </body>
</html>
