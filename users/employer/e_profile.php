<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:47:55 GMT -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>KofeJob</title>
        <?php include_once './include/resource.php' ?>
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="assets/css/style.css">


        <?php
        require '../db_connection.php';

//Check the login session active or not
        if (!isset($_SESSION['login_E'])) {
            //Redirect to login page
            header('Location: ../login.php');
        }
        $id = $_SESSION['login_E'];
// $uniq = $_SESSION['unique_id'];

        $get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id' ");

//Check does query return result
        if (mysqli_num_rows($get_user) > 0) {
            $user = mysqli_fetch_assoc($get_user);
        } else {
            header('Location: ../logout.php');
            exit;
        }


        $country = "Select * from dt_country_master";
        $all_country = mysqli_query($db_connection, $country);

        $domain = "Select * from dt_domain_master";
        $all_domain = mysqli_query($db_connection, $domain);

        $selectemployer = "Select * from dt_employer where `user_id`='$id' ";
        $all_data = mysqli_query($db_connection, $selectemployer);

        if (isset($_POST['btnupdate'])) {

            $username = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $displayname = $_POST['txtdisplayname'];
            $tagline = $_POST['txttagline'];
            $coNumber = $_POST['txtcontact'];
            $weburl = $_POST['txturl'];
            $domainname = $_POST['txtdomainname'];
            $exyear = $_POST['txtexyear'];
            $companydesc = $_POST['txtcompanydesc'];
            $country = $_POST['txtcontry'];
            $timezone = $_POST['txttimezone'];
            $address = $_POST['txtaddress'];
            $city = $_POST['txtcity'];
            $zipcode = $_POST['txtzipcode'];
            //$profile = $_POST['profilephoto'];
            // $cleanFirstName = mysqli_real_escape_string($db, $_POST['frmName']);
            // $cleanSurname = mysqli_real_escape_string($db, $_POST['frmSurname']);
            // $cleanEmail = mysqli_real_escape_string($db, $_POST['frmEmail']);



            if ($all_data) {
                if (mysqli_num_rows($all_data) > 0) {

                    $updatesql = "UPDATE dt_employer SET company_name = '$displayname',website_url = '$weburl', tagline = '$tagline',Experience_year='$exyear',	company_desc = '$companydesc',domain_id = '$domainname',contact_number = '$coNumber',timezone = '$timezone',address = '$address',city='$city',zipcode = '$zipcode' where `user_id`='$id'  ";
                    $updatesql2 = "UPDATE dt_user SET user_name = '$username',user_email = '$email', country_id  = '$country' where `user_id`='$id' ";

                    $sqlupdate = mysqli_query($db_connection, $updatesql);
                    $sqlupdate2 = mysqli_query($db_connection, $updatesql2);

                    if ($sqlupdate && $sqlupdate2) {

                        echo "<script>alert('Successfully Updated')</script>";
                    } else {
                        echo "Something went Wrong";
                    }
                } else {
                    // $insert_employer = "INSERT INTO dt_employer (company_name,website_url,tagline,Experience_year,company_desc,domain_id,contact_number,timezone,address,city,zipcode) VALUES ('$displayname','$weburl','$tagline','$exyear','$companydesc','$domainname','$coNumber','$timezone','$address','$city','$zipcode') where `user_id`='$id'";
                    $insert_employer = mysqli_query($db_connection, "INSERT INTO dt_employer (`user_id`,`company_name`,`website_url`,`tagline`,`Experience_year`,`company_desc`,`domain_id`,`contact_number`,`timezone`,`address`,`city`,`zipcode`) VALUES ('$id','$displayname','$weburl','$tagline','$exyear','$companydesc','$domainname','$coNumber','$timezone','$address','$city','$zipcode')");
                    if ($insert_employer) {
                        echo "<script>alert('Successfully Insert')</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $db_connection->error;
                    }
                }
            }
        }





        //     $updatesql = "UPDATE dt_employer SET company_name = '$displayname',website_url = '$weburl', tagline = '$tagline',Experience_year='$exyear',	company_desc = '$companydesc',domain_id = '$domainname',contact_number = '$coNumber',timezone = '$timezone',address = '$address',city='$city',zipcode = '$zipcode' where `user_id`='$id'  ";
        //     $updatesql2 = "UPDATE dt_user SET user_name = '$username',user_email = '$email', country_id  = '$country' where `user_id`='$id' ";
        //     $sqlupdate = mysqli_query($db_connection, $updatesql);
        //     $sqlupdate2 = mysqli_query($db_connection,$updatesql2);
        //     if ($sqlupdate && $sqlupdate2) {
        //         echo "<script>alert('Successfully Updated')</script>";
        //     } else {
        //         echo "Something went Wrong";
        //     }
        // }
        ?>



    </head>

    <body class="dashboard-page">

        <?php include_once './include/header.php' ?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-3 col-md-4 theiaStickySidebar">
                        <?php include_once './profile_nav.php'; ?>
                    </div>

                    <div class="col-xl-9 col-md-8">
                        <div class="pro-pos">
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="e_profile.php">Basic Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="change_password.php">Change Password</a>
                                    </li>
