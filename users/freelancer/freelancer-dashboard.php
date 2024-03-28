<!DOCTYPE html>
<html lang="en">

    <head>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <?php
        require '../db_connection.php';

        include '../../disilab-api/api.php';

        if (!isset($_SESSION['login_F'])) {
            header('Location: login.php');
        }
        $id = $_SESSION['login_F'];

        $get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");

        if (mysqli_num_rows($get_user) > 0) {
            $user = mysqli_fetch_assoc($get_user);
        } else {
            header('Location: ../logout.php');
            exit;
        }



        $month1 = [];
        $count = [];

        $get_count_status = mysqli_query($db_connection, "SELECT DATE_FORMAT(dt_workpost_proposals.datetime,'%M %Y') MONTH, COUNT(*) COUNT FROM dt_workpost_proposals WHERE dt_workpost_proposals.datetime > (now() - INTERVAL 12 month) and user_id = $id AND status = 'H' GROUP BY MONTH(datetime);");
        while ($row_count_status = mysqli_fetch_array($get_count_status)) {
            $month1[] = $row_count_status['MONTH'];
            $count[] = $row_count_status['COUNT'];
        }



//        $month_status = [];
//        $countP = [];
//        $countH = [];
//        $countR = [];
//
//        $get_count = mysqli_query($db_connection, "SELECT MONTHNAME(datetime) MONTH, COUNT(case when dt_workpost_proposals.status = 'H' then 1 END) AS COUNTH , COUNT(case when dt_workpost_proposals.status = 'P' then 1 END) AS COUNTP , COUNT(case when dt_workpost_proposals.status = 'R' then 1 END) AS COUNTR  FROM dt_workpost_proposals WHERE dt_workpost_proposals.user_id = 17 AND YEAR(datetime) = '2022' GROUP BY MONTH(datetime);");
//
//        while ($row_count = mysqli_fetch_array($get_count)) {
//            $countR[] = $row_count['COUNTR'];
//            $countH[] = $row_count['COUNTH'];
//            $countP[] = $row_count['COUNTP'];
//            $month[] = $row_count['MONTH'];
//        }
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <title>WorkFlow</title>

        <?php include_once './include/resource.php' ?>

    </head>

    <body class="dashboard-page">
        
        <?php
        // put your code here
//        $query = "SELECT work_status, count(*) as number FROM dt_workpost WHERE user_id = $id GROUP BY work_status ;";
//                                                $result = mysqli_query($db_connection, $query);

        $month = [];
        $countP = [];
        $countH = [];
        $countR = [];        

        $get_count = mysqli_query($db_connection, "SELECT DATE_FORMAT(dt_workpost_proposals.datetime,'%M %Y') MONTH, COUNT(case when dt_workpost_proposals.status = 'H' then 1 END) AS COUNTH , COUNT(case when dt_workpost_proposals.status = 'P' then 1 END) AS COUNTP , COUNT(case when dt_workpost_proposals.status = 'R' then 1 END) AS COUNTR  FROM dt_workpost_proposals WHERE dt_workpost_proposals.user_id = $id AND dt_workpost_proposals.datetime > (now() - INTERVAL 12 month) GROUP BY MONTH(datetime);");

        while ($row_count = mysqli_fetch_array($get_count)) {
            $countR[] = $row_count['COUNTR'];  
            $countH[] = $row_count['COUNTH'];
            $countP[] = $row_count['COUNTP'];
            $month[] = $row_count['MONTH'];
        }
        
        
        ?>

        <div class="main-wrapper">

            <?php include_once './include/header.php' ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php include_once './include/navigation.php' ?>
                        <div class="col-xl-9 col-md-8">
                            <div class="dashboard-sec">
                                <div class="row">
                                    <?php
                                    $get_count_completed = mysqli_query($db_connection, "select count(*) as num from dt_workpost, dt_workpost_proposals where dt_workpost.work_id = dt_workpost_proposals.work_id and dt_workpost.work_status = 'C' and dt_workpost_proposals.user_id= $id;");
                                    $row_count_completed = mysqli_fetch_array($get_count_completed);
                                    ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="dash-info">
                                                <div class="dash-widget-info">Completed Works ✔</div>
                                                <div class="dash-widget-count"><?php echo $row_count_completed['num'] ?></div>
                                            </div>
                                            <!--                                        <div class="dash-widget-more">
                                                                                        <a href="freelancer-completed-projects.html" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                                                                    </div>-->
                                        </div>
                                    </div>
                                    <?php
                                    $get_count_pending = mysqli_query($db_connection, "select count(*) as num from dt_workpost, dt_workpost_proposals where dt_workpost.work_id = dt_workpost_proposals.work_id and dt_workpost.work_status = 'W' and dt_workpost_proposals.user_id= $id;");
                                    $row_count_pending = mysqli_fetch_array($get_count_pending);
                                    ?>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="dash-info">
                                                <div class="dash-widget-info">Pending Work ⌛</div>
                                                <div class="dash-widget-count"><?php echo $row_count_pending['num'] ?></div>
                                            </div>
                                            <!--                                        <div class="dash-widget-more">
                                                                                        <a href="freelancer-completed-projects.html" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                                                                    </div>-->
                                        </div>
                                    </div>
