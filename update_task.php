<?php
include 'db_connection.php';
$data = json_decode(file_get_contents('php://input'), true);
$task = $data['task'];
$status = $data['status'];
$stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE task = ?");
$stmt->bind_param('ss', $status, $task);
$stmt->execute();
?>