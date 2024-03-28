<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:45 GMT -->
    <head>
        <?php require './include/prep.php'; ?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>KofeJob</title>

        <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
        <?php include_once './include/resource.php'; ?>

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../../assets/css/style.css">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="dashboard-page">

        <div class="main-wrapper">


            <?php include_once './include/header.php' ?>     



            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-3 col-md-4 theiaStickySidebar">
                            <?php include_once './profile_nav.php'; ?>
                        </div>

                        <div class="col-xl-9 col-md-8">
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link" href="e_profile.php">Basic Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="change-password.html">Change Password</a>
                                    </li>
<!--                                    <li class="nav-item">
                                        <a class="nav-link" href="delete_account.php">Delete Account</a>
                                    </li>-->
                                </ul>
                            </nav>

                            <?php
                            if (isset($_POST['submit'])) {

                                $old = $_POST['old'];
                                $new = $_POST['new'];
                                $confirm = $_POST['conform'];

                                $qrycount = mysqli_query($db_connection, "SELECT COUNT(*) as number FROM dt_user WHERE user_id = $id AND dt_user.user_password = '$old';");

                                $rowcount = mysqli_fetch_assoc($qrycount);

                                if ($rowcount['number'] == 1) {
                                    if ($new == $confirm) {
                                        $update_pass = mysqli_query($db_connection, "UPDATE `dt_user` SET `user_password`='$confirm' WHERE dt_user.user_id=$id;");

                                        if ($update_pass) {
                                            ?>
                                        <script>swal("hurrah 🙌", "Your password was changed!", "success");</script>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <script>swal("sorry! 😥", "Please re-confirm your password", "error");</script>
                                        <?php
                                    }
                                } elseif($rowcount['number'] == 0) {
                                    ?>
                                        <script>swal("sorry! 😥", "Please Enter Correct Password", "error");</script>
                                        <?php
                                }
                            }
                            ?>

                            <div class="account-content setting-content">
                                <div class="card">
                                    <div class="pro-head">
                                        <h3 class="pro-title without-border mb-0">Change Password</h3>
                                    </div>
                                    <div class="pro-body">
                                        <div class="row">
                                            <div class="col-md-8">


                                                <form method="POST">
                                                    <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="new" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="conform" class="form-control" required="">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary click-btn btn-plan" type="submit" name="submit">Update</button>
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


            <?php include_once './include/footer.php'; ?>


        </div>


        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <script src="../../assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:45 GMT -->
</html>