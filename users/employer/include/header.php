<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="index.html" class="navbar-brand logo">
                <img src="../../assets/img/logo.png" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index.html" class="menu-logo">
                    <img src="../../assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>
        <ul class="nav header-navbar-rht">

            <li class="nav-item dropdown has-arrow main-drop account-item">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img onerror="this.onerror=null; this.src='../../assets/img/usericon1white.png'" src="../files/user_imgs/<?php echo $user['user_profile_img']; ?> " alt="">
                    </span>
                    <span><?php echo $user['user_name']; ?></span>
                </a>
                <div class="dropdown-menu emp">
                    <div class="drop-head">Account Details</div>
                        <a class="dropdown-item" href="user-account-details.html"><i class="material-icons">verified_user</i> View profile</a>
                        
                        
                    <div class="drop-head">works Settings</div>                    
                    <a class="dropdown-item" href="../manage-workposts.php"><i class="material-icons">business_center</i>
                        Workposts</a>
                    
                    <a class="dropdown-item" href="../../online_message/users.php"><i class="material-icons">chat</i>
                        Messages</a>
                    
                    <!--<a class="dropdown-item" href="review.html"><i class="material-icons">pie_chart</i> Reviews</a>-->
                    
                    <div class="drop-head">Account Details</div>
                    <a class="dropdown-item" href="e_profile.php"> <i class="material-icons">settings</i>
                            Profile Settings</a>
                        <a class="dropdown-item" href="../logout.php"><i class="material-icons">power_settings_new</i>
                        Logout</a>
                </div>
            </li>

            <li><a 
                    <?php  
                    
                    $check_user_data = mysqli_query($db_connection, "SELECT * from dt_employer WHERE user_id = $user[user_id];");

                    if (mysqli_num_rows($check_user_data) > 0) {
                        
                        ?>
                             href="postWork.php"
                            <?php
                        
                    }else{
                        ?>
                             href="profile_error.php"
                            <?php
                        
                    }
                    
                    ?>
                    
                    
                    class="login-btn">Post a Work </a></li>
        </ul>
    </nav>
</header>