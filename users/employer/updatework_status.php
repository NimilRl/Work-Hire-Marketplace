<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './include/prep.php';

if(isset($_GET['wid'])){
    
    $workid = $_GET['wid'];
    
    $update_work_status = mysqli_query($db_connection, "UPDATE `dt_workpost` SET `work_status`='C' WHERE work_id = $workid;");
    
    if($update_work_status){        
        
        
            header('Location: ./workpost_detail.php?wid='.$workid);
                    
        
    }
}
