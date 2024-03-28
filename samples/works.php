<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <?php include '../db_connection.php'; ?>

    </head>
    <body>
        <?php
        // put your code here
//        $query = "SELECT work_status, count(*) as number FROM dt_workpost WHERE user_id = $id GROUP BY work_status ;";
//                                                $result = mysqli_query($db_connection, $query);

        $month = [];
        $countF = [];
        $countE = [];

        $get_count_F = mysqli_query($db_connection, "SELECT MONTHNAME(added_dt) MONTH, COUNT(*) COUNTF FROM dt_user WHERE user_type = 'F' AND YEAR(added_dt) = '2022' GROUP BY MONTH(added_dt);");

        while ($row_count_F = mysqli_fetch_array($get_count_F)) {
            $month[] = $row_count_F['MONTH'];
            $countF[] = $row_count_F['COUNTF'];
            echo $row_count_F['COUNTF'];
        }

        $get_count_E = mysqli_query($db_connection, "SELECT MONTHNAME(added_dt) MONTH, COUNT(*) COUNTE FROM dt_user WHERE user_type = 'E' AND YEAR(added_dt) = '2022' GROUP BY MONTH(added_dt);");

        while ($row_count_E = mysqli_fetch_array($get_count_E)) {
            $countE[] = $row_count_E['COUNTE'];

            echo $row_count_E['COUNTE'];
        }
        ?>


        <div id="chart" ></div>

        <script type="text/javascript">

            var options = {
                series: [{
                        name: 'Freelancers',
                        data: [<?php echo implode(",", $countF); ?>]
                    }
                    , {
                        name: 'Employers',
                        data: [<?php echo implode(",", $countE); ?>]
                    }
                ],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'month',
                    categories: ['<?php echo implode("','", $month); ?>']
                }

            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();



        </script>
    </body>
</html>
