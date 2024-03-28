<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/admin/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:18:36 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Workflow | Work</title>

        <link rel="shortcut icon" href="assets/img/favicon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="assets/css/feather.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

        <?php
        include './db_connection.php';
        ?>
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
                            <li>
                                <a href="index.php"><i data-feather="home"></i> <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="domain.php"><i data-feather="copy"></i> <span>Domain</span></a>
                            </li>
                            <li class="active">
                                <a href="work.php"><i data-feather="database"></i> <span>Works</span></a>
                            </li>
                            <li>
                                <a href="users.php"><i data-feather="users"></i> <span>Users</span></a>
                            </li>
                             <li>
                                 <a href="skill.php"><i data-feather="award"></i> <span>Skills</span></a>
                            </li>
<!--                             <li>
                                 <a href="domain_report.php"><i data-feather="pie-chart"></i> <span>Reports</span></a>
                            </li>-->
                            <li>
                                <a href="settings.php"><i data-feather="settings"></i> <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Work</h3>
                            <ul class="breadcrumb">
                                <!--<li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>-->
                            </ul>
                        </div>
                        <div class="col-auto">
                            <a class="btn filter-btn" href="javascript:void(0);" id="filter_search">
                                <i class="fas fa-filter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="card filter-card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <form action="#" method="post">
                                <div class="row filter-row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <?php $domain = mysqli_query($db_connection, "SELECT * FROM dt_domain_master"); ?>

                                            <label>Select domain</label>
                                            <select class="form-select" name="select_domain" style="width:300px; height:50px;">
                                        <option value="0">Select domain</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($domain)) {
//                                      
                                            echo "<option value='" . $row['domain_id'] . "'>" . $row['domain_name'] . "</option>";
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <br>
                                    
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" name = "btnfilter" type="submit" style="width:200px; height:50px;">Filter</button>
                                        </div>
                                    </div>
                                    <div class="row filter-row">
<!--                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>-->
<!--                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>From Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text" name="fromdate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label>To Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text" name="todate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit" name="btnsearch">Submit</button>
                                        </div>
                                    </div>-->
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                
                

                <div class="card bg-white projects-card">
                    <div class="card-body pt-0">
                        <div class="card-header">
                            <h5 class="card-title">Work</h5>
                        </div>
                        <div class="reviews-menu-links">
                            <ul role="tablist" class="nav nav-pills card-header-pills nav-justified">
                                <li class="nav-item">
                                    <a href="#tab-4" data-bs-toggle="tab" class="nav-link active">All</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-5" data-bs-toggle="tab" class="nav-link">Completed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-6" data-bs-toggle="tab" class="nav-link">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab-7" data-bs-toggle="tab" class="nav-link">Working</a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $result = mysqli_query($db_connection, "SELECT * FROM dt_workpost");
                        ?>
                        <div class="tab-content pt-0">
                            <div role="tabpanel" id="tab-4" class="tab-pane fade active show">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0 datatable">
                                        <thead>
                                            <tr>
                                            <!--<th></th>-->
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Work Title</th>
                                                <th>Domain name</th>
                                                <th>Size</th>
                                                <!--<th>Fix budget</th>-->
                                                <th>Added date</th>
                                                <th>Status</th>
                                                <th class="text-end"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //filter on domain
                                            if(isset($_POST['btnfilter']) &&  $_POST['select_domain'] != 0){
                                                $DomainName = $_POST['select_domain'];
                                                $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` where domain_id=".$DomainName);
//                                          $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost`");
                                            }
                                            else {
                                               $getdata = mysqli_query($db_connection, "SELECT * FROM dt_workpost");
//                                                
                                            }
                                            
                                            //filter on date
                                            if(isset($_POST['btnsearch'])){
                                                $fdate = date("Y-m-d", strtotime($_POST['fromdate']));
                                                $tdate = date("Y-m-d", strtotime($_POST['todate']));
                                                $search = mysqli_query($db_connection, "SELECT * FROM dt_workpost WHERE added_date BETWEEN '$fdate' AND '$tdate'");
                                            }
                                            else {
                                                $search = mysqli_query($db_connection, "SELECT * FROM dt_workpost");
                                            }
                                            $w1 = 1;

                                            //$getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost`");

                                            while ($row = mysqli_fetch_assoc($getdata)) {
                                                
//                                                while ($row = mysqli_fetch_assoc($search)){
                                                    
                                                $d_name = $row['domain_id'];

                                                $name = mysqli_query($db_connection, "SELECT user_name FROM dt_user WHERE user_id=$row[user_id]");
                                                $domain_name = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=".$d_name);

                                                echo "<tr>";
                                                $username = $name->fetch_assoc();
                                                $domainname = $domain_name->fetch_assoc();
                                                echo "<td>" . $w1 . "</td>";
                                                echo "<td>" . $username['user_name'] . "</td>";
                                                echo "<td>" . $row['work_title'] . "</td>";
                                                echo "<td>" . $domainname['domain_name'] . "</td>";
                                                echo "<td>" . $row['work_size'] . "</td>";
//                                                echo "<td>" . $row['fix_budget'] . "</td>";
                                                echo "<td>" . $row['added_dt'] . "</td>";
                                                echo "<td>" . $row['work_status'] . "</td>";
                                                echo"<td>";
//        echo"<div>";
//                                                echo"<a href='javascript:void(0);' class='btn btn-sm btn-secondary me-2' data-bs-toggle='modal' data-bs-target='#add-category'><i class='far fa-edit'></i></a>";
//                                                echo "<a href='delete_data.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete_category'><i class='far fa-trash-alt'></i></a>";
//        echo"<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list' id='$row[domain_id]'>
//             <a class='dropdown-item' href='javascript:void(0);?domain_id=$row[domain_id]'><i class='far fa-trash-alt'></i> Delete</a>
//                 </div>";
//        echo"</div>";
                                                echo"</td>";
                                                echo "</tr>";
                                                $w1++;
                                                }
//                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-5" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Work Title</th>
                                                <th>Domain name</th>
                                                <th>Size</th>
                                                <!--<th>Fix budget</th>-->
                                                <th>Added date</th>
                                                <th class="text-end"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_POST['btnfilter']) &&  $_POST['select_domain'] != 0){
                                                $DomainName1 = $_POST['select_domain'];
                                                $getdata1 = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` where domain_id=".$DomainName1);
//                                          $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost`");
                                            }
                                            else {
                                               $getdata1 = mysqli_query($db_connection, "SELECT * FROM dt_workpost WHERE work_status = 'C'");
//                                                
                                            }
                                            $w2 = 1;

