<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        require 'db_connection.php';
        if (isset($_POST["btnFreelancer"])) {
            $error = 0;
            $name = $_POST["FName"] . " " . $_POST["LName"];
            $email = $_POST["Email"];
            $pass = $_POST["Pass"];
            $cpass = $_POST["CPass"];
            $ran_id = rand(time(), 100000000);

            if ($pass != $cpass) {
                $error = 1;
            }
            if ($error != 1) {
                mysqli_query($db_connection, "SET @p0='" . $name . "'");
                mysqli_query($db_connection, "SET @p1='" . $email . "'");
                mysqli_query($db_connection, "SET @p2='" . $pass . "'");
                mysqli_query($db_connection, "SET @p3= 'F'");
                //Execute particular query
                mysqli_query($db_connection, "SET @p4= 1");

                // random number
                mysqli_query($db_connection, "SET @p5='" . $ran_id . "'");

                //Register Store Procedure
                $insert = mysqli_query($db_connection, "CALL Register('',@p0,@p1,@p2,@p3,@p4,@p5)");
                if ($insert) {
                    header("Location: login.php");
                } else {
                    echo "FAIL";
                }
                //$insert = mysqli_query($db_connection, "INSERT INTO `dt_user`( `user_name`, `user_email`, `user_password`, `user_type`) VALUES ('$name','$email','$pass','F')");
            }
        }
        if (isset($_POST["btnEmployeer"])) {
            $error = 0;
            $name = $_POST["FName"] . " " . $_POST["LName"];
            $email = $_POST["Email"];
            $pass = $_POST["Pass"];
            $cpass = $_POST["CPass"];
            $ran_id = rand(time(), 100000000);

            if ($pass != $cpass) {
                $error = 1;
            }
            if ($error != 1) {
                mysqli_query($db_connection, "SET @p0='" . $name . "'");
                mysqli_query($db_connection, "SET @p1='" . $email . "'");
                mysqli_query($db_connection, "SET @p2='" . $pass . "'");
                mysqli_query($db_connection, "SET @p3= 'E'");
                //Execute particular query
                mysqli_query($db_connection, "SET @p4= 1");

                // random number
                mysqli_query($db_connection, "SET @p5='" . $ran_id . "'");

                //Regsiter Store Procedure
                $insert = mysqli_query($db_connection, "CALL Register('',@p0,@p1,@p2,@p3,@p4,@p5)");
                if ($insert) {
                    header("Location: login.php");
                } else {
                    echo "FAIL";
                }
                //$insert = mysqli_query($db_connection, "INSERT INTO `dt_user`( `user_name`, `user_email`, `user_password`, `user_type`) VALUES ('$name','$email','$pass','E')");
            }
        }
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>WorkFlow</title>
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body class="account-page">
        <div class="main-wrapper">
            <header class="header">
                <nav class="navbar navbar-expand-lg header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <!-- <a href="index.html" class="navbar-brand logo">
                                <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                        </a> -->
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="index.html" class="menu-logo">
                                <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="nav header-navbar-rht">
                        <li><a href="register.php" class="reg-btn"><i class="fas fa-user"></i> Register</a>
                        </li>
                        <li><a href="login.php" class="log-btn"><i class="fas fa-lock"></i> Login</a>
                        </li>
                        <li><a href="" class="login-btn">Home</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="account-content">
                                <div class="align-items-center justify-content-center">
                                    <div class="login-right">
                                        <div class="login-header text-center">
                                            <a href="index.html">
                                                <img src="assets/img/logo-01.png" alt="logo" class="img-fluid">
                                            </a>
                                            <h3>Join WorkFlow</h3>
                                            <p>Make the most of your professional life</p>
                                        </div>
                                        <nav class="user-tabs mb-4">
                                            <ul role="tablist" class="nav nav-pills nav-justified">
                                                <li class="nav-item">
                                                    <a href="#developer" data-bs-toggle="tab" class="nav-link active">FREELANCER</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#company" data-bs-toggle="tab" class="nav-link">COMPANY</a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <div class="tab-content pt-0">
                                            <div role="tabpanel" id="developer" class="tab-pane fade active show">
                                                <form action="#" method="post" >
                                                    <div class="form-group form-focus">
                                                        <input name="FName" type="text" id="name"  pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" class="form-control floating" required="">
                                                        <label  class="focus-label">First Name</label>
                                                    </div>
                                                    <div class="form-group form-focus">
                                                        <input name="LName" type="text" id="name"  pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" class="form-control floating" required="">
                                                        <label class="focus-label">Last Name</label>
                                                    </div>
                                                    <div class="form-group form-focus">
                                                        <input name="Email" type="email" class="form-control floating" id="txtEmail" onchange="checkEmail()" pattern=".+@gmail\.com" size="30" placeholder="example@gmail.com" title="Please provide only google email address (gmail.com)" required="">
                                                        <label class="focus-label">Email</label>
                                                    </div>
                                                    <div class="form-group form-focus">
                                                        <input name="Pass" id="pswd1"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control floating" required="">
                                                        <label class="focus-label">Password</label>
                                                    </div>
                                                    <div class="form-group form-focus mb-0">
                                                        <input name="CPass" id="pswd2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control floating" required="">
                                                        <label class="focus-label">Confirm Password</label>
                                                    </div>
                                                    <div class="dont-have">
                                                        <label class="custom_check">
                                                            <input type="checkbox" name="rem_password">
                                                            <span class="checkmark"></span> You agree to the Workflow <a href="privacy-policy.html">User Agreement, Privacy Policy,</a> and <a href="privacy-policy.html">Cookie Policy</a>.</label>
                                                    </div>
                                                    <button name="btnFreelancer" class="btn btn-primary btn-block btn-lg login-btn" onclick="matchPassword()" type="submit">Agree TO JOIN</button>
                                                    <div class="login-or">
                                                        <p>Or login with</p>
                                                    </div>
                                                    <div class="row social-login">
                                                        <div class="col-4">
                                                            <!--<a href="#" class="btn btn-twitter btn-block"> Twitter</a>-->
                                                        </div>
                                                        <div class="col-4">
                                                            <a href="#" class="btn btn-google btn-block"> Google</a>
                                                        </div>
                                                        <div class="col-4">
                                                            <!--<a href="#" class="btn btn-facebook btn-block"> Facebook</a>-->

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 text-start">
                                                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                                        </div>
                                                        <div class="col-6 text-end dont-have">Already on WorkFlow <a href="login.php">Click here</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" id="company" class="tab-pane fade">
                                                <form action="#" method="post">
                                                    <div class="form-group form-focus">
                                                        <input name="FName" type="text" id="name" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" class="form-control floating" required="">
                                                        <label class="focus-label">First Name</label>
                                                    </div>
                                                    <div class="form-group form-focus">
                                                        <input name="LName" type="text" id="name" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" class="form-control floating" required="">
                                                        <label class="focus-label">Last Name</label>
                                                    </div>
                                                    <div class="form-group form-focus">
                                                        <input name="Email" type="email" class="form-control floating" id="txtEmail" onchange="checkEmail()" pattern=".+@gmail\.com" size="30" placeholder="example@gmail.com" title="Please provide only google email address (gmail.com)" required="">
                                                        <label class="focus-label">Email</label>
                                                    </div>
                                                    <div class="form-group form-focus">
                                                        <input name="Pass" id="pswd1" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control floating" required="">
                                                        <label class="focus-label">Password</label>
                                                    </div>
                                                    <div class="form-group form-focus mb-0">
                                                        <input name="CPass" id="pswd2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control floating" required="">
                                                        <label class="focus-label">Confirm Password</label>
                                                    </div>
                                                    <div class="dont-have">
                                                        <label class="custom_check">
                                                            <input type="checkbox" name="rem_password">
                                                            <span class="checkmark"></span> You agree to the WorkFlow <a href="privacy-policy.html">User Agreement, Privacy Policy,</a> and <a href="privacy-policy.html">Cookie Policy</a>.</label>
                                                    </div>
                                                    <button name="btnEmployeer" class="btn btn-primary btn-block btn-lg login-btn" onclick="matchPassword()" type="submit">Agree TO JOIN</button>
                                                    <div class="login-or">
                                                        <p>Or login with</p>
                                                    </div>
                                                    <div class="row form-row social-login">
                                                        <div class="col-4">
                                                            <!--<a href="#" class="btn btn-twitter btn-block"> Twitter</a>-->
                                                        </div>
                                                        <div class="col-4">
                                                            <a href="#" class="btn btn-google btn-block"> Google</a>
                                                        </div>
                                                        <div class="col-4">
                                                            <!--<a href="#" class="btn btn-facebook btn-block"> Facebook</a>-->

                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-6 text-start">
                                                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                                        </div>
                                                        <div class="col-6 text-end dont-have">Already on WorkFlow <a href="login.php">Click here</a>
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
                                        <p>Call: <a href="#"><u>469-537-2410</u> (Toll-free)</a> 
                                        </p>
                                    </div>
                                    <div class="off-address">
                                        <p class="mb-2">Sydney, Australia</p>
                                        <address class="mb-0">24 Farrar Parade COOROW WA 6515</address>
                                        <p>Call: <a href="#"><u>(08) 9064 9807</u> (Toll-free)</a> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Useful Links</h2>
                                    <ul>
                                        <li><a href="about.html">About Us</a>
                                        </li>
                                        <li><a href="blog-list.html">Blog</a>
                                        </li>
                                        <li><a href="login.php">Login</a>
                                        </li>
                                        <li><a href="register.html">Register</a>
                                        </li>
                                        <li><a href="forgot-password.html">Forgot Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Help & Support</h2>
                                    <ul>
                                        <li><a href="chats.html">Chat</a>
                                        </li>
                                        <li><a href="faq.html">Faq</a>
                                        </li>
                                        <li><a href="review.html">Reviews</a>
                                        </li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a>
                                        </li>
                                        <li><a href="term-condition.html">Terms of use</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Other Links</h2>
                                    <ul>
                                        <li><a href="freelancer-dashboard.html">Freelancers</a>
                                        </li>
                                        <li><a href="freelancer-portfolio.html">Freelancer Details</a>
                                        </li>
                                        <li><a href="project.html">Project</a>
                                        </li>
                                        <li><a href="project-details.html">Project Details</a>
                                        </li>
                                        <li><a href="post-project.html">Post Project</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="footer-widget footer-menu">
                                    <h2 class="footer-title">Mobile Application</h2>
                                    <p>Download our App and get the latest Breaking News Alerts and latest headlines and daily articles near you.</p>
                                    <div class="row g-2">
                                        <div class="col">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/img/app-store.svg" alt="app-store">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/img/google-play.svg" alt="google-play">
                                            </a>
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
                                            <li><a href="#" class="icon" target="_blank"><i class="fab fa-instagram"></i> </a>
                                            </li>
                                            <li><a href="#" class="icon" target="_blank"><i class="fab fa-linkedin-in"></i> </a>
                                            </li>
                                            <li><a href="#" class="icon" target="_blank"><i class="fab fa-twitter"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/slick.js"></script>
        <script src="assets/js/script.js"></script>

        <script>
                                                        
        </script>

        <script language="javascript">

            function matchPassword() {
                var pw1 = document.getElementById("pswd1");
                var pw2 = document.getElementById("pswd2");
                if (pw1 != pw2)
                {
                    alert("Passwords did not match");
                } else {
        //    alert("Password created successfully");
                    return true;
                }
            }

            function checkEmail() {

                var email = document.getElementById('txtEmail');
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if (!filter.test(email.value)) {
                    alert('Please provide a valid email address');
                    email.focus;
                    return false;
                }
            }</script>
    </body>
    <!-- Mirrored from kofejob.dreamguystech.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:45 GMT -->

</html>