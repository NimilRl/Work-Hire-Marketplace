<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require './include/prep.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  

        <title>WorkFlow</title>
        <?php
        include_once './include/resource.php';

        $month = [];
        $count = [];

        $get_count_status = mysqli_query($db_connection, "SELECT DATE_FORMAT(added_dt,'%M %Y') MONTH, COUNT(*) COUNT FROM dt_workpost WHERE added_dt > (now() - INTERVAL 12 month) and user_id = $id and work_status = 'C' GROUP BY MONTH(added_dt);");

        while ($row_count_status = mysqli_fetch_array($get_count_status)) {
            $month[] = $row_count_status['MONTH'];
            $count[] = $row_count_status['COUNT'];
        }



//        print_r($month)
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    </head>
    <body class="dashboard-page">



        <?php
        // put your code here
//        $query = "SELECT work_status, count(*) as number FROM dt_workpost WHERE user_id = $id GROUP BY work_status ;";
//                                                $result = mysqli_query($db_connection, $query);

        $month2 = [];
        $countP = [];
        $countC = [];
        $countW = [];

        $get_count = mysqli_query($db_connection, "SELECT DATE_FORMAT(added_dt,'%M %Y') yearmonth, COUNT(case when dt_workpost.work_status = 'C' then 1 END) AS COUNTC , COUNT(case when dt_workpost.work_status = 'P' then 1 END) AS COUNTP , COUNT(case when dt_workpost.work_status = 'W' then 1 END) AS COUNTW FROM dt_workpost WHERE dt_workpost.user_id = $id AND added_dt > (now() - INTERVAL 12 month) GROUP BY MONTH(added_dt);");

        while ($row_count = mysqli_fetch_array($get_count)) {
            $countC[] = $row_count['COUNTC'];
            $countW[] = $row_count['COUNTW'];
            $countP[] = $row_count['COUNTP'];
            $month2[] = $row_count['yearmonth'];
        }
        ?>

        <div class="main-wrapper">
<?php include_once './include/header.php' ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-4 theiaStickySidebar">
<?php include_once './dashboard_nav.php' ?>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="dashboard-sec">


                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="dash-info">
                                                <div class="dash-widget-info">Works Posted</div>
<?php
$count_work = mysqli_query($db_connection, "SELECT COUNT(*) AS total_work FROM dt_workpost WHERE user_id = $id;");
$row_countwork = mysqli_fetch_assoc($count_work);
?>
                                                <div class="dash-widget-count"><?php echo $row_countwork['total_work']; ?></div>
                                            </div>
                                            <div class="dash-widget-more">
                                                <a href="manage-workposts.php" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="dash-info">
                                                <div class="dash-widget-info">Ongoing Works</div>
<?php
$count_ongoing = mysqli_query($db_connection, "SELECT COUNT(*) AS total_ongoing FROM dt_workpost WHERE user_id = $id AND work_status = 'W';");
$row_countongoing = mysqli_fetch_assoc($count_ongoing);
?>
                                                <div class="dash-widget-count"><?php echo $row_countongoing['total_ongoing']; ?></div>
                                            </div>
                                            <div class="dash-widget-more">
                                                <a href="manage-workposts.php" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="dash-info">
                                                <div class="dash-widget-info">Completed Works</div>
<?php
$count_completed = mysqli_query($db_connection, "SELECT COUNT(*) AS total_completed FROM dt_workpost WHERE user_id = $id AND work_status = 'C';");
$row_countcompleted = mysqli_fetch_assoc($count_completed);
?>
                                                <div class="dash-widget-count"><?php echo $row_countcompleted['total_completed']; ?></div>
                                            </div>
                                            <div class="dash-widget-more">
                                                <a href="manage-workposts.php" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-8 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                    >
                                                    <h5 class="card-title">Month vise completed workposts</h5>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-white btn-sm dropdown-toggle"
                                                            type="button"
                                                            data-bs-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                            >
                                                            Monthly
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-start">
                                                            <a
                                                                href="javascript:void(0);"
                                                                class="dropdown-item"
                                                                >Weekly</a
                                                            >
                                                            <a
                                                                href="javascript:void(0);"
                                                                class="dropdown-item"
                                                                >Monthly</a
                                                            >
                                                            <a
                                                                href="javascript:void(0);"
                                                                class="dropdown-item"
                                                                >Yearly</a
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="chartprofile"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <div
                                                    class="d-flex justify-content-between align-items-center"
                                                    >
                                                    <h5 class="card-title">Static Analytics</h5>
                                                    
                                                </div>
                                            </div>
                                            <div class="card-body">

