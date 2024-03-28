<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './include/prep.php';

if(isset($_GET['wid']) && isset($_GET['fid'])){
    
    $workid = $_GET['wid'];
    $freelancer_id = $_GET['fid'];
    
    $update_work_status = mysqli_query($db_connection, "UPDATE `dt_workpost` SET `work_status`='W' WHERE work_id = $workid;");
    
    if($update_work_status){        
        
        $update_proposal_status = mysqli_query($db_connection, "UPDATE `dt_workpost_proposals` SET `status`='H' WHERE work_id = $workid AND user_id = $freelancer_id ;");
        
        if($update_proposal_status){
            echo "<script type='text/javascript'>alert('updated');</script>";
            header('Location: ./manage-workposts.php');
        }
        
    }
}
