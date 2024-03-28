<?php 
//session_start();
//session_regenerate_user_user_id(true);
//change the information according to your database
$db_connection = mysqli_connect("localhost","root","","workflow");
//CHECK DATABASE CONNECTION
if(mysqli_connect_errno()){
    echo "Connection Failed".mysqli_connect_error();
    exit;
} 
function connection() {
     try {
        global $db_con, $users, $domain, $skill, $work;

        $db_con = mysqli_connect("localhost", "root", "", "workflow");
        //$this->dbh = $con;
        $users = "dt_user";

        $domain = "dt_domain_master";

        $skill = "dt_skill";

        $article = "data_article";

        $forum_master = "data_forum";
    } catch (mysqli_sql_exception $e) {
        alert("no problem we will fix issue");
    }
}
function closeconnection() {
    try {
        global $db_con;
        $db_con->close();
    } catch (exception $e) {
        alert("no problem we will fix issue");
    }
}
?>