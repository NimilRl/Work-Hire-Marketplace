<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/admin/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:18:36 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Workflow | Users</title>

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
                            <li>
                                <a href="work.php"><i data-feather="database"></i> <span>Works</span></a>
                            </li>
                            <li class="active">
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
                                <h3 class="page-title">Users</h3>
                                <ul class="breadcrumb">
                                    <!--<li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Projects</li>-->
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a class="btn filter-btn"  id="filter_search">
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
                                            <?php $country = mysqli_query($db_connection, "SELECT * FROM dt_country_master"); ?>

                                            <label>Select country</label>
                                            <select class="form-select" name="select_country" style="width:300px; height:50px;">
                                                <option value="0">Select country</option>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($country)) {

                                                    echo "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <br>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" name = "btnsubmit" type="submit" style="width:200px; height:50px;">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>


                    <div class="card bg-white projects-card">
                        <div class="card-body pt-0">
                            <div class="card-header">
                                <h5 class="card-title">Users</h5>
                            </div>
                            <div class="reviews-menu-links">
                                <ul role="tablist" class="nav nav-pills card-header-pills nav-justified">
                                    <li class="nav-item">
                                        <a href="#tab-4" data-bs-toggle="tab" class="nav-link active">Employer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab-5" data-bs-toggle="tab" class="nav-link">Freelancer</a>
                                    </li>

                                </ul>
                            </div>
                            <?php
                            $result = mysqli_query($db_connection, "SELECT * FROM dt_user");
                            $company = mysqli_query($db_connection, "SELECT company_name FROM dt_employer");
                            ?>
                            <div class="tab-content pt-0">
                                <div role="tabpanel" id="tab-4" class="tab-pane fade active show">
                                    <div class="table-responsive">
                                        <table class="table table-center table-hover mb-0 datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <!--<th>Image</th>-->
                                                    <th>Company name</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Country name</th>
                                                    <th class="text-end"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['btnsubmit']) && $_POST['select_country']) {
                                                    $abc = $_POST['select_country'];
                                                    $getdata = mysqli_query($db_connection, "SELECT * FROM dt_user where user_type='E' AND country_id= $abc ;");
                                                    if (mysqli_num_rows($getdata) >= 1) {
                                                        $e1 = 1;
                                                        while ($row = mysqli_fetch_assoc($getdata)) {
//                                                echo "<pre>"; print_r($row);

                                                            $c_name = $row['country_id'];

//                                                $country_name = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id=".$c_name. "and dt_country_master.country_name =! NULL");

                                                            $country_name = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id= dt_user.country_id AND dt_country_master.country_id = $c_name AND dt_user.country_id IS NOT NULL ;");
                                                            //$domain_name = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=$row[domain_id]");
                                                            $cname = mysqli_query($db_connection, "SELECT dt_employer.company_name FROM dt_user INNER JOIN dt_employer ON dt_user.user_id=dt_employer.user_id");

                                                            echo "<tr>";
//                                                if($country_name){
                                                            if (mysqli_num_rows($country_name) > 0) {
                                                                $country = $country_name->fetch_assoc();
//                                                    $c = $country["country_name"];
//                                                }
//                                                else {
////                                                    $country['country_name'] = "NULL";
////                                                    $c = $country["country_name"];
//                                                    $c = "null";
//                                                }
//                                                echo "country not found";
//                                                $country = $country_name->fetch_assoc();
                                                                //echo "<pre>"; print_r($row);

                                                                $companyname = $cname->fetch_assoc();

                                                                echo "<td>" . $e1 . "</td>";
                                                                // echo "<td>" . $row['user_profile_image'] . "</td>";
                                                                echo "<td>" . $companyname['company_name'] . "</td>";
                                                                echo "<td>" . $row['user_name'] . "</td>";
                                                                echo "<td>" . $row['user_email'] . "</td>";
//                                                    if ($country['country_name'] != null) {
                                                                echo "<td>" . $country['country_name'] . "</td>";
//                                                    } else {
//                                                        echo "<td>" . "Null" . "</td>";
//                                                    }
//                                                echo "<td>" . ($country['country_name'] == NULL ?  : $country['country_name']). "</td>";
                                                                echo"<td>";
//        echo"<div>";SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id="
//                                                echo"<a href='javascript:void(0);' class='btn btn-sm btn-secondary me-2' data-bs-toggle='modal' data-bs-target='#add-category'><i class='far fa-edit'></i></a>";
//                                                echo "<a href='delete_data.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete_category'><i class='far fa-trash-alt'></i></a>";
//        echo"<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list' id='$row[domain_id]'>
//             <a class='dropdown-item' href='javascript:void(0);?domain_id=$row[domain_id]'><i class='far fa-trash-alt'></i> Delete</a>
//                 </div>";
//        echo"</div>";
                                                                echo"</td>";
                                                                echo "</tr>";
                                                                $e1++;
                                                            }
                                                        }
                                                    }
                                                    //$country_name = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id=".$c_name);
                                                } else {
                                                    $getdata = mysqli_query($db_connection, "SELECT * FROM dt_user where user_type='E'");
                                                    if (mysqli_num_rows($getdata) >= 1) {
                                                        $e1 = 1;
                                                        while ($row = mysqli_fetch_assoc($getdata)) {
//                                                echo "<pre>"; print_r($row);

                                                            $c_name = $row['country_id'];

//                                                $country_name = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id=".$c_name. "and dt_country_master.country_name =! NULL");

                                                            $country_name = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id= dt_user.country_id AND dt_country_master.country_id = $c_name AND dt_user.country_id IS NOT NULL;");
                                                            //$domain_name = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=$row[domain_id]");
                                                            $cname = mysqli_query($db_connection, "SELECT dt_employer.company_name FROM dt_user INNER JOIN dt_employer ON dt_user.user_id=dt_employer.user_id");

                                                            echo "<tr>";
//                                                if($country_name){

                                                            $country = $country_name->fetch_assoc();
                                                            $companyname = $cname->fetch_assoc();

                                                            echo "<td>" . $e1 . "</td>";
                                                            // echo "<td>" . $row['user_profile_image'] . "</td>";
                                                            echo "<td>" . $companyname['company_name'] . "</td>";
                                                            echo "<td>" . $row['user_name'] . "</td>";
                                                            echo "<td>" . $row['user_email'] . "</td>";

                                                            if (mysqli_num_rows($country_name) >= 1) {
                                                                if ($country['country_name']) {
                                                                    echo "<td>" . $country['country_name'] . "</td>";
                                                                } else {
                                                                    echo "<td>" . "Not Added" . "</td>";
                                                                }
//                                                echo "<td>" . ($country['country_name'] == NULL ?  : $country['country_name']). "</td>";
                                                                echo"<td>";
//        echo"<div>";SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id="
//                                                echo"<a href='javascript:void(0);' class='btn btn-sm btn-secondary me-2' data-bs-toggle='modal' data-bs-target='#add-category'><i class='far fa-edit'></i></a>";
//                                                echo "<a href='delete_data.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete_category'><i class='far fa-trash-alt'></i></a>";
//        echo"<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list' id='$row[domain_id]'>
//             <a class='dropdown-item' href='javascript:void(0);?domain_id=$row[domain_id]'><i class='far fa-trash-alt'></i> Delete</a>
//                 </div>";
//        echo"</div>";
                                                                echo"</td>";
                                                                echo "</tr>";
                                                                $e1++;
                                                            }

//                                                    $c = $country["country_name"];
//                                                }
//                                                else {
////                                                    $country['country_name'] = "NULL";
////                                                    $c = $country["country_name"];
//                                                    $c = "null";
//                                                }
//                                                echo "country not found";
//                                                $country = $country_name->fetch_assoc();
                                                            //echo "<pre>"; print_r($row);
                                                        }
                                                    }
//                                                echo "No counrty3";
                                                }
