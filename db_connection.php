<?php
if(!isset($_SESSION)) { 
    session_start(); 
  }
//session_regenerate_user_user_id(true);
// change the information according to your database
$db_connection = mysqli_connect("localhost","root","","workflow");
// CHECK DATABASE CONNECTION
if(mysqli_connect_errno()){
    echo "Connection Failed".mysqli_connect_error();
    exit;
}