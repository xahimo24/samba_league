<?php
include 'db_connection.php';
$data = json_decode(file_get_contents('php://input'), true);
$task = $data['task'];
$stmt = $conn->prepare("DELETE FROM tasks WHERE task = ?");
$stmt->bind_param('s', $task);
$stmt->execute();
?>