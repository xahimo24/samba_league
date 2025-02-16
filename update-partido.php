<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'db_connection.php';

// Obtener datos del formulario
$partido_id = $_POST['partido_id'];
$fecha = $_POST['fecha'];
$jornada = $_POST['jornada'];
$goles_local = $_POST['resultado_local'];
$goles_visitante = $_POST['resultado_visitante'];
$comentarios = $_POST['comentarios'];

// Actualizar el partido en la tabla Partidos
$sql = "UPDATE Partidos 
        SET fecha = ?, jornada = ?, goles_local = ?, goles_visitante = ?, comentarios = ? 
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siiisi", $fecha, $jornada, $goles_local, $goles_visitante, $comentarios, $partido_id);
$stmt->execute();

// Eliminar eventos antiguos del partido
$sql = "DELETE FROM Eventos WHERE id_partido = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $partido_id);
$stmt->execute();

// Insertar nuevos eventos relacionados con el partido
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