<?php
$query = "SELECT work_status, count(*) as number FROM dt_workpost WHERE user_id = $id GROUP BY work_status ;";
$result = mysqli_query($db_connection, $query);

if (mysqli_num_rows($result) > 0) {
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


                                                    <!--                                                <div id="chartradial"></div>-->
                                                    <ul class="static-list">
                                                        <!--                                                    <li>
                                                                                                                <span
                                                                                                                    ><i class="fas fa-circle text-violet me-1"></i>
                                                                                                                    Applied Jobs</span
                                                                                                                >
                                                                                                                <span class="sta-count">30</span>
                                                                                                            </li>-->
                                                        <li>
                                                            <span
                                                                ><i class="fas fa-circle text-pink me-1"></i>
                                                                C : Completed Works</span
                                                            >
                                                            <!--<span class="sta-count">30</span>-->
                                                        </li>
                                                        <li>
                                                            <span
                                                                ><i class="fas fa-circle text-yellow me-1"></i>
                                                                P : Panding Works</span
                                                            >
                                                            <!--<span class="sta-count">30</span>-->
                                                        </li>
                                                        <li>
                                                            <span
                                                                ><i class="fas fa-circle text-blue me-1"></i>
                                                                W : Ongoing Works</span
                                                            >
                                                            <!--<span class="sta-count">30</span>-->
                                                        </li>
                                                    </ul>

    <?php
} else {
    ?>

                                                    <h2>Sorry You have to uplode some works to view graphs 🙁</h2>

    <?php
}
?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-table">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="card-title">Your Works (Monthvise)</h4>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a
                                                            href="manage-workposts.php"
                                                            class="btn-right btn btn-sm fund-btn"
                                                            >
                                                            See all postings
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div id="chart2" ></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
          type: 'months',
          
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

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
      


                                </script>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-table">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="card-title">Your Postings</h4>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a
                                                            href="manage-workposts.php"
                                                            class="btn-right btn btn-sm fund-btn"
                                                            >
                                                            See all postings
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive table-job">
                                                    <table class="table table-hover table-center mb-0">

                                                        <tbody>

<?php
include_once '../timediff.php';

