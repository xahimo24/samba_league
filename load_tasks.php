<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM tasks");
$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}
echo json_encode($tasks);
?>