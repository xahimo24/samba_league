<?php
include 'db_connection.php';

$partido_id = $_POST['partido_id'];
$fecha = $_POST['fecha'];
$jornada = $_POST['jornada'];
$resultado_local = $_POST['resultado_local'];
$resultado_visitante = $_POST['resultado_visitante'];
$teamPlayers = json_decode($_POST['teamPlayers'], true);
$events = json_decode($_POST['events'], true);

// Actualizar partido
$sql = "UPDATE partidos SET fecha='$fecha', jornada=$jornada, resultado_local=$resultado_local, resultado_visitante=$resultado_visitante WHERE id=$partido_id";
if ($conn->query($sql) === TRUE) {
    // Eliminar equipos temporales existentes
    $sql = "DELETE FROM equipos_temporales WHERE id_partido=$partido_id";
    $conn->query($sql);

    // Insertar nuevos equipos temporales
    foreach ($teamPlayers as $tp) {
        $sql = "INSERT INTO equipos_temporales (id_partido, color, id_jugador) VALUES ($partido_id, '{$tp['color']}', {$tp['player']})";
        $conn->query($sql);
    }

    // Eliminar eventos existentes
    $sql = "DELETE FROM eventos_partidos WHERE id_partido=$partido_id";
    $conn->query($sql);

    // Insertar nuevos eventos del partido
    foreach ($events as $event) {
        $sql = "INSERT INTO eventos_partidos (id_partido, minuto, tipo_evento, id_jugador_principal, id_jugador_secundario) VALUES ($partido_id, {$event['minute']}, '{$event['type']}', {$event['playerMain']}, {$event['playerSecondary']})";
        $conn->query($sql);
    }

    echo "Partido actualizado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: conf-samba.php");
exit();
?>
