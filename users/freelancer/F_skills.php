<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../db_connection.php';

$id = $_SESSION['login_F'];

if (isset($_POST['save'])) {
    $F_skills = $_POST["skills"];

    $skill_arr = explode(",", $F_skills);

//        echo $work_id;
//    include './F_skills.php';
//    add_F_skills($id, $skill_arr);

    foreach ($skill_arr as $value) {

        $qry_getskills = mysqli_query($db_connection, "SELECT * FROM dt_skill_master WHERE skill_name='$value'");
//                        $stmt->execute([$value]); 
//                        $tagtxt = $stmt->fetch();


        if (mysqli_num_rows($qry_getskills) == 1) {

            $skill_row = mysqli_fetch_assoc($qry_getskills);
            $skill_id = $skill_row['skill_id'];

            //skill exist
            
            $qry_getFskills = mysqli_query($db_connection, "SELECT * FROM `dt_freelancer_skill` WHERE skill_id = $skill_id;");
//                        $stmt->execute([$value]); 
//                        $tagtxt = $stmt->fetch();


            if (mysqli_num_rows($qry_getFskills) == 0) {
                            $queskillqry = mysqli_query($db_connection, "INSERT INTO `dt_freelancer_skill`(`user_id`, `skill_id`) VALUES ('$id','$skill_id');");

            }        
        
            
            
            
        } else {

            //skill not exist

            $qry_master_skill = mysqli_query($db_connection, "INSERT INTO dt_skill_master(`skill_name`, `added_dt`) VALUES('$value',NOW())");

            if ($qry_master_skill) {

                $masterskill_id = mysqli_insert_id($db_connection);

                //master skill inserted

                $quetagqry = mysqli_query($db_connection, "INSERT INTO `dt_freelancer_skill`(`user_id`, `skill_id`) VALUES ('$id','$masterskill_id');");
            }
        }
    }
    
    header('Location: ./freelancer-suggestion-skill-projects.php');
}
