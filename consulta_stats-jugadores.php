<?php
// Obtener datos de los jugadores y sus estadísticas
$sql = "SELECT j.nombre, j.id, j.posicion, 
               e.partidos_jugados, e.victorias AS partidos_ganados, e.derrotas AS partidos_perdidos, 
               e.goles, e.asistencias, e.paradas, e.defensa AS stats_defensivas, 
               ROUND((e.victorias / e.partidos_jugados) * 100, 2) AS win_rate, 
               e.puntos AS suma_puntos, 
               j.ritmo, j.disparo, j.pase, j.regate, j.defensa, j.fisico
        FROM Jugadores j
        LEFT JOIN Estadisticas e ON j.id = e.id_jugador";
$result = $conn->query($sql);
$jugadores = [];
$jugadoresPorNombre = []; // Array para almacenar jugadores por nombre

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calcular el overall
        $partidos_jugados = $row['partidos_jugados'];
        $suma_puntos = $row['suma_puntos'];
        $overall = ($partidos_jugados > 0) ? round($suma_puntos / $partidos_jugados, 2) : 0.0;

        // Agregar el overall al array de datos del jugador
        $row['overall'] = $overall;

        // Almacenar los datos del jugador
        $jugadores[] = $row;
        $jugadoresPorNombre[strtolower($row['nombre'])] = $row; // Almacenar por nombre en minúsculas
    }
} else {
    echo "0 results";
}
?>