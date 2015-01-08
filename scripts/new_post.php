<html>
<body>
    <?php
    require 'connect.php';
    $id = $mysqli->query("SELECT COUNT(*) from artiInfo;");
    $contents = $_POST["content"];
echo $id;
echo $contents;
    $insert_sql = "INSERT INTO artiInfo (artiID, artitext) VALUES($id,$contents);";
    $result = $mysqli->query($insert_sql);
?>
</body>
</html>
