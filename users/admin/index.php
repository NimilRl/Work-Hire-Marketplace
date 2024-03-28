<?php 
include './db_connection.php';
$result = mysqli_query($db_connection, "SELECT COUNT(`work_id`) AS countdata,work_status FROM dt_workpost GROUP BY work_status");
$chart_data = '';
while ($chartArr = mysqli_fetch_array($result)) {
    if ($chartArr["work_status"] == "C") {
        $chart_data .= "{ work_status:'Complete', value:" . $chartArr["countdata"] . "}, ";
    } elseif ($chartArr["work_status"] == "P") {
        $chart_data .= "{ work_status:'Pending', value:" . $chartArr["countdata"] . "}, ";
    } elseif ($chartArr["work_status"] == "W") {
        $chart_data .= "{ work_status:'Working', value:" . $chartArr["countdata"] . "}, ";
    }
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:17:39 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Workflow | Admin</title>

        <link rel="shortcut icon" href="assets/img/favicon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="assets/css/feather.css">
        
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="main-wrapper">

           <div class="header">

                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="assets/img/logo.jpg" alt="Logo">
                    </a>
                    <a href="index.html" class="logo logo-small">
                        <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                    </a>

                    <a href="javascript:void(0);" id="toggle_btn">
                        <i class="feather-chevrons-left"></i>
                    </a>


                    <a class="mobile_btn" id="mobile_btn">
                        <i class="feather-chevrons-left"></i>
                    </a>

                </div>


                <div class="top-nav-search">
                    <form>
                        <input type="text" class="form-control" placeholder="Start typing your Search...">
                        <button class="btn" type="submit"><i class="feather-search"></i></button>
                    </form>
                </div>


                <ul class="nav user-menu">

                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="feather-bell"></i> <span class="badge badge-pill">5</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Brian Johnson</span> paid the invoice <span class="noti-title">#DF65485</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-03.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Marie Canales</span> has accepted your estimate <span class="noti-title">#GTR458789</span></p>
                                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <div class="avatar avatar-sm flex-shrink-0">
                                                    <span class="avatar-title rounded-circle bg-primary-light"><i class="far fa-user"></i></span>
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">New user registered</span></p>
                                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-04.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Barbara Moore</span> declined the invoice <span class="noti-title">#RDW026896</span></p>
                                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <div class="avatar avatar-sm flex-shrink-0">
                                                    <span class="avatar-title rounded-circle bg-info-light"><i class="far fa-comment"></i></span>
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">You have received a new message</span></p>
                                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="#">View all Notifications</a>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img src="assets/img/profiles/avatar-07.jpg" alt="">
                                <span class="status online"></span>
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i> Profile</a>
                            <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="me-1"></i> Settings</a>
                            <a class="dropdown-item" href="login.html"><i data-feather="log-out" class="me-1"></i> Logout</a>
                        </div>
                    </li>

                </ul>

            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"><span>Main</span></li>
                            <li class="active">
                                <a href="index.php"><i data-feather="home"></i> <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="domain.php"><i data-feather="copy"></i> <span>Domain</span></a>
                            </li>
                            <li>
                                <a href="work.php"><i data-feather="database"></i> <span>Works</span></a>
                            </li>
                            <li>
                                <a href="users.php"><i data-feather="users"></i> <span>Users</span></a>
                            </li>
                             <li>
                                 <a href="skill.php"><i data-feather="award"></i> <span>Skills</span></a>
                            </li>
<!--                            <li>
                                 <a href="domain_report.php"><i data-feather="pie-chart"></i> <span>Reports</span></a>
                            </li>-->
                            <li>
                                <a href="settings.php"><i data-feather="settings"></i> <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        
        
        $users_result = mysqli_query($db_connection, "SELECT COUNT(user_id) FROM `dt_user`");
        $users_total = $users_result->fetch_row();

        $employer_result = mysqli_query($db_connection, "SELECT COUNT(employer_id) FROM `dt_employer`");
        $employer_total = $employer_result->fetch_row();

        $freelancer_result = mysqli_query($db_connection, "SELECT COUNT(freelancer_id) FROM `dt_freelancer`");
        $freelancer_total = $freelancer_result->fetch_row();

        $active_user_result = mysqli_query($db_connection, "SELECT COUNT(user_id) FROM `dt_user` where status='Active Now'");
        $active_user_total = $active_user_result->fetch_row();

        $work_result = mysqli_query($db_connection, "SELECT COUNT(work_id) FROM `dt_workpost`");
        $work_total = $work_result->fetch_row();

        $domain_result = mysqli_query($db_connection, "SELECT COUNT(domain_id) FROM `dt_domain_master`");
        $domain_total = $domain_result->fetch_row();
        
        ?>
        <?php

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
            $month[] = $row_count_E['MONTH'];
            $countE[] = $row_count_E['COUNTE'];
            
            echo $row_count_E['COUNTE'];
        }
        
        ?>
        

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Dashboard</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!--<div class="col-md-8">-->

                        <div class="row">
                            <div class="col-md-4 d-flex">
                                <div class="card wizard-card flex-fill">
                                    <div class="card-body">
                                        <p class="text-primary mt-0 mb-2">Users</p>
                                        <h5><?php echo ' ', $users_total[0]; ?></h5>
                                        <p><a href="users.php">view details</a></p>
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-bezier-curve"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-md-4 d-flex">
                                <div class="card wizard-card flex-fill">
                                    <div class="card-body">
                                        <p class="text-primary mt-0 mb-2">Employer</p>
                                        <h5><?php // echo ' ', $employer_total[0]; ?></h5>
                                        <p><a href="users.php">view details</a></p>
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-users"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card wizard-card flex-fill">
                                    <div class="card-body">
                                        <p class="text-primary mt-0 mb-2">Freelancer</p>
                                        <h5><?php // echo ' ', $freelancer_total[0]; ?></h5>
                                        <p><a href="users.php">view details</a></p>
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-users"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card wizard-card flex-fill">
                                    <div class="card-body">
                                        <p class="text-primary mt-0 mb-2">Active users</p>
                                        <h5><?php // echo ' ', $active_user_total[0]; ?></h5>
                                        <p><a href="#">view details</a></p>
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-bezier-curve"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-md-4 d-flex">
                                <div class="card wizard-card flex-fill">
                                    <div class="card-body">
                                        <p class="text-primary mt-0 mb-2">Works</p>
                                        <h5><?php echo ' ', $work_total[0]; ?></h5>
                                        <p><a href="work.php">view details</a></p>
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-bezier-curve"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card wizard-card flex-fill">
                                    <div class="card-body">
                                        <p class="text-primary mt-0 mb-2">Domains</p>
                                        <h5><?php echo ' ', $domain_total[0]; ?></h5>
                                        <p><a href="domain.php">view details</a></p>
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-bezier-curve"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="row">-->
                            <div class="col-lg-12 d-flex">
                                <div class="card w-100">
                                    <div class="card-body pt-0 pb-2">
                                        <div class="card-header">
                                            <h5 class="card-title">Monthly work status</h5>
                                        </div>
                                        <div id="chart"></div>
                                        
                                    </div>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php  
                                $piechart = mysqli_query($db_connection, "SELECT user_type, count(*) as number FROM dt_user GROUP BY user_type"); 
                                ?>
                                <div class="col-md-4 d-flex">
                                <div class="card w-100">
                                <div class="card-body pt-0">
                                <div id="piechart" style="width: 400px; height: 400px;"></div> 
                        </div>
                       </div>
                     </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery-3.6.0.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <script src="assets/js/feather.min.js"></script>

        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/select2/js/select2.min.js"></script>

        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/datatables.min.js"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
        <!--<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>-->

        <script src="assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:18:11 GMT -->
</html>
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
        <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['User_type', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($piechart))  
                          {  
                               echo "['".$row["user_type"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Count Employer and Freelancer',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>