<!--                                    <p class="mb-0"><?php // echo $_SESSION['authorized_keys'];           ?></p>-->
                                    <?php
                                    if (isset($_SESSION['authorized_keys'])) {
                                        ?>

                                        <div class="col-md-6 col-lg-4">
                                            <div class="dash-widget">
                                                <div class="dash-info">
                                                    <div class="dash-widget-info"><a href="freelancer-review.html" class="d-flex">Connected with disilab 🔗</a></div>
                                                    <?php
                                                    $key = $_SESSION['authorized_keys'];

                                                    $score = getScore($key);

//                                                    echo $score;
                                                    ?>
                                                    <div class="dash-widget-count">Score : <?php echo $score; ?></div>
                                                </div>
                                                <!--                                    <div class="dash-widget-more">
                                                                                        <a href="freelancer-review.html" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                                                                    </div>-->
                                            </div>
                                        </div>



                                        <?php
                                    } else {
                                        ?>


                                        <div class="col-md-6 col-lg-4">
                                            <div class="dash-widget">
                                                <div class="dash-info">
                                                    <div class="dash-widget-info">Connect with disilab 🔗</div>
                                                    <p>Connect with disilab to view your score <a data-bs-toggle="modal" href="#file" class="d-flex">Click here to connect</a></p>
                                                </div>
                                                <!--                                    <div class="dash-widget-more">
                                                                                        <a href="freelancer-review.html" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                                                                    </div>-->
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>


                                </div>

                                <div class="row">
                                    <div class="col-xl-8 d-flex">
                                        <div class="card flex-fill">
                                            <div class="pro-head">
                                                <h5 class="card-title mb-0">Month Wise Approved Work </h5>
                                                <div class="month-detail">

                                                </div>
                                            </div>
                                            <div class="pro-body">
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
                                                    <h5 class="card-title">Work Status</h5>
                                                    <!--                                                    <div class="dropdown">
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
                                                                                                        </div>-->
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <?php
                                                $query = "select work_status, count(*) as number from dt_workpost, dt_workpost_proposals where dt_workpost.work_id = dt_workpost_proposals.work_id and dt_workpost_proposals.user_id= $id group by dt_workpost.work_status;";
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
                                                                W : Working Mode</span
                                                            >
                                                            <!--<span class="sta-count">30</span>-->
                                                        </li>
                                                    </ul>

                                                    <?php
                                                } else {
                                                    ?>

                                                    <h2>Sorry You don't have any work related data, <br> kindly place some bids 🙁</h2>

                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <?php
                            ?>
                            

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-table">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="card-title">Your Proposal Status (Monthvise)</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <a
                                                        href="proposal_list.php"
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

            var opt = {
                series: [{
                        name: 'Completed',
                        data: [<?php echo implode(",", $countH); ?>]
                    },
                            {
                        name: 'Panding',
                        data: [<?php echo implode(",", $countP); ?>]
                    },
                            {
                        name: 'Rejected',
                        data: [<?php echo implode(",", $countR); ?>]
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

            var charts = new ApexCharts(document.querySelector("#chart2"), opt);
            charts.render();



        </script>





                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-table">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="card-title">Your Proposals</h4>
                                                </div>
                                                <div class="col-auto">
                                                    <a
                                                        href="proposal_list.php"
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
                                                        $qry_proposals = mysqli_query($db_connection, "SELECT dt_workpost_proposals.* , dt_workpost.work_title , dt_workpost.added_dt FROM dt_workpost , dt_workpost_proposals WHERE dt_workpost_proposals.work_id = dt_workpost.work_id AND dt_workpost_proposals.user_id = $id ORDER BY dt_workpost_proposals.status ASC LIMIT 5;");

                                                        if (mysqli_num_rows($qry_proposals) >= 1) {

                                                            while ($row_prop = mysqli_fetch_assoc($qry_proposals)) {
                                                                ?>

                                                                <tr>
                                                                    <td>
                                                                        <span class="detail-text"><b><?php echo $row_prop['work_title'] ?></b></span
                                                                        >
                                                                        <br>
                                                                        <br>
                                                                        Initiated date : <?php time_Ago($row_prop['datetime']) ?>
                                                                        <br>
                                                                        Work uploaded on <?php time_Ago($row_prop['added_dt']) ?>
                                                                        <br>


                                                                    </td>
                                                                    <td>Your Proposed terms :                                                                        

                                                                        <?php
                                                                        if ($row_prop['hourly_rate'] != null) {
                                                                            echo $row_prop['hourly_rate'];
                                                                        } elseif ($row_prop['fix_price'] != null) {
                                                                            echo $row_prop['fix_price'];
                                                                        }
                                                                        ?>.00$
                                                                    </td>
                                                                    <td>

                                                                        <span class="table-budget">Status</span>
                                                                        <span class="d-block text-danger">
                                                                            <?php
                                                                            if ($row_prop['status'] == "H") {
                                                                                echo "Hired ✔️";
                                                                            } elseif ($row_prop['status'] == "P") {
                                                                                echo "Panding ⏳";
                                                                            } elseif ($row_prop['status'] == "R") {
                                                                                echo "Rejected ❌";
                                                                            }
                                                                            ?>
                                                                        </span>

                                                                    </td>

                                                                    <td class="text-end">
                                                                        <a
                                                                            data-bs-toggle="modal" 
                                                                            href="#file2"
                                                                            class="text-success"
                                                                            data-id="<?php echo $row_prop['cover_letter']; ?>"
                                                                            >View</a
                                                                        >
                                                                        <br>

                                                                    </td>
                                                                </tr>




                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    Sorry , You still not made any proposals on any work 😥
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script type="text/javascript">
                                $(document).on("click", ".text-success", function () {
                                    var description = $(this).data('id');
                                    $("#desc").html(description);
//                                    document.getElementById("desc").value = description;
<?php // $_SESSION['desc'] = " <script>document.write(description);</script>";      ?>
//                                    $("#desc").val(description);                                    
                                });
                            </script>


                            <div class="modal fade" id="file2">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cover Letter</h4>
                                            <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                                        </div>
                                        <form>
                                            <div class="modal-body">
                                                <div class="modal-info">                                

                                                    <div class="row">
                                                        <div class="col-md-12 submit-section">

                                                            <p id="desc">  </p>




                                                            <!--                                                            <label class="custom_check">
                                                                                                                            <input type="checkbox" name="select_time">
                                                                                                                            <span class="checkmark"></span> I agree to the Terms And Conditions  heloooooooooooo
                                                                                                                        </label>-->
                                                        </div> 
                                                        <!--                                                        <div class="col-md-12 submit-section text-end">
                                                                                                                    <button name="btn" class="btn btn-primary submit-btn" type="submit">Connect</button>
                                                                                                                </div>-->
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>







                            <?php
                            error_reporting(0);
                            if (isset($_POST['btnconnect'])) {

                                $email = $_POST['email'];
                                $pass = $_POST['pass'];

                                $key = authorize($email, $pass);

                                if ($key == 0) {
                                    echo '<script language="javascript">alert("Sorry Wrong Credential 😥");</script>';
                                } else {
                                    $authorized_keys = $key;
                                    //                                echo $authorized_keys;
                                    $sql = "UPDATE `dt_user` SET `authorized_keys`='$authorized_keys' WHERE user_id=$id;";
                                    echo '<script language="javascript">alert("' . $authorized_keys . '");</script>';
                                    if (mysqli_query($db_connection, $sql)) {
                                        $_SESSION['authorized_keys'] = $authorized_keys;
                                        header('Refresh:1');
                                    } else {
                                        echo $db_connection->error;
                                    }
                                }
                            }
                            ?>

                            <div class="modal fade" id="file">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Disilab Login details</h4>
                                            <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                                        </div>
                                        <form action="#" method="post">
                                            <div class="modal-body">
                                                <div class="modal-info">                                
                                                    <div class="proposal-features">
                                                        <div class="proposal-widget proposal-success">                                       
                                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                                            <br>
                                                            <input type="password" name="pass" class="form-control" placeholder="Password">
                                                        </div>                                    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 submit-section">
                                                            <label class="custom_check">
                                                                <input type="checkbox" name="select_time">
                                                                <span class="checkmark"></span> I agree to the Terms And Conditions
                                                            </label>
                                                        </div> 
                                                        <div class="col-md-12 submit-section text-end">
                                                            <button name="btnconnect" class="btn btn-primary submit-btn" type="submit">Connect</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                            </body>
                            <script>

<?php
if ($count == null || $month == null) {
    ?>

                                    var divContents = document.getElementById("chartprofile").innerHTML = "<h3>Sorry , You still not Completed any works 😥</h3>";

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
                                                categories: ['<?php echo implode("','", $month1); ?>'],
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
                            <script src="../../assets/plugins/apexchart/apexcharts.min.js"></script>
                            <!-- <script src="../../assets/plugins/apexchart/chart-data.js"></script> -->

                            <script src="../../assets/js/jquery-3.6.0.min.js"></script>

                            <script src="../../assets/js/bootstrap.bundle.min.js"></script>

                            <script src="../../assets/plugins/apexchart/apexcharts.min.js"></script>
                            <!--<script src="../../assets/plugins/apexchart/chart-data.js"></script>-->

                            <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
                            <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

                            <script src="../../assets/js/script.js"></script>
                            </html>

