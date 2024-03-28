<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './include/prep.php';

$status = 'W';

$filterd_data1 = mysqli_query($db_connection, "SELECT work_title , range_id , fix_budget , work_duration FROM dt_workpost WHERE user_id = $id AND work_status = '$status' ORDER BY added_dt DESC;");
if (mysqli_num_rows($filterd_data1) > 0) {
    echo '1hi';
    $i = 1;
    while ($filterd_row1 = mysqli_fetch_assoc($filterd_data1)) {

        echo '2hi';
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $filterd_row1['work_title']; ?></td>
            <td> 
                <?php
                if ($filterd_row1['range_id'] != null) {
                    ?>
                    From -  To Rate
                    <?php
                } else if ($filterd_row1['fix_budget'] != 0) {
                    ?>

                    Fixed Budget

                    <?php
                }
                ?>    
            </td>
            <td>

                <?php
                if ($filterd_row1['range_id'] != null) {

                    $range_num = $filterd_row1['range_id'];

                    $qry_range = mysqli_query($db_connection, "SELECT * FROM `dt_price_range` WHERE range_id = $range_num");
                    while ($row_range = mysqli_fetch_assoc($qry_range)) {
                        ?>

                        <?php echo $row_range['from_rate']; ?>.00$ - <?php echo $row_range['to_rate']; ?>.00$

                        <?php
                    }
                } else if ($filterd_row1['fix_budget'] != 0) {
                    ?>

                    <?php echo $filterd_row1['fix_budget']; ?>.00$

                    <?php
                }
                ?>

            </td>
            <td><?php echo $filterd_row1['work_duration']; ?></td>
        </tr>


        <?php
        $i++;
    }
} else {
    ?>
    <script>swal("sorry! 😥", "You have no works in selected status", "error");</script>
    <?php
}

