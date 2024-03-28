<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kofejob.dreamguystech.com/template/freelancer-project-proposals.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:23 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>WorkFlow</title>
    <?php
    require '../db_connection.php';

    if(!isset($_SESSION['login_F'])){
        header('Location: login.php');
    }
    $id = $_SESSION['login_F'];

    $get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");

    if(mysqli_num_rows($get_user) > 0){
        $user = mysqli_fetch_assoc($get_user);
    }
    else{
        header('Location: ../logout.php');
        exit;
    }
    ?>
    <?php //include_once './include/resource.php' ?>

    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="../../assets/css/style.css">



</head>
<body class="dashboard-page">

<div class="main-wrapper">

    <?php include_once './include/header.php'?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                                         <?php include_once './project_navigation.php';?>



                <div class="col-xl-9 col-md-8">
                    <div class="page-title">
                        <h3>WorkPosts</h3>
                    </div>
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" href="freelancer-project-projects.php">Workpost</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="freelancer-suggestion-projects.php">Suggestion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="freelancer-suggestion-skill-projects.php">Suggestion By Skill</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="freelancer-suggestion-budget-projects.php">Suggestion By Budget</a>
                            </li>
                        </ul>
                    </nav>
                    
                    <?php  
                    $id = $_SESSION['login_F'];
                    
                    $check_user_data = mysqli_query($db_connection, "SELECT * from dt_freelancer WHERE user_id = $id;");

                    if (mysqli_num_rows($check_user_data) > 0) {
                        ?>

                    <div class="proposals-section">
                        <h3 class="page-subtitle"></h3>
                    <?php
                        include 'suggestion-functions.php';
                        
                        $get_user_profile = mysqli_query($db_connection, "SELECT * FROM dt_freelancer where user_id = $_SESSION[login_F]");
                        $row_profile = mysqli_fetch_array($get_user_profile);

                        //CALL SUGGESTION FUNCTION
                        
                        $work = sortByFilter($row_profile['domain_id'], $_SESSION['login_F'] , $row_profile['experience_year'],$row_profile['range_id']);

                        // GET DATA FROM ARRAY
                        $keys = array_keys($work);
                        for($i = 0; $i < count($work); $i++) {
                            foreach($work[$keys[$i]] as $key => $value) {
                                if($key == "work_id"){
                                    $get_user = mysqli_query($db_connection, "SELECT * FROM dt_workpost where work_id = $value");
                                    $row = mysqli_fetch_array($get_user);
                                    $get_user_profile_employer = mysqli_query($db_connection, "SELECT * FROM dt_employer, dt_user where dt_user.user_id = $row[user_id] and dt_employer.user_id = $row[user_id]");
                                    $row_profile_employer = mysqli_fetch_array($get_user_profile_employer);            
                         
                        // $get_user = mysqli_query($db_connection, "SELECT * FROM dt_workpost where work_id = $value");
                        // $row = mysqli_fetch_array($get_user)
                        // $get_user_profile_employer = mysqli_query($db_connection, "SELECT * FROM dt_employer, dt_user where dt_user.user_id = $row[user_id] and dt_employer.user_id = $row[user_id]");
                        // $row_profile_employer = mysqli_fetch_array($get_user_profile_employer);
                                
                    ?>
                        <div class="freelancer-proposals">
                            <div class="project-proposals align-items-center freelancer">
                                <div class="proposals-info">
                                    <div class="proposals-detail">
                                        <h3 class="proposals-title"><?php echo $row['work_title'] ?></h3>
                                        <div class="proposals-content">
                                            <div class="proposal-img">
                                                <div class="text-md-center">
                                                    <img src="../files/user_imgs/<?php echo $row_profile_employer['user_profile_img'] ?>" alt="" class="img-fluid">
                                                    <h4><?php echo $row_profile_employer['company_name'] ?></h4>
                                                    <!-- <span class="info-btn">client</span> -->
                                                </div>
                                            </div>
                                            <div class="proposal-client">
                                            <?php
                                                if($row['range_id'] != null){
                                                    ?>
                                                    <h4 class="title-info">Hourly Rate</h4>
                                                    <h2 class="client-price">
                                                        <?php
                                                        $get_user_price_range = mysqli_query($db_connection, "select * from dt_price_range where range_id = $row[range_id] ");
                                                        $row_get_user_price_range = mysqli_fetch_array($get_user_price_range);
                                                        
                                                        echo $row_get_user_price_range['from_rate']." - ".$row_get_user_price_range['to_rate']." $" ;
                                                        
                                                        ?> 
                                                    </h2>
                                                <?php    
                                                }
                                                else{
                                                    ?>
                                                    <h4 class="title-info">Client budget</h4>
                                                    <h2 class="client-price">
                                                        <?php echo $row['fix_budget']." $"; ?>
                                                    </h2>
                                                    <span class="price-type">( FIXED )</span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- <div class="proposal-type">
                                                <h4 class="title-info">Job Type</h4>
                                                <h3>Hourly</h3>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="project-hire-info">
                                        <div class="content-divider-1"></div>
                                        <div class="projects-amount">
                                            <p>Work Duration</p>
                                            <h3><?php echo $row['work_duration'] ?></h3>
                                            <!-- <h5>in 12 Days</h5> -->
                                        </div>
                                        <div class="content-divider-1"></div>
                                        <div class="projects-action text-center">
                                            <!-- <a data-bs-toggle="modal" href="#file" class="projects-btn">Edit Proposals </a> -->
                                            <a href="project-detail.php?i=<?php echo $row['work_id']?>" class="projects-btn">View Project</a>
                                            <!-- <a href="#" class="proposal-delete">Delete Proposal</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="description-proposal">
                                    <h5 class="desc-title">Description</h5>
                                    <p><?php echo $row['work_desc'] ?><a href="#" class="text-primary font-bold">Readmore</a></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                                   }
                                }
                            }    
                        ?>
                    </div>
<?php
                    } else {
                        ?>
                            
                            <div class="proposals-section">
                                    <!--<h3 class="page-subtitle">My Proposals</h3>-->
                                    <div class="freelancer-proposals">
                                        <div class="project-proposals align-items-center freelancer">
                                            <h4 style="text-align: center;">⏳ You have to complete Your profile to get recommendation works <a href="f_profile.php"> click here </a>to complete it ⏳</h4>
                                            <img style="display: block; margin-left: auto; margin-right: auto; width: 50%; height : 50%; " alt="no img " src="../../assets/img/No data-rafiki2nd.svg">
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
                                    <a href="#"><img class="img-fluid" src="../assets/img/app-store.svg" alt="app-store"></a>
                                </div>
                                <div class="col">
                                    <a href="#"><img class="img-fluid" src="../assets/img/google-play.svg" alt="google-play"></a>
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


    <div class="modal fade" id="file">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDIT PROPOSAL</h4>
                    <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></a></span>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="modal-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cost</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Days</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control summernote" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section text-end">
                            <button type="submit" class="btn btn-primary submit-btn">Save Proposal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


</body>

<script src="../../assets/js/jquery-3.6.0.min.js"></script>

<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<script src="../../assets/js/script.js"></script>


<!-- Mirrored from kofejob.dreamguystech.com/template/freelancer-project-proposals.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:27 GMT -->
</html>