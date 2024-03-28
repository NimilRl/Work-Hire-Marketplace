<?php
    session_start();
    include_once "config.php";
   
    $outgoing_id = $_SESSION['unique_id'];
    
    $sql = "SELECT DISTINCT `outgoing_msg_id`,incoming_msg_id,user_profile_img, unique_id, user_name, status FROM `messages`,dt_user WHERE outgoing_msg_id=dt_user.unique_id AND `incoming_msg_id`='$outgoing_id' ";

    $query = mysqli_query($conn, $sql);
    $output = "";
    $sql="";
    if(mysqli_num_rows($query) == 0){
   
        $output .= "No users are available to chat";
   
    }elseif(mysqli_num_rows($query) > 0){
   
        include_once "data.php";
   
    }
    echo $output;
?>