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

header("Location: conf-samba.php");
exit();
?>