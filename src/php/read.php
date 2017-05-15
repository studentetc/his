<?php

include_once 'parameters.php';
include_once 'db-connection.php';

$sql='SELECT id, first_name, last_name FROM patients';

$rs=$conn->query($sql);

if($rs === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
    //$rows_returned = $rs->num_rows;
    $data = $rs->fetch_all( MYSQLI_ASSOC );
    echo json_encode( $data );
}