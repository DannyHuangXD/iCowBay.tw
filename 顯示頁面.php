<!DOCTYPE html>
<html>
<body>
<?php
$link = mysql_pconnect("localhost", "test", "test123")
or die("Could not connect");
mysql_select_db("play") or die("Could not select database play");
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
echo "<tr>" ;
echo "<td width='316' height='21' align='center'>留言編號:$sql_id.</td>" ;
echo "<td width='316' height='21' align='center'>留言者姓名:$sql_name.</td></tr>" ;
echo "<tr><td width='316' height='21' align='center'>MAIL:$sql_email.</td>" ;
echo "<td width='316' height='21' align='center'>留言時間:$sql_posttime.</td></tr>" ;
echo "<tr><td height='179' colspan='2' align='left' valign='top'>留言內容:$sql_content.</td></tr>" ;
}
echo "</tr>";
?>
</body>
</html>
