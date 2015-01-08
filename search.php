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
        <table class="table table-hover">
            <?php
                require "scripts/connect.php";
                if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                $start_from = ($page-1) * 20;
                $sql_kw = $_REQUEST['sqlkw']; //keyword search variable
                $sql_search = "SELECT * FROM artiInfo WHERE artitext LIKE '%$sql_kw%';";
                $result = $mysqli->query($sql_search);
                $rows = mysqli_num_rows($result);
            ?>
            <tr>
                <td>id</td>
                <td>content</td>
                <td>Date-time</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td><? echo $row["artiID"]; ?></td>
                    <td><? echo $row["artitext"]; ?></td>
                    <td><? echo $row["post_time"]; ?></td>
                </tr>
            <? }; ?>
        </table>
        <?php
            $sql = "select COUNT(*) FROM artiInfo;";
            $result = $mysqli->query($sql);
            $rowz = mysqli_fetch_row($result);
            $total_records = $rowz[0];
            $total_pages = ceil($rowz / 20);
            echo "<nav><ul class = 'pagination'>";
            for ($i=1; $i<=$total_pages; $i++) {
                echo "<li><a href='search.php?page=".$i."'>".$i."</a></li>";
            }
            echo "</ul></nav>";
        ?>
    </body>
</html>
