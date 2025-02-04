<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $partidos_jugados = $_POST['partidos_jugados'];
    $partidos_ganados = $_POST['partidos_ganados'];
    $partidos_perdidos = $_POST['partidos_perdidos'];
    $posicion = $_POST['posicion'];
    $goles = $_POST['goles'];
    $asistencias = $_POST['asistencias'];
    $paradas = $_POST['paradas'];
    $stats_defensivas = $_POST['stats_defensivas'];
    $dorsal = $_POST['dorsal'];
    $suma_puntos = 0;

    $win_rate = ($partidos_jugados > 0) ? round(($partidos_ganados / $partidos_jugados) * 100, 2) : 0.0;

    // Calculate suma_puntos
    $sql_suma_puntos = "SELECT SUM(overall) as total_overall FROM valoraciones WHERE id_jugador = (SELECT MAX(id) FROM jugadores)";
    $result = $conn->query($sql_suma_puntos);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $suma_puntos = $row['total_overall'];
    }

    // Calculate overall
    $overall = ($partidos_jugados > 0) ? round($suma_puntos / $partidos_jugados, 2) : 0.0;

    // Insert into jugadores table
    $sql = "INSERT INTO jugadores (nombre, partidos_jugados, partidos_ganados, partidos_perdidos, posicion, goles, asistencias, paradas, stats_defensivas, dorsal, win_rate, suma_puntos, overall) VALUES ('$nombre', '$partidos_jugados', '$partidos_ganados', '$partidos_perdidos', '$posicion', '$goles', '$asistencias', '$paradas', '$stats_defensivas', '$dorsal', '$win_rate', '$suma_puntos', '$overall')";

    if ($conn->query($sql) === TRUE) {
        $jugador_id = $conn->insert_id; // Get the last inserted ID

        // Insert into stat_jugador table
        $sql_stat = "INSERT INTO stat_jugador (jugador_id, ritmo, disparo, pase, regate, defensa, fisico) VALUES ('$jugador_id', NULL, NULL, NULL, NULL, NULL, NULL)";
        if ($conn->query($sql_stat) === TRUE) {
            header("Location: conf-samba.php");
        } else {
            echo "Error: " . $sql_stat . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
