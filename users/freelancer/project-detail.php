<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from kofejob.dreamguystech.com/template/project-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:14 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <title>WorkFlow</title>
        <?php
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
        ?>
        <?php include_once './include/resource.php' ?>
    </head>
    <body>
        <div class="main-wrapper">
            <?php
            include_once './include/header.php';
            $get_work_detail = mysqli_query($db_connection, "SELECT * FROM dt_workpost , dt_domain_master where dt_workpost.domain_id = dt_domain_master.domain_id AND work_id = $_GET[i];");
            $row = mysqli_fetch_array($get_work_detail);
            $get_user_profile_employer = mysqli_query($db_connection, "SELECT * FROM dt_employer, dt_user, dt_country_master where dt_user.user_id = $row[user_id] and dt_employer.user_id = $row[user_id]");
            $row_profile_employer = mysqli_fetch_array($get_user_profile_employer);

            $get_count_posted = mysqli_query($db_connection, "SELECT COUNT(*) as posted FROM dt_workpost where user_id = $row[user_id];");
            $row_count_posted = mysqli_fetch_array($get_count_posted);

            $get_count_open = mysqli_query($db_connection, "SELECT COUNT(*) as open FROM dt_workpost where user_id = $row[user_id] and work_status = 'P';            ");
            $row_count_open = mysqli_fetch_array($get_count_open);

            $get_count_hire = mysqli_query($db_connection, "SELECT COUNT(*) as hire FROM dt_workpost where user_id = $row[user_id] and work_status = 'C' or 'W';            ");
            $row_count_hire = mysqli_fetch_array($get_count_hire);

            $get_count_working = mysqli_query($db_connection, "SELECT COUNT(*) as working FROM dt_workpost where user_id = $row[user_id] and work_status = 'W';");
            $row_count_working = mysqli_fetch_array($get_count_working);

            $get_count_proposal = mysqli_query($db_connection, "SELECT COUNT(*) as proposals FROM dt_workpost_proposals WHERE dt_workpost_proposals.work_id =$row[work_id];");
            $row_count_proposal = mysqli_fetch_array($get_count_proposal);
            
            
            include_once '../timediff.php';
            ?>
            <div class="breadcrumb-bar"></div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile">
                                <div class="profile-box">
                                    <div class="provider-widget row">
                                        <div class="pro-info-left col-md-8">
                                            <div class="profile-info">
                                                <h2 class="profile-title"><?php echo $row['work_title'] ?></h2>
                                                <p class="profile-position"><?php echo $row['domain_name'] ?></p>
                                                <div></div>
                                                <ul class="profile-preword align-items-center">
                                                    <li><i class="fas fa-clock"></i> Posted at <?php time_Ago($row['added_dt']) ?> </li>
                                                    <!--<li><a href="#" class="btn full-btn">Full time</a></li>-->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pro-info-right profile-inf col-md-4">
                                            <ul class="profile-right">
                                                <li>
                                                    <div class="amt-hr">
                                                        <?php
                                                        if ($row['range_id'] != null) {
                                                            ?>
                                                            <h4 class="title-info">Hourly Rate</h4>
                                                            <h2 class="client-price">
                                                                <?php
                                                                $get_user_price_range = mysqli_query($db_connection, "select * from dt_price_range where range_id = $row[range_id] ");
                                                                $row_get_user_price_range = mysqli_fetch_array($get_user_price_range);

                                                                echo $row_get_user_price_range['from_rate'] . " - " . $row_get_user_price_range['to_rate'] . " $";
                                                                ?> 
                                                            </h2>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <h4 class="title-info">Client budget</h4>
                                                            <h2 class="client-price">
                                                                <?php echo $row['fix_budget'] . " $"; ?>
                                                            </h2>
                                                            <span class="price-type">( FIXED )</span>
                                                            <?php
                                                        }
                                                        ?>
                      <!-- <p>( FIXED )</p> -->
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center justify-content-md-end justify-content-center">
                                                <a href="javascript:void(0)"></a>
                                                <?php
                                                $get_count_proposal = mysqli_query($db_connection, "select count(*) as countProposal  from dt_workpost_proposals where  work_id = $_GET[i] and user_id = '$_SESSION[login_F]' ");
                                                $row_count_proposal = mysqli_fetch_array($get_count_proposal);
                                                if ($row_count_proposal['countProposal'] == 0) {
                                                    ?> 
                                                    <a data-bs-toggle="modal" href="#file" class="btn bid-btn">Send Proposal <i class="fas fa-long-arrow-alt-right"></i></a>  
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a data-bs-toggle="modal" href="" class="btn bid-btn">Sent</a>  
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="pro-view">
                                <!-- <div class="post-widget">
                                   <div class="pro-content">
                                      <div class="row">
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="pro-post job-type">
                                               <p>Job Expiry </p>
                                               <h6>4 Days Left</h6>
                                            </div>
                                         </div>
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="pro-post job-type">
                                               <p>Location</p>
                                               <h6><img src="../../assets/img/flags/in.png" height="16" alt=""> <?php // echo $row_profile_employer['country_name']        ?></h6>
                                            </div>
                                         </div>
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="pro-post job-type">
                                               <p>Proposals</p>
                                               <h6>15 Received</h6>
                                            </div>
                                         </div>
                                         <div class="col-12 col-sm-6 col-md-3">
                                            <div class="pro-post job-type">
                                               <p>Price type</p>
                                               <h6>Fixed</h6>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div> -->
                                <div class="pro-post widget-box exp-widget pb-0">
                                    <div class="pro-content pt-0">
                                        <div class="row">
                                            <!-- <div class="col-md-4">
                                               <div class="exp-detail">
                                               <img class="img-fluid" alt="" src="../../assets/img/icon/exp-icon-01.png">
                                               <div class="exp-info">
                                               <p>Developer Type</p>
                                               <h5>Individual</h5>
                                               </div>
                                               </div>
                                               </div> -->
                                            <div class="col-md-4">
                                                <div class="exp-detail">
                                                    <img class="img-fluid" alt="" src="../../assets/img/icon/exp-icon-03.png">
                                                    <div class="exp-info">
                                                        <p>Level </p>


                                                        <?php
                                                        if ($row['experience_level'] == 0) {
                                                            ?>
                                                            <h5>Entry Level</h5>
                                                            <p>I am looking for freelancers with the lowest rates</p>
                                                            <?php
                                                        } else if ($row['experience_level'] == 1) {
                                                            ?>

                                                            <h5>Intermediate</h5>
                                                            <p>I am looking for a mix of experience and value</p>
                                                            <?php
                                                        } else if ($row['experience_level'] == 2) {
                                                            ?> 

                                                            <h5>Expert</h5>
                                                            <p>I am willing to pay higher rates for the most experienced freelancers</p>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="exp-detail">
                                                    <img class="img-fluid" alt="" src="../../assets/img/icon/exp-icon-02.png">
                                                    <div class="exp-info">
                                                        <p>Project Duration</p>
                                                        <h5><?php echo $row['work_duration'] ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="col-md-4">
                                               <div class="exp-detail">
                                               <img class="img-fluid" alt="" src="../../assets/img/icon/exp-icon-04.png">
                                               <div class="exp-info">
                                               <p>Job Type</p>
                                               <h5>Remote Job</h5>
                                               </div>
                                               </div>
                                               </div> -->

                                            <div class="col-md-4">
                                                <div class="exp-detail">
                                                    <img class="img-fluid" alt="" src="../../assets/img/icon/exp-icon-05.png">
                                                    <div class="exp-info">
                                                        <p>Location</p>
                                                        <h6><img src="../../assets/img/flags/in.png" height="16" alt=""> <?php echo $row_profile_employer['country_name'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                               <div class="exp-detail">
                                               <img class="img-fluid" alt="" src="../../assets/img/icon/exp-icon-06.png">
                                               <div class="exp-info">
                                               <p>Qualifications</p>
                                               <h5>Under Garduate</h5>
                                               </div>
                                               </div>
                                               </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-post widget-box">
                                    <h3 class="pro-title">Details</h3>
                                    <div class="pro-content">
                                        <p><?php echo $row['work_desc'] ?></p>
                                    </div>
                                </div>
                                <div class="pro-post project-widget widget-box">
                                    <h3 class="pro-title">Activity of the Job</h3>
                                    <div class="pro-content">
                                        <div class="mb-0">
                                            <ul class="activity-list clearfix">
                                                <li>Proposals: 
                                                    <span>


<?php
if ($row_count_proposal[0] >= 0 && $row_count_proposal[0] <= 5) {
    echo 'Less than 5';
} elseif ($row_count_proposal[0] >= 6 && $row_count_proposal[0] <= 20) {
    echo 'Less than 20';
} elseif ($row_count_proposal[0] >= 21 && $row_count_proposal[0] <= 50) {
    echo 'Less than 50';
} elseif ($row_count_proposal[0] >= 51) {
    echo 'More than 50';
}
?>



                                                        <i class="fas fa-question-circle" data-bs-toggle="tooltip" title="Range of Recived Proposals"></i></span></li>
                                                   <!-- <li>Last viewed by client: <span>3 hours ago <i class="fas fa-question-circle" data-bs-toggle="tooltip" title="Lorem Ipsum"></i></span></li> -->
   <!--                                                <li>Interviewing: <span>1</span></li>
                                                   <li>Invites sent: <span>6</span></li>
                                                   <li>Unanswered invites: <span>2</span></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-post project-widget widget-box">
                                    <h3 class="pro-title">Skills Required</h3>
                                    <div class="pro-content">
                                        <div class="tags">
                                            <!-- select * from dt_skill_master where skill_id IN (SELECT skill_id FROM `dt_workpost_skill` where work_id = 1) -->
<?php
$get_skill = mysqli_query($db_connection, "select * from dt_skill_master where skill_id IN (SELECT skill_id FROM `dt_workpost_skill` where work_id = $_GET[i])");

while ($row_skill = mysqli_fetch_array($get_skill)) {
    ?>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design"><?php echo $row_skill['skill_name'] ?></span></a>
                                                <?php
                                            }
                                            ?>
                                            <!-- 
                                               <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                               <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Whiteboard</span></a>
                                               <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                               <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Whiteboard</span></a> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="pro-post widget-box">
                                   <h3 class="pro-title">Project Proposals</h3>
                                   <div class="average-bids mt-4">
                                      <p><span class="text-highlight">18 freelancers</span> are bidding on average <span class="text-highlight">$17.00</span> for this job</p>
                                   </div>
                                   <div class="proposal-cards">
                                      <div class="bids-card">
                                         <div class="row align-items-center">
                                            <div class="col-lg-2">
                                               <div class="author-img-wrap">
                                                  <a href="#"><img class="img-fluid" alt="" src="../../assets/img/img-01.png"></a>
                                               </div>
                                            </div>
                                            <div class="col-lg-8">
                                               <div class="author-detail">
                                                  <h4><a href="#">George Wells</a> <img src="../../assets/img/flags/us.png" height="16" alt="Lang"></h4>
                                                  <div class="rating">
                                                     <span class="average-rating">4.3</span>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star"></i>
                                                  </div>
                                                  <p class="mb-0">Look forward to hearing from you, I am a good designer and developer. I can handle your daily bases task with no extra effort. Please contact me as I am jobless nowadays.</p>
                                               </div>
                                            </div>
                                            <div class="col-lg-2">
                                               <div class="proposal-amnt text-end">
                                                  <h3>$17.00</h3>
                                                  <p class="mb-0">in 7 days</p>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="bids-card">
                                         <div class="row align-items-center">
                                            <div class="col-lg-2">
                                               <div class="author-img-wrap">
                                                  <a href="#"><img class="img-fluid" alt="" src="../../assets/img/img-02.jpg"></a>
                                               </div>
                                            </div>
                                            <div class="col-lg-8">
                                               <div class="author-detail">
                                                  <h4><a href="#">Tony Ingle</a> <img src="../../assets/img/flags/es.png" height="16" alt="Lang"></h4>
                                                  <div class="rating">
                                                     <span class="average-rating">4.6</span>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star"></i>
                                                  </div>
                                                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                                               </div>
                                            </div>
                                            <div class="col-lg-2">
                                               <div class="proposal-amnt text-end">
                                                  <h3>$22.00</h3>
                                                  <p class="mb-0">in 13 days</p>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="bids-card">
                                         <div class="row align-items-center">
                                            <div class="col-lg-2">
                                               <div class="author-img-wrap">
                                                  <a href="#"><img class="img-fluid" alt="" src="../../assets/img/img-03.jpg"></a>
                                               </div>
                                            </div>
                                            <div class="col-lg-8">
                                               <div class="author-detail">
                                                  <h4><a href="#">James Douglas</a> <img src="../../assets/img/flags/de.png" height="16" alt="Lang"></h4>
                                                  <div class="rating">
                                                     <span class="average-rating">3.8</span>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star filled"></i>
                                                     <i class="fas fa-star"></i>
                                                     <i class="fas fa-star"></i>
                                                  </div>
                                                  <p class="mb-0">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock</p>
                                               </div>
                                            </div>
                                            <div class="col-lg-2">
                                               <div class="proposal-amnt text-end">
                                                  <h3>$19.00</h3>
                                                  <p class="mb-0">in 18 days</p>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="proposal-btns mt-3">
                                      <a href="view-proposals.html" class="pro-btn">View all 18 Propsals</a>
                                   </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">
                            <div class="freelance-widget widget-author mt-2 pro-post">
                                <div class="freelance-content">
                                   <!-- <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a> -->
                                    <div class="author-heading">
                                        <!--<div class="profile-img">-->
                                        <a href="#">
                                            <img src="../files/user_imgs/<?php echo $row_profile_employer['user_profile_img'] ?>" style="width:150px; height:100px;" alt="author">
                                        </a>
                                        <!--</div>-->
                                        <div class="profile-name">
                                            <div class="author-location"><?php echo $row_profile_employer['company_name'] ?> <i class="fas fa-check-circle text-success verified"></i></div>
                                        </div>
                                        <div class="freelance-info">
                                            <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i><?php echo $row_profile_employer['country_name'] ?></div>
                                            <!--                                            <div class="rating">
                                                                                            <i class="fas fa-star filled"></i>
                                                                                            <i class="fas fa-star filled"></i>
                                                                                            <i class="fas fa-star filled"></i>
                                                                                            <i class="fas fa-star filled"></i>
                                                                                            <i class="fas fa-star"></i>
                                                                                            <span class="average-rating">4.7 (32)</span>
                                                                                        </div>-->
                                        </div>
                                        <!-- <button type="button" class="btn btn-lg btn-primary rounded-pill"><i class="fab fa-whatsapp me-2"></i>Follow</button> -->
                                        <div class="follow-details">
                                            <div class="row">
                                                <div class="col-6 py-4 text-center">
                                                    <!-- 
                                                       <h6 class="text-uppercase text-muted">
                                                       Following
                                                       </h6>
                                                       
                                                       <h4 class="mb-0">49</h4>
                                                       </div>
                                                       <div class="col-6 py-4 text-center border-start">
                                                       
                                                       <h6 class="text-uppercase text-muted">
                                                       Followers
                                                       </h6> -->
                                                    <!-- <h4 class="mb-0">422</h4> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <!-- <div class="row align-items-center">
                                               <div class="col">
                                                  <h6 class="text-sm text-start mb-0">
                                                     Member Since
                                                  </h6>
                                               </div>
                                               <div class="col-auto">
                                                  <span class="text-sm">-</span>
                                               </div>
                                            </div>
                                            <hr class="my-3">
                                            <div class="row align-items-center">
                                               <div class="col">
                                                  <h6 class="text-sm text-start mb-0">
                                                     Total Jobs
                                                  </h6>
                                               </div>
                                               <div class="col-auto">
                                                  <span class="text-sm">-</span>
                                               </div>
                                            </div> -->
                                            <!-- <hr class="my-3">
                                               <div class="row align-items-center">
                                               <div class="col">
                                               <h6 class="text-sm text-start mb-0">
                                               <i class="fab fa-instagram me-2"></i>Instagram
                                               </h6>
                                               </div>
                                               <div class="col-auto">
                                               <span class="text-sm">@johnthedon</span>
                                               </div>
                                               </div>
                                               <hr class="my-3"> -->
                                            <!-- <div class="row align-items-center">
                                               <div class="col">
                                               <h6 class="text-sm text-start mb-0">
                                               <i class="fab fa-linkedin me-2"></i>LinkedIn
                                               </h6>
                                               </div>
                                               <div class="col-auto">
                                               <span class="text-sm">johnsullivan</span>
                                               </div>
                                               </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-post widget-box post-widget">
                                <h3 class="pro-title">Profile Link</h3>
                                <div class="pro-content pt-0">
                                    <div class="form-group profile-group mb-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-success sub-btn" type="submit"><i class="fa fa-clone"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-post widget-box post-widget pb-0">
                                <h3 class="pro-title">Attachments</h3>
                                <div class="pro-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="pro-post client-list">
                                                <p>Projects Posted</p>
                                                <h6 class="bg-red"><?php echo $row_count_posted['posted'] ?></h6>
                                            </div>
                                        </div>
                                        <!-- <div class="col-6">
                                           <div class="pro-post client-list">
                                              <p>Hire rate</p>
                                              <h6 class="bg-blue">22</h6>
                                           </div>
                                        </div> -->
                                        <div class="col-6">
                                            <div class="pro-post client-list">
                                                <p>Open Projects</p>
                                                <h6 class="bg-violet"><?php echo $row_count_open['open'] ?></h6>
                                            </div>
                                        </div>
                                        <!-- <div class="col-6">
                                           <div class="pro-post client-list">
                                              <p>Total spent</p>
                                              <h6 class="bg-yellow">22</h6>
                                           </div>
                                        </div> -->
                                        <div class="col-6">
                                            <div class="pro-post client-list">
                                                <p>Hires</p>
                                                <h6 class="bg-pink"><?php echo $row_count_hire['hire'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pro-post client-list">
                                                <p>In Working Mode</p>
                                                <h6 class="bg-green"><?php echo $row_count_working['working'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="pro-post widget-box post-widget">
                               <h3 class="pro-title">Share</h3>
                               <div class="pro-content">
                                  <a href="#" class="share-icon"><i class="fas fa-share-alt"></i> Share</a>
                               </div>
                            </div> -->
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
                                            <a href="#"><img class="img-fluid" src="../../assets/img/app-store.svg" alt="app-store"></a>
                                        </div>
                                        <div class="col">
                                            <a href="#"><img class="img-fluid" src="../../assets/img/google-play.svg" alt="google-play"></a>
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


<?php
$check_user_data = mysqli_query($db_connection, "SELECT * from dt_freelancer WHERE user_id = $id;");

if (mysqli_num_rows($check_user_data) > 0) {
    ?>

            <div class="modal fade" id="file">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">SEND PROPOSALS</h4>
                            <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                        </div>
                        <form action="#" method="post">
                            <div class="modal-body">
                                <div class="modal-info">
                                    <div class="feedback-form">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
    <?php
    if ($row['range_id'] != null) {
        echo "<input type='number' name='rate' class='form-control' placeholder='Your Price ( hourly rate )'>";
    } else {
        echo "<input type='number' name='rate' class='form-control' placeholder='Your Price ( Fix rate )'>";
    }
    ?>
                                            </div>
                                            <!-- <div class="col-md-6 form-group">
                                               <input type="email" class="form-control" placeholder="Estimated Hours">
                                            </div> -->
                                            <div class="col-md-12 form-group">
                                                <textarea rows="5" name="letter" class="form-control" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
    <?php
    $count = 0;
    $que_id = "";
    $get_work_que = mysqli_query($db_connection, "SELECT * FROM `dt_workpost_question` where work_id = $_GET[i];");
    while ($row_work_que = mysqli_fetch_array($get_work_que)) {

        $que_id .= ":";
        $que_id .= $row_work_que['question_id'];
        $count = $count + 1;
        ?>
                                        <div class="proposal-features">
                                            <div class="proposal-widget proposal-success">
                                                <label class="custom_check">
                                                    <span class="proposal-text"><?php echo $row_work_que['question'] ?></span>
                                                    <input type="hidden" name="count" value="<?php echo $count ?>" class="form-control">
                                                    <input type="hidden" name="question" value="<?php echo $que_id ?>" class="form-control">
                                                    <span class="proposal-text float-end">Question <?php echo $count ?></span>
                                                </label>
        <?php
        echo "<textarea rows='5' name=\"field$count\" class='form-control' placeholder='Give you answer here..'></textarea>"
        ?>
                                                   <!-- <textarea rows="5" name="ANS" class="form-control" placeholder="Give you answer here.."></textarea> -->
                                            </div>
                                                <?php
                                                //break;
                                            }
                                            ?>   
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-12 submit-section">
                                           <label class="custom_check">
                                           <input type="checkbox" name="select_time">
                                           <span class="checkmark"></span> I agree to the Terms And Conditions
                                           </label>
                                        </div> -->
                                        <div class="col-md-12 submit-section text-end">
                                            <button name="btnProposal" class="btn btn-primary submit-btn" type="submit">SUBMIT PROPOSAL</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
    <?php
    if (isset($_POST['btnProposal'])) {

        $myArray = explode(':', $_POST['question']);
        $c = 1;
        foreach ($myArray as $arr) {
            if ($arr != null) {
                $ans = $_POST["field" . $c];
                $insert_ans = mysqli_query($db_connection, "INSERT INTO `dt_workpost_answer`(`question_id`, `user_id`, `answer_desc`) VALUES ('$arr','$_SESSION[login_F]','$ans');");
                $c++;
            }
        }


        $date = date('Y-m-d H:i:s');
        if ($row['range_id'] != null) {
            $get_work_detail = mysqli_query($db_connection, "INSERT INTO `dt_workpost_proposals`( `work_id`, `user_id`, `hourly_rate`, `cover_letter`, `datetime`, `status`) VALUES ('$_GET[i]','$_SESSION[login_F]','$_POST[rate]','$_POST[letter]','$date','P')");

            if ($get_work_detail) {
                ?>
                                    <script>location.replace("freelancer-project-projects.php")</script>
                                    <?php
                                }
                            } else {
                                $get_work_detail = mysqli_query($db_connection, "INSERT INTO `dt_workpost_proposals`( `work_id`, `user_id`, `fix_price`, `cover_letter`, `datetime`, `status`) VALUES ('$_GET[i]','$_SESSION[login_F]','$_POST[rate]','$_POST[letter]','$date','P')");

                                if ($get_work_detail) {
                                    ?>
                                    <script>location.replace("freelancer-project-projects.php")</script>
                                    <?php
                                }
                            }
                        }
                        //                           
                        ?>
                    </div>
                </div>
            </div>

    <?php
} else {
    ?>

            <div class="modal fade" id="file">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sorry .... It's seems that you still did not complete your profile Please complete it to send proposals 😥</h4>
                            <span class="modal-close"><a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                        </div>                       

                    </div>
                </div>
            </div>

    <?php
    // do something
}
?>








        <script src="../../assets/js/jquery-3.6.0.min.js"></script>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
        <script src="../../assets/plugins/select2/js/select2.min.js"></script>
        <script src="../../assets/js/script.js"></script>
    </body>
    <!-- Mirrored from kofejob.dreamguystech.com/template/project-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 06:48:21 GMT -->
</html>
