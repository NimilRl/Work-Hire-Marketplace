<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/manage-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:47:38 GMT -->

    <head>

        <?php require './include/prep.php'; ?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>WorkFlow</title>

        <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>

    <body class="dashboard-page">

        <div class="main-wrapper">


            <?php include_once './include/header.php' ?>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-3 col-md-4 theiaStickySidebar">
                            <?php include_once './project_nav.php'; ?>
                         
                        </div>

                        <div class="col-xl-9 col-md-8">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Manage Projects</h3>
                                    </div>

                                </div>
                            </div>

                            <?php
                            $qry_get_workdt = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` WHERE user_id = $id ORDER BY FIELD(work_status,'P','W','C');");

                            if (mysqli_num_rows($qry_get_workdt)) {


                                while ($row_work = mysqli_fetch_assoc($qry_get_workdt)) {

                                    $timeStamp = date("m/d/Y", strtotime($row_work['added_dt']));

                                    $dateObj = DateTime::createFromFormat('!m', date('m', strtotime($timeStamp)));
                                    $monthName = $dateObj->format('F');

                                    $day = date('d', strtotime($timeStamp));
                                    $year = date('y', strtotime($timeStamp));

                                    $domain_id = $row_work['domain_id'];

                                    $qry_get_domain = mysqli_query($db_connection, "SELECT domain_name FROM `dt_domain_master` WHERE domain_id = $domain_id");

                                    $row_domain = mysqli_fetch_array($qry_get_domain, MYSQLI_ASSOC);

//                                                                    mysqli_query($db_connection, "SET @did='" . $domain_id . "'");
//
//                                                                    $qry_get_domain = mysqli_query($db_connection, "CALL get_domain(@did)");
//                                                                    
//                                                                    $row_domain = mysqli_fetch_array($qry_get_domain, MYSQLI_ASSOC);
//                                                                    
//                                                                    echo $row_domain['domain_name'];
                                    ?>

                                    <div class="my-projects-list">
                                        <div class="row">
                                            <div class="col-lg-10 flex-wrap">
                                                <div class="projects-card flex-fill">
                                                    <div class="card-body">
                                                        <div class="projects-details align-items-center">
                                                            <div class="project-info">
                                                                <span><?php echo $row_domain['domain_name']; ?></span>
                                                                <h2><?php echo $row_work['work_title']; ?></h2>
                                                                <div class="customer-info">
                                                                    <ul class="list-details">
                                                                        <li>
                                                                            <div class="slot">
                                                                                <p>Price type</p>

                                                                                <?php
                                                                                if ($row_work['range_id'] != null) {
                                                                                    ?>
                                                                                    <!--<h3></h3>-->
                                                                                    <h5>From -  To Rate</h5>
                                                                                    <?php
                                                                                } else if ($row_work['fix_budget'] != 0) {
                                                                                    ?>

                                                                                    <h5>Fixed Budget</h5>

                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <!--<h5>Fixed</h5>-->
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="slot">
                                                                                <p>Experience level</p>
                                                                                <h5>
                                                                                    <?php
                                                                                    if ($row_work['experience_level'] == 0) {
                                                                                        echo 'Beginner';
                                                                                    } else if ($row_work['experience_level'] == 1) {
                                                                                        echo 'Intermediate';
                                                                                    } else if ($row_work['experience_level'] == 2) {
                                                                                        echo 'Expert';
                                                                                    }
                                                                                    ?>

                                                                                </h5>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="slot">
                                                                                <p>Added at<p>
                                                                                <h5><?php echo "$monthName $day ,20$year"; ?></h5>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="project-hire-info">
                                                                <div class="content-divider"></div>
                                                                <div class="projects-amount">

                                                                    <?php
                                                                    if ($row_work['range_id'] != null) {

                                                                        $range_num = $row_work['range_id'];

                                                                        $qry_range = mysqli_query($db_connection, "SELECT * FROM `dt_price_range` WHERE range_id = $range_num");
                                                                        while ($row_range = mysqli_fetch_assoc($qry_range)) {
                                                                            ?>

                                                                            <!--<h3></h3>-->
                                                                            <h3><?php echo $row_range['from_rate']; ?>.00$ - <?php echo $row_range['to_rate']; ?>.00$</h3>
                                                                            <!--<h5>From -  To</h5>-->

                                                                            <?php
//                                                                        echo $data["from_rate"];
                                                                        }
                                                                    } else if ($row_work['fix_budget'] != 0) {
                                                                        ?>

                                                                        <h3><?php echo $row_work['fix_budget']; ?>.00$</h3>
                                                                        <!--<h5>Budget</h5>-->

                                                                        <?php
                                                                    }
                                                                    ?>

                                                                    <!--<h3>$500.00</h3>-->
                                                                    <!--<h5>in 12 Days</h5>-->
                                                                </div>
                                                                <div class="content-divider"></div>
                                                                <div class="projects-action text-center">
                                                                    <a href="workpost_proposals.php?wid=<?php echo $row_work['work_id']; ?>" class="projects-btn">View Details </a>
                                                                    <a href="#" class="hired-detail">status : </a><?php
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 d-flex flex-wrap">
                                                <div class="projects-card flex-fill">
                                                    <div class="card-body p-2">
                                                        <div class="prj-proposal-count text-center">

                                                            <?php
                                                            $work_id = $row_work['work_id'];
//                                                                        echo $work_id;

                                                            $get_proposal_count = mysqli_query($db_connection, "SELECT COUNT(*) as total FROM `dt_workpost_proposals` WHERE work_id = $work_id;");

                                                            $row_count = mysqli_fetch_assoc($get_proposal_count);
                                                            ?>

                                                            <span><?php echo $row_count['total']; ?> </span>
                                                            <h3>Proposals</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                }
                            }
//}
                            else {
                                echo "<h2>Sorry You don't have any work data 🙁</h2>";
                                echo "<h3>Please Uplode some work</h3>";
                            }
                            ?>


                            <!--                            <div class="my-projects-list">
                                                            <div class="row">
                                                                <div class="col-lg-10 flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body">
                                                                            <div class="projects-details align-items-center">
                                                                                <div class="project-info">
                                                                                    <span>Dreamguystech</span>
                                                                                    <h2>Landing Page Redesign / Sales Page Redesign (Not Entire Web) </h2>
                                                                                    <div class="customer-info">
                                                                                        <ul class="list-details">
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Price type</p>
                                                                                                    <h5>Fixed</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Location</p>
                                                                                                    <h5><img src="assets/img/en.png" height="13" alt="Lang"> UK</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Expiry</p>
                                                                                                    <h5>4 Days Left</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-hire-info">
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-amount">
                                                                                        <h3>$500.00</h3>
                                                                                        <h5>in 12 Days</h5>
                                                                                    </div>
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-action">
                                                                                        <a href="project-proposals.html" class="projects-btn">View Proposals </a>
                                                                                        <a href="edit-project.html" class="projects-btn">Edit Jobs</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 d-flex flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body p-2">
                                                                            <div class="prj-proposal-count text-center">
                                                                                <span>5</span>
                                                                                <h3>Proposals</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                            
                                                        <div class="my-projects-list">
                                                            <div class="row">
                                                                <div class="col-lg-10 flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body">
                                                                            <div class="projects-details align-items-center">
                                                                                <div class="project-info">
                                                                                    <span>Dreamguystech</span>
                                                                                    <h2>WooCommerce Product Page Back Up Restoration</h2>
                                                                                    <div class="customer-info">
                                                                                        <ul class="list-details">
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Price type</p>
                                                                                                    <h5>Fixed</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Location</p>
                                                                                                    <h5><img src="assets/img/en.png" height="13" alt="Lang"> UK</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Expiry</p>
                                                                                                    <h5>4 Days Left</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-hire-info">
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-amount">
                                                                                        <h3>$500.00</h3>
                                                                                        <h5>in 12 Days</h5>
                                                                                    </div>
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-action text-center">
                                                                                        <a href="view-project-detail.html" class="projects-btn">View Details </a>
                                                                                        <a href="#" class="hired-detail">Hired on 19 JUN 2021</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 d-flex flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body p-2">
                                                                            <div class="prj-proposal-count text-center hired">
                                                                                <h3>Hired</h3>
                                                                                <img src="assets/img/developer/developer-01.jpg" alt="" class="img-fluid">
                                                                                <p class="mb-0">Hannah Finn</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                            
                                                        <div class="my-projects-list">
                                                            <div class="row">
                                                                <div class="col-lg-10 flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body">
                                                                            <div class="projects-details align-items-center">
                                                                                <div class="project-info">
                                                                                    <span>Dreamguystech</span>
                                                                                    <h2> PHP Laravel Developer Required (Contractual Employement)</h2>
                                                                                    <div class="customer-info">
                                                                                        <ul class="list-details">
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Price type</p>
                                                                                                    <h5>Fixed</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Location</p>
                                                                                                    <h5><img src="assets/img/en.png" height="13" alt="Lang"> UK</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Expiry</p>
                                                                                                    <h5>4 Days Left</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-hire-info">
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-amount">
                                                                                        <h3>$500.00</h3>
                                                                                        <h5>in 12 Days</h5>
                                                                                    </div>
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-action">
                                                                                        <a href="project-proposals.html" class="projects-btn">View Proposals </a>
                                                                                        <a href="edit-project.html" class="projects-btn">Edit Jobs</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 d-flex flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body p-2">
                                                                            <div class="prj-proposal-count text-center">
                                                                                <span>5</span>
                                                                                <h3>Proposals</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                            
                            
                                                        <div class="my-projects-list">
                                                            <div class="row">
                                                                <div class="col-lg-10 flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body">
                                                                            <div class="projects-details align-items-center">
                                                                                <div class="project-info">
                                                                                    <span>Dreamguystech</span>
                                                                                    <h2>Laravel Backend Developer to finish ongoing project </h2>
                                                                                    <div class="customer-info">
                                                                                        <ul class="list-details">
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Price type</p>
                                                                                                    <h5>Fixed</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Location</p>
                                                                                                    <h5><img src="assets/img/en.png" height="13" alt="Lang"> UK</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="slot">
                                                                                                    <p>Expiry</p>
                                                                                                    <h5>4 Days Left</h5>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-hire-info">
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-amount">
                                                                                        <h3>$500.00</h3>
                                                                                        <h5>in 12 Days</h5>
                                                                                    </div>
                                                                                    <div class="content-divider"></div>
                                                                                    <div class="projects-action text-center">
                                                                                        <a href="view-project-detail.html" class="projects-btn">View Details </a>
                                                                                        <a href="#" class="hired-detail">Hired on 19 JUN 2021</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 d-flex flex-wrap">
                                                                    <div class="projects-card flex-fill">
                                                                        <div class="card-body p-2">
                                                                            <div class="prj-proposal-count text-center hired">
                                                                                <h3>Hired</h3>
                                                                                <img src="assets/img/developer/developer-01.jpg" alt="" class="img-fluid">
                                                                                <p class="mb-0">Hannah Finn</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->


<!--                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="paginations list-pagination">
                                        <li><a href="#"><i class="fas fa-angle-left"></i> Previous</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#" class="active">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next <i class="fas fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>-->

                        </div>
                    </div>
                </div>
            </div>


            <?php include_once './include/footer.php';?>

        </div>


        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../../assets/js/slick.js"></script>

        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <script src="../../assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/manage-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:47:41 GMT -->

</html>