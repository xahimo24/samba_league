<?php   
        // Obtener datos de los jugadores y sus estadísticas
        $sql = "SELECT j.nombre, j.id, j.posicion, j.partidos_jugados, j.partidos_ganados, j.partidos_perdidos, j.goles, j.asistencias, j.paradas, j.stats_defensivas, j.win_rate, j.suma_puntos, j.overall,s.ritmo, s.disparo, s.pase, s.regate, s.defensa, s.fisico
        FROM jugadores j
        LEFT JOIN stat_jugador s ON j.id = s.id_jugador";
        $result    = $conn->query($sql);
        $jugadores = [];
        $jugadoresPorNombre = []; // Array para almacenar jugadores por nombre

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jugadores[] = $row;
                $jugadoresPorNombre[strtolower($row['nombre'])] = $row; // Almacenar por nombre en minúsculas
            }
        } else {
            echo "0 results";
        }
    ?>