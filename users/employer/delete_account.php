<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/delete-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:49:15 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>KofeJob</title>

        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
        
                <?php require './include/prep.php'; ?>
        <?php include_once './include/resource.php'; ?>


        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="dashboard-page">

        <div class="main-wrapper">


                       <?php include_once './include/header.php' ?>     



            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-3 col-md-4 theiaStickySidebar">
                            <?php include_once './profile_nav.php';?>
                        </div>

                        <div class="col-xl-9 col-md-8">
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link" href="e_profile.php">Basic Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="change_password.php">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="delete_account.php">Delete Account</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="setting-content">
                                <div class="card">
                                    <div class="pro-head">
                                        <h3 class="pro-title without-border mb-0">Delete Account</h3>
                                    </div>
                                    <div class="pro-body">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Please Explain Further**</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a class="btn btn-primary click-btn btn-plan" data-bs-toggle="modal" href="#delete-acc">Delete Account</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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


        <div class="modal fade custom-modal" id="delete-acc">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body del-modal">
                        <form action="https://kofejob.dreamguystech.com/template/index.html">
                            <div class="text-center pt-0 mb-5">
                                <i class="fas fa-exclamation-triangle fa-3x"></i>
                                <h3>Are you sure? Want to delete Account</h3>
                            </div>
                            <div class="submit-section text-center">
                                <button data-bs-dismiss="modal" class="btn btn-primary black-btn click-btn btn-plan">Cancel</button>
                                <button type="submit" class="btn btn-primary click-btn btn-plan">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <script src="../../assets/js/moment.min.js"></script>
        <script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>

        <script src="../../assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/delete-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:49:15 GMT -->
</html>