<!DOCTYPE html>
<html>
<body>
    <?php
        echo "<tr>" ;
        echo "<td width='316' height='21' align='center'>留言編號:$sql_id.</td>" ;
        echo "<td width='316' height='21' align='center'>留言者姓名:$sql_name.</td></tr>" ;
        echo "<tr><td width='316' height='21' align='center'>MAIL:$sql_email.</td>" ;
        echo "<td width='316' height='21' align='center'>留言時間:$sql_posttime.</td></tr>" ;
        echo "<tr><td height='179' colspan='2' align='left' valign='top'>留言內容:$sql_content.</td></tr>" ;
}
        echo "</tr>";
        $mysqli = new mysqli('raspi', 'piusr', 'rpi', 'raspi' ,'article');
        if($mysqli -> connect_error{
        die('Connect Error('. $mysqli->connect_errno .')' . $mysqli -> connect-error);
        }
        echo 'Success' . $mysqli->host_info . "\n";
        $sql = "SELECT * FROM post";
        echo "<table border=2>";
        $result = mysql_query($sql) or die("invalid query");
        while($record=mysql_fetch_array($result))
        {
        $sql_id = $record[ "id"] ;
        $sql_name = $record[ "name"] ;
        $sql_email = $record[ "email"] ;
        $sql_posttime = $record[ "posttime"] ;
        $sql_content = $record[ "content"] ;
        $mysqli->close();
    ?>
</body>
</html>