//                                                $e1 = 1;
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
                                                    <th>Sr.No.</th>
                                                    <!--<th>Image</th>-->
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Country name</th>
                                                    <th class="text-end"></th>
                                                </tr>
                                            <tbody>
                                                <?php
                                                if (isset($_POST['btnsubmit']) && $_POST['select_country'] != 0) {
                                                    $c = $_POST['select_country'];
                                                    $getdata1 = mysqli_query($db_connection, "SELECT * FROM dt_user where user_type='F' AND country_id=" . $c);
                                                    //$country_name = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id=".$c_name);
                                                } else {
                                                    $getdata1 = mysqli_query($db_connection, "SELECT * FROM dt_user where user_type='F'");
//                                                echo "No counrty3";
                                                }

                                                $f1 = 1;

//                                            $getdata1 = mysqli_query($db_connection, "SELECT * FROM dt_user where user_type='F'");

                                                while ($row = mysqli_fetch_assoc($getdata1)) {
                                                    $c_name1 = $row['country_id'];

                                                    if ($c_name1 != null) {
                                                        $countryname = mysqli_query($db_connection, "SELECT dt_country_master.country_name,dt_user.user_name FROM dt_country_master INNER JOIN dt_user ON dt_country_master.country_id= $c_name1 AND dt_user.country_id IS NOT NULL ;" );
                                                        //$domain_name = mysqli_query($db_connection, "SELECT domain_name From dt_domain_master WHERE domain_id=$row[domain_id]");

                                                        echo "<tr>";
                                                        $fcountry = $countryname->fetch_assoc();
                                                        echo "<td>" . $f1 . "</td>";
                                                        // echo "<td>" . $row['user_profile_image'] . "</td>";
                                                        echo "<td>" . $row['user_name'] . "</td>";
                                                        echo "<td>" . $row['user_email'] . "</td>";
                                                        echo "<td>" . $row['user_gender'] . "</td>";
                                                        echo "<td>" . $fcountry['country_name'] . "</td>";
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
                                                        $f1++;
                                                    }
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