<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../../db_connection.php';

//session_start();

$userid = $_SESSION['login_E'];

if (isset($_POST['post-work'])) {
//    echo "<script type='text/javascript'>alert('. . . btn clicked . . .');</script>";

//    $userid = $_POST['userid'];

    $work_title = $_POST["title"];
    $work_domain = $_POST["category"];

    $work_skills = $_POST["skills"];

    $work_size = $_POST["size"];
    $work_duration = $_POST["duration"];
    $work_level = $_POST["level"];

    $price = $_POST["price"];

    $budget_price = null;
    $range = null;

//    if ($price == 1) {
//        $budget_price = $_POST["budget"];
//        $range = null;
//    } elseif ($price == 2) {
//        $range = $_POST['range'];
//        $budget_price = null;
//    }
    
//    echo '<br> budget :'.$budget_price;
//    echo '<br> range id :'.$range;

    $work_description = $_POST["desc"];

//    $work_file = $_POST["file"];

    $file_name = $_FILES["file"]["name"];
    $tmp_file = $_FILES["file"]["tmp_name"];

    move_uploaded_file($tmp_file, "../../files/workpost_pdfs/" . basename($file_name));

    $work_file = "../../files/workpost_pdfs/" . basename($file_name);

//    echo '<br> user :'.$userid .'<br> title :'. $work_title.'<br> domain : '. $work_domain.'<br> size : '. $work_size.'<br> duration : '. $work_duration.'<br>level : '. $work_level.'<br> range : '. $range.'<br> price : '. $budget_price.'<br> desc : '. $work_description.'<br> file : '. $work_file;

    $qry = "INSERT INTO `dt_workpost`(`user_id`, `work_title`, `domain_id`, `work_size`, `work_duration`, `experience_level`, `work_desc`, `work_file`) VALUES ('$userid', '$work_title', '$work_domain', '$work_size', '$work_duration', '$work_level', '$work_description', '$work_file');";

//    mysqli_query($db_connection, "SET @id='" . $userid . "'");
//    mysqli_query($db_connection, "SET @title='" . $work_title . "'");
//    mysqli_query($db_connection, "SET @domain='" . $work_domain . "'");
//    mysqli_query($db_connection, "SET @size='" . $work_size . "'");
//    mysqli_query($db_connection, "SET @duration='" . $work_duration . "'");
//    mysqli_query($db_connection, "SET @level='" . $work_level . "'");
//    mysqli_query($db_connection, "SET @rangeid='" . $range . "'");
//    mysqli_query($db_connection, "SET @budget='" . $budget_price . "'");
//    mysqli_query($db_connection, "SET @desc='" . $work_description . "'");
//    mysqli_query($db_connection, "SET @file='" . $work_file . "'");

    //Register Store Procedure
//    $qry_add_work = mysqli_query($db_connection, "CALL add_workpost(@id,@title,@domain,@size,@duration,@level,@rangeid,@budget,@desc,@file )");

    if (mysqli_query($db_connection, $qry)) {

//    if ($qry_add_work) {
//
        $work_id = mysqli_insert_id($db_connection);
        
        if ($price == 1) {
        $budget_price = $_POST["budget"];
        $range = null;
        $update_range = mysqli_query($db_connection, "UPDATE `dt_workpost` SET `fix_budget`='$budget_price' WHERE work_id = $work_id;");
    } elseif ($price == 2) {
        $range = $_POST['range'];
        $budget_price = null;
        $update_range = mysqli_query($db_connection, "UPDATE `dt_workpost` SET `range_id`='$range' WHERE work_id = $work_id;");
    }
        
         

//        $getid = mysqli_query($db_connection, "SELECT MAX(work_id) as id FROM dt_workpost");

//        $work_id = mysqli_fetch_assoc($getid);

//        echo $user['id'];

        echo "New record created successfully";

//        $work_id = mysqli_insert_id($db_connection);
//
        $skill_arr = explode(",", $work_skills);

        echo $work_id;
//        include './php/add_workpost.php';
        add_work_skills($work_id['id'], $skill_arr);

        header('Location: ../dashboard.php');
    } else {
        echo "Error: " . $qry_add_work . "<br>" . mysqli_error($db_connection);
    }
}

function add_work_skills($workid, $skill_ar) {

    $db_connection = new mysqli("127.0.0.1", 'root', '', 'workflow');

    foreach ($skill_ar as $value) {


        $qry_getskills = mysqli_query($db_connection, "SELECT * FROM dt_skill_master WHERE skill_name='$value'");
//                        $stmt->execute([$value]); 
//                        $tagtxt = $stmt->fetch();


        if (mysqli_num_rows($qry_getskills) == 1) {

            $skill_row = mysqli_fetch_assoc($qry_getskills);
            $skill_id = $skill_row['skill_id'];

            //skill exist

            $quetagqry = mysqli_query($db_connection, "INSERT INTO dt_workpost_skill(`skill_id`, `work_id`)VALUES('$skill_id','$workid')");
        } else {

            //skill not exist

            $qry_master_skill = mysqli_query($db_connection, "INSERT INTO dt_skill_master(`skill_name`, `added_dt`)
                                                       VALUES('$value',NOW())");

            if ($qry_master_skill) {

                $masterskill_id = mysqli_insert_id($db_connection);

                //master skill inserted

                $quetagqry = mysqli_query($db_connection, "INSERT INTO dt_workpost_skill(`skill_id`, `work_id`)
                                VALUES('$masterskill_id','$workid')");
            }
        }
    }
}
