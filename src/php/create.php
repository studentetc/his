<?php

include_once 'parameters.php';
include_once 'db-connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$sql="INSERT INTO
    patients (first_name, last_name)
    VALUES
    ('$first_name', '$last_name')";

if($conn->query($sql) === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
    $last_inserted_id = $conn->insert_id;
    $affected_rows = $conn->affected_rows;
}
