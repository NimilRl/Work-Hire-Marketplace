<div class="col-xl-3 col-md-4 theiaStickySidebar">
    <div class="settings-widget">
        <div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">

            <a href="freelancer-profile.html"><img alt="no img" onerror="this.onerror=null; this.src='../../assets/img/usericon1white.png'" src="../files/user_imgs/<?php echo $user['user_profile_img'];?>" class="avatar-lg rounded-circle"></a>

                    
            <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                <p class="mb-2">Welcome,</p>
                <h3 class="mb-0"><a href="freelancer-profile.html"><?php echo $user['user_name']; ?></a></h3>
                
            </div>
        </div>
        <div class="settings-menu">
            <ul>
                <li class="nav-item">
                    <a href="freelancer-dashboard.php" class="nav-link active">
                        <i class="material-icons">verified_user</i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="freelancer-project-projects.php" class="nav-link">
                        <i class="material-icons">business_center</i> Workpost
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="../online_message/users.php" class="nav-link">
                        <i class="material-icons">chat</i> Messages
                    </a>
                </li>
                
                
                
                
                
                <li class="nav-item">
                    <a href="f_profile.php" class="nav-link">
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
</div>