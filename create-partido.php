<?php
include 'db_connection.php';

$fecha = $_POST['fecha'];
$jornada = $_POST['jornada'];
$resultado_local = $_POST['resultado_local'];
$resultado_visitante = $_POST['resultado_visitante'];
$teamPlayers = json_decode($_POST['teamPlayers'], true);
$events = json_decode($_POST['events'], true);

// Insertar partido
$sql = "INSERT INTO partidos (fecha, jornada, resultado_local, resultado_visitante) VALUES ('$fecha', $jornada, $resultado_local, $resultado_visitante)";
if ($conn->query($sql) === TRUE) {
    $partido_id = $conn->insert_id;

    // Insertar equipos temporales
    foreach ($teamPlayers as $tp) {
        $sql = "INSERT INTO equipos_temporales (id_partido, color, id_jugador) VALUES ($partido_id, '{$tp['color']}', {$tp['player']})";
        $conn->query($sql);
    }

    // Insertar eventos del partido
    foreach ($events as $event) {
        $sql = "INSERT INTO eventos_partidos (id_partido, minuto, tipo_evento, id_jugador_principal, id_jugador_secundario) VALUES ($partido_id, {$event['minute']}, '{$event['type']}', {$event['playerMain']}, {$event['playerSecondary']})";
        $conn->query($sql);
    }

    echo "Partido creado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: conf-samba.php");
exit();
?>
