<!DOCTYPE html>
<html lang="en">

    <head>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <?php
        require '../db_connection.php';

        include '../../disilab-api/api.php';

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



        $month = [];
        $count = [];

        $get_count_status = mysqli_query($db_connection, "SELECT MONTHNAME(datetime) MONTH, COUNT(*) COUNT FROM dt_workpost_proposals WHERE YEAR(datetime) = '2022' and user_id = $id GROUP BY MONTH(datetime);");
        while ($row_count_status = mysqli_fetch_array($get_count_status)) {
            $month[] = $row_count_status['MONTH'];
            $count[] = $row_count_status['COUNT'];
        }
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <title>WorkFlow</title>

        <?php include_once './include/resource.php' ?>

    </head>

    <body class="dashboard-page">

        <div class="main-wrapper">

            <?php include_once './include/header.php' ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php include_once './include/navigation.php' ?>
                        <div class="col-xl-9 col-md-8">
                            <div class="dashboard-sec">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-table">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="card-title">Your Proposals</h4>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!--                                                    <a
                                                                                                                href="manage-projects.html"
                                                                                                                class="btn-right btn btn-sm fund-btn"
                                                                                                                >
                                                                                                                See all postings
                                                                                                            </a>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive table-job">
                                                    <table class="table table-hover table-center mb-0">

                                                        <tbody>

                                                            <?php
                                                            include_once '../timediff.php';
                                                            $qry_proposals = mysqli_query($db_connection, "SELECT dt_workpost_proposals.* , dt_workpost.work_title , dt_workpost.added_dt FROM dt_workpost , dt_workpost_proposals WHERE dt_workpost_proposals.work_id = dt_workpost.work_id AND dt_workpost_proposals.user_id = $id ORDER BY dt_workpost_proposals.status ASC;");

                                                            if (mysqli_num_rows($qry_proposals) >= 1) {

                                                                while ($row_prop = mysqli_fetch_assoc($qry_proposals)) {
                                                                    ?>

                                                                    <tr>
                                                                        <td>
                                                                            <span class="detail-text"><b><?php echo $row_prop['work_title'] ?></b></span
                                                                            >
                                                                            <br>
                                                                            <br>
                                                                            Initiated date : <?php time_Ago($row_prop['datetime']) ?>
                                                                            <br>
                                                                            Work uploaded on <?php time_Ago($row_prop['added_dt']) ?>
                                                                            <br>


                                                                        </td>
                                                                        <td>Your Proposed terms :   
                                                                            <br>

                                                                            <?php
                                                                            if ($row_prop['hourly_rate'] != null) {
                                                                                echo $row_prop['hourly_rate'];
                                                                            } elseif ($row_prop['fix_price'] != null) {
                                                                                echo $row_prop['fix_price'];
                                                                            }
                                                                            ?>.00$
                                                                        </td>
                                                                        <td>

                                                                            <span class="table-budget">Status</span>
                                                                            <span class="d-block text-danger">
                                                                                <?php
                                                                                if ($row_prop['status'] == "H") {
                                                                                    echo "Hired ✔️";
                                                                                } elseif ($row_prop['status'] == "P") {
                                                                                    echo "Panding ⏳";
                                                                                } elseif ($row_prop['status'] == "R") {
                                                                                    echo "Rejected ❌";
                                                                                }
                                                                                ?>
                                                                            </span>

                                                                        </td>

                                                                        <td class="text-end">
                                                                            <a
                                                                                data-bs-toggle="modal" 
                                                                                href="#file2"
                                                                                class="text-success"
                                                                                data-id="<?php echo $row_prop['cover_letter']; ?>"
                                                                                >View</a
                                                                            >
                                                                            <br>

                                                                        </td>
                                                                    </tr>




                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        Sorry , You still not made any proposals on any work 😥
                                                                    </td>
                                                                  
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>








                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>









                           <script type="text/javascript">
                                $(document).on("click", ".text-success", function () {
                                    var description = $(this).data('id');
                                    $("#desc").html(description);
//                                    document.getElementById("desc").value = description;
                                    <?php // $_SESSION['desc'] = " <script>document.write(description);</script>"; ?>
//                                    $("#desc").val(description);                                    
                                });
                            </script>

                            


                            <div class="modal fade" id="file2">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cover Letter</h4>
                                            <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                                        </div>
                                        <form>
                                            <div class="modal-body">
                                                <div class="modal-info">                                

                                                    <div class="row">
                                                        <div class="col-md-12 submit-section">
                                                            
                                                            <p id="desc">  </p>
                                                            
                                                            
                                                            
                                                            
<!--                                                            <label class="custom_check">
                                                                <input type="checkbox" name="select_time">
                                                                <span class="checkmark"></span> I agree to the Terms And Conditions  heloooooooooooo
                                                            </label>-->
                                                        </div> 
<!--                                                        <div class="col-md-12 submit-section text-end">
                                                            <button name="btn" class="btn btn-primary submit-btn" type="submit">Connect</button>
                                                        </div>-->
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>



                            <script src="../../assets/js/jquery-3.6.0.min.js"></script>

                            <script src="../../assets/js/bootstrap.bundle.min.js"></script>


<!--<script src="../../assets/plugins/apexchart/chart-data.js"></script>-->

                            <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
                            <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

                            <script src="../../assets/js/script.js"></script>
                            </body>
                            </html>

