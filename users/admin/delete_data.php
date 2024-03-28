<?php

include 'db_connection.php';
connection();
//Delete domain data
$did = $_GET['domain_id'];

$domainsql = "delete from dt_domain_master where domain_id = $did";
if($db_con->query($domainsql)==TRUE){
    //echo "deleted";
    header( "Location: domain.php");
}
 else {
    
    echo "<script>alert('data not deleted')</script>";
 }
 
?>

