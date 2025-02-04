<?php

// Definir la variable $jugadoresPorNombre
$jugadoresPorNombre = [];
$sqlJugadores = "SELECT id, nombre, posicion FROM jugadores";
$resultJugadores = $conn->query($sqlJugadores);
if ($resultJugadores->num_rows > 0) {
    while ($jugador = $resultJugadores->fetch_assoc()) {
        $jugadoresPorNombre[strtolower($jugador['nombre'])] = [
            'id' => $jugador['id'],
            'nombre' => $jugador['nombre'],
            'posicion' => $jugador['posicion']
        ];
    }
}

// Consulta para obtener los partidos
$sql = "SELECT p.id, p.fecha, p.resultado_local, p.resultado_visitante, et.color, GROUP_CONCAT(j.nombre SEPARATOR ', ') AS jugadores, p.jornada
        FROM partidos p
        INNER JOIN equipos_temporales et ON p.id = et.id_partido
        INNER JOIN jugadores j ON et.id_jugador = j.id
        GROUP BY p.id, et.color
        ORDER BY p.fecha DESC";

$result = $conn->query($sql);

$partidos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jugadores = explode(',', $row['jugadores']);
        usort($jugadores, function($a, $b) use ($jugadoresPorNombre) {
            $positions = ['GK' => 1, 'CB' => 2, 'CM' => 3, 'ST' => 4];
            $posA = isset($jugadoresPorNombre[strtolower(trim($a))]) ? $positions[$jugadoresPorNombre[strtolower(trim($a))]['posicion']] ?? 99 : 99;
            $posB = isset($jugadoresPorNombre[strtolower(trim($b))]) ? $positions[$jugadoresPorNombre[strtolower(trim($b))]['posicion']] ?? 99 : 99;
            return $posA - $posB;
        });
        $row['jugadores'] = implode(',', $jugadores);

        $partidos[$row['id']][] = [
            'fecha'       => date("d/m/Y", strtotime($row['fecha'])),
            'resultado_l' => $row['resultado_local'],
            'resultado_v' => $row['resultado_visitante'],
            'color'       => $row['color'],
            'jugadores'   => $row['jugadores'],
            'jornada'     => $row['jornada'],
        ];
    }
}
?>