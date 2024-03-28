<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/freelancer-project-proposals.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:23 GMT -->
    <head>
        <?php require './include/prep.php'; ?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>KofeJob</title>

        <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../../assets/plugins/summernote/dist/summernote-lite.css">

        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>
    <body class="dashboard-page">

        <div class="main-wrapper">

            <?php
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


            <?php include_once './include/header.php' ?>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-4 theiaStickySidebar">

                            <?php include_once './project_nav.php'; ?>

                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="page-title">
                                <h3><?php echo $row_work_dt['work_title'] ?></h3>
                            </div>
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link" href="workpost_detail.php?wid=<?php echo $workid; ?>">VIEW WORK POST</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="workpost_proposals.php?wid=<?php echo $workid; ?>">REVIEW PROPOSALS</a>
                                    </li>
                                    <!--                                    <li class="nav-item">
                                                                            <a class="nav-link" href="freelancer-completed-projects.html">Completed Projects</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" href="freelancer-cancelled-projects.html">Cancelled Projects</a>
                                                                        </li>-->
                                </ul>
                            </nav>



                            <?php
                            $qry_get_proposals = mysqli_query($db_connection, "SELECT * FROM `dt_workpost_proposals` WHERE work_id = $workid ORDER BY FIELD(status,'P','R');");

                            if (mysqli_num_rows($qry_get_proposals) > 0) {
                                while ($row_proposals = mysqli_fetch_assoc($qry_get_proposals)) {

                                    $get_user_profile_freelancer = mysqli_query($db_connection, "SELECT * FROM dt_freelancer, dt_user , dt_domain_master , dt_country_master where dt_user.user_id = $row_proposals[user_id] and dt_freelancer.user_id = $row_proposals[user_id] AND dt_domain_master.domain_id = dt_freelancer.domain_id AND dt_country_master.country_id = dt_user.country_id;");
                                    $row_profile_freelancer = mysqli_fetch_array($get_user_profile_freelancer);
//                                    echo $row_proposals['status'];
                                    ?>

                                    <div class="proposals-section">
                                        <!--<h3 class="page-subtitle">My Proposals</h3>-->
                                        <div class="freelancer-proposals">
                                            <div class="project-proposals align-items-center freelancer">
                                                <div class="proposals-info">
                                                    <div class="proposals-detail">
                                                        <!--<h3 class="proposals-title">3D Renders and Amazon Product Store images/Video</h3>-->
                                                        <div class="proposals-content">
                                                            <div class="proposal-img">
                                                                <div class="text-md-center">
                                                                    <img src="../files/user_imgs/<?php echo $row_profile_freelancer['user_profile_img']; ?>" alt="" class="img-fluid">
                                                                    <h4><?php
                                                                        echo $row_profile_freelancer['user_name'];
                                                                        if ($row_profile_freelancer['authorized_keys'] != null) {
                                                                            echo '⍟';
                                                                        }
                                                                        ?> </h4>
                                                                    <span class="info-btn"><?php echo $row_profile_freelancer['domain_name']; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="proposal-client">
                                                                <h4 class="title-info">Bid Price</h4>
                                                                <?php
                                                                if ($row_proposals['hourly_rate'] != null) {
                                                                    ?>

                                                                    <!--<h3></h3>-->
                                                                    <h2 class="client-price">$<?php echo $row_proposals['hourly_rate']; ?></h2>
                                                                    <span class="price-type">( HOURLY )</span>
                                                                    <!--<h5>From -  To</h5>-->

                                                                    <?php
//                                                                        echo $data["from_rate"];
                                                                } else if ($row_proposals['fix_price'] != null) {
                                                                    ?>

                                                                    <h2 class="client-price">$<?php echo $row_proposals['fix_price'] ?></h2>
                                                                    <span class="price-type">( FIXED )</span>
                                                                    <!--<h5>Budget</h5>-->

                                                                <?php }
                                                                ?>




                                                            </div>
                                                            <div class="proposal-type">
                                                                <h4 class="title-info">Country name</h4>
                                                                <h3><?php echo $row_profile_freelancer['country_name']; ?></h3>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="project-hire-info">
                                                        <div class="content-divider-1"></div>
                                                        <div class="projects-amount">
                                                            <p>Status</p>

                                                            <?php
                                                            if ($row_proposals['status'] == 'C') {
                                                                ?>

                                                                <h3><span><i class="fas fa-medal me-2"></i></span>Hired</h3>

                                                                <?php
                                                            } else if ($row_proposals['status'] == 'P') {
                                                                ?>

                                                                <h3>Pending</h3>

                                                                <?php
                                                            } else if ($row_proposals['status'] == 'R') {
                                                                ?>

                                                                <h3><i class="fas fa-exclamation-triangle"></i>Rejected</h3>

                                                                <?php
                                                            }
                                                            ?>


                                                            <!--<h5>in 12 Days</h5>-->
                                                        </div>

                                                        <?php
                                                        include_once '../../disilab-api/api.php';
                                                        if ($row_profile_freelancer['authorized_keys'] != null) {
                                                            $score = getScore($row_profile_freelancer['authorized_keys']);
                                                            ?>
                                                            <div class="content-divider-1"></div>
                                                            <div class="projects-amount">
                                                                <p>Eligibility Score</p>                                                               

                                                                <h3><?php echo $score; ?></h3>




                                                                <!--<h5>in 12 Days</h5>-->
                                                            </div>

                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="content-divider-1"></div>
                                                        <div class="projects-action text-center">

                                                            <?php
                                                            if ($row_proposals['status'] == 'C' || $row_proposals['status'] == 'R') {
                                                                ?>

                                                                                                                <!--<h3><span><i class="fas fa-medal me-2"></i></span>Hired</h3>-->
                                                                <a data-bs-toggle="modal" href="../online_message/chat.php?user_id=13" class="projects-btn">Messages</a>
            <?php $freeid = $row_proposals['user_id']; ?>
                                                                <!--<a href="hirefreelancer.php?wid=<?php echo $workid; ?>&fid=<?php echo $freeid; ?>" class="projects-btn">Hire</a>-->

                                                                <?php
                                                            } else if ($row_proposals['status'] == 'P') {
                                                                ?>

                                                                <!--                                                                <h3>Pending</h3>-->
                                                                <a data-bs-toggle="modal" href="../online_message/chat.php?user_id=13" class="projects-btn">Messages</a>
            <?php $freeid = $row_proposals['user_id']; ?>
                                                                <a href="hirefreelancer.php?wid=<?php echo $workid; ?>&fid=<?php echo $freeid; ?>" class="projects-btn">Hire</a>

                                                                <?php
                                                            }
                                                            ?>


                                                            <!--<a href="#" class="proposal-delete">View Details</a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="description-proposal">
                                                    <h5 class="desc-title">Description</h5>
                                                    <p><?php echo $row_proposals['cover_letter'] ?></p></div>
                                            </div>
                                        </div>


                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="proposals-section">
                                    <!--<h3 class="page-subtitle">My Proposals</h3>-->
                                    <div class="freelancer-proposals">
                                        <div class="project-proposals align-items-center freelancer">
                                            <h4 style="text-align: center;">⏳ Sorry No pending Proposals are given by any freelancer ⏳</h4>
                                            <img style="display: block; margin-left: auto; margin-right: auto; width: 50%; height : 50%; " alt="no img " src="../../assets/img/No data-cuate.svg">
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>









                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="paginations freelancer">
                                        <li><a href="#"> <i class="fas fa-angle-left"></i> Previous</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#" class="active">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next <i class="fas fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


<?php include_once './include/footer.php'; ?>




        </div>


        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <script src="../../assets/plugins/summernote/dist/summernote-lite.min.js"></script>

        <script src="../../assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/freelancer-project-proposals.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:27 GMT -->
</html>