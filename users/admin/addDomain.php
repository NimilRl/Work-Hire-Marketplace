<?php
include 'db_connection.php';
connection();
$dname = $_POST['Domain_Name'];
$add_domainsql = "insert into dt_domain_master(domain_name) values('$dname')";
// echo $add_domainsql;
if($db_con->query($add_domainsql)==TRUE){
    //echo "deleted";
    header( "Location: domain.php");
}
 else {
    
    echo "<script>alert('data not inserted')</script>";
 }
?>
