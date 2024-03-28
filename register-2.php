<!doctype html>
<html lang="en">

<!-- Mirrored from uigaint.com/demo/html/anfra_2/register-2/register-2.html? by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jan 2022 08:45:11 GMT -->

<head>
    <?php 
    require 'db_connection.php';

    //Check if user has selected any option
    if(isset($_POST['UserType'])){
        $type=$_POST['UserType'];
        $id=$_GET['id'];
        $ran_id = rand(time(), 100000000);
        // $id = substr($id, 1);
        // $id = substr($id, 0, -1);

        //Insert user type in dt_user table
        $insert = mysqli_query($db_connection, "UPDATE dt_user SET user_type ='$type' WHERE google_id = '$id'");

        //Get data from dt_user table
        $get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `google_id`='$id'");

        //If User type is Freelancer
        if($type=='F'){
            while($row = mysqli_fetch_array($get_user)){
                $_SESSION['login_F'] = $row['user_id'];
                $_SESSION['unique_id'] = $row['unique_id'];
                echo $_SESSION['login_F'];
                header("Location: users/freelancer/freelancer-dashboard.php");
            }
        }
        //If user type is Employeer
        if($type=='E'){
            while($row = mysqli_fetch_array($get_user)){
                $_SESSION['login_E'] = $row['user_id'];
                $_SESSION['unique_id'] = $row['unique_id'];
                echo $_SESSION['login_E'];
                header("Location: users/employer/dashboard.php");
            }
        }
    }
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>User Type</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/theme-1.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <!-- <link rel="icon" href="../images/favicon.png"> -->
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/icon-114x114.png">


</head>

<body>


    <div class="ugf-main-wrap ugf-bg">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ugf-container pt200">
                        <div class="content-wrap">
                            <div class="ugf-form-block-header">
                                <h1>Select Your Plan</h1>
                                <p>Select your monthly/yearly to continue <br> Our most popular plan for your startup integrations</p>
                            </div>
                            <div class="ugf-input-block">
                                <form class="package-form" method="post" action="#">
                                    <div class="form-group">
                                        <input type="radio" name="UserType" value="F" class="form-control" id="inputFree" >
                                        <label for="inputFree">As a Freelancer</label>
                                        <div class="features">
                                            <div class="icon">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                            </div>
                                            <div class="feature-list">
                                                <h3>Features</h3>
                                                <ul>
                                                    <li class="checked">Send Proposal for Project</li>
                                                    <li class="checked">Manage profile</li>
                                                    <li class="checked">Connect with Employer</li>
                                                    <li class="checked">find project deals</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" name="UserType" value="E" class="form-control" id="inputBasic" >
                                        <label for="inputBasic">As a Employer</label>
                                        <div class="features">
                                            <div class="icon">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                            </div>
                                            <div class="feature-list">
                                                <h3>Features</h3>
                                                <ul>
                                                    <li class="checked">Add project works</li>
                                                    <li class="checked">Check Recived Proposals</li>
                                                    <li class="checked">Check Freelancer's profile</li>
                                                    <li class="checked">Get Efficiant freelancers for project</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn">Next</button>
                                </form>
                            </div>
                            <div class="alternet-access">
                                <p>Already have an account? <a href="login.html">Log in now!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>
</body>

<!-- Mirrored from uigaint.com/demo/html/anfra_2/register-2/register-2.html? by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jan 2022 08:45:28 GMT -->

</html>