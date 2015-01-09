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
            $sql = "SELECT * FROM artiInfo ORDER BY view DESC LIMIT 0, 20;";
        }
        else if($top == 'new'){
            $sql = "SELECT * FROM artiInfo ORDER BY artiID DESC LIMIT 0, 20;";
        }
        else if($top == 'likes'){
            $sql = "SELECT * FROM artiInfo ORDER BY likes DESC LIMIT 0, 20;";
        }
        else if($top == 'all'){
            $sql = "SELECT * FROM artiInfo;";
        }
        $result = $mysqli->query($sql);
        $rows = mysqli_num_rows($result);
    function echo_content($x){
        if(strlen($x)<=30){
            echo $x;
        }
        else if(strlen($x) > 30 && strpos($x,"</a>") > 30 && strpos($x,"</a>")){
            $y=substr($x,strpos($x,"<a>"),strpos($x,"</a>")).'...';
            echo $y;
        }
        else if(strpos($x,"</img>" && strpos($x,"</img>") > 30 && strpos($x,"</img>") > 30)){
            $y=substr($x,strpos($x,"<img>"),strpos($x,"</img>")).'...';
            echo $y;
        }
        else if(strlen($x) > 30 && strpos($x,"</iframe>") >30 && strpos($x,"</iframe>")){
            $y=substr($x,strpos($x,"</iframe>"),strpos($x,"</iframe>")).'...';
            echo $y;
        }
        else{
            $y=substr($x,0,30).'...';
            echo $y;
        }
    }
    ?>
    </head>
    <body>
        <div id = "header" class="header"></div>
        <h1 class="page-header">Sorted by "<?php echo $top;?>":</h1>
        <table class="table table-hover">
            <tr>
                <td>Post-ID</td>
                <td>Content</td>
                <td>By</td>
                <td>Date-Time</td>
                <td>Views</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td><? echo "<a href='content.php?id=".$row["artiID"]."'>".$row["artiID"]."</a>"; ?></td>
                    <td><? echo echo_content($row["artitext"]); ?></td>
                    <td><? echo $row["id"]; ?></td>
                    <td><? echo $row["post_time"]; ?></td>
                    <td><? echo $row["view"]; ?></td>
                </tr>
            <? }; ?>
        </table>
    </body>
</html>
