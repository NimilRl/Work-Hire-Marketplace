<?php

require '../../db_connection.php';

if (!isset($_SESSION['login_F'])) {
    header('Location: login.php');
}
$id = $_SESSION['login_F'];

$get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");

if (mysqli_num_rows($get_user) > 0) {
    $user = mysqli_fetch_assoc($get_user);
} else {
    header('Location: ../logout.php');
    exit;
}    

$path = $_FILES['profilephoto']['tmp_name'];
$filename = $_FILES["profilephoto"]["name"];
echo $filename;
$output = shell_exec("python face_detect_cv3.py $path");
// echo $output;
$d = explode(" ", $output);
print_r($d);
if ($d[1] == 0) {
   header('Location: ../f_profile.php?s=2');
} else {
    echo 'face found';
    $filename = $_FILES["profilephoto"]["name"];
    $fn = 'f/'.$filename;
    $tempname = $_FILES["profilephoto"]["tmp_name"];
    $folder = "../../files/user_imgs/f/" . $filename;
    echo $folder;

    $sql = "UPDATE dt_user SET user_profile_img = '$fn' where `user_id`='$id' ";

    // Execute query
    mysqli_query($db_connection, $sql);

    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

   header('Location: ../f_profile.php?s=1');
   
}
