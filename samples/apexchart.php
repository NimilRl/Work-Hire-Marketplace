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


        <div id="chart" ></div>

        <script type="text/javascript">
            
            
            var options = {
          series: [{
          type: 'column',
          name: 'Completed',
          data: [<?php echo implode(",", $countC); ?>]
        }, {
          type: 'area',
          name: 'Panding',
          data: [<?php echo implode(",", $countP); ?>]
        }, {
          type: 'line',
          name: 'Ongoing',
          data: [<?php echo implode(",", $countW); ?>]
        }],
          chart: {
          height: 350,
          type: 'line',
          stacked: false,
        },
        stroke: {
          width: [0, 2, 5],
          curve: 'smooth'
        },
        plotOptions: {
          bar: {
            columnWidth: '50%'
          }
        },
        
        fill: {
          opacity: [0.85, 0.25, 1],
          gradient: {
            inverseColors: false,
            shade: 'light',
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
          }
        },
        labels: ['<?php echo implode("','", $month2); ?>'],
        markers: {
          size: 0
        },
        xaxis: {
          type: 'month',
          
        },
        yaxis: {
          title: {
            text: 'Points',
          },
          min: 0
        },
        tooltip: {
          shared: true,
          intersect: false,
          y: {
            formatter: function (y) {
              if (typeof y !== "undefined") {
                return y.toFixed(0) + " points";
              }
              return y;
        
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
            
            
            
          

        </script>
    </body>
</html>
