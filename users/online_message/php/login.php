<?php 
    session_start();

    include_once "config.php";
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
    
        $sql = mysqli_query($conn, "SELECT * FROM dt_user WHERE user_email = '{$email}'");
    
        if(mysqli_num_rows($sql) > 0){
    
            $row = mysqli_fetch_assoc($sql);
            $user_pass = $password;
            $enc_pass = $row['user_password'];
    
            if($user_pass === $enc_pass){
    
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE dt_user SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
    
                if($sql2){
    
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
    
                }else{
    
                    echo "Something went wrong. Please try again!";
    
                }
    
            }else{
    
                echo "Email or Password is Incorrect!";
    
            }
    
        }else{
    
            echo "$email - This email not Exist!";
    
        }
    
    }else{
    
        echo "All input fields are required!";
    
    }
?>