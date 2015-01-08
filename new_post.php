<html>
    <head>
        <meta charset = "utf-8">
        <title>Post New Article</title>
        <link href="/css/new_post.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.1/d3.min.js"></script>
        <script>
        $(function(){
          $("#header").load("header.html");
          $("#footer").load("footer.html");
        });
        </script>
    </head>
    <body>
        <div id="header" class="header"></div>
        <?php
        require 'scripts/connect.php';
            $result = $mysqli->query("SELECT * from artiInfo;");
        $id = 1 + mysqli_num_rows($result);
        $contents = str_replace(chr(13).chr(10),"<br>", $_POST['content']);
        $usr_id = $_POST['user_id'];
        if($usr_id ="") $usr_id = "anonymous";
        $insert_sql = "INSERT INTO artiInfo" ."(id, artiID, artitext)"."VALUES('$usr_id' ,'$id', '$contents');";
        $result = $mysqli->query($insert_sql);
        echo "<div class='alert alert-success' role='alert'> It's done. Your article ID is ".$id.".</div>";
    ?>
    </body>
</html>
