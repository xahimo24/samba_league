<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'db_connection.php';

// Obtener datos del formulario
$fecha = $_POST['fecha'];
$jornada = $_POST['jornada'];
<<<<<<< HEAD
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
=======
$goles_local = $_POST['resultado_local'];
$goles_visitante = $_POST['resultado_visitante'];
$comentarios = $_POST['comentarios'];

// Insertar el partido en la tabla Partidos
$sql = "INSERT INTO Partidos (fecha, jornada, id_equipo_local, id_equipo_visitante, goles_local, goles_visitante, comentarios) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siiiiis", $fecha, $jornada, $id_equipo_local, $id_equipo_visitante, $goles_local, $goles_visitante, $comentarios);
$stmt->execute();
$partido_id = $stmt->insert_id;

// Insertar eventos relacionados con el partido
if (isset($_POST['events'])) {
    foreach ($_POST['events'] as $event) {
        $minuto = $event['minute'];
        $tipo_evento = $event['type'];
        $id_jugador_principal = $event['playerMain'];
        $id_jugador_secundario = $event['playerSecondary'];

        $sql = "INSERT INTO Eventos (id_partido, minuto, tipo_evento, id_jugador_principal, id_jugador_secundario) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisii", $partido_id, $minuto, $tipo_evento, $id_jugador_principal, $id_jugador_secundario);
        $stmt->execute();
>>>>>>> 3ba653384797bb1576332623c0df6878d0bd89c4
    }
}

// Actualizar estadísticas de los jugadores
if (isset($_POST['team_players'])) {
    foreach ($_POST['team_players'] as $player) {
        $id_jugador = $player['id'];
        $partidos_jugados = 1; // Incrementar partidos jugados
        $victorias = ($goles_local > $goles_visitante) ? 1 : 0;
        $derrotas = ($goles_local < $goles_visitante) ? 1 : 0;

        $sql = "UPDATE Estadisticas 
                SET partidos_jugados = partidos_jugados + 1, 
                    victorias = victorias + ?, 
                    derrotas = derrotas + ? 
                WHERE id_jugador = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $victorias, $derrotas, $id_jugador);
        $stmt->execute();
    }
}

$stmt->close();
$conn->close();
<<<<<<< HEAD
=======

header("Location: conf-samba.php");
exit();
>>>>>>> 3ba653384797bb1576332623c0df6878d0bd89c4
?>