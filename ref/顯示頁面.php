<!DOCTYPE html>
<html>
    <head><meta charset = 'utf-8'></head>
<body>
    <?php
        $mysqli = mysqli_connect('localhost', 'root', 'rpi', 'article');
        if(mysqli_connect_errno()){
        echo "Failed to connect to database" . mysqli_connect_error();
        }
        $sql = "SELECT * FROM artiInfo WHERE artiID=1";
        echo "<table border=2>";
        $result = $mysqli->query($sql) or die("ERROR");
        while($record= mysqli_fetch_array($result)){
        $sql_id = $record["artiID"];
        $sql_content = $record["artitext"];
        $sql_posttime = $record["post_time"];
        }
        $mysqli->close();

        echo "<tr>" ;
        echo "<td width='316' height='21' align='center'>#$sql_id</td>" ;
        echo "<td width='316' height='21' align='center'>Time:$sql_posttime</td></tr>" ;
        echo "<tr><td height='179' colspan='2' align='left' valign='top'>$sql_content</td></tr>" ;
        echo "</tr>";

    ?>
</body>
</html>
