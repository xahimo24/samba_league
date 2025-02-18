<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $dorsal = $_POST['dorsal'];
    $posicion = $_POST['posicion'];
    $ritmo = $_POST['ritmo'];
    $disparo = $_POST['disparo'];
    $pase = $_POST['pase'];
    $regate = $_POST['regate'];
    $defensa = $_POST['defensa'];
    $fisico = $_POST['fisico'];
    $partidos_jugados = $_POST['partidos_jugados'];
    $partidos_ganados = $_POST['partidos_ganados'];
    $partidos_perdidos = $_POST['partidos_perdidos'];
    $goles = $_POST['goles'];
    $asistencias = $_POST['asistencias'];
    $paradas = $_POST['paradas'];
    $stats_defensivas = $_POST['stats_defensivas'];

    // Actualizar la información del jugador en la tabla Jugadores
    $sql = "UPDATE Jugadores SET nombre = ?, dorsal = ?, posicion = ?, ritmo = ?, disparo = ?, pase = ?, regate = ?, defensa = ?, fisico = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiiiiii", $nombre, $dorsal, $posicion, $ritmo, $disparo, $pase, $regate, $defensa, $fisico, $id);

    if ($stmt->execute()) {
        // Actualizar las estadísticas del jugador en la tabla Estadisticas
        $sql = "UPDATE Estadisticas SET partidos_jugados = ?, victorias = ?, derrotas = ?, goles = ?, asistencias = ?, paradas = ?, defensa = ? WHERE id_jugador = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiiiiii", $partidos_jugados, $partidos_ganados, $partidos_perdidos, $goles, $asistencias, $paradas, $stats_defensivas, $id);

        if ($stmt->execute()) {
            header("Location: conf-samba.php");
            exit();
        } else {
            echo "Error al actualizar las estadísticas del jugador.";
        }
    } else {
        echo "Error al actualizar la información del jugador.";
    }
}
?>