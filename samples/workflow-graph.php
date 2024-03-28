<?php $conn = new mysqli("localhost", "root", "", "workflow"); ?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <?php
        $query = "SELECT MONTHNAME(added_dt) MONTH, COUNT(*) COUNT FROM dt_workpost WHERE YEAR(added_dt) = '2022' and user_id = 24 and work_status = 'C' GROUP BY MONTH(added_dt);";
        $res = mysqli_query($conn, $query);
        ?>

        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Month', 'count'],

<?php
while ($data = mysqli_fetch_assoc($res)) {
    echo "['" . $data["MONTH"] . "', " . $data["COUNT"] . "],";
}
?>

                    //          ['jan',  3],
                    //          ['fab',   2],
                    //          ['may',  4]
                ]);

                var options = {
                    title: 'Customers month vise',
                    curveType: 'function',
                    legend: {position: 'bottom'}
                    
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </body>
</html>
