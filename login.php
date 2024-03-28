<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        //Include database connection file
        require 'db_connection.php';
        //session_start();
        //If login button is clicked
        if (isset($_POST['BtnLogin'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if ($user == "admin01@gmail.com" && $pass == "Admin@123") {
                header('Location: ./users/admin/index.php');
            }

            //$ses_sql = mysqli_query($db_connection, "select user_id, user_type from dt_user where user_email = '$user' and user_password = '$pass' ");

            mysqli_query($db_connection, "SET @p0='" . $user . "'");
            mysqli_query($db_connection, "SET @p1='" . $pass . "'");
            //Execute perticulare query
            mysqli_query($db_connection, "SET @p2= 1");

            //Login procedure
            $ses_sql = mysqli_query($db_connection, "CALL Login(@p0,@p1,'',@p2)");
            $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

            //If query return result
            if (mysqli_num_rows($ses_sql) == 1) {
                //If user type is freelancer
                if ($row['user_type'] == 'F') {
                    $_SESSION['login_F'] = $row['user_id'];
                    $_SESSION['unique_id'] = $row['unique_id'];

                    if ($row['authorized_keys'] != null) {
                        $_SESSION['authorized_keys'] = $row['authorized_keys'];
                    }

                    echo $_SESSION['login_F'];
                    header('Location: ./users/freelancer/freelancer-dashboard.php');
                }
                //If user type is employeer
                else {
                    $_SESSION['login_E'] = $row['user_id'];
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo $_SESSION['login_E'];
                    header('Location: ./users/employer/dashboard.php');
                }
            } else {
                //Message for user
                $msg = "* Wrong username or password";
            }
        }

        require 'google-api/vendor/autoload.php';

// Creating new google client instance
        $client = new Google_Client();
// Enter your Client ID
        $client->setClientId('968623790328-a4q16cajer996m5j5jmbr912a74qkqp1.apps.googleusercontent.com');
// Enter your Client Secrect
        $client->setClientSecret('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');
// Enter the Redirect URL
        $client->setRedirectUri('http://localhost:8080/WorkFlow/login.php');

// Adding those scopes which we want to get (email & profile Information)
        $client->addScope("email");
        $client->addScope("profile");

        if (isset($_GET['code'])):
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

            if (!isset($token["error"])) {

                $client->setAccessToken($token['access_token']);

                // getting profile information
                $google_oauth = new Google_Service_Oauth2($client);
                $google_account_info = $google_oauth->userinfo->get();

                // Storing data into database
                $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
                $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
                $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
                //$profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
                $gender = mysqli_real_escape_string($db_connection, $google_account_info->gender);

                mysqli_query($db_connection, "SET @p0='" . $id . "'");
                mysqli_query($db_connection, "SET @p1='" . $email . "'");
                mysqli_query($db_connection, "SET @p2= 2 ");

                // checking user already exists or not
                $get_user = mysqli_query($db_connection, "CALL Login(@p1,'',@p0,@p2)");
                //$get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `google_id`='$id' or user_email='$email'");
                if (mysqli_num_rows($get_user) > 0) {
                    //$row = mysqli_fetch_assoc($get_user);

                    while ($row = mysqli_fetch_array($get_user)) {
                        if ($row['user_type'] == 'F') {
                            $_SESSION['login_F'] = $row['user_id'];
                            $_SESSION['unique_id'] = $row['unique_id'];
                            if ($row['authorized_keys'] != null) {
                                $_SESSION['authorized_keys'] = $row['authorized_keys'];
                            }
                            echo $_SESSION['login_F'];
                            header('Location: users/freelancer/freelancer-dashboard.php');
                        } else {
                            $_SESSION['login_E'] = $row['user_id'];
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo $_SESSION['login_E'];
                            header('Location: users/employer/dashboard.php');
                        }
                    }
                    exit;
                } else {
                    echo "1";
                    echo $id, $full_name, $email;
                    // if user not exists we will insert the user
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $full_name;
                    $_SESSION['email'] = $email;
                    header("Location: newUser.php");
                }
            } else {
                header('Location: login.php');
                exit;
            }

        else:
            // Google Login Url = $client->createAuthUrl(); 
            ?>
        <?php endif; ?>

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
                        <a id="mobile_btn" href="javascript:void(0);"> <span class="bar-icon">
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
                                <img src="https://www.logomaker.com/api/main/images/1j+ojFVDOMkX9Wytexe43D6khvCFqxNMmx...NwXs1M3EMoAJtliQsgvdu9Pk+" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i>
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
                                            <h3>Welcome Back</h3>
                                            <p>Don't miss your next opportunity. Sign in to stay updated on your professional world.</p>
                                        </div>
                                        <form action="#" method="post">
                                            <div class="form-group form-focus">
                                                <input type="email" id="txtEmail" onchange="checkEmail()" pattern=".+@gmail\.com" size="30" placeholder="example@gmail.com" title="Please provide only google email address (gmail.com)" required name="user"  class="form-control floating">
                                                <label class="focus-label">Email</label>
                                            </div>
                                            <div class="form-group form-focus">
                                                <input type="password" name="pass" class="form-control floating" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                <label class="focus-label">Password</label>
                                            </div>
                                            <div class="form-group">
                                                <label class="custom_check">
                                                    <input type="checkbox" name="rem_password">
                                                    <span class="checkmark"></span> Remember password</label><b style="color:red;"><?php
                                                    if (isset($msg)) {
                                                        echo " " . $msg;
                                                    }
                                                    ?></b>
                                            </div>
                                            <button name="BtnLogin" class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                            <div class="login-or">
                                                <p>Or login with</p>
                                            </div>
                                            <div class="row social-login">
                                                <div class="col-4">
                                                    <!--<a href="#" class="btn btn-twitter btn-block"> Twitter</a>-->
                                                </div>
                                                <div class="col-4">
                                                    <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-google btn-block"> Google</a>
                                                </div> 
                                                <div class="col-4">
                                                    <!--<a href="#" class="btn btn-facebook btn-block"> Facebook</a>-->

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 text-start">
                                                    <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                                </div>
                                                <div class="col-6 text-end dont-have">New to WorkFlow? <a href="register.php">Click here</a>
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
                                        <li><a href="login.html">Login</a>
                                        </li>
                                        <li><a href="register.php">Register</a>
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

        <script language="javascript">

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
    <!-- Mirrored from kofejob.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:45 GMT -->

</html>