$qry_work = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` WHERE user_id = $id ORDER BY added_dt ASC LIMIT 5;");

//if (mysqli_num_rows($qry_get_workdt) >= 1) {

while ($row_work = mysqli_fetch_assoc($qry_work)) {


//                                                                $timeStamp = date("m/d/Y", strtotime($row_work['added_dt']));
//
//                                                                $dateObj = DateTime::createFromFormat('!m', date('m', strtotime($timeStamp)));
//                                                                $monthName = $dateObj->format('F');
//
//                                                                $day = date('d', strtotime($timeStamp));
//                                                                $year = date('y', strtotime($timeStamp));

    $domain_id = $row_work['domain_id'];

    $qry_get_domain = mysqli_query($db_connection, "SELECT domain_name FROM `dt_domain_master` WHERE domain_id = $domain_id");

    $row_domain = mysqli_fetch_array($qry_get_domain, MYSQLI_ASSOC);

//                                                                    echo $row_domain['domain_name'];

    include_once '../timediff.php';
    ?>

                                                                <tr>
                                                                    <td>
                                                                        <span class="detail-text"><b><?php echo $row_work['work_title']; ?></b></span
                                                                        >
                                                                        <br>
                                                                        <br>
    <?php echo $row_domain['domain_name']; ?>
                                                                        <br>
                                                                        Added at  <?php time_Ago($row_work['added_dt']); ?>
                                                                        <br>


                                                                    </td>
                                                                    <td><?php
    $work_id = $row_work['work_id'];
//                                                                        echo $work_id;

    $get_proposal_count = mysqli_query($db_connection, "SELECT COUNT(*) as total FROM `dt_workpost_proposals` WHERE work_id = $work_id;");

    $row_count = mysqli_fetch_assoc($get_proposal_count);

//                                                                        
//                                                                        
//                                                                        echo $row_count['total'];
    ?>Proposals : <?php echo $row_count['total']; ?></td>
                                                                    <td>

                                                                        <span class="table-budget">Status</span>

    <?php
    if ($row_work['work_status'] == 'P') {
        ?>

                                                                            <span class="d-block text-danger">Panding</span>

        <?php
    } else if ($row_work['work_status'] == 'W') {
        ?>
                                                                            <span class="d-block text-danger">Working</span>

                                                                            <?php
                                                                        } else if ($row_work['work_status'] == 'C') {
                                                                            ?>

                                                                            <span class="d-block text-danger" >Completed</span>
                                                                            <?php
                                                                        }
                                                                        ?>




                                                                    </td>

                                                                    <td class="text-end">
                                                                        <a
                                                                            href="workpost_proposals.php?wid=<?php echo $row_work['work_id']; ?>"
                                                                            class="text-success"
                                                                            >View</a
                                                                        >
                                                                        <br>
                                                                        <!--                                                                        <a
                                                                                                                                                    href="view-project-detail.html"
                                                                                                                                                    class="text-success"
                                                                                                                                                    >Edit Posting</a
                                                                                                                                                >-->
                                                                    </td>
                                                                </tr>






    <?php
//                                                                if ($row['user_type'] == 'F') {
//                                                                    $_SESSION['login_F'] = $row['user_id'];
//                                                                    echo $_SESSION['login_F'];
//                                                                    header('Location: users/freelancer/freelancer-dashboard.php');
//                                                                }
}
//                                                             else {
//                                                            $msg = "* Wrong username or password";
//                                                            }
?>




                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <section class="comp-section comp-cards">
                                    <div class="section-header">
                                        <h3 class="section-title">How to work with talent</h3>
                                        <p>Connect with a talent community that numbers in the millions, fast and at no cost.</p>
                                        <div class="line"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">1. Post a job to the marketplace</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Provide enough detail for great talent to figure out if the work is right for them.</p>
                                                    <p>(You can always edit your post, or send an invite to reach out to people directly.)</p>
                                                    <a class="card-link" href="https://www.upwork.com/resources/writing-awesome-job-post"><u>Check out examples of effective job posts</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">2. Get proposals from talent</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">A strong working relationship starts with open communication. Here's your chance to ask about experience, set expectations for what you need, and discuss terms of the work.</p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">3. Start working together</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Once you both agree on terms, collaborate with simple and secure tools like chat, file sharing, and time tracking.</p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">4. Pay for work you approve</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Reports are useful for keeping track of payments and reviewing work. As you complete jobs, you can build trusting relationships with talent in a way that helps you both grow.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Questions?</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Visit our <a class="card-link" href="https://support.upwork.com/hc/en-us#tab-pane-client"> <u>Help Center</u> </a> to learn more tips for finding the right talent.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>                                   
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>



    <script>

<?php
if ($count == null || $month == null) {
    ?>

            var divContents = document.getElementById("chartprofile").innerHTML = "<h3>Sorry , You still not added any works 😥</h3>";

    <?php
} else {
    ?>
            $(document).ready(function () {

                var options = {
                    series: [{
                            name: "profile view",
                            data: [<?php echo implode(",", $count); ?>]
                        }],
                    chart: {
                        height: 360,
                        type: 'line',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    colors: ["#FF5B37"],
                    stroke: {
                        curve: 'straight',
                        width: [1]
                    },
                    markers: {
                        size: 4,
                        colors: ["#FF5B37"],
                        strokeColors: "#FF5B37",
                        strokeWidth: 1,
                        hover: {
                            size: 7,
                        }
                    },
                    grid: {
                        position: 'front',
                        borderColor: '#ddd',
                        strokeDashArray: 7,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        }
                    },
                    xaxis: {
                        categories: ['<?php echo implode("','", $month); ?>'],
                        lines: {
                            show: false,
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chartprofile"), options);
                chart.render();
            });

    <?php
}
?>

    </script>
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/plugins/apexchart/apexcharts.min.js"></script>
    <!--<script src="../../assets/plugins/apexchart/chart-data.js"></script>-->

    <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <script src="../../assets/js/script.js"></script>
</html>