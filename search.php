<?php
    require "scripts/connect.php";
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * 20;
    $sql_kw = $_REQUEST['sqlkw']; //keyword search variable
    $search_by = $_GET['lookup'];
    $sql = "select COUNT(*) FROM artiInfo WHERE artitext LIKE '%$sql_kw%';";
    $sql_search = "SELECT * FROM artiInfo WHERE artitext LIKE '%$sql_kw%';";
    $result = $mysqli->query($sql);
    $amount = $result->fetch_row();
    $results = $mysqli->query($sql_search);
    $rows = mysqli_num_rows($results);
    function echo_content($x){
        if(strlen($x)<=30){
            echo $x;
        }
        else if(strlen($x) > 30 && strpos($x,"</a>")){
            $y=substr($x,0,strpos($x,"</a>")).'...';
            echo $y;
        }
        else{
            $y=substr($x,0,30).'...';
            echo $y;
        }
    }
?>

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
    </head>
    <body>
        <div id = "header" class="header"></div>
        <h1 class="page-header">
            Results of "<?php echo $_REQUEST['sqlkw'];?>":
            <?php
                echo "<span class='badge'>".$amount[0]."</span>"
            ;?>
        </h1>
        <table class="table table-hover">

            <tr>
                <td>Post-ID</td>
                <td>Content</td>
                <td>Date-Time</td>
                <td>By</td>
                <td>Views</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($results)){?>
                <tr>
                    <td><? echo "<a href='content.php?id=".$row["artiID"]."'>#".$row["artiID"]."</a>"; ?></td>
                    <td><? echo echo_content($row["artitext"]); ?></td>
                    <td><? echo $row["post_time"]; ?></td>
                    <td><? echo $row["id"]; ?></td>
                    <td><? echo $row["view"]; ?></td>
                </tr>
            <? }; ?>
        </table>
    </body>
</html>
