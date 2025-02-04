<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $partidos_jugados = $_POST['partidos_jugados'];
    $partidos_ganados = $_POST['partidos_ganados'];
    $partidos_perdidos = $_POST['partidos_perdidos'];
    $posicion = $_POST['posicion'];
    $goles = $_POST['goles'];
    $asistencias = $_POST['asistencias'];
    $paradas = $_POST['paradas'];
    $stats_defensivas = $_POST['stats_defensivas'];

    // Actualizar la información del jugador
    $sql = "UPDATE jugadores SET nombre = ?, partidos_jugados = ?, partidos_ganados = ?, partidos_perdidos = ?, posicion = ?, goles = ?, asistencias = ?, paradas = ?, stats_defensivas = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiissiiii", $nombre, $partidos_jugados, $partidos_ganados, $partidos_perdidos, $posicion, $goles, $asistencias, $paradas, $stats_defensivas, $id);

    if ($stmt->execute()) {
        header("Location: conf-samba.php");
        exit();
    } else {
        echo "Error al actualizar la información del jugador.";
    }
}
?>