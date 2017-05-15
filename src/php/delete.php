<?php

include_once 'parameters.php';
include_once 'db-connection.php';

$id = $_GET['id'];

$sql="DELETE FROM patients WHERE id = $id";

if($conn->query($sql) === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
    $affected_rows = $conn->affected_rows;
}
