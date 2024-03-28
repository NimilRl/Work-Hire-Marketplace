<?php
session_start();
include_once "php/config.php";
 if(!isset($_SESSION['unique_id'])){
//   header("location: login.php");
    echo 'works not';
 }
//
//if (!isset($_SESSION['login_E'])) {
//    //Redirect to login page
//    header('Location: ../login.php');
//}
//$id = $_SESSION['login_E'];
//
//$get_user = mysqli_query($conn, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");
//
////Check does query return result
//if (mysqli_num_rows($get_user) > 0) {
//    $user = mysqli_fetch_assoc($get_user);
//} else {
//    header('Location: ../logout.php');
//    exit;
//}
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
<?php
$sql = mysqli_query($conn, "SELECT * FROM dt_user WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>
                    <img src="../files/user_imgs/<?php echo $row['user_profile_img']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['user_name'] ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                
                <?php 
                if($row['user_type'] == 'E'){
                    ?>
                <a href="../../users/employer/dashboard.php" class="logout">Back</a>
                        <?php
                    
                }elseif($row['user_type'] == 'F')
                {
                    ?>
                <a href="../../users/freelancer/freelancer-dashboard.php" class="logout">Back</a>
                        <?php
                }
                
                ?>
                
                
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>


    <script src="javascript/users.js"></script>

</body>

</html>

<!--

$output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="../../assets/img/usericon1.png" alt="">
                    <div class="details">
                        <span>'. $row['user_name']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';-->