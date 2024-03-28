<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require './include/prep.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <link rel="stylesheet" href="../admin/assets/plugins/datatables/datatables.min.css" />

        <link rel="stylesheet" href="../admin/assets/css/bootstrap-datetimepicker.min.css" />

        <link rel="stylesheet" href="../admin/assets/css/style.css" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



        <title>WorkFlow</title>
        <?php
        include_once './include/resource.php';

        $month = [];
        $count = [];

        $get_count_status = mysqli_query($db_connection, "SELECT MONTHNAME(added_dt) MONTH, COUNT(*) COUNT FROM dt_workpost WHERE YEAR(added_dt) = '2022' and user_id = $id and work_status = 'C' GROUP BY MONTH(added_dt);");

        while ($row_count_status = mysqli_fetch_array($get_count_status)) {
            $month[] = $row_count_status['MONTH'];
            $count[] = $row_count_status['COUNT'];
        }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    </head>

    <body class="dashboard-page">

        <div class="main-wrapper">
            <?php include_once './include/header.php' ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-4 theiaStickySidebar">
                            <div class="settings-widget">
                                <div
                                    class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">

                                    <a href="user-account-details.html"><img
                                            onerror="this.onerror=null; this.src='../../assets/img/usericon1white.png'"
                                            alt="no img" src="../files/user_imgs/<?php echo $user['user_profile_img']; ?> "
                                            class="avatar-lg rounded-circle"></a>


                                    <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                        <p class="mb-2">Welcome,</p>
                                        <a href="dashboard.php">
                                            <h3 class="mb-0"><?php echo $user['user_name']; ?></h3>

                                        </a>
                                        <!--<p class="mb-0">@johndaniee</p>-->
                                    </div>
                                </div>
                                <div class="settings-menu">
                                    <ul>
                                        <li class="nav-item">
                                            <a href="dashboard.php" class="nav-link">
                                                <i class="material-icons">verified_user</i> Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="manage-workposts.php" class="nav-link">
                                                <i class="material-icons">business_center</i> WorkPosts
                                            </a>
                                        </li>
                                        <!--                <li class="nav-item">
                                                                <a href="favourites.html" class="nav-link">
                                                                    <i class="material-icons">local_play</i> Favourites
                                                                </a>
                                                            </li>-->
                                        <!--                                        <li class="nav-item">
                                                                                        <a href="review.html" class="nav-link">
                                                                                            <i class="material-icons">record_voice_over</i> Reviews
                                                                                        </a>
                                                                                    </li>-->
                                        <li class="nav-item">
                                            <a href="../online_message/users.php" class="nav-link">
                                                <i class="material-icons">chat</i> Messages
                                            </a>
                                        </li>
                                        <!--                            <li class="nav-item">
                                                                            <a href="membership-plans.html" class="nav-link">
                                                                                <i class="material-icons">person_add</i> Membership
                                                                            </a>
                                                                        </li>-->
                                        <li class="nav-item">
                                            <a href="reports.php" class="nav-link active">
                                                <i class="material-icons">pie_chart</i> Reports
                                            </a>
                                        </li>
                                        <!--                            <li class="nav-item">
                                                                            <a href="verify-identity.html" class="nav-link">
                                                                                <i class="material-icons">person_pin</i> Verify Identity
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="deposit-funds.html" class="nav-link">
                                                                                <i class="material-icons">wifi_tethering</i> Payments
                                                                            </a>
                                                                        </li>-->
                                        <li class="nav-item">
                                            <a href="e_profile.php" class="nav-link">
                                                <i class="material-icons">settings</i> Profile Settings
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../logout.php" class="nav-link">
                                                <i class="material-icons">power_settings_new</i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="dashboard-sec">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Work Details</h3>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item active">Report</li>
                                            </ul>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn add-button me-2" data-bs-toggle="modal"
                                               data-bs-target="#add-category">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            <a class="btn filter-btn" href="javascript:void(0);" id="filter_search">
                                                <i class="fas fa-filter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card filter-card" id="filter_inputs">
                                    <div class="card-body pb-0">
                                        <form action="#" method="POST">
                                            <div class="row filter-row">
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-select" name="status">
                                                            <option value="0">Select</option>
                                                            <option value="P">Pending works</option>
                                                            <option value="W">Ongoing Works</option>
                                                            <option value="C">Completed Works</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label>Domains</label>
                                                        <?php $domain_data = mysqli_query($db_connection, "SELECT * FROM dt_domain_master"); ?>
                                                        <select class="form-select" name="domain">
                                                            <option value="0">Select</option>

                                                            <?php
                                                            if (mysqli_num_rows($domain_data) > 0) {
                                                                while ($row = mysqli_fetch_assoc($domain_data)) {
                                                                    ?>

                                                                    <option value="<?php echo $row['domain_id']; ?>">
                                                                        <?php echo $row['domain_name']; ?></option>



                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <option value="0">no data</option>

                                                                <?php
                                                            }
                                                            ?>




                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label>From Date</label>
                                                        <div class="cal-icon">
                                                            <input class="form-control datetimepicker" name="fromDT"
                                                                   type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label>To Date</label>
                                                        <div class="cal-icon">
                                                            <input class="form-control datetimepicker" name="toDT"
                                                                   type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-block" type="submit"
                                                                name="filter">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="page-title"></h3>
                                                <div class="table-responsive">
                                                    <div class="table-responsive">
                                                        <table class="table table-center table-hover mb-0 datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Work Title</th>
                                                                    <th>Price Type</th>
                                                                    <th>Amount</th>
                                                                    <th>Work Duration</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                include_once './filters.php';
                                                                if (isset($_POST['filter'])) {
                                                                    $status = $_POST['status'];
                                                                    $domain = $_POST['domain'];
                                                                    $from_dt = date("Y-m-d", strtotime($_POST['fromDT']));
                                                                    $to_dt = date("Y-m-d", strtotime($_POST['toDT']));

//                                                                    echo $from_dt;
//                                                                    echo $to_dt;


                                                                    $dt = get_filtered_data($status, $domain, $from_dt, $to_dt);
                                                                    $i = 1;

                                                                    if ($dt != null) {
//                                                                        echo 'yes';

                                                                        while ($data = mysqli_fetch_assoc($dt)) {
//                                                                            echo '<br> title ' . $data['work_title'];
//                                                                            echo '<br>range ' . $data['range_id'];
//                                                                            echo '<br>budget : ' . $data['fix_budget'];
//                                                                            echo '<br> duration  ' . $data['work_duration'];
//                                                                            echo '<br>--------';
                                                                            ?> <!-- comment -->

                                                                            <tr>
                                                                                <td><?php echo $i; ?></td>
                                                                                <td><?php echo $data['work_title']; ?></td>
                                                                                <td> 
                                                                                    <?php
                                                                                    if ($data['range_id'] != null) {
                                                                                        ?>
                                                                                        From -  To Rate
                                                                                        <?php
                                                                                    } else if ($data['fix_budget'] != 0) {
                                                                                        ?>

                                                                                        Fixed Budget

                                                                                        <?php
                                                                                    }
                                                                                    ?>    
                                                                                </td>
                                                                                <td>

                                                                                    <?php
                                                                                    if ($data['range_id'] != null) {

                                                                                        $range_num = $data['range_id'];

                                                                                        $qry_range = mysqli_query($db_connection, "SELECT * FROM `dt_price_range` WHERE range_id = $range_num");
                                                                                        while ($row_range = mysqli_fetch_assoc($qry_range)) {
                                                                                            ?>

                                                                                            <?php echo $row_range['from_rate']; ?>.00$ - <?php echo $row_range['to_rate']; ?>.00$

                                                                                            <?php
                                                                                        }
                                                                                    } else if ($data['fix_budget'] != 0) {
                                                                                        ?>

                                                                                        <?php echo $data['fix_budget']; ?>.00$

                                                                                        <?php
                                                                                    }
                                                                                    ?>

                                                                                </td>
                                                                                <td><?php echo $data['work_duration']; ?></td>
                                                                            </tr>




                                                                            <?php
                                                                            $i++;
                                                                        }
                                                                    } else {
//                                                                        echo 'no data';
                                                                        ?>
                                                                    <script>swal("sorry! 😥", "No data available on applied filter", "error");</script>
                                                                    <?php
                                                                    $clear_data = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id ORDER BY added_dt DESC;");

                                                                    if (mysqli_num_rows($clear_data) >= 1) {
                                                                        $i = 1;
                                                                        while ($data = mysqli_fetch_assoc($clear_data)) {
                                                                            ?>

                                                                            <tr>
                                                                                <td><?php echo $i; ?></td>
                                                                                <td><?php echo $data['work_title']; ?></td>
                                                                                <td> 
                                                                                    <?php
                                                                                    if ($data['range_id'] != null) {
                                                                                        ?>
                                                                                        From -  To Rate
                                                                                        <?php
                                                                                    } else if ($data['fix_budget'] != 0) {
                                                                                        ?>

                                                                                        Fixed Budget

                                                                                        <?php
                                                                                    }
                                                                                    ?>    
                                                                                </td>
                                                                                <td>

                                                                                    <?php
                                                                                    if ($data['range_id'] != null) {

                                                                                        $range_num = $data['range_id'];

                                                                                        $qry_range = mysqli_query($db_connection, "SELECT * FROM `dt_price_range` WHERE range_id = $range_num");
                                                                                        while ($row_range = mysqli_fetch_assoc($qry_range)) {
                                                                                            ?>

                                                                                            <?php echo $row_range['from_rate']; ?>.00$ - <?php echo $row_range['to_rate']; ?>.00$

                                                                                            <?php
                                                                                        }
                                                                                    } else if ($data['fix_budget'] != 0) {
                                                                                        ?>

                                                                                        <?php echo $data['fix_budget']; ?>.00$

                                                                                        <?php
                                                                                    }
                                                                                    ?>

                                                                                </td>
                                                                                <td><?php echo $data['work_duration']; ?></td>
                                                                            </tr>




                                                                            <?php
                                                                            $i++;
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                                $clear_data = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id ORDER BY added_dt DESC;");

                                                                if (mysqli_num_rows($clear_data) >= 1) {
                                                                    $i = 1;
                                                                    while ($data = mysqli_fetch_assoc($clear_data)) {
                                                                        ?>

                                                                        <tr>
                                                                            <td><?php echo $i; ?></td>
                                                                            <td><?php echo $data['work_title']; ?></td>
                                                                            <td> 
                                                                                <?php
                                                                                if ($data['range_id'] != null) {
                                                                                    ?>
                                                                                    From -  To Rate
                                                                                    <?php
                                                                                } else if ($data['fix_budget'] != 0) {
                                                                                    ?>

                                                                                    Fixed Budget

                                                                                    <?php
                                                                                }
                                                                                ?>    
                                                                            </td>
                                                                            <td>

                                                                                <?php
                                                                                if ($data['range_id'] != null) {

                                                                                    $range_num = $data['range_id'];

                                                                                    $qry_range = mysqli_query($db_connection, "SELECT * FROM `dt_price_range` WHERE range_id = $range_num");
                                                                                    while ($row_range = mysqli_fetch_assoc($qry_range)) {
                                                                                        ?>

                                                                                        <?php echo $row_range['from_rate']; ?>.00$ - <?php echo $row_range['to_rate']; ?>.00$

                                                                                        <?php
                                                                                    }
                                                                                } else if ($data['fix_budget'] != 0) {
                                                                                    ?>

                                                                                    <?php echo $data['fix_budget']; ?>.00$

                                                                                    <?php
                                                                                }
                                                                                ?>

                                                                            </td>
                                                                            <td><?php echo $data['work_duration']; ?></td>
                                                                        </tr>




                                                                        <?php
                                                                        $i++;
                                                                    }
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
                    </div>
                </div>
            </div>

        </div>





        <!-- Models -->

        <div class="modal fade custom-modal" id="add-category">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" placeholder="Enter Category Name" />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade custom-modal" id="edit-category">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" value="Graphic & Design" />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
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
                                    <a href="javascript:void(0);" data-bs-dismiss="modal"
                                       class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>




    <script src="../../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/plugins/apexchart/apexcharts.min.js"></script>
    <!--<script src="../../assets/plugins/apexchart/chart-data.js"></script>-->

    <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <script src="../../assets/js/script.js"></script>




    <script src="../admin/assets/js/feather.min.js"></script>

    <script src="../admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin/assets/plugins/datatables/datatables.min.js"></script>

    <script src="../admin/assets/js/moment.min.js"></script>
    <script src="../admin/assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../admin/assets/js/script.js"></script>

</html>