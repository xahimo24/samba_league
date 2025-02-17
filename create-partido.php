<?php
include 'db_connection.php';

$fecha = $_POST['fecha'];
$jornada = $_POST['jornada'];
$resultado_local = $_POST['resultado_local'];
$resultado_visitante = $_POST['resultado_visitante'];
$teamPlayers = json_decode($_POST['teamPlayers'], true);
$events = json_decode($_POST['events'], true);
$id_equipo_local = $_POST['id_equipo_local'];
$id_equipo_visitante = $_POST['id_equipo_visitante'];

// Validar que no exista un partido con la misma fecha y jornada
$sql = "SELECT * FROM Partidos WHERE fecha = '$fecha' AND jornada = $jornada";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Error: Ya existe un partido con la misma fecha y jornada."]);
} else {
    // Insertar partido
    $sql = "INSERT INTO Partidos (fecha, jornada, id_equipo_local, id_equipo_visitante, goles_local, goles_visitante) 
            VALUES ('$fecha', $jornada, $id_equipo_local, $id_equipo_visitante, $resultado_local, $resultado_visitante)";
    if ($conn->query($sql) === TRUE) {
        $partido_id = $conn->insert_id;

        // Insertar equipos temporales
        foreach ($teamPlayers as $tp) {
            $sql = "INSERT INTO equipos_temporales (id_partido, color, id_jugador) VALUES ($partido_id, '{$tp['color']}', {$tp['player']})";
            $conn->query($sql);
        }

        // Insertar eventos del partido
        foreach ($events as $event) {
            $sql = "INSERT INTO eventos_partidos (id_partido, minuto, tipo_evento, id_jugador_principal, id_jugador_secundario) 
                    VALUES ($partido_id, {$event['minute']}, '{$event['type']}', {$event['playerMain']}, {$event['playerSecondary']})";
            $conn->query($sql);
        }

        echo json_encode(["status" => "success", "message" => "Partido creado exitosamente."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>