<?php

// Definir la variable $jugadoresPorNombre
$jugadoresPorNombre = [];
$sqlJugadores = "SELECT id, nombre, posicion FROM Jugadores";
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
$sql = "SELECT p.id, p.fecha, p.goles_local AS resultado_local, p.goles_visitante AS resultado_visitante, e.color, GROUP_CONCAT(j.nombre SEPARATOR ', ') AS jugadores, p.jornada
        FROM Partidos p
        INNER JOIN Equipos e ON p.id_equipo_local = e.id OR p.id_equipo_visitante = e.id
        INNER JOIN Plantilla pl ON e.id = pl.id_equipo
        INNER JOIN Jugadores j ON pl.id_jugador = j.id
        GROUP BY p.id, e.color
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