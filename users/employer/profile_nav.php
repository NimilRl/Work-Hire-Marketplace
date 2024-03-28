 <div class="settings-widget">
                                    <div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                                        <a href="user-account-details.html"><img  onerror="this.onerror=null; this.src='../../assets/img/usericon1white.png'" alt="no img" src="../files/user_imgs/<?php echo $user['user_profile_img']; ?> " class="avatar-lg rounded-circle"></a>


                                        <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                            <p class="mb-2">Welcome,</p>
                                            <a href="dashboard.php">
                                                <h3 class="mb-0"><?php echo $user['user_name']; ?></h3>
                                            </a>
                                            <!--<p class="mb-0">@johndaniee</p>-->
                                        </div>
                                    </div>
                                    <div class="settings-menu">
                                        <ul>
                                            <li class="nav-item">
                                                <a href="dashboard.php" class="nav-link">
                                                    <i class="material-icons">verified_user</i> Dashboard
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="manage-workposts.php" class="nav-link">
                                                    <i class="material-icons">business_center</i> WorkPosts
                                                </a>
                                            </li>
                                            <!--                <li class="nav-item">
                                                                <a href="favourites.html" class="nav-link">
                                                                    <i class="material-icons">local_play</i> Favourites
                                                                </a>
                                                            </li>-->
                                            <!--                                        <li class="nav-item">
                                                                                        <a href="review.html" class="nav-link">
                                                                                            <i class="material-icons">record_voice_over</i> Reviews
                                                                                        </a>
                                                                                    </li>-->
                                            <li class="nav-item">
                                                <a href="../online_message/users.php" class="nav-link">
                                                    <i class="material-icons">chat</i> Messages
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                <a href="reports.php" class="nav-link">
                                    <i class="material-icons">pie_chart</i> Reports
                                </a>
                            </li>
                                            <!--                <li class="nav-item">
                                                                <a href="membership-plans.html" class="nav-link">
                                                                    <i class="material-icons">person_add</i> Membership
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="milestones.html" class="nav-link">
                                                                    <i class="material-icons">pie_chart</i> Milestones
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="verify-identity.html" class="nav-link">
                                                                    <i class="material-icons">person_pin</i> Verify Identity
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="deposit-funds.html" class="nav-link">
                                                                    <i class="material-icons">wifi_tethering</i> Payments
                                                                </a>
                                                            </li>-->
                                            <li class="nav-item">
                                                <a href="e_profile.php" class="nav-link active">
                                                    <i class="material-icons">settings</i> Profile Settings
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="../logout.php" class="nav-link">
                                                    <i class="material-icons">power_settings_new</i> Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>