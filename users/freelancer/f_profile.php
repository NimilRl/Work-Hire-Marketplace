<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:47:55 GMT -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>WorkFlow</title>
        <?php include_once './include/resource.php' ?>
        <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="../../assets/css/style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <?php
        error_reporting(0);

        $status = $_GET['s'];

        if ($status == 2) {


            echo'
      <script>
      document.addEventListener("DOMContentLoaded", function() {
        swal("Sorry , face not detected 😥", "upload new file", "error");

      });
        </script>
      ';
        }
        if ($status == 1) {


            echo'
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            swal(" hurrah! Data updated 🎉", "face detected", "success");
        });
          </script>
        ';
        }

        require '../db_connection.php';

        if (!isset($_SESSION['login_F'])) {
            header('Location: login.php');
        }
        $id = $_SESSION['login_F'];

        $get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");

        if (mysqli_num_rows($get_user) > 0) {
            $user = mysqli_fetch_assoc($get_user);
        } else {
            header('Location: ../logout.php');
            exit;
        }


        $country = "Select * from dt_country_master";
        $all_country = mysqli_query($db_connection, $country);
        $company_country = mysqli_query($db_connection, $country);

        $domain = "Select * from dt_domain_master";
        $all_domain = mysqli_query($db_connection, $domain);

        $range = "SELECT * FROM dt_price_range";
        $all_range = mysqli_query($db_connection, $range);

        $skill = "Select * from dt_skill_master";
        $all_skill = mysqli_query($db_connection, $skill);

        $selectfrelancer = "Select * from dt_freelancer where `user_id`='$id' ";
        $all_data = mysqli_query($db_connection, $selectfrelancer);

        if (isset($_POST['btnupdate'])) {

            //update on user table personal info
            $username = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            // $profile = $_POST['profilephoto'];
            // $displayname = $_POST['txtdisplayname'];
            // $tagline = $_POST['txttagline'];
            //$country = $_POST['txtcontry'];
            //update on freelancer table personal info
            $user_lang = $_POST['txtuserlang'];
            $lang_profi = $_POST['txtlangpro'];
            $coNumber = $_POST['txtcontact'];
            $domainname = $_POST['txtdomainname'];
            $exyear = $_POST['txtexyear'];
            //$resumefile = $_POST['fileToUpload'];
            // $weburl = $_POST['txturl'];
            // echo $_POST['fileToUpload']['tmp_name'];
            //location info
            $address = $_POST['txtaddress'];
            //$city = $_POST['txtcity'];
            $zipcode = $_POST['txtzipcode'];
            //$timezone = $_POST['txttimezone'];
            //$country = $_POST['txtcontry'];

            $personal_bio = $_POST['txtpersonalbio'];

            //education info
            $institute_name = $_POST['txtinstitute'];
            $edu_degree = $_POST['txtdegree'];
            $course_name = $_POST['txtcoursename'];
            $course_startdate = $_POST['startdate'];
            $course_enddate = $_POST['enddate'];
            $edu_desc = $_POST['txtedudesc'];

            //compney details
            $company_location = $_POST['txtcompanylocation'];
            $company_cuntry = $_POST['txtcompanycountry'];
            $range = $_POST['txtrange'];
            $finalamount = $_POST['finalamount'];

            if ($all_data) {
                if (mysqli_num_rows($all_data) > 0) {

                    $updatesql = "UPDATE dt_user SET user_name = '$username',user_email = '$email' where `user_id`='$id' ";
                    $freupdatesql = "UPDATE dt_freelancer SET user_language = '$user_lang',language_proficiency = '$lang_profi',contact_number = '$coNumber',domain_id = '$domainname',experience_year = '$exyear',address = '$address',zipcode = '$zipcode',personal_bio = '$personal_bio',institute_name = '$institute_name',education_degree = '$edu_degree',course_name = '$course_name',course_start_date = '$course_startdate',course_end_date = '$course_enddate',education_desc = '$edu_desc',company_location = '$company_location',company_country = '$company_cuntry',range_id = '$range',final_amount = '$finalamount' where `user_id`='$id'";
                    //,resume_file = '$resumefile'
                    $sqlupdate = mysqli_query($db_connection, $updatesql);
                    $sqlupdate2 = mysqli_query($db_connection, $freupdatesql);

                    if ($sqlupdate && $sqlupdate2) {
                        //echo $freupdatesql;
                        echo "<script>alert('Successfully Updated')</script>";
                    } else {
                        echo "Something went Wrong";
                    }
                } else {
                    // $insert_employer = "INSERT INTO dt_employer (company_name,website_url,tagline,Experience_year,company_desc,domain_id,contact_number,timezone,address,city,zipcode) VALUES ('$displayname','$weburl','$tagline','$exyear','$companydesc','$domainname','$coNumber','$timezone','$address','$city','$zipcode') where `user_id`='$id'";
                    $insert_employer = mysqli_query($db_connection, "INSERT INTO dt_freelancer (`user_id`,`address`,`zipcode`,`user_language`,`language_proficiency`,`domain_id`,`contact_number`,`personal_bio`,`range_id`,`final_amount`,`experience_year`,`company_location`,`company_country`,`institute_name`,`education_degree`,`course_name`,`course_start_date`,`course_end_date`,`education_desc`) VALUES ('$id','$address','$zipcode','$user_lang','$lang_profi','$domainname','$coNumber','$personal_bio','$range','$finalamount','$exyear','$company_location','$company_cuntry','$institute_name','$edu_degree','$course_name','$course_startdate','$course_enddate','$edu_desc')");
                    if ($insert_employer) {
                        echo "<script>alert('Successfully Insert')</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $db_connection->error;
                    }
                }
            }
        }

        // $updatesql = "UPDATE dt_user SET user_name = '$username',user_email = '$email' where `user_id`='$id' ";
        // $freupdatesql = "UPDATE dt_freelancer SET user_language = '$user_lang',language_proficiency = '$lang_profi',contact_number = '$coNumber',domain_id = '$domainname',experience_year = '$exyear',address = '$address',zipcode = '$zipcode',city = '$city',timezone = '$timezone',personal_bio = '$personal_bio',institute_name = '$institute_name',education_degree = '$edu_degree',course_name = '$course_name',course_start_date = '$course_startdate',course_end_date = '$course_enddate',education_desc = '$edu_desc',company_location = '$company_location',company_country = '$company_cuntry',range_id = '$range',final_amount = '$finalamount' where `user_id`='$id'";
        // //,resume_file = '$resumefile'
        // $sqlupdate = mysqli_query($db_connection, $updatesql);
        // $sqlupdate2 = mysqli_query($db_connection, $freupdatesql);
        // if ($sqlupdate && $sqlupdate2) {
        //     //echo $freupdatesql;
        //     echo "<script>alert('Successfully Updated')</script>";
        // } else {
        //     echo "Something went Wrong";
        // }
        ?>



    </head>

    <body class="dashboard-page">


        <?php include_once './include/header.php' ?>

        <script>
            window.history.pushState({}, document.title, "./f_profile.php");
        </script>
        <!--<script>swal("My title", "My description", "success");</script>-->

