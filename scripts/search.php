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
                $rows = mysqli_num_rows($result);
                $pageSize = 3;
                $pageCount = 4;
                mysqli_free_result($result);
                $mysqli->close($mysqli);
            ?>

           <?php if($rows){?>
            <tr>
                <td>artiID</td>
                <td>Content</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <?php while($rows = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><? echo $rows['artiID'];?></td>
                <td><? echo $rows['artitext'];?></td>
            </tr>
            <?php }; ?>
            <tr>
                <td>
                <?php
                    if($rows <= $pageSize) echo "1";
                    else{
                        for($i = 1; $i  <= pageCount; $i++)
                            echo "{$i}&nbsp;&nbsp;";
                    };
                ?>
                </td>
            </tr>
            <?php }; else{ ?>
            <tr>
                <td> Your search result is rip in pepperonis</td>
            </tr>
            <?php }; ?>
             </table>
        <p>AAAAAAAA?</p>
    </body>
</html>
