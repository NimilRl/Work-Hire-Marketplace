<?php
//Freelancer Data

// $domain_freelancer = 16;
// $user_id = 17;
// $experience = 4;
// $hourly_range = 3;

function sortByPer($a, $b) {
    return $a['per'] < $b['per'];
}


function sortBySuggestion($domain_freelancer, $user_id, $experience,$hourly_range) {
    require '../db_connection.php';
    $count = 1;
    $count_skill_freelancer=0;
    $work=[];
    
    //echo "USER RANGE :: $hourly_range <br>";
    $hourly_range_min = $hourly_range - 1;
    $hourly_range_equal = $hourly_range;
    $hourly_range_max_1 = $hourly_range + 1;
    $hourly_range_max_2= $hourly_range + 2;

    $get_skill_freelancer = mysqli_query($db_connection,"select * from dt_skill_master where skill_id IN (SELECT skill_id FROM `dt_freelancer_skill` where user_id = $user_id)");
    while($row_skill_freelancer = mysqli_fetch_array($get_skill_freelancer)){
    //    echo " ";
    //    echo $row_skill_freelancer['skill_name'];
        $count_skill_freelancer= $count_skill_freelancer + 1;
    }
    //echo " ".$count_skill_freelancer;
    //echo "<br>-------------<br>";
    
            //Work data
            $get_work = mysqli_query($db_connection, "SELECT * FROM dt_workpost ORDER BY added_dt");
            while($row_get_work = mysqli_fetch_array($get_work)){
            //    echo "<br>";
            //    echo $count;
                $count = $count + 1;
              
                //1.1 Domain check ( 50 % )
            //    echo "<b> Domain::";
                if($row_get_work['domain_id'] == $domain_freelancer){
                    $domain_percentage = 50;
            //        echo ' | 50 %';
                }
                else{
                    $domain_percentage = 0;
                //    echo ' |  0  %';
                }
                //echo "</b>";
    
                //2.1 Count of required skills
                $get_skill = mysqli_query($db_connection,"select * from dt_skill_master where skill_id IN (SELECT skill_id FROM `dt_workpost_skill` where work_id = $row_get_work[work_id])");
                //echo " | ";
                $count_skill_work=0;
                while($row_skill = mysqli_fetch_array($get_skill)){
                    $count_skill_work= 1 + $count_skill_work;
                }
    
                //2.2 Required skill count
                //echo " | ";
                //echo $count_skill_work;
                //echo " | ";
    
                //2.3 Per Skill
                if($count_skill_work >0){
                    $per_skill = 30 / $count_skill_work ;
                //    echo $per_skill;
                }
                else{
                    $per_skill = 0;
                //    echo "0";
                }
                //echo " | ";
    
                //2.4 Number Of Skill Match
                $match_skill_freelancer = mysqli_query($db_connection,"SELECT COUNT(*) AS Number FROM dt_freelancer_skill,dt_skill_master,dt_workpost_skill WHERE dt_freelancer_skill.user_id = $user_id AND dt_freelancer_skill.skill_id = dt_skill_master.skill_id AND dt_freelancer_skill.skill_id = dt_workpost_skill.skill_id AND dt_workpost_skill.work_id = $row_get_work[work_id]" );
                $row_match_skill_freelancer = mysqli_fetch_array($match_skill_freelancer);
                //echo $row_match_skill_freelancer['Number'];
                //echo " | ";
    
                //2.5 Total skill_percentage (Per skill * Number of skill required)
                if($count_skill_work >0){
                    $skill_percentage =  $per_skill * $row_match_skill_freelancer['Number'];
                }
                else{
                    $skill_percentage = 0;
                }
                // echo "<b>SKILL:: ";
                // echo $skill_percentage;
                // echo "</b>";
                // echo " | ";
    
                //3.1 Experience
                //echo $row_get_work['experience_level'] ;
    
                if($experience <= 1){
                    if($row_get_work['experience_level'] == "0"){
                        $experience_percentage = 20 ;
                    }
                    else{
                        $experience_percentage = 0 ;
                    }
                }

                if($experience >=2 && $experience <=4){
                    if($row_get_work['experience_level'] <= "1"){
                        $experience_percentage = 20 ;
                    }
                    else{
                        $experience_percentage = 0 ;
                    }
                }

                if($experience >=5){
                    $experience_percentage = 20 ;
                }

                // echo " |<b> Experience ::";
                // echo $experience_percentage;
                // echo " % </b> ";
                
                $hourly_range_percentage;
                if($row_get_work['range_id'] == $hourly_range){
                    $hourly_range_percentage = 100;
                    //$work_new=array("work_id"=>$row_get_work['work_id'],"per"=>100);
                      //  array_push($work,$work_new);
                }
                if($row_get_work['range_id'] == $hourly_range_min){
                    $hourly_range_percentage = 50;
                    //$work_new=array("work_id"=>$row_get_work['work_id'],"per"=>50);
                      //  array_push($work,$work_new);
                }
                if($row_get_work['range_id'] == $hourly_range_max_1 || $row_get_work['range_id'] == $hourly_range_max_2){
                    $hourly_range_percentage = 70;
                    //$work_new=array("work_id"=>$row_get_work['work_id'],"per"=>70);
                      //  array_push($work,$work_new);
                }

                //Total percentage
                $total = $domain_percentage + $skill_percentage + $experience_percentage + $hourly_range_percentage;
                //echo $total;
                
                $work_new=array("work_id"=>$row_get_work['work_id'],"per"=>$total);
                array_push($work,$work_new);
    
            }
            usort($work, 'sortByPer');
    return $work;
}


