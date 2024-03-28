<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './db_connection.php';

//$result = mysqli_query($db_connection, "SELECT sum(work_status='C') AS Completed, sum(work_status='P')AS Pending, sum(work_status='W')AS Working FROM dt_workpost WHERE domain_id = 10");
//echo $count; 
//while ($row = mysqli_fetch_assoc($result)) {
//    $result = ($db_connection,'SELECT dt_domain_master.domain_name, dt_workpost.workpost_status FROM dt_domain_master INNER JOIN dt_workpost ON dt_domain_master.domain_id=dt_workpost.domain_id');
//    echo $result;
//}
//echo $result;
    
$sql = "SELECT dt_domain_master.domain_name, dt_workpost.workpost_status FROM dt_domain_master INNER JOIN dt_workpost ON dt_domain_master.domain_id=dt_workpost.domain_id";
$result = $db_connection->query($sql);

//echo $result;

if ($result) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
//    echo " " . $row["domain_name"]. " " . $row["work_status"]. "<br>";
        echo $row;
  }
} else {
  echo "0 results";
}
$db_connection->close();

?>
