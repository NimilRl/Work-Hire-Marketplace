<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




include_once '../db_connection.php';

$id = $_SESSION['login_E'];

$get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");

//Check does query return result
if (mysqli_num_rows($get_user) > 0) {
    $user = mysqli_fetch_assoc($get_user);
} else {
    header('Location: ../logout.php');
    exit;
}


//                                               