//                                            $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` WHERE work_status = 'P'");

                                            while ($row = mysqli_fetch_assoc($getdata1)) {
                                                $d_name1 = $row['domain_id'];

                                                $name1 = mysqli_query($db_connection, "SELECT user_name FROM dt_user WHERE user_id=$row[user_id]");
                                                $domain_name1 = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=".$d_name1);

                                                echo "<tr>";
                                                $username1 = $name1->fetch_assoc();
                                                $domainname1 = $domain_name1->fetch_assoc();
                                                echo "<td>" . $w2 . "</td>";
                                                echo "<td>" . $username1['user_name'] . "</td>";
                                                echo "<td>" . $row['work_title'] . "</td>";
                                                echo "<td>" . $domainname1['domain_name'] . "</td>";
                                                echo "<td>" . $row['work_size'] . "</td>";
//                                                echo "<td>" . $row['fix_budget'] . "</td>";
                                                echo "<td>" . $row['added_dt'] . "</td>";
                                                echo"<td>";
//        echo"<div>";
//                                                echo"<a href='javascript:void(0);' class='btn btn-sm btn-secondary me-2' data-bs-toggle='modal' data-bs-target='#add-category'><i class='far fa-edit'></i></a>";
//                                                echo "<a href='delete_data.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete_category'><i class='far fa-trash-alt'></i></a>";
//        echo"<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list' id='$row[domain_id]'>
//             <a class='dropdown-item' href='javascript:void(0);?domain_id=$row[domain_id]'><i class='far fa-trash-alt'></i> Delete</a>
//                 </div>";
//        echo"</div>";
                                                echo"</td>";
                                                echo "</tr>";
                                                $w2++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-6" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Work Title</th>
                                                <th>Domain name</th>
                                                <th>Size</th>
                                                <!--<th>Fix budget</th>-->
                                                <th>Added date</th>
                                                <th class="text-end"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_POST['btnfilter']) &&  $_POST['select_domain'] != 0){
                                                $DomainName2 = $_POST['select_domain'];
                                                $getdata2 = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` where domain_id=".$DomainName2);
//                                          $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost`");
                                            }
                                            else {
                                               $getdata2 = mysqli_query($db_connection, "SELECT * FROM dt_workpost WHERE work_status = 'P'");
//                                                
                                            }
                                            $w3 = 1;

