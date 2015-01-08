<?php
    $id = $_GET['id'];
    require 'scripts/connect.php';
    $result = $mysqli->query("SELECT * FROM artiInfo WHERE artiID LIKE '$id';");
    $record= mysqli_fetch_array($result);
    $viewPlus = (int)$record['view'] + 1;
    $plusID = $record['artiID'];
    $mysqli->query("UPDATE artiInfo SET views= '$viewPlus' WHERE artiID = '$plusID';");
?>
<html>
    <head>
        <title># <? echo $id; ?> </title>
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
        <div id="header"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><? echo $record['artiID']; ?></h2>
            </div>
            <div class="panel-body">
                <? echo $record['artitext']; ?>
                <? echo $plusID; ?>
            </div>
            <div class="panel-footer">
                <? echo "Views: ".$record['view']; ?>
            </div>
        </div>
    </body>
</html>
