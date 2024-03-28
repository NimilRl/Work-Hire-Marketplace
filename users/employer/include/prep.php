<?php
        //Include database connection file
        require '../db_connection.php';

        //Check the login session active or not
        if (!isset($_SESSION['login_E'])) {
            //Redirect to login page
            header('Location: ../login.php');
        }


        $id = $_SESSION['login_E'];

        $get_user = mysqli_query($db_connection, "SELECT * FROM `dt_user` WHERE `user_id`='$id'");

        //Check does query return result
        if (mysqli_num_rows($get_user) > 0) {
            $user = mysqli_fetch_assoc($get_user);
        } else {
            header('Location: ../logout.php');
            exit;
        }
        ?>