<!--                                    <li class="nav-item">
                                        <a class="nav-link" href="delete_account.php">Delete Account</a>
                                    </li>-->
                                </ul>
                            </nav>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="setting-content">
                                    <div class="card">
                                        <div class="pro-head">
                                            <h3 class="pro-title without-border mb-0">Profile Basics </h3>
                                        </div>

                                        <?php
                                        $qryprint = "Select * from dt_user where `user_id`='$id';";
                                        $qryReturn = $db_connection->query($qryprint);
                                        $row = $qryReturn->fetch_array(MYSQLI_ASSOC);

// $qryprint2 = "Select * from dt_employer where `user_id`='$id ";
// $qryReturn2 = $db_connection->query($qryprint2);
// $row2 = $qryReturn2->fetch_array(MYSQLI_ASSOC);
                                        ?>
                                        <?php
                                        $qryprint2 = "Select * from dt_employer where `user_id`='$id';";
                                        $qryReturn2 = $db_connection->query($qryprint2);
                                        $row2 = $qryReturn2->fetch_array(MYSQLI_ASSOC);
                                        ?>

                                        <div class="pro-body p-0">
                                            <div class="form-row pro-pad">
                                                <div class="form-group col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" value="<?php echo $row['user_name'] ?>"
                                                           class="form-control" name="txtusername">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email Address</label>
                                                    <input type="email" value="<?php echo $row['user_email'] ?>"
                                                           class="form-control" name="txtemail">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Company Name</label>
                                                    <input type="text" class="form-control" name="txtdisplayname" value="<?php echo $row2['company_name'] ?>">

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tagline</label>
                                                    <input type="text" class="form-control" name="txttagline" value="<?php echo $row2['tagline'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" name="txtcontact" value="<?php echo $row2['contact_number'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Website Url</label>
                                                    <input type="text" class="form-control" name="txturl" value="<?php echo $row2['website_url'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Domain name</label>
                                                    <select class="form-control select" name="txtdomainname" >
                                                        <?php
                                                        while ($dmn = mysqli_fetch_array($all_domain, MYSQLI_ASSOC)) {
                                                            if ($dmn["domain_id"] == $row2['domain_id']) {
                                                                ?>
                                                                <option value="<?php echo $dmn["domain_id"]; ?>" selected> <?php echo $dmn["domain_name"]; ?> </option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $dmn["domain_id"]; ?>"> <?php echo $dmn["domain_name"]; ?> </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Experince Year </label>
                                                    <input type="number" class="form-control" name="txtexyear" value="<?php echo $row2['Experience_year'] ?>">
                                                </div>
                                            </div>




                                            <?php
                                            error_reporting(0);

                                            $msg = "";

                                            // If upload button is clicked ...
                                            if (isset($_POST['btnupdate'])) {

                                                $filename = $_FILES["profilephoto"]["name"];
                                                $tempname = $_FILES["profilephoto"]["tmp_name"];
                                                $folder = "./e_chat/php/images/" . $filename;

                                                // Get all the submitted data from the form
                                                //$sql = "INSERT INTO image (filename) VALUES ('$filename')";
                                                $sql = "UPDATE dt_user SET user_profile_img = '$filename' where `user_id`='$id' ";

                                                // Execute query
                                                mysqli_query($db_connection, $sql);

                                                // Now let's move the uploaded image into the folder: image
                                                if (move_uploaded_file($tempname, $folder)) {
                                                    $msg = "Image uploaded successfully";
                                                } else {
                                                    $msg = "Failed to upload image";
                                                }
                                            }
                                            //$result = mysqli_query($db, "SELECT * FROM image");
                                            ?>
                                            <div class="form-row pro-pad pt-0">
                                                <div class="form-group col-md-6 pro-pic">
                                                    <label>Profile Picture</label>
                                                    <div class="d-flex align-items-center">
                                                        

                                                            <div class="upload-images">
                                                                <img src="../files/user_imgs/<?php echo $row['user_profile_img'] ?>" alt="Image"  >
<!--<img src="./e_chat/php/images/<?php // echo $row['user_profile_img'] ?>"
                                                            alt="Image" name="img" aria-placeholder="./e_chat/php/images/<?php echo $row['user_profile_img'] ?>">
                                                        -->
                                                                <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-danger btn-sm"><i
                                                                class="far fa-trash-alt"></i></a>
                                                                
                                                            </div>
                                                        
                                                            <label class="file-upload image-upbtn ms-3">
                                                                Change Image 
                                                                <input type="file" name="profilephoto" value="../files/user_imgs/<?php echo $row['user_profile_img'] ?>">
                                                            </label>
                                                        </div>
                                                        <p>Image size 300*300</p>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="card">
                                            <div class="pro-head">
                                                <h3 class="pro-title without-border mb-0">Location</h3>
                                            </div>
                                            <div class="pro-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="txtaddress" value="<?php echo $row2['address'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="txtcity" value="<?php echo $row2['city'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Zipcode</label>
                                                        <input type="text" class="form-control" name="txtzipcode" value="<?php echo $row2['zipcode'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Country</label>
                                                        <select class="form-control select" name="txtcontry">
                                                            <?php
                                                            while ($cntry = mysqli_fetch_array($all_country, MYSQLI_ASSOC)){
                                                                if($cntry["country_id"] == $row['country_id']){
                                                                    
                                                                    ?>
                                                                        <option value="<?php echo $cntry["country_id"]; ?>" selected>
                                                                    <?php echo $cntry["country_name"]; ?>
                                                                </option>
                                                                        <?php
                                                                    
                                                                }else{
                                                                    
                                                                
                                                                ?>
                                                                <option value="<?php echo $cntry["country_id"]; ?>">
                                                                    <?php echo $cntry["country_name"]; ?>
                                                                </option>
                                                                <?php
                                                            }}
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Timezone</label>
                                                        <input type="text" class="form-control" name="txttimezone" value="<?php echo $row2['timezone'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="pro-head">
                                                <h3 class="pro-title without-border mb-0">Overview</h3>
                                            </div>
                                            <div class="pro-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <textarea class="form-control" rows="5" name="txtcompanydesc"><?php echo $row2['company_desc'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="card">
                                                <div class="pro-head">
                                                    <h3 class="pro-title without-border mb-0">Social Links</h3>
                                                </div>
                                                <div class="pro-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Facebook</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Dribble</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Twitter</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>LinkedIn</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Behance</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Behance</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <div class="card">
                                            <div class="text-end">
                                                <div class="pro-body">
                                                    <button class="btn btn-secondary click-btn btn-plan"
                                                            type="submit">Cancel</button>
                                                    <button class="btn btn-primary click-btn btn-plan" type="submit"
                                                            name="btnupdate">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include_once './include/footer.php' ?>
        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <script src="../../assets/js/moment.min.js"></script>
        <script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>

        <script src="../../assets/js/profile-settings.js"></script>

        <script src="../../assets/js/script.js"></script>
    </body>

</html>

