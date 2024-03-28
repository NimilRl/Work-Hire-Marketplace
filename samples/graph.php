<?php $conn = new mysqli("localhost", "root", "", "restro");
?>


<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['month', 'total'],
                <?php
                $query = "SELECT MONTHNAME(added_dt) MONTH,  COUNT(*) AS number FROM `tbl_customer` GROUP BY added_dt;";
                $res = mysqli_query($conn, $query);
                while($data =  mysqli_fetch_array($res)) {
                    $month = $data['MONTH'];
//                    $year =  ;
                    $totaluser = $data['number'];
                    ?>
                                    ['<?php echo $month; ?>',<?php echo $totaluser; ?>]
                    <?php
                }
                    ?>



//                ['2004', 1000, 400],
//                ['2005', 1170, 460],
//                ['2006', 660, 1120],
//                ['2007', 1030, 540]
                ]);

                var options = {
                    title: 'Company Performance',
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