function sortByHourlyRate($user_id, $hourly_range ){
    require '../db_connection.php';

    $work=[];
    
    //echo "USER RANGE :: $hourly_range <br>";
    $hourly_range_min = $hourly_range - 1;
    $hourly_range_equal = $hourly_range;
    $hourly_range_max_1 = $hourly_range + 1;
    $hourly_range_max_2= $hourly_range + 2;

    //SELECT range_id FROM `dt_workpost` 
    $get_work = mysqli_query($db_connection, "SELECT * FROM `dt_workpost` where range_id is not null");
    while($row_get_work = mysqli_fetch_array($get_work)){
        if($row_get_work['range_id'] == $hourly_range){
            $work_new=array("work_id"=>$row_get_work['work_id'],"per"=>100);
                array_push($work,$work_new);
        }
        else if($row_get_work['range_id'] == $hourly_range_min){
            $work_new=array("work_id"=>$row_get_work['work_id'],"per"=>50);
                array_push($work,$work_new);
        }
        else if($row_get_work['range_id'] == $hourly_range_max_1 || $row_get_work['range_id'] == $hourly_range_max_2){
            $work_new=array("work_id"=>$row_get_work['work_id'],"per"=>70);
                array_push($work,$work_new);
        }
        else{
            $work_new=array("work_id"=>$row_get_work['work_id'],"per"=>0);
                array_push($work,$work_new);
        }
    }
    usort($work, 'sortByPer');
    return $work;  
}

