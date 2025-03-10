<?php
include 'db_connection.php';

$fecha = $_POST['fecha'];
$jornada = $_POST['jornada'];
$resultado_local = $_POST['resultado_local'];
$resultado_visitante = $_POST['resultado_visitante'];
$estadio = $_POST['estadio'];
$tipo = $_POST['tipo'];
$teamPlayers = json_decode($_POST['teamPlayers'], true);
$events = json_decode($_POST['events'], true);

// Validar que no exista un partido con la misma fecha y jornada
$sql = "SELECT * FROM Partidos WHERE fecha = '$fecha' AND jornada = $jornada";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Error: Ya existe un partido con la misma fecha y jornada."]);
} else {
    // Insertar partido
    $sql = "INSERT INTO Partidos (fecha, jornada, goles_local, goles_visitante, estadio, tipo) 
            VALUES ('$fecha', $jornada, $resultado_local, $resultado_visitante, '$estadio', '$tipo')";
    if ($conn->query($sql) === TRUE) {
        $partido_id = $conn->insert_id;

        // Insertar equipos temporales
        foreach ($teamPlayers as $tp) {
            $sql = "INSERT INTO Plantilla (id_equipo, id_jugador) VALUES ({$tp['color']}, {$tp['playerId']})";
            $conn->query($sql);
        }

        // Insertar eventos del partido
        foreach ($events as $event) {
            $minute = $event['minute'] ? $event['minute'] : 'NULL';
            $sql = "INSERT INTO Eventos (id_partido, minuto, tipo_evento, id_jugador_principal, id_jugador_secundario) 
                    VALUES ($partido_id, $minute, {$event['type']}, {$event['playerMainId']}, {$event['playerSecondaryId']})";
            $conn->query($sql);
        }

        echo json_encode(["status" => "success", "message" => "Partido creado exitosamente."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>