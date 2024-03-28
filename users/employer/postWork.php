<!DOCTYPE html>

<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/post-project.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:54 GMT -->
    <head>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>WorkFlow</title>

        <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../../assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

        <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="../../assets/plugins/summernote/dist/summernote-lite.css">

        <link rel="stylesheet" href="../../assets/css/style.css">

        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

        <?php
        include_once '../db_connection.php';

        //Check the login session active or not
        if (!isset($_SESSION['login_E'])) {
            //Redirect to login page
            header('Location: ../login.php');
        }

        $userid = $_SESSION['login_E'];
        ?>


    </head>
    <body>




        <div class="main-wrapper">

            <div class="breadcrumb-bar">
                <div class="container">
                    <div class="row align-items-center inner-banner">
                        <div class="col-md-12 col-12 text-center">
                            <h2 class="breadcrumb-title">Post a Work</h2>
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Post a Project</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="select-project mb-4">

                                <form method="POST" enctype="multipart/form-data" action="php/add_workpost.php">
                                    <div class="title-box widget-box">

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>👉 This helps your job post stand out to the right candidates. It’s the first thing they’ll see, so make it count!</h3>

                                            </div>
                                        </div>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>Let's start with a strong title.</h3>
                                                <div class="form-group mb-0">
                                                    <input type="text" name="title" class="form-control" placeholder="Write a title for your job post" required="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>Work Category</h3>
                                                <div class="form-group mb-0">
                                                    <select name="category" class="form-control select" required="">
                                                        <option value="0">Select</option>

                                                        <?php
                                                        $qry_domains = mysqli_query($db_connection, "SELECT * FROM dt_domain_master");

                                                        while ($row = mysqli_fetch_assoc($qry_domains)) {
                                                            echo "<option value='$row[domain_id]'>$row[domain_name]</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>What skills does your work require? </h3>
                                                <div class="form-group mb-0">
                                                    <input type="text" data-role="tagsinput" class="input-tags form-control" name="skills" id="services" placeholder="UX, UI, App Design" required="">
                                                    <p class="text-muted mb-0">Enter skills for needed for project</p>
                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>👉 Next, estimate the scope of your work.</h3>
                                            </div>
                                        </div>


                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3></h3>
                                                <div class="form-group mb-0" id="pro_period">
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="Large" name="size">
                                                            <span class="checkmark"></span>Large <br> Longer term or complex initiatives (ex. design and build a full website)
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="Medium" name="size" checked>
                                                            <span class="checkmark"></span> Medium <br> Well-defined projects (ex. a landing page)
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="Small" name="size" >
                                                            <span class="checkmark"></span> Small <br> Quick and straightforward tasks (ex. update text and images on a webpage)
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>How long will your work take?</h3>
                                                <div class="form-group mb-0" id="pro_period">
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="More than 6 months" name="duration">
                                                            <span class="checkmark"></span> More than 6 months
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="3 to 6 months" name="duration">
                                                            <span class="checkmark"></span> 3 to 6 months
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="1 to 3 months" name="duration" >
                                                            <span class="checkmark"></span> 1 to 3 months
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>What level of experience will it need? <p class="text-muted mb-0">This won't restrict any proposals, but helps match expertise to your budget.</p></h3>

                                                <div class="form-group mb-0" id="pro_period">
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="0" name="level">
                                                            <span class="checkmark"></span> Entry <br> Looking for someone relatively new to this field
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="1" name="level">
                                                            <span class="checkmark"></span> Intermediate <br> Looking for substantial experience in this field
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="custom_radio">
                                                            <input type="radio" value="2" name="level" >
                                                            <span class="checkmark"></span> Expert <br> Looking for comprehensive and deep expertise in this field
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <br>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>👉 Tell us about your budget.</h3>
                                            </div>
                                        </div>



                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>Pricing Type</h3>
                                                <div class="form-group price-cont mb-0" id="price_type">
                                                    <select name="price" class="form-control select" required="">
                                                        <option value="0">Select</option>
                                                        <option value="1">Fixed Budget Price</option>
                                                        <option value="2">Hourly Pricing</option>
                                                    </select>
                                                </div>


                                                <div class="form-group mt-3" id="price_id" style="display: none;">
                                                    <label>Maximum project budget (USD)</label> <br>
                                                    <div class="input-group">

                                                        <input type="number" name="budget" class="form-control" placeholder="0">
                                                        <button type="button" class="btn btn-white" >$</button>
                                                    </div>
                                                </div>


                                                <div class="form-group mt-3" id="hour_id" style="display: none;">
                                                    <div class="row">


                                                        <!--<h3>Select Your Price</h3>-->
                                                        <div class="form-group mb-0">
                                                            <select name="range" class="form-control select">
                                                                <option value="0">Select Your Price</option>

                                                                <?php
                                                                $qry_range = mysqli_query($db_connection, "SELECT * FROM dt_price_range");

                                                                while ($row_range = mysqli_fetch_assoc($qry_range)) {
                                                                    echo "<option value='$row_range[range_id]'>$row_range[from_rate]$ - $row_range[to_rate]$</option>";
                                                                }
                                                                ?>

                                                                <!--<option value='$row[domain_id]'>$row[domain_name]</option>-->

                                                            </select>
                                                        </div>


                                                        <!--                                                        <label>From </label>
                                                        
                                                                                                                <div class="col-md-6 mb-2">
                                                                                                                    <div class="input-group form-inline">
                                                        
                                                                                                                        <input type="number" name="from_rate" class="form-control mr-2" placeholder="12.00"> 
                                                                                                                        <button type="button" class="btn btn-white" >$/hour</button>
                                                        
                                                                                                                    </div>
                                                                                                                </div>
                                                        
                                                        
                                                                                                                <br><label>To </label>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="input-group form-inline">
                                                                                                                        <input type="number" name="to_rate" class="form-control ml-2" placeholder="25.00">
                                                                                                                        <button type="button" class="btn btn-white" >$/hour</button>
                                                                                                                    </div>
                                                                                                                </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>👉 Describe your work.</h3>
                                                <p class="text-muted mb-0">This is how talent figures out what you need and why you’re great to work with!</p>
                                                <p class="text-muted mb-0">Include your expectations about the task or deliverable, what you’re looking for in a work relationship, and anything unique about your project, team, or company. <a href="https://www.upwork.com/resources/writing-awesome-job-post/"><u>Here are several examples</u></a> that illustrate best practices for effective job posts.</p>
                                            </div>
                                        </div>

                                        <div class="title-content pb-0">
                                            <div class="title-detail">
                                                <div class="form-group mb-0">
                                                    <textarea class="form-control" name="desc" id="workdesc" maxlength="50000" rows="5" required=""></textarea>
                                                    <p id="message"></p>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace('workdesc');
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <br>


                                        <!--//file-->
                                        <div class="title-content">
                                            <div class="title-detail">
                                                <h3>Add Documents</h3>
                                                <div class="custom-file">
                                                    <input type="file" id="file" name="file" onchange="Filevalidation()" class="custom-file-input" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required="">
                                                    <p id="filename"></p>
                                                    <label class="custom-file-label"></label>
                                                </div>
                                                <p class="mb-0">Max file size: 100 MB</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-end">
                                                <div class="btn-item">
                                                    <input type="hidden" value="<?php echo $userid; ?>" name="userid">

                                                    <button type="submit" name="post-work"  class="btn next-btn">Submit</button>
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


           <?php include_once './include/footer.php';?>

        </div>


        <script src="../../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../../assets/plugins/select2/js/select2.min.js"></script>

        <script src="../../assets/js/profile-settings.js"></script>

        <script src="../../assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

        <script src="../../assets/js/moment.min.js"></script>
        <script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>

        <script src="../../assets/plugins/summernote/dist/summernote-lite.min.js"></script>

        <script src="../../assets/js/script.js"></script>

        <script>
                                                        $('input[type="file"]').change(function (e) {
                                                            var fileName = e.target.files[0].name;
                                                            $('#filename').html(fileName)
                                                            // Inside find search element where the name should display (by Id Or Class)
                                                        });
        </script>



        <!-- Mirrored from kofejob.dreamguystech.com/template/post-project.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:59 GMT -->

    </body>
    <script>
        Filevalidation = () => {
            const fi = document.getElementById('file');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {

                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 102400) {
                        alert(
                                "File too Big, please select a file less than 100mb");
//                        } else if (file < 2048) {
//                            alert(
//                              "File too small, please select a file greater than 2mb");
//                        } else {
//                            document.getElementById('size').innerHTML = '<b>'
//                            + file + '</b> KB';
                    }
                }
            }
        }
    </script>
</html>
