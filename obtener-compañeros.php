<?php
// get-team-players.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'db_connection.php';

$partido_id = $_GET['partido_id'];

$sql = "SELECT j.id, j.nombre FROM Plantilla p 
        JOIN Jugadores j ON p.id_jugador = j.id 
        WHERE p.id_equipo IN (SELECT id_equipo_local FROM Partidos WHERE id = ? 
        UNION 
        SELECT id_equipo_visitante FROM Partidos WHERE id = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $partido_id, $partido_id);
$stmt->execute();
$result = $stmt->get_result();
$players = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($players);

$stmt->close();
$conn->close();
?>