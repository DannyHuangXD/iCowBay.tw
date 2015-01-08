<html>
    <head>
        <meta charset = "utf-8">
        <title>Post New Article</title>
    </head>
    <body>
        <div id="header" class="header"></div>
        <?php
        require 'connect.php';
            $result = $mysqli->query("SELECT * from artiInfo;");
        $id = 1 + mysqli_num_rows($result);
        $contents = $_POST['content'];
        $insert_sql = "INSERT INTO artiInfo" ."(artiID, artitext)"."VALUES('$id', '$contents');";
        $result = $mysqli->query($insert_sql);
        echo "<div class='alert alert-success' role='alert'> It's done. Your article ID is ".$id.".</div>";
    ?>
    </body>
</html>