function sortByFilter($domain_freelancer, $user_id, $experience) {
    require '../db_connection.php';
    $count = 1;
    $count_skill_freelancer=0;
    $work=[];

    $get_skill_freelancer = mysqli_query($db_connection,"select * from dt_skill_master where skill_id IN (SELECT skill_id FROM `dt_freelancer_skill` where user_id = $user_id)");
    while($row_skill_freelancer = mysqli_fetch_array($get_skill_freelancer)){
        // echo " ";
        // echo $row_skill_freelancer['skill_name'];
        $count_skill_freelancer= $count_skill_freelancer + 1;
    }
    //echo " ".$count_skill_freelancer;
    //echo "<br>-------------<br>";
    
            //Work data
            $get_work = mysqli_query($db_connection, "SELECT * FROM dt_workpost ORDER BY added_dt");
            while($row_get_work = mysqli_fetch_array($get_work)){
                // echo "<br>";
                // echo $count;
                $count = $count + 1;
    
                //1.1 Domain check ( 50 % )
                
                //echo "<b> Domain::";
                if($row_get_work['domain_id'] == $domain_freelancer){
                    $domain_percentage = 50;
                //    echo ' | 50 %';
                }
                else{
                    $domain_percentage = 0;
                //    echo ' |  0  %';
                }
                //echo "</b>";
    
                //2.1 Count of required skills
                $get_skill = mysqli_query($db_connection,"select * from dt_skill_master where skill_id IN (SELECT skill_id FROM `dt_workpost_skill` where work_id = $row_get_work[work_id])");

                //2.2 Required skill count
                $count_skill_work=0;
                while($row_skill = mysqli_fetch_array($get_skill)){
                    $count_skill_work= 1 + $count_skill_work;
                }

                //2.3 Per Skill
                if($count_skill_work >0){
                    $per_skill = 30 / $count_skill_work ;
                //    echo $per_skill;
                }
                else{
                //    echo "0";
                }
                //echo " | ";
    
                //2.4 Number Of Skill Match
                $match_skill_freelancer = mysqli_query($db_connection,"SELECT COUNT(*) AS Number FROM dt_freelancer_skill,dt_skill_master,dt_workpost_skill WHERE dt_freelancer_skill.user_id = $user_id AND dt_freelancer_skill.skill_id = dt_skill_master.skill_id AND dt_freelancer_skill.skill_id = dt_workpost_skill.skill_id AND dt_workpost_skill.work_id = $row_get_work[work_id]" );
                $row_match_skill_freelancer = mysqli_fetch_array($match_skill_freelancer);
                //echo $row_match_skill_freelancer['Number'];
                //echo " | ";
    
                //2.5 Total skill_percentage (Per skill * Number of skill required)
                if($count_skill_work >0){
                    $skill_percentage =  $per_skill * $row_match_skill_freelancer['Number'];
                }
                else{
                    $skill_percentage = 0;
                }
                //echo "<b>SKILL:: ";
                //echo $skill_percentage;
                //echo "</b>";
                //echo " | ";
    
                //3.1 Experience
                //echo $row_get_work['experience_level'] ;
    
                if($experience <= 1){
                    if($row_get_work['experience_level'] == "0"){
                        $experience_percentage = 20 ;
                    }
                    else{
                        $experience_percentage = 0 ;
                    }
                }

                if($experience >=2 && $experience <=4){
                    if($row_get_work['experience_level'] <= "1"){
                        $experience_percentage = 20 ;
                    }
                    else{
                        $experience_percentage = 0 ;
                    }
                }

                if($experience >=5){
                    $experience_percentage = 20 ;
                }

                //echo " |<b> Experience ::";
                //echo $experience_percentage;
                //echo " % </b> ";
                
                //Total percentage
                $total = $domain_percentage + $skill_percentage + $experience_percentage;
                //echo $total;
                
                $work_new=array("work_id"=>$row_get_work['work_id'],"per"=>$total);
                array_push($work,$work_new);
    
            }
            //echo "<br>";
            usort($work, 'sortByPer');
            
    return $work;
}
            
            // print_r($work);

            // echo "<br><br> <b>:: Suggestion ::</b><br>";
            
            // GET DATA FROM ARRAY
            // $keys = array_keys($work);
            // for($i = 0; $i < count($work); $i++) {
            //     foreach($work[$keys[$i]] as $key => $value) {
            //         if($key == "work_id"){
            //             //$get_work_suggest = mysqli_query($db_connection, "SELECT * FROM dt_workpost where work_id = $value");
            //             //$row_get_work_suggest = mysqli_fetch_array($get_work_suggest);
            //             echo $value ;
            //         }
            //     }
            //     echo "<br>";
            // }

            //sortByFilter($domain_freelancer, $user_id, $experience);
?>