<?php
$qryprint = "Select * from dt_user where `user_id`='$id'";
$qryReturn = $db_connection->query($qryprint);
$row = $qryReturn->fetch_array(MYSQLI_ASSOC);
?>
<?php
$qryprint2 = "Select * from dt_freelancer where `user_id`='$id';";
$qryReturn2 = $db_connection->query($qryprint2);
$row2 = $qryReturn2->fetch_array(MYSQLI_ASSOC);
?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">


        <?php include_once './profile_nav.php'; ?>



                    <div class="col-xl-9 col-md-8">
                        <div class="pro-pos">
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="f_profile.php">Basic Settings</a>
                                    </li>
<!--                                    <li class="nav-item">
                                        <a class="nav-link" href="change-password.html">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="delete-account.html">Delete Account</a>
                                    </li>-->
                                </ul>
                            </nav>
                            <form action = "./facefind/index.php" method="POST" enctype="multipart/form-data">
                                <div class="setting-content">
                                    <div class="card">
                                        <div class="pro-head">
                                            <h3 class="pro-title without-border mb-0">Profile Basics </h3>
                                        </div>


                                        <!-- //action="./FaceDetection/index.php" -->

                                        <div class="pro-body p-0">
                                            <div class="form-row pro-pad">
                                                <div class="form-group col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" value="<?php echo $row['user_name'] ?>" class="form-control" name="txtusername">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email Address</label>
                                                    <input type="email" value="<?php echo $row['user_email'] ?>" class="form-control" name="txtemail">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" name="txtcontact" value="<?php echo $row2['contact_number'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>User Lanuage</label>
                                                    <!-- <input type="text" class="form-control" name="txtuserlang"> -->
                                                    <select name="txtuserlang" class="form-control select"  >                                                    
                                                        <option value="english">English</option>
                                                        <option value="german">German</option>
                                                        <option value="hindi">Hindi</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Language Proficiency</label>
                                                    <!-- <input type="text" class="form-control" name="txtlangpro"> -->
                                                    <select name="txtlangpro" class="form-control select" aria-valuetext="<?php echo $row2['language_proficiency'] ?>">
                                                        <option value="expert">Expert</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="low">Low</option>
                                                    </select>
                                                </div>
                                                <!--                                            <div class="form-group col-md-6">
                                                                                                <label>Programming Skills</label>
                                                                                                <input type="text" class="form-control" name="txtskill">
                                                                                            </div>-->

                                                <div class="form-group col-md-6">
                                                    <label>Domain name</label>
                                                    <select class="form-control select" name="txtdomainname" aria-valuetext="<?php echo $row2['domain_id'] ?>">
<?php
while ($dmn = mysqli_fetch_array($all_domain, MYSQLI_ASSOC)) :;
    ?>
                                                            <option value="<?php echo $dmn["domain_id"]; ?>">
    <?php echo $dmn["domain_name"]; ?>
                                                            </option>
    <?php
endwhile;
?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Experince Year </label>
                                                    <input type="number" class="form-control" name="txtexyear" value="<?php echo $row2['experience_year'] ?>">
                                                </div>
                                            </div>


                                                        <?php
                                                        // include "./FaceDetection/index.php";
                                                        //include "./FaceDetection/FaceDetector.php"; 
                                                        // error_reporting(0);
                                                        // $msg = "";
                                                        // If upload button is clicked ...
                                                        if (isset($_POST['btnupdate'])) {

                                                            //     $filename = $_FILES["profilephoto"]["name"];
                                                            //     $tempname = $_FILES["profilephoto"]["tmp_name"];
                                                            //     $folder = "./f_chat/php/images/" . $filename;
                                                            // if(isset($_FILES["profilephoto"]["tmp_name"])){
                                                            //     $detector = new svay\FaceDetector('detection.dat');
                                                            //     $detector->faceDetect($_FILES['profilephoto']['tmp_name']);
                                                            //     $detector->toJpeg();
                                                            // }else{
                                                            //     $msg="face not detect";
                                                            // }
                                                            // Get all the submitted data from the form
                                                            //$sql = "INSERT INTO image (filename) VALUES ('$filename')";
                                                            //$sql = "UPDATE dt_user SET user_profile_img = '$filename' where `user_id`='$id' ";
                                                            // Execute query
                                                            //mysqli_query($db_connection, $sql);
                                                            // Now let's move the uploaded image into the folder: image
                                                            // if (move_uploaded_file($tempname, $folder)) {
                                                            //     $msg = "Image uploaded successfully";
                                                            // } else {
                                                            //     $msg = "Failed to upload image";
                                                            // }
                                                        }
                                                        ?>
                                            <div class="form-row pro-pad pt-0">
                                                <div class="form-group col-md-6 pro-pic">
                                                    <label>Profile Picture</label>
                                                    <div class="d-flex align-items-center">
                                                        <div class="upload-images">
                                                            <img src="../files/user_imgs/<?php echo $row['user_profile_img'] ?>" alt="Image" name="img">
                                                            <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                        <label class="file-upload image-upbtn ms-3">
                                                            Change Image <input type="file" name="profilephoto" onchange="getFileName(this)" accept="image/*">
                                                        </label>

                                                    </div>
                                                    <p id="imgname"></p>
                                                    <p>Image Type JPEG/JPG Only</p>
                                                </div>

                                            <?php
                                            // if (isset($_POST["btnupdate"])) {
                                            //     $folder_path = './resumeupload/';
                                            //     $filename = basename($_FILES['fileToUpload']['name']);
                                            //     $newname = $folder_path . $filename;
                                            //     $FileType = pathinfo($newname, PATHINFO_EXTENSION);
                                            //     if ($FileType == "pdf") {
                                            //         if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $newname)) {
                                            //             $filesql = "UPDATE `dt_freelancer` SET resume_file = '$filename'";
                                            //              $fileresult = mysqli_query($db_connection, $filesql);
                                            //             if (isset($fileresult)) {
                                            //                 echo 'File Uploaded';
                                            //             } else {
                                            //                 echo 'Something went Wrong';
                                            //             }
                                            //         } else {
                                            //             echo "<p>Upload Failed.</p>";
                                            //         }
                                            //     } else {
                                            //         echo "<p>Class notes must be uploaded in PDF format.</p>";
                                            //     }
                                            // }
                                            ?>
                                                <!-- <div class="form-group col-md-6">
                                                    <label>Resume File</label>
                                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                                </div> -->
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
                                                <!-- <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" name="txtcity">
                                                </div> -->
                                                <div class="form-group col-md-6">
                                                    <label>Zipcode</label>
                                                    <input type="text" class="form-control" name="txtzipcode" value="<?php echo $row2['zipcode'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Country</label>
                                                    <select class="form-control select" name="txtcontry">
                                                <?php
                                                while ($cntry = mysqli_fetch_array($all_country, MYSQLI_ASSOC)) :;
                                                    ?>
                                                            <option value="<?php echo $cntry["country_id"]; ?>" selected="<?php echo $row['country_id'] ?>">

                                                    <?php echo $cntry["country_name"]; ?>
                                                            </option>
                                                    <?php
                                                endwhile;
                                                ?>

                                                    </select>
                                                </div>
                                                <!-- <div class="form-group col-md-6">
                                                    <label>Timezone</label>
                                                    <input type="text" class="form-control" name="txttimezone">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="pro-head">
                                            <h3 class="pro-title without-border mb-0">Personal Bio</h3>
                                        </div>
                                        <div class="pro-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" rows="5" name="txtpersonalbio"><?php echo $row2['personal_bio'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="pro-head">
                                            <h3 class="pro-title without-border mb-0">Education History</h3>
                                        </div>
                                        <div class="pro-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Institute Name</label>
                                                    <input type="text" class="form-control" name="txtinstitute" value="<?php echo $row2['institute_name'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Education Degree</label>
                                                    <input type="text" class="form-control" name="txtdegree" value="<?php echo $row2['education_degree'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Course Name</label>
                                                    <input type="text" class="form-control" name="txtcoursename" value="<?php echo $row2['course_name'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Course Start Date</label>
                                                    <input type="date" class="form-control" name="startdate" value="<?php echo $row2['course_start_date'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Course End Date</label>
                                                    <input type="date" class="form-control" name="enddate" value="<?php echo $row2['course_end_date'] ?>">
                                                </div>

                                                <div class="pro-head">
                                                    <h3 class="pro-title without-border mb-0">Education description</h3>
                                                </div>
                                                <div class="pro-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" rows="5" name="txtedudesc"><?php echo $row2['education_desc'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="pro-head">
                                            <h3 class="pro-title without-border mb-0">Company Details</h3>
                                        </div>
                                        <div class="pro-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Company Country</label>
                                                    <!-- <input type="text" class="form-control" name="txtinstitute" name="txtcompanycount"> -->
                                                    <select class="form-control select" name="txtcompanycountry">
<?php
while ($cnt = mysqli_fetch_array($company_country, MYSQLI_ASSOC)) :;
    ?>
                                                            <option value="<?php echo $cnt["country_id"]; ?>" selected="<?php echo $row['country_id'] ?>">

    <?php echo $cnt["country_name"]; ?>
                                                            </option>
    <?php
endwhile;
?>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Company Location</label>
                                                    <input type="text" class="form-control" name="txtcompanylocation" value="<?php echo $row2['company_location'] ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Range</label>
                                                    <!-- <input type="number" class="form-control" name="txtinstitute" name="From range"> -->
                                                    <select class="form-control select" name="txtrange" >
<?php
while ($rangefrom = mysqli_fetch_array($all_range, MYSQLI_ASSOC)) :;
    ?>
                                                            <option value="<?php echo $rangefrom["range_id"]; ?>" selected="<?php echo $row['range_id'] ?>">

    <?php
    echo $rangefrom["from_rate"];
    echo "-";
    echo $rangefrom['to_rate'];
    ?>
                                                            </option>
    <?php
endwhile;
?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Final Amount</label>
                                                    <input type="number" class="form-control" name="finalamount" value="<?php echo $row2['final_amount'] ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="text-end">
                                            <div class="pro-body">
                                                <button class="btn btn-secondary click-btn btn-plan" type="submit">Cancel</button>
                                                <button class="btn btn-primary click-btn btn-plan" type="submit" name="btnupdate">Update</button>
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
        <script>
            function getFileName(input) {
                document.getElementById('imgname').innerHTML = 'Selected image : ' + input.files[0].name;
                console.log(input.files[0].name) // With extension
                console.log(input.files[0].name.replace(/\.[^/.]+$/, '')) // Without extension
            }
        </script>
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

