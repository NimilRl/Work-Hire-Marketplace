<?php $conn=new mysqli("localhost","root","","workflow");
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
    </head>
    <body>

        <?php
        $query = "select work_status, count(*) as number from dt_workpost, dt_workpost_proposals where dt_workpost.work_id = dt_workpost_proposals.work_id and dt_workpost_proposals.user_id= 17 group by dt_workpost.work_status;";
        $result = mysqli_query($conn, $query);

            ?>

            <script type="text/javascript">
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart()
                {
                    var data = google.visualization.arrayToDataTable([
                        ['work_status', 'Number'],
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "['" . $row["work_status"] . "', " . $row["number"] . "],";
    }
    ?>
                ]);
                var options = {
                    title: 'Percentage of Uploded workpost status vise',
                    is3D: true,
                    pieHole: 0.4
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>  

        <div id="piechart" style="width: 320px; height: 300px;"></div>  

    </body>
</html>

