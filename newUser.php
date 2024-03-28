<?php 
//require 'db_connection.php';
//
////  $id = $_GET['id'];
////  $full_name = $_GET['name'];
////  $email = $_GET['email'];
//
//// // $id = (string)$id;
//// //$id = '110291558854981832709';
//// $full_name = 'meet';
//// $email = 'jeelgoyani7171@gmail.com';
//
//session_start();
//
//echo $id;
//echo $full_name;
//echo $email;
//
//$insert = mysqli_query($db_connection, "INSERT INTO dt_user(google_id, user_name, user_email) VALUES('$_SESSION[id]','$_SESSION[name]','$_SESSION[email]')");
//            //$this_id = mysqli_insert_id($db_connection);
//            if($insert){
//                echo "2";
//                header("Location: register-2.php?id='$id'");
//                exit;
//            }
//            else{
//                echo "Sign up failed!(Something went wrong).";
//            }

require 'db_connection.php';

$id = (string)$_SESSION['id'];

session_start();

$ran_id = rand(time(), 100000000);

$insert = mysqli_query($db_connection, "INSERT INTO dt_user(unique_id,google_id, user_name, user_email) VALUES('$ran_id','$_SESSION[id]','$_SESSION[name]','$_SESSION[email]')");
            //$this_id = mysqli_insert_id($db_connection);
            if($insert){
                header("Location: register-2.php?id=$id");
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }


?>