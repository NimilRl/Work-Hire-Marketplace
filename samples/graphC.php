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

        $month2 = [];
        $countP = [];
        $countC = [];
        $countW = [];

        $get_count = mysqli_query($db_connection, "SELECT DATE_FORMAT(added_dt,'%M %Y') yearmonth, COUNT(case when dt_workpost.work_status = 'C' then 1 END) AS COUNTC , COUNT(case when dt_workpost.work_status = 'P' then 1 END) AS COUNTP , COUNT(case when dt_workpost.work_status = 'W' then 1 END) AS COUNTW FROM dt_workpost WHERE dt_workpost.user_id = 24 AND added_dt > (now() - INTERVAL 12 month) GROUP BY MONTH(added_dt);");

        while ($row_count = mysqli_fetch_array($get_count)) {
            $countC[] = $row_count['COUNTC'];
            $countW[] = $row_count['COUNTW'];
            $countP[] = $row_count['COUNTP'];
            $month2[] = $row_count['yearmonth'];
        }
        
        
        
        ?>


        <div id="chart2" ></div>

        <script type="text/javascript">

            var opt = {
                                        series: [{
                                                name: 'Completed',
                                                data: [<?php echo implode(",", $countC); ?>]
                                            },
                                            {
                                                name: 'Panding',
                                                data: [<?php echo implode(",", $countP); ?>]
                                            },
                                            {
                                                name: 'Ongoing',
                                                data: [<?php echo implode(",", $countW); ?>]
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
                                            categories: ['<?php echo implode("','", $month2); ?>']
                                        }

                                    };

                                    var charts = new ApexCharts(document.querySelector("#chart2"), opt);
                                    charts.render();



        </script>
    </body>
</html>
