<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from kofejob.dreamguystech.com/template/admin/settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:18:31 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Workflow | Settings</title>

        <link rel="shortcut icon" href="assets/img/favicon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="assets/css/feather.css">

        <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
<div class="main-wrapper">

           <div class="header">

                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="assets/img/logo.jpg" alt="Logo">
                    </a>
                    <a href="index.html" class="logo logo-small">
                        <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                    </a>

                    <a href="javascript:void(0);" id="toggle_btn">
                        <i class="feather-chevrons-left"></i>
                    </a>


                    <a class="mobile_btn" id="mobile_btn">
                        <i class="feather-chevrons-left"></i>
                    </a>

                </div>


                <div class="top-nav-search">
                    <form>
                        <input type="text" class="form-control" placeholder="Start typing your Search...">
                        <button class="btn" type="submit"><i class="feather-search"></i></button>
                    </form>
                </div>


                <ul class="nav user-menu">

                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="feather-bell"></i> <span class="badge badge-pill">5</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Brian Johnson</span> paid the invoice <span class="noti-title">#DF65485</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-03.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Marie Canales</span> has accepted your estimate <span class="noti-title">#GTR458789</span></p>
                                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <div class="avatar avatar-sm flex-shrink-0">
                                                    <span class="avatar-title rounded-circle bg-primary-light"><i class="far fa-user"></i></span>
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">New user registered</span></p>
                                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-04.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Barbara Moore</span> declined the invoice <span class="noti-title">#RDW026896</span></p>
                                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <div class="avatar avatar-sm flex-shrink-0">
                                                    <span class="avatar-title rounded-circle bg-info-light"><i class="far fa-comment"></i></span>
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">You have received a new message</span></p>
                                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="#">View all Notifications</a>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img src="assets/img/profiles/avatar-07.jpg" alt="">
                                <span class="status online"></span>
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i> Profile</a>
                            <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="me-1"></i> Settings</a>
                            <a class="dropdown-item" href="login.html"><i data-feather="log-out" class="me-1"></i> Logout</a>
                        </div>
                    </li>

                </ul>

            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"><span>Main</span></li>
                            <li>
                                <a href="index.php"><i data-feather="home"></i> <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="domain.php"><i data-feather="copy"></i> <span>Domain</span></a>
                            </li>
                            <li>
                                <a href="work.php"><i data-feather="database"></i> <span>Works</span></a>
                            </li>
                            <li>
                                <a href="users.php"><i data-feather="users"></i> <span>Users</span></a>
                            </li>
                             <li>
                                 <a href="skill.php"><i data-feather="award"></i> <span>Skills</span></a>
                            </li>
<!--                            <li>
                                 <a href="domain_report.php"><i data-feather="pie-chart"></i> <span>Reports</span></a>
                            </li>-->
                            <li class="active">
                                <a href="settings.php"><i data-feather="settings"></i> <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="page-title">Settings</h3>
<!--                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="settings.html">Settings</a></li>
                                    <li class="breadcrumb-item active">General Settings</li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="settings-menu-links">
                                <ul class="nav nav-tabs menu-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="settings.php">General Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="localization-details.html">Localization</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="payment-settings.html">Payment Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-settings.html">Email Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="social-settings.html">Social Media Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="social-links.html">Social Links</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="seo-settings.html">SEO Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="others-settings.html">Others</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body pt-0">
                                            <div class="card-header">
                                                <h5 class="card-title">Website Basic Details</h5>
                                            </div>
                                            <form>
                                                <div class="settings-form">
                                                    <div class="form-group">
                                                        <label>Website Name <span class="star-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Website Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <p class="settings-label">Logo <span class="star-red">*</span></p>
                                                        <div class="settings-btn">
                                                            <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" class="hide-input">
                                                            <label for="file" class="upload">
                                                                <i class="feather-upload"></i>
                                                            </label>
                                                        </div>
                                                        <h6 class="settings-size">Recommended image size is <span>150px x 150px</span></h6>
                                                        <div class="upload-images">
                                                            <img src="assets/img/logo.jpg" alt="Image">
                                                            <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                                                <i class="feather-x-circle"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <p class="settings-label">Favicon <span class="star-red">*</span></p>
                                                        <div class="settings-btn">
                                                            <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" class="hide-input">
                                                            <label for="file" class="upload">
                                                                <i class="feather-upload"></i>
                                                            </label>
                                                        </div>
                                                        <h6 class="settings-size">
                                                            Recommended image size is <span>16px x 16px or 32px x 32px</span>
                                                        </h6>
                                                        <h6 class="settings-size mt-1">Accepted formats: only png and ico</h6>
                                                        <div class="upload-images upload-size">
                                                            <img src="assets/img/favicon.png" alt="Image">
                                                            <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                                                <i class="feather-x-circle"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6">
                                                            <div class="form-group">
                                                                <div class="status-toggle d-flex justify-content-between align-items-center">
                                                                    <p class="mb-0">RTL</p>
                                                                    <input type="checkbox" id="status_1" class="check">
                                                                    <label for="status_1" class="checktoggle">checkbox</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <div class="settings-btns">
                                                            <button type="submit" class="btn btn-orange">Update</button>
                                                            <button type="submit" class="btn btn-grey">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body pt-0">
                                            <div class="card-header">
                                                <h5 class="card-title">Address Details</h5>
                                            </div>
                                            <form>
                                                <div class="settings-form">
                                                    <div class="form-group">
                                                        <label>Address Line 1 <span class="star-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Address Line 1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address Line 2 <span class="star-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Address Line 2">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City <span class="star-red">*</span></label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>State/Province <span class="star-red">*</span></label>
                                                                <select class="select form-control">
                                                                    <option selected="selected">Select</option>
                                                                    <option>California</option>
                                                                    <option>Tasmania</option>
                                                                    <option>Auckland</option>
                                                                    <option>Marlborough</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Zip/Postal Code <span class="star-red">*</span></label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Country <span class="star-red">*</span></label>
                                                                <select class="select form-control">
                                                                    <option selected="selected">Select</option>
                                                                    <option>India</option>
                                                                    <option>London</option>
                                                                    <option>France</option>
                                                                    <option>USA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <div class="settings-btns">
                                                            <button type="submit" class="btn btn-orange">Update</button>
                                                            <button type="submit" class="btn btn-grey">Cancel</button>
                                                        </div>
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


        <script src="assets/js/jquery-3.6.0.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <script src="assets/js/feather.min.js"></script>

        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/select2/js/select2.min.js"></script>

        <script src="assets/js/script.js"></script>
    </body>

    <!-- Mirrored from kofejob.dreamguystech.com/template/admin/settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Feb 2022 05:18:33 GMT -->
</html>