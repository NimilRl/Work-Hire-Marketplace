<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
            
            $sql2 = mysqli_query($conn, "SELECT COUNT(*) AS number FROM messages WHERE incoming_msg_id = $incoming_id AND outgoing_msg_id = $outgoing_id;");
            $row = mysqli_fetch_assoc($sql2);               
            if($row['number']==1){
                $sql3 = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id  ,outgoing_msg_id , msg) VALUES ({$outgoing_id} , {$incoming_id} , 'You are now connected with Freelancer')") or die();
            }
        }
    }else{
        header("location: ../login.php");
    }


    
?>