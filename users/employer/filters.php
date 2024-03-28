<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function get_filtered_data($status,$domain , $from_dt , $to_dt) {

require './include/prep.php';

    if ($status != 0 && $domain == 0 && $from_dt == '1970-01-01' && $to_dt == '1970-01-01') {

        $filterd_data_status = mysqli_query($db_connection, "SELECT work_id , work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND work_status = '$status' ORDER BY added_dt DESC;");
        if (mysqli_num_rows($filterd_data_status) >= 1) {
            return $filterd_data_status;
        }else{
            return null;
        }

//        echo '<br>' . $status;
    } elseif ($domain != 0 && $status == 0 && $from_dt == '1970-01-01' && $to_dt == '1970-01-01') {

        $filterd_data_domain = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND domain_id = $domain ORDER BY added_dt DESC;");
        if (mysqli_num_rows($filterd_data_domain) >= 1) {
            return $filterd_data_domain;
        }else{
            return null;
        }

//        echo '<br>' . $domain;
    } elseif ($domain == 0 && $status == 0 && $from_dt != '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_dt = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND DATE(added_dt) >= DATE('$from_dt') AND DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_dt) >= 1) {
            return $filterd_data_dt;
        }else{
            return null;
        }

//        echo '<br>' . $from_dt;
//        echo '<br>' . $to_dt;
    }elseif ($domain == 0 && $status == 0 && $from_dt != '1970-01-01' && $to_dt == '1970-01-01') {
        
        $filterd_data_dt = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND DATE(added_dt) >= DATE('$from_dt')  ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_dt) >= 1) {
            return $filterd_data_dt;
        }else{
            return null;
        }

//        echo '<br>' . $from_dt;
    }elseif ($domain == 0 && $status == 0 && $from_dt == '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_dt = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_dt) >= 1) {
            return $filterd_data_dt;
        }else{
            return null;
        }

//        echo '<br>' . $to_dt;
    }
    
    
    elseif ($domain != 0 && $status != 0 && $from_dt == '1970-01-01' && $to_dt == '1970-01-01') {
        
        $filterd_data_ds = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND domain_id = $domain AND work_status='$status' ORDER BY added_dt DESC;");
        if (mysqli_num_rows($filterd_data_ds) >= 1) {
            return $filterd_data_ds;
        }else{
            return null;
        }
        
        echo '<br>' . $domain;
        echo '<br>' . $status;
    } elseif ($domain != 0 && $status == 0 && $from_dt != '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_dDT = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND domain_id = $domain AND  DATE(added_dt) >= DATE('$from_dt') AND DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_dDT) >= 1) {
            return $filterd_data_dDT;
        }else{
            return null;
        }
        
        echo '<br>' . $domain;
        echo '<br>' . $from_dt;
        echo '<br>' . $to_dt;
    } elseif ($domain == 0 && $status != 0 && $from_dt != '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_sDT = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND work_status = '$status' AND  DATE(added_dt) >= DATE('$from_dt') AND DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_sDT) >= 1) {
            return $filterd_data_sDT;
        }else{
            return null;
        }
        
        echo '<br>' . $status;
        echo '<br>' . $from_dt;
        echo '<br>' . $to_dt;
    } elseif ($domain != 0 && $status != 0 && $from_dt != '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_dsDT = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND domain_id = $domain AND work_status = '$status' AND  DATE(added_dt) >= DATE('$from_dt') AND DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_dsDT) >= 1) {
            return $filterd_data_dsDT;
        }else{
            return null;
        }
        
        echo '<br>' . $status;
        echo '<br>' . $domain;
        echo '<br>' . $from_dt;
        echo '<br>' . $to_dt;
    }
    
    
    elseif ($domain != 0 && $status == 0 && $from_dt != '1970-01-01' && $to_dt == '1970-01-01') {
        
        $filterd_data_df = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND domain_id = $domain AND  DATE(added_dt) >= DATE('$from_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_df) >= 1) {
            return $filterd_data_df;
        }else{
            return null;
        }
        
        echo '<br>' . $domain;
        echo '<br>' . $from_dt;
    } elseif ($domain != 0 && $status == 0 && $from_dt == '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_dto = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND domain_id = $domain AND  DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_dto) >= 1) {
            return $filterd_data_dto;
        }else{
            return null;
        }
        
        echo '<br>' . $domain;
        echo '<br>' . $to_dt;
    } 
    
    elseif ($domain == 0 && $status != 0 && $from_dt != '1970-01-01' && $to_dt == '1970-01-01') {
        
        $filterd_data_sf = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND work_status = '$status' AND  DATE(added_dt) >= DATE('$from_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_sf) >= 1) {
            return $filterd_data_sf;
        }else{
            return null;
        }
        
        echo '<br>' . $status;
        echo '<br>' . $from_dt;
    } elseif ($domain == 0 && $status != 0 && $from_dt == '1970-01-01' && $to_dt != '1970-01-01') {
        
        $filterd_data_st = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND work_status = '$status'  AND  DATE(added_dt) <= DATE('$to_dt') ORDER BY added_dt DESC;");

        if (mysqli_num_rows($filterd_data_st) >= 1) {
            return $filterd_data_st;
        }else{
            return null;
        }
        
        echo '<br>' . $status;
        echo '<br>' . $to_dt;
    } 
    
    
    elseif ($domain == 0 && $status == 0 && $from_dt == '1970-01-01' && $to_dt == '1970-01-01') {
        
        $clear_data = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id ORDER BY added_dt DESC;");

        if (mysqli_num_rows($clear_data) >= 1) {
            return $clear_data;
        }else{
            return null;
        }
        
        
        ?>
        <script>
//            swal("No input", "Please fill data for filter", "error");
        </script>
        <?php

    }
}
