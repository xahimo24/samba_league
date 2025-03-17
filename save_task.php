<?php
include 'db_connection.php';
$data = json_decode(file_get_contents('php://input'), true);
$task = $data['task'];
$status = $data['status'];
$stmt = $conn->prepare("INSERT INTO tasks (task, status) VALUES (?, ?)");
$stmt->bind_param('ss', $task, $status);
$stmt->execute();
?>