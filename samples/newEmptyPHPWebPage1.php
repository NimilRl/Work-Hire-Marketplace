<?php $conn=new mysqli("localhost","root","","restro");
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
    </head>
    <body>

        <?php
        $query = "SELECT tbl_fooddetails.foodName , COUNT(tbl_orderfood.order_Id) AS number FROM tbl_fooddetails , tbl_orderfood WHERE tbl_fooddetails.foodId = tbl_orderfood.foodId GROUP BY tbl_fooddetails.foodName;";
        $result = mysqli_query($conn, $query);

            ?>

            <script type="text/javascript">
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart()
                {
                    var data = google.visualization.arrayToDataTable([
                        ['FoodName', 'Number'],
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "['" . $row["foodName"] . "', " . $row["number"] . "],";
    }
    ?>
                ]);
                var options = {
                    title: 'Percentage of Order demand',
                    is3D: true,
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>  

        <div id="piechart" style="width: 500px; height: 500px;"></div>  

    </body>
</html>

