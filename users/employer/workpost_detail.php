<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/view-project-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:49:08 GMT -->

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

        <link rel="stylesheet" href="../../assets/plugins/datatables/datatables.min.css">

        <link rel="stylesheet" href="../../assets/css/style.css">

    </head>



    <body class="dashboard-page">


        <?php
        include_once '../timediff.php';
        if (isset($_GET['wid'])) {

            $workid = $_GET['wid'];

            $qry_get_work_dt = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` WHERE work_id = $workid");

            if (mysqli_num_rows($qry_get_work_dt) > 0) {
                // output data of each row
                $row_work_dt = mysqli_fetch_assoc($qry_get_work_dt);

                $timeStamp = date("m/d/Y", strtotime($row_work_dt['added_dt']));

                $dateObj = DateTime::createFromFormat('!m', date('m', strtotime($timeStamp)));
                $monthName = $dateObj->format('F');

                $day = date('d', strtotime($timeStamp));
                $year = date('y', strtotime($timeStamp));

                $domain_id = $row_work_dt['domain_id'];

                $qry_get_domain = mysqli_query($db_connection, "SELECT domain_name FROM `dt_domain_master` WHERE domain_id = $domain_id");

                $row_domain = mysqli_fetch_array($qry_get_domain, MYSQLI_ASSOC);
            } else {
                echo "0 results";
            }
        } else {
            header('Location: ./manage-workposts.php');
        }
        ?>        

        <div class="main-wrapper">


            <?php include_once './include/header.php' ?>




            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-3 col-md-4 theiaStickySidebar">
                            <?php include_once './project_nav.php'; ?>

                        </div>



                        <div class="col-xl-9 col-md-8">
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="workpost_detail.php?wid=<?php echo $workid; ?>">VIEW WORK POST</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="workpost_proposals.php?wid=<?php echo $workid; ?>">REVIEW PROPOSALS</a>
                                    </li>
                                    <!--                                    <li class="nav-item">
                                                                            <a class="nav-link" href="tasks.html">Tasks</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="files.html">Files</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="project-payment.html">Payments</a>
                                                                        </li>-->
                                </ul>
                            </nav>

                            <div class="my-projects">

                                <div class="my-projects-list pro-list-view">
                                    <div class="row">
                                        <div class="col-lg-10 flex-wrap">
                                            <div class="projects-card flex-fill">
                                                <div class="card-body">
                                                    <div class="projects-details align-items-center">
                                                        <div class="project-info">
                                                            <span><?php echo $row_domain['domain_name']; ?></span>
                                                            <h2><?php echo $row_work_dt['work_title'] ?></h2>
                                                            <div class="customer-info">
                                                                <ul class="list-details">
                                                                    <li>


                                                                        <div class ="slot">
                                                                            <p>posted on <?php echo "$monthName $day ,20$year"; ?></p>
                                                                        </div>
                                                                    </li>

                                                                    <li>

                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="project-hire-info">
                                                            <div class="content-divider"></div>
                                                            <div class="projects-amount">

                                                                <?php
                                                                if ($row_work_dt['range_id'] != null) {
                                                                    ?>
                                                                    <!--<h3></h3>-->
                                                                    <h4>From -  To Rate</h4>
                                                                    <?php
                                                                } else if ($row_work_dt['fix_budget'] != 0) {
                                                                    ?>

                                                                    <h4>Fixed Budget</h4>

                                                                    <?php
                                                                }
                                                                ?>
                                                                <h5>price type</h5>
                                                            </div>


                                                            <?php
                                                            $qry_getcount = mysqli_query($db_connection, "SELECT COUNT(*) as number FROM `dt_workpost` WHERE work_id = $workid AND work_status = 'C';");

                                                            $rowstatus = mysqli_fetch_assoc($qry_getcount);

                                                            if ($rowstatus['number'] == 0) {
                                                                ?>

                                                                <div class="content-divider"></div>
                                                                <div class="projects-action text-center">
                                                                    <!--<a href="#" class="hired-detail">Action</a>-->
                                                                    <div class="pro-status">
                                                                        <div class="hire-select">
                                                                            <a href="updatework_status.php?wid=<?php echo $workid; ?>" class="projects-btn">Is Completed ?</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>




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
//                                                                        echo $work_id;

                                                        $get_proposal_count = mysqli_query($db_connection, "SELECT COUNT(*) as total FROM `dt_workpost_proposals` WHERE work_id = $workid;");

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

                            </div>
                            <div class="pro-post widget-box">
                                <h3 class="pro-title">Overview</h3>
                                <div class="pro-overview">
                                    <!--<h4>Senior Animator</h4>-->
                                    <p><?php echo $row_work_dt['work_desc']; ?></p>

                                </div>
                            </div>

                            <div class="pro-post widget-box">
                                <h3 class="pro-title">Other details</h3>
                                <div class="project-hire-info">
                                    <div class="content-divider"></div>
                                    <div class="projects-amount">

                                        <h4><?php echo $row_work_dt['work_size'] ?></h4>
                                        <p>level Project</p>
                                    </div>
                                    <div class="content-divider"></div>
                                    <div class="projects-amount">

                                        <h4><?php echo $row_work_dt['work_duration'] ?></h4>
                                        <p>Project Length</p>
                                    </div>
                                    <div class="content-divider"></div>
                                    <div class="projects-amount">

                                        <?php
                                        if ($row_work_dt['experience_level'] == 0) {
                                            ?>
                                            <h4>Entry Level</h4>
                                            <p>I am looking for freelancers with the lowest rates</p>
                                            <?php
                                        } else if ($row_work_dt['experience_level'] == 1) {
                                            ?>

                                            <h4>Intermediate</h4>
                                            <p>I am looking for a mix of experience and value</p>
                                            <?php
                                        } else if ($row_work_dt['experience_level'] == 2) {
                                            ?> 

                                            <h4>Expert</h4>
                                            <p>I am willing to pay higher rates for the most experienced freelancers</p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="content-divider"></div>
                                </div>



                            </div>

                            <div class="pro-post widget-box">
                                <h3 class="pro-title">Skills Required</h3>
                                <div class="pro-content">
                                    <div class="tags">

                                        <?php
                                        $qry_get_work_skill = mysqli_query($db_connection, "SELECT * FROM `dt_workpost_skill` WHERE work_id = $workid");

                                        while ($row_work_skill = mysqli_fetch_assoc($qry_get_work_skill)) {

                                            $skillid = $row_work_skill['skill_id'];

                                            $qry_get_skill = mysqli_query($db_connection, "SELECT * FROM `dt_skill_master` WHERE skill_id = $skillid");
//
//                                            if (mysqli_num_rows($qry_get_skill) > 0) {
//                                                // output data of each row

                                            $row_skill = mysqli_fetch_assoc($qry_get_skill);
                                            ?>

                                            <span class="badge badge-pill badge-design">

                                                <?php echo $row_skill['skill_name']; ?>

                                            </span>

                                            <?php
//                                            } else {
//                                                echo "0 results";
//                                            }
                                        }
                                        ?>



                                    </div>
                                </div>
                            </div>



                            <!--<h4>Senior Animator</h4>-->


                            <?php
                            if ($row_work_dt['range_id'] != null) {

                                $range_num = $row_work_dt['range_id'];

                                $qry_range = mysqli_query($db_connection, "SELECT * FROM `dt_price_range` WHERE range_id = $range_num");
                                while ($row_range = mysqli_fetch_assoc($qry_range)) {
                                    ?>

                                    <!--<h3></h3>-->
                                    <div class="pro-post widget-box">
                                        <h3 class="pro-title">Bid Range</h3>
                                        <div class="pro-overview">
                                            <h4>Low <?php echo $row_range['from_rate']; ?>.00$ | Avg <?php echo ($row_range['from_rate'] + $row_range['to_rate']) / 2; ?>$ | High <?php echo $row_range['to_rate']; ?>.00$</h4>
                                            <!--<h5>From -  To</h5>-->

                                        </div>
                                    </div>

                                    <?php
//                                                                        echo $data["from_rate"];
                                }
                            } else if ($row_work_dt['fix_budget'] != 0) {
                                ?>

                                <div class="pro-post widget-box">
                                    <h3 class="pro-title">budget price</h3>
                                    <div class="pro-overview">
                                        <h4>fixed - <?php echo $row_work_dt['fix_budget']; ?>.00$</h4>

                                    </div>
                                </div>
                                <!--<h5>Budget</h5>-->

                                <?php
                            }
                            ?>





                        </div>

                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <h2 class="footer-title">Office Address</h2>
                                <div class="footer-address">
                                    <div class="off-address">
                                        <p class="mb-2">New York, USA (HQ)</p>
                                        <address class="mb-0">750 Sing Sing Rd, Horseheads, NY, 14845</address>
                                        <p>Call: <a href="#"><u>469-537-2410</u> (Toll-free)</a> </p>
                                    </div>
                                    <div class="off-address">
                                        <p class="mb-2">Sydney, Australia </p>
                                        <address class="mb-0">24 Farrar Parade COOROW WA 6515</address>
                                        <p>Call: <a href="#"><u>(08) 9064 9807</u> (Toll-free)</a> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Useful Links</h2>
                                    <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog-list.html">Blog</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Help & Support</h2>
                                    <ul>
                                        <li><a href="chats.html">Chat</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="review.html">Reviews</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="term-condition.html">Terms of use</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Other Links</h2>
                                    <ul>
                                        <li><a href="freelancer-dashboard.html">Freelancers</a></li>
                                        <li><a href="freelancer-portfolio.html">Freelancer Details</a></li>
                                        <li><a href="project.html">Project</a></li>
                                        <li><a href="project-details.html">Project Details</a></li>
                                        <li><a href="post-project.html">Post Project</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Mobile Application</h2>
                                    <p>Download our App and get the latest Breaking News Alerts and latest headlines and daily articles near you.</p>
                                    <div class="row g-2">
                                        <div class="col">
                                            <a href="#"><img class="img-fluid" src="assets/img/app-store.svg" alt="app-store"></a>
                                        </div>
                                        <div class="col">
                                            <a href="#"><img class="img-fluid" src="assets/img/google-play.svg" alt="google-play"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="footer-bottom">
                    <div class="container">

                        <div class="copyright">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="copyright-text">
                                        <p class="mb-0">&copy; 2021 All Rights Reserved</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 right-text">
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#" class="icon" target="_blank"><i class="fab fa-instagram"></i> </a></li>
                                            <li><a href="#" class="icon" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>
                                            <li><a href="#" class="icon" target="_blank"><i class="fab fa-twitter"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </footer>

        </div>


        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../../assets/js/slick.js"></script>

        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <script src="../../assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/view-project-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:49:08 GMT -->

</html>