<?php
    session_start();
    if (! isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }
    include 'db_connection.php';

    // Obtener la información de los jugadores con estadísticas
    $sql = "SELECT j.id, j.nombre, j.posicion, j.dorsal,
               e.partidos_jugados, e.victorias, e.derrotas, e.goles, e.asistencias, e.paradas, e.defensa AS stats_defensivas,
               ROUND((e.victorias / NULLIF(e.partidos_jugados, 0)) * 100, 2) AS win_rate,
               e.puntos AS suma_puntos
        FROM Jugadores j
        LEFT JOIN Estadisticas e ON j.id = e.id_jugador"; // Unir con la tabla Estadisticas
    $result    = $conn->query($sql);
    $jugadores = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Calcular el overall si es necesario
            $partidos_jugados = $row['partidos_jugados'] ?? 0;
            $suma_puntos      = $row['suma_puntos'] ?? 0;
            $overall          = ($partidos_jugados > 0) ? round($suma_puntos / $partidos_jugados, 2) : 0.0;

            // Agregar el overall al array de datos del jugador
            $row['overall'] = $overall;

            // Almacenar los datos del jugador
            $jugadores[] = $row;
        }
    } else {
        echo "No se encontraron jugadores.";
    }

    // Obtener la información de los partidos
    $sql = "SELECT p.id, p.fecha, p.jornada,
               p.id_equipo_local,
               p.id_equipo_visitante,
               e1.color AS equipo_local,
               e2.color AS equipo_visitante,
               p.goles_local, p.goles_visitante, p.tipo, p.estadio
        FROM Partidos p
        INNER JOIN Equipos e1 ON p.id_equipo_local = e1.id
        INNER JOIN Equipos e2 ON p.id_equipo_visitante = e2.id";
    $result   = $conn->query($sql);
    $partidos = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Obtener jugadores del partido
            $sql_players = "SELECT j.id, j.nombre, e.color
                        FROM Jugadores j
                        INNER JOIN Plantilla pj ON j.id = pj.id_jugador
                        INNER JOIN Equipos e ON pj.id_equipo = e.id
                        WHERE pj.id_equipo = " . $row['id_equipo_local'] . " OR pj.id_equipo = " . $row['id_equipo_visitante'];
            $result_players = $conn->query($sql_players);
            $players        = [];
            if ($result_players->num_rows > 0) {
                while ($player = $result_players->fetch_assoc()) {
                    $players[] = $player;
                }
            }

            // Obtener eventos del partido
            $sql_events = "SELECT e.minuto, e.tipo_evento, e.id_jugador_principal, e.id_jugador_secundario,
                              jp.nombre AS jugador_principal, js.nombre AS jugador_secundario
                       FROM Eventos e
                       LEFT JOIN Jugadores jp ON e.id_jugador_principal = jp.id
                       LEFT JOIN Jugadores js ON e.id_jugador_secundario = js.id
                       WHERE e.id_partido = " . $row['id'];
            $result_events = $conn->query($sql_events);
            $events        = [];
            if ($result_events->num_rows > 0) {
                while ($event = $result_events->fetch_assoc()) {
                    $events[] = $event;
                }
            }

            $row['teamPlayers'] = $players;
            $row['events']      = $events;
            $partidos[]         = $row;
        }
    } else {
        echo "No se encontraron partidos.";
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Samba League</title>
    <link rel="stylesheet" href="media/css/conf.css">
    <link rel="icon" type="image/x-icon" href="media/img/logo_sambaleague.ico">
    <style>
        @font-face {
            font-family: 'Samba';
            src: url("media/fuentes/nightmichypersonaluseonly-gx6a3.otf");
        }
    </style>
</head>

<body>
    <header>
        <nav class="container">
            <div class="header-logo">
                <a href="index.php">
                    <h1>SAMBA LEAGUE</h1>
                </a>
            </div>
            <ul>
                <li><a href="#partidos">PARTIDOS</a></li>
                <li><a href="#jugadores">JUGADORES</a></li>
                <li><a href="#valoraciones">VALORACIONES</a></li>
                <li><a href="#pendientes">TAREAS PENDIENTES</a></li>
            </ul>
            <ul>
                <li><a href="conf-samba.php">Inicio</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <section class="introduction">
        <div class="container">
            <h1>Bienvenido Equipo Directivo</h1>
            <br>
            <h2>Esta es la página de configuración de Samba League.</h2>
        </div>
    </section>
    <section class="tareas" id="pendientes">
        <div class="container">
            <h2>Tareas Pendientes</h2>
            <form id="taskForm">
                <input type="text" id="newTask" placeholder="Nueva tarea" required>
                <button type="submit">Añadir Tarea</button>
            </form>
            <div class="task-columns">
                <div class="task-column">
                    <h3>Pendientes</h3>
                    <ul id="pendingTasks" class="taskList"></ul>
                </div>
                <div class="task-column">
                    <h3>En Proceso</h3>
                    <ul id="inProgressTasks" class="taskList"></ul>
                </div>
                <div class="task-column">
                    <h3>Realizado</h3>
                    <ul id="completedTasks" class="taskList"></ul>
                </div>
            </div>
        </div>
    </section>
    <section class="partidos" id="partidos">
        <div class="container">
            <h2>Partidos</h2>
            <button onclick="openCreateMatchModal()">Crear Partido</button>
            <button onclick="openEditMatchModal()">Editar Partido</button>
            <!-- Formulario para crear un nuevo partido -->
            <div id="createMatchModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeCreateMatchModal()">&times;</span>
                    <h2>Crear Partido</h2>
                    <form id="createMatchForm" method="POST" action="create-partido.php">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" required>
                        <label for="jornada">Jornada:</label>
                        <input type="number" id="jornada" name="jornada" required>
                        <label for="resultado_local">Resultado Local:</label>
                        <input type="number" id="resultado_local" name="resultado_local" required>
                        <br>
                        <label for="resultado_visitante">Resultado Visitante:</label>
                        <input type="number" id="resultado_visitante" name="resultado_visitante" required>
                        <label for="estadio">Estadio:</label>
                        <select id="estadio" name="estadio" required>
                            <option value="">Seleccione un Campo</option>
                            <option value="Fundacion Brafa">Brafa</option>
                            <option value="Highlands School">Highlands</option>
                            <option value="Colegio Thau">Thau</option>
                            <option value="GolaGol">GolaGol</option>
                            <option value="Futbol Sala Valldaura">Valldaura</option>
                            <option value="Clic Sports Scala Dei">Scala Dei</option>
                        </select>
                        <br>
                        <label for="tipo">Tipo de Partido:</label>
                        <select id="tipo" name="tipo" required>
                            <option value="">Selecciona Tipo</option>
                            <option value="partido-samba">Samba League</option>
                            <option value="amistoso">Amistoso</option>
                            <option value="liga">Liga</option>
                        </select>
                        <br>
                        <br>
                        <label for="team_color">Color del Equipo:</label>
                        <select id="team_color" name="team_color">
                            <option value="">Selecciona Color</option>
                            <option value="azul">Azul</option>
                            <option value="blanco">Blanco</option>
                            <option value="samba">Equipacion Samba</option>
                            <option value="rojo">Rojo</option>
                        </select>
                        <br>
                        <label for="team_player">Jugador del Equipo:</label>
                        <select id="team_player" name="team_player">
                            <option value="">Seleccionar Jugador</option>
                            <?php foreach ($jugadores as $jugador): ?>
                                <option value="<?php echo $jugador['id']; ?>"><?php echo $jugador['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <button type="button" onclick="addTeamPlayer()">Añadir Jugador</button>
                        <ul id="team_players_list"></ul>
                        <br>
                        <label for="event_minute">Minuto del Evento:</label>
                        <input type="number" id="event_minute" name="event_minute">
                        <br>
                        <label for="event_type">Tipo de Evento:</label>
                        <input type="text" id="event_type" name="event_type">
                        <br>
                        <label for="event_player_main">Jugador Principal:</label>
                        <select id="event_player_main" name="event_player_main">
                            <option value="">Seleccionar Jugador</option>
                        </select>
                        <br>
                        <label for="event_player_secondary">Jugador Secundario:</label>
                        <select id="event_player_secondary" name="event_player_secondary">
                            <option value="NULL">Nadie</option>
                        </select>
                        <br>
                        <button type="button" onclick="addEvent()">Añadir Evento</button>
                        <ul id="events_list"></ul>
                        <br>
                        <button type="submit">Crear Partido</button>
                    </form>
                </div>
            </div>
            <!-- Formulario para editar un partido existente -->
            <div id="editMatchModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeEditMatchModal()">&times;</span>
                    <h2>Editar Partido</h2>
                    <label for="select_jornada">Seleccionar Jornada:</label>
                    <select id="select_jornada" onchange="loadMatchData()">
                        <option value="">Seleccionar Jornada</option>
                            <?php foreach ($partidos as $partido): ?>
                        <option value="<?php echo $partido['id']; ?>">Jornada<?php echo $partido['jornada']; ?></option>
                            <?php endforeach; ?>
                    </select>
                    <form id="editMatchForm" method="POST" action="update-partido.php">
                        <input type="hidden" id="edit_partido_id" name="partido_id">
                        <label for="edit_fecha">Fecha:</label>
                        <input type="date" id="edit_fecha" name="fecha" required>
                        <label for="edit_jornada">Jornada:</label>
                        <input type="number" id="edit_jornada" name="jornada" disabled>
                        <label for="edit_resultado_local">Resultado Local:</label>
                        <input type="number" id="edit_resultado_local" name="resultado_local" required>
                        <label for="edit_resultado_visitante">Resultado Visitante:</label>
                        <input type="number" id="edit_resultado_visitante" name="resultado_visitante" required>
                        <h3>Jugadores:</h3>
                        <ul id="edit_team_players_list"></ul>
                        <button type="button" onclick="addTeamPlayer()">Añadir Jugador</button>
                        <h3>Eventos:</h3>
                        <ul id="edit_events_list"></ul>
                        <button type="button" onclick="addEvent()">Añadir Evento</button>
                        <button type="submit">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>       
    </section>
    <section class="valoraciones" id="valoraciones">
        <div class="container">
            <h2>Valoraciones</h2>
            <button onclick="openCreateRatingModal()">Crear Valoración</button>
            <table>
                <thead>
                    <tr>
                        <th>Jugador</th>
                        <th>Partido</th>
                        <th>Nota</th>
                        <th>Comentario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre Jugador</td>
                        <td>Partido</td>
                        <td>Nota</td>
                        <td>Comentario</td>
                        <td>
                            <button>Editar</button>
                            <button>Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section class="jugadores" id="jugadores">
        <div class="container">
            <h2>Jugadores</h2>
            <button onclick="openCreatePlayerModal()">Crear Jugador</button>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Partidos Jugados</th>
                        <th>Partidos Ganados</th>
                        <th>Partidos Perdidos</th>
                        <th>Posición</th>
                        <th>Goles</th>
                        <th>Asistencias</th>
                        <th>Paradas</th>
                        <th>Stats Defensivas</th>
                        <th>Dorsal</th>
                        <th>Win Rate</th>
                        <th>Suma Puntos</th>
                        <th>Overall</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jugadores as $jugador): ?>
                        <tr>
                            <td><?php echo $jugador['nombre']; ?></td>
                            <td><?php echo $jugador['partidos_jugados']; ?></td>
                            <td><?php echo $jugador['victorias']; ?></td>
                            <td><?php echo $jugador['derrotas']; ?></td>
                            <td><?php echo $jugador['posicion']; ?></td>
                            <td><?php echo $jugador['goles']; ?></td>
                            <td><?php echo $jugador['asistencias']; ?></td>
                            <td><?php echo $jugador['paradas']; ?></td>
                            <td><?php echo $jugador['stats_defensivas']; ?></td>
                            <td><?php echo $jugador['dorsal']; ?></td>
                            <td><?php echo $jugador['win_rate']; ?></td>
                            <td><?php echo $jugador['suma_puntos']; ?></td>
                            <td><?php echo $jugador['overall']; ?></td>
                            <td>
                                <button onclick="editPlayer(<?php echo $jugador['id']; ?>)">Editar</button>
                                <button onclick="deletePlayer(<?php echo $jugador['id']; ?>)">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Formulario para editar la información del jugador -->
    <div id="editPlayerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Editar Jugador</h2>
            <form id="editPlayerForm" method="POST" action="update-jugadores.php">
                <input type="hidden" id="playerId" name="id">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" disabled>
                <label for="partidos_jugados">Partidos Jugados:</label>
                <input type="number" id="partidos_jugados" name="partidos_jugados" required>
                <label for="partidos_ganados">Partidos Ganados:</label>
                <input type="number" id="partidos_ganados" name="partidos_ganados" required>
                <label for="partidos_perdidos">Partidos Perdidos:</label>
                <input type="number" id="partidos_perdidos" name="partidos_perdidos" required>
                <label for="posicion">Posición:</label>
                <select id="posicion" name="posicion">
                    <option value="">Selecciona una Posición</option>
                    <option value="ST">Delantero</option>
                    <option value="CM">Mediocentro</option>
                    <option value="CB">Defensa</option>
                    <option value="GK">Portero</option>
                </select>
                <label for="goles">Goles:</label>
                <input type="number" id="goles" name="goles" required>
                <label for="asistencias">Asistencias:</label>
                <input type="number" id="asistencias" name="asistencias" required>
                <label for="paradas">Paradas:</label>
                <input type="number" id="paradas" name="paradas" required>
                <label for="stats_defensivas">Stats Defensivas:</label>
                <input type="number" id="stats_defensivas" name="stats_defensivas" required>
                <label for="dorsal">Dorsal:</label>
                <input type="number" id="dorsal" name="dorsal" disabled>
                <div class="modal-navigation">
                    <button type="button" onclick="prevPlayer()">Anterior</button>
                    <button type="button" onclick="nextPlayer()">Siguiente</button>
                </div>
                <button type="submit">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <!-- Formulario para crear un nuevo jugador -->
    <div id="createPlayerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCreateModal()">&times;</span>
            <h2>Crear Jugador</h2>
            <form id="createPlayerForm" method="POST" action="create-jugador.php">
                <label for="nombre">Nombre:</label>
                <input type="text" id="create_nombre" name="nombre" required>
                <label for="partidos_jugados">Partidos Jugados:</label>
                <input type="number" id="create_partidos_jugados" name="partidos_jugados" required>
                <label for="partidos_ganados">Partidos Ganados:</label>
                <input type="number" id="create_partidos_ganados" name="partidos_ganados" required>
                <label for="partidos_perdidos">Partidos Perdidos:</label>
                <input type="number" id="create_partidos_perdidos" name="partidos_perdidos" required>
                <label for="posicion">Posición:</label>
                <select id="posicion" name="posicion">
                    <option value="ST">Delantero</option>
                    <option value="CM">Mediocentro</option>
                    <option value="CB">Defensa</option>
                    <option value="GK">Portero</option>
                </select>
                <label for="goles">Goles:</label>
                <input type="number" id="create_goles" name="goles" required>
                <label for="asistencias">Asistencias:</label>
                <input type="number" id="create_asistencias" name="asistencias" required>
                <label for="paradas">Paradas:</label>
                <input type="number" id="create_paradas" name="paradas" required>
                <label for="stats_defensivas">Stats Defensivas:</label>
                <input type="number" id="create_stats_defensivas" name="stats_defensivas" required>
                <label for="dorsal">Dorsal:</label>
                <input type="number" id="create_dorsal" name="dorsal" required>
                <button type="submit">Crear Jugador</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="media/js/matches_players.js"></script>
    <script src="media/js/tasks.js"></script>
    <script>
        const jugadores =                          <?php echo json_encode($jugadores); ?>;
        const partidos =                         <?php echo json_encode($partidos); ?>;
    </script>
</body>

</html>