//                                            $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` WHERE work_status = 'C'");

                                            while ($row = mysqli_fetch_assoc($getdata2)) {
                                                $d_name2 = $row['domain_id'];

                                                $name2 = mysqli_query($db_connection, "SELECT user_name FROM dt_user WHERE user_id=$row[user_id]");
                                                $domain_name2 = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=".$d_name2);

                                                echo "<tr>";
                                                $username2 = $name2->fetch_assoc();
                                                $domainname2 = $domain_name2->fetch_assoc();
                                                echo "<td>" . $w3 . "</td>";
                                                echo "<td>" . $username2['user_name'] . "</td>";
                                                echo "<td>" . $row['work_title'] . "</td>";
                                                echo "<td>" . $domainname2['domain_name'] . "</td>";
                                                echo "<td>" . $row['work_size'] . "</td>";
//                                                echo "<td>" . $row['fix_budget'] . "</td>";
                                                echo "<td>" . $row['added_dt'] . "</td>";
                                                echo"<td>";
//        echo"<div>";
//                                                echo"<a href='javascript:void(0);' class='btn btn-sm btn-secondary me-2' data-bs-toggle='modal' data-bs-target='#add-category'><i class='far fa-edit'></i></a>";
//                                                echo "<a href='delete_data.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete_category'><i class='far fa-trash-alt'></i></a>";
//        echo"<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list' id='$row[domain_id]'>
//             <a class='dropdown-item' href='javascript:void(0);?domain_id=$row[domain_id]'><i class='far fa-trash-alt'></i> Delete</a>
//                 </div>";
//        echo"</div>";
                                                echo"</td>";
                                                echo "</tr>";
                                                $w3++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-7" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Work Title</th>
                                                <th>Domain name</th>
                                                <th>Size</th>
                                                <!--<th>Fix budget</th>-->
                                                <th>Added date</th>
                                                <th class="text-end"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_POST['btnfilter']) &&  $_POST['select_domain'] != 0){
                                                $DomainName3 = $_POST['select_domain'];
                                                $getdata3 = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` where domain_id=".$DomainName3);
//                                          $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost`");
                                            }
                                            else {
                                               $getdata3 = mysqli_query($db_connection, "SELECT * FROM dt_workpost WHERE work_status = 'W'");
//                                                
                                            }
                                            $w4 = 1;

//                                            $getdata = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` WHERE work_status = 'W'");

                                            while ($row = mysqli_fetch_assoc($getdata3)) {
                                                $d_name3 = $row['domain_id'];

                                                $name3 = mysqli_query($db_connection, "SELECT user_name FROM dt_user WHERE user_id=$row[user_id]");
                                                $domain_name3 = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=".$d_name3);

                                                echo "<tr>";
                                                $username3 = $name3->fetch_assoc();
                                                $domainname3 = $domain_name3->fetch_assoc();
                                                echo "<td>" . $w4 . "</td>";
                                                echo "<td>" . $username3['user_name'] . "</td>";
                                                echo "<td>" . $row['work_title'] . "</td>";
                                                echo "<td>" . $domainname3['domain_name'] . "</td>";
                                                echo "<td>" . $row['work_size'] . "</td>";
//                                                echo "<td>" . $row['fix_budget'] . "</td>";
                                                echo "<td>" . $row['added_dt'] . "</td>";
                                                echo"<td>";
//        echo"<div>";
//                                                echo"<a href='javascript:void(0);' class='btn btn-sm btn-secondary me-2' data-bs-toggle='modal' data-bs-target='#add-category'><i class='far fa-edit'></i></a>";
//                                                echo "<a href='delete_data.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete_category'><i class='far fa-trash-alt'></i></a>";
//        echo"<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list' id='$row[domain_id]'>
//             <a class='dropdown-item' href='javascript:void(0);?domain_id=$row[domain_id]'><i class='far fa-trash-alt'></i> Delete</a>
//                 </div>";
//        echo"</div>";
                                                echo"</td>";
                                                echo "</tr>";
                                                $w4++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade custom-modal" id="add-category">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Projects</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" value="Website Designer Required For Directory Theme">
                        </div>
                        <div class="form-group">
                            <label>Budget</label>
                            <input type="text" class="form-control" value="$2222">
                        </div>
                        <div class="form-group">
                            <label>Technology</label>
                            <input type="text" class="form-control" value="Angler">
                        </div>
                        <div class="form-group">
                            <label>Technology</label>
                            <input type="text" class="form-control" value="AMAZE TECH">
                        </div>
                        <div class="form-group">
                            <label>From Date</label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text" value="20-01-2022">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To Date</label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text" value="20-02-2022">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="delete_category" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
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

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from kofejob.dreamguystech.com/template/admin/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:18:43 GMT -->
</html>