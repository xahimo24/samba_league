<?php
// get-events.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'db_connection.php';

$partido_id = $_GET['partido_id'];

$sql = "SELECT * FROM Eventos WHERE id_partido = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $partido_id);
$stmt->execute();
$result = $stmt->get_result();
$events = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($events);

$stmt->close();
$conn->close();
?>