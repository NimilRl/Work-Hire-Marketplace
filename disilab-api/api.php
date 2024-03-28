<?php

function dbConnect() {
    $db_connection = mysqli_connect("localhost", "root", "", "disilab");
    // CHECK DATABASE CONNECTION
    if (mysqli_connect_errno()) {
        echo "Connection Failed" . mysqli_connect_error();
        exit;
    }
    return $db_connection;
}

//1. CONNECT WITH DISILAB
function authorize($user, $pass) {
    $db_connection = dbConnect();
    //$pass = md5($pass);
    $get_user = mysqli_query($db_connection, "SELECT authorized_keys FROM `data_user` WHERE `User_email_id`='$user' and User_password = '$pass'");
    $row = mysqli_fetch_array($get_user, MYSQLI_ASSOC);
    if (mysqli_num_rows($get_user) > 0) {
        return $row['authorized_keys'];
    } else {
        return 0;
    }
}

//2. Get Score
function getScore($key) {
    
    $score = 0;
    $experience = 0;
    $count = 0;

    $db_connection = dbConnect();

    $get_user = mysqli_query($db_connection, "SELECT * FROM `data_user` WHERE authorized_keys = '$key'");
    $row = mysqli_fetch_array($get_user, MYSQLI_ASSOC);

    $get_user_answer = mysqli_query($db_connection, "SELECT * FROM `data_ans` WHERE ans_user_id = '$row[User_id]'");
    while ($row_answer = mysqli_fetch_array($get_user_answer, MYSQLI_ASSOC)) {
        $count++;
        if ($row_answer['status'] == '1') {
//            echo "<br>Approved by questioner";
            $get_user_exp = mysqli_query($db_connection, "select * from data_user where User_id =(select User_id from data_que where Forum_que_id = (select Que_id from data_ans where Ans_id = $row_answer[Ans_id] ))");
            $row_exp = mysqli_fetch_array($get_user_exp, MYSQLI_ASSOC);

            $dateOfBirth = date('y-m-d', strtotime($row_exp['joining_dt']));
            $diff = date_diff(date_create($dateOfBirth), date_create(date("y-m-d")));
            $experience = $diff->format('%y');
            //echo $experience;
            $score = $score + (5 * $experience);
//            echo "score: " . $score;
        }
        $get_user_answer_rating = mysqli_query($db_connection, "SELECT * FROM `data_ans_ratings` where ans_id = $row_answer[Ans_id]");
        while ($row_answer_rating = mysqli_fetch_array($get_user_answer_rating, MYSQLI_ASSOC)) {
            $get_user_exp = mysqli_query($db_connection, "select * from data_user where User_id = $row_answer_rating[user_id]");
            $row_exp = mysqli_fetch_array($get_user_exp, MYSQLI_ASSOC);

            $dateOfBirth = date('y-m-d', strtotime($row_exp['joining_dt']));
            $diff = date_diff(date_create($dateOfBirth), date_create(date("y-m-d")));
            $experience = $diff->format('%y');
//            echo '<br>ecperience::' . $experience;
            if ($row_answer_rating['ratings'] == 1) {
                if ($experience >= 4) {
                    $rate = 3;
                }
                if ($experience <= 3 && $experience >= 1) {
                    $rate = 2;
                }
                if ($experience == 0 || $experience == 1) {
                    $rate = 1;
                }
                $score = $score + $rate;
            }
            if ($row_answer_rating['ratings'] == 0) {
                if ($experience >= 4) {
                    $rate = 3;
                }
                if ($experience <= 3 && $experience >= 1) {
                    $rate = 2;
                }
                if ($experience == 0 && $experience == 1) {
                    $rate = 1;
                }
                $score = $score - $rate;
            }
//            echo "<br>RATE::" . $rate;
        }
    }
//    echo "<br>COUNT::" . $count;
//    echo "<br>SCORE::" . $score;
//    echo "<br>FINAL SCORE::" . $score / $count;
    
    if($score <= 0 && $count <= 0){
        return 0;
    } else {
        return round($score / $count);
    }
    
//    echo "<br>".$score / $count;
    
    
}
//
//$k = getScore('c8d57aab9331bda2c5aff4772b8fcb4a');
//
//echo '<br>key score :::'.$k;
