<html>
    <head>
        <meta charset="utf-8">
        <title>Results</title>
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
    <?php
        require "scripts/connect.php";
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
        if(isset($_GET["top"])){
            $top = $_GET["top"];
        }
        $start_from = ($page-1) * 20;
        if($top == 'most'){
            $sql = "SELECT * FROM artiInfo ORDER BY view DESC;";
        }
        else if($top == 'new'){
            $sql = "SELECT * FROM artiInfo ORDER BY artiID DESC;";
        }
        else if($top == 'likes'){
            $sql = "SELECT * FROM artiInfo ORDER BY likes DESC;";
        }
        $result = $mysqli->query($sql);
        $rows = mysqli_num_rows($result);
    ?>
    </head>
    <body>
        <div id = "header" class="header"></div>
        <h1 class="page-header">Sorted by "<?php echo $top;?>":</h1>
        <table class="table table-hover">
            <tr>
                <td>Post-ID</td>
                <td>Content</td>
                <td>Date-Time</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td><? echo "<a href='content.php?id=".$row["artiID"]."'>".$row["artiID"]."</a>"; ?></td>
                    <td><? echo $row["artitext"]; ?></td>
                    <td><? echo $row["post_time"]; ?></td>
                </tr>
            <? }; ?>
        </table>
        <?php
            $sql = "select COUNT(*) FROM artiInfo WHERE artitext LIKE '%$sql_kw%';";
            $result = $mysqli->query($sql);
            $amount = $result->fetch_row();
            echo "<span class='badge'>".$amount[0]." results </span>";
        ?>
    </body>
</html>
