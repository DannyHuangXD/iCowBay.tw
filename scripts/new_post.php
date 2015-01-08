<html>
<body>
    <?php
    require 'connect.php';
        $result = $mysqli->query("SELECT * from artiInfo;");
    $id = 1 + mysqli_num_rows($result);
    $contents = $_POST['content'];
    $insert_sql = "INSERT INTO artiInfo" ."(artiID, artitext)"."VALUES('$id', '$contents');";
    $result = $mysqli->query($insert_sql);
?>
</body>
</html>
