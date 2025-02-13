<?php
    include 'db_connection.php';
    include 'consulta_partidos.php';
    include 'consulta_stats-jugadores.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="media/img/logo_sambaleague.ico">
    <link rel="stylesheet" href="media/css/style.css">
    <title>Samba League</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="media/js/script.js"></script>
    <style>
        @font-face {
            font-family: 'Samba';
            src: url("media/fuentes/nightmichypersonaluseonly-gx6a3.otf");
        }
    </style>
</head>
<body>
<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <a href="index.php" class="header-logo">
                <h1>SAMBA LEAGUE</h1>
            </a>
            <div class="main-menu">
                <ul>
                    <li><a href="#home" data-translate="home">Inicio</a></li>
                    <li><a href="#aboutus" data-translate="about_us">Sobre
                            Nosotros</a></li>
                    <li><a href="#players" data-translate="players">Jugadores</a></li>
                    <li><a href="#partidos" data-translate="partidos">Partidos</a></li>
                    <li><a href="https://harvcbd.com/index.html" data-translate="harvest" target="_blank">Harvest</a>
                    </li>
                </ul>
            </div>
            <button class="header-btn">Login</button>
            <!-- Ventana emergente (modal) para login -->
            <div id="loginModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Login</h2>
                    <form method="POST" action="login.php">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required /><br /><br />
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required /><br /><br />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="home" class="banner-section">
    <div class="container">
        <div class="banner">
            <img src="media/img/logo_sambaleague.png" alt="logo-samba">
            <div>
                <h5 id="banner-title"><span></span>Samba League</h5>
                <h2 id="banner-subtitle" data-translate="banner-title">Liga de Fútbol Oficial
                    patrocinada por
                    <a href="https://harvcbd.com/index.html" target="_blank">HARVEST</a>
                </h2>
            </div>
        </div>
    </div>
</section>
<section id="aboutus" class="aboutus-section">
    <div class="container">
        <div class="aboutus">
            <div class="aboutus-content">
                <p>
                    La Samba League nació como una iniciativa entre amigos apasionados por el fútbol y las buenas
                    vibras. Más que una competencia, somos una comunidad donde el deporte une, y el espíritu de amistad,
                    respeto y diversión se vive en cada partido.<br><br>
                    Inspirada en la alegría y el ritmo del samba, esta liga representa nuestra pasión por el juego y
                    nuestra conexión única como equipo de amigos. Cada encuentro no solo es una oportunidad para
                    competir, sino para compartir risas, historias y momentos que quedarán para siempre.<br><br>
                    Nos enorgullecemos de fomentar el juego limpio, el compañerismo y un ambiente inclusivo donde todos
                    se sientan bienvenidos. En la Samba League, cada gol, pase y jugada tiene un solo propósito:
                    disfrutar al máximo del fútbol y de la amistad.<br></br>
                    ¡Únete a la samba, siente el ritmo y vive la pasión por el fútbol con nosotros!
                </p>
                <button class="incorporate">Incorporarse</button>
                <button class="rules">Reglas</button>
            </div>
            <!-- Ventana emergente (modal) para incorporarse -->
            <div id="incorporateModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Incorporarse</h2>
                    <p>Para incorporarse a la liga hay varios factores en juego:</p><br>
                    <ul>
                        <li>Ser amigo de uno o varios integrantes de la liga</li>
                        <li>Asistir minimo a 3 partidos</li>
                        <li class="camiseta">Comprar la <a href="https://zentral.es/producto/harvest-team-2/" target="blank">camiseta oficial de la liga</a></li>
                    </ul>
                    <p class="info">Toda decision sera tomada por el Equipo Directivo de Samba League</p>
                </div>
            </div>
            <!-- Ventana emergente (modal) para reglas -->
            <div id="rulesModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Puntos</h2>
                        <p>Goles +2</p>
                        <p>Asistencias +1</p>
                        <p>Paradas +2</p>
                        <p>Partido Ganado +3</p>
                        <p>3 Mejores Defensas +2</p>
                        <p>Gol en Propia Puerta -1</p>
                    <h2>Overall</h2>
                        <p>50% Puntos</p>
                        <p>15% VP (Valoracion Personal)</p>
                        <p>35% VC (Valoracion de tus Compañeros)</p>
                    <h2>Observaciones</h2>
                        <ul>
                            <li>Si no se hace la VP tanto la VP como la VC serán un 0</li>
                            <li>Hay 24h para contestar a las votaciones</li>
                            <li>No hay tarjetas amarillas ni rojas</li>
                            <li>Los partidos hasta que no eres parte de la samba no cuentan las estadíticas</li>
                            <li>En el caso de que las VP sean muy elevadas y poco comprensibles se hará un cambio de ponderaciones</li>
                            <li>Pueden haber jornadas especiales donde las STATS cuenten diferente</li>
                            <li>En el caso de que haya boicot a la organización se asignará un OVERALL de -1</li>
                        </ul>
                </div>
            </div>

            <div class="aboutus-image">
                <img src="media/img/aboutus-img.jpg" alt="aboutus">
            </div>
        </div>
    </div>
</section>
<section id="players" class="players-section">
    <h2>Jugadores</h2>
    <div class="jugadores">
    <?php foreach ($jugadores as $index => $jugador): ?>
        <?php if ($jugador['ritmo'] !== null && $jugador['disparo'] !== null && $jugador['pase'] !== null && $jugador['regate'] !== null && $jugador['defensa'] !== null && $jugador['fisico'] !== null): ?>
            <div class="jugador" onclick="flipCard(this)">
                <div class="jugador-inner">
                    <div class="jugador-front">
                        <img src="media/img/<?php echo strtolower($jugador['nombre']); ?>-foto.jpg" alt="<?php echo $jugador['nombre']; ?>" 
                             onerror="this.onerror=null;this.src='media/img/nofoto.png';">
                    </div>
                    <div class="jugador-back">
                        <p>Estadísticas de <?php echo $jugador['nombre']; ?></p>
                        <ul>
                            <li>Partidos Jugados: <?php echo $jugador['partidos_jugados']; ?></li>
                            <li>Partidos Ganados: <?php echo $jugador['partidos_ganados']; ?></li>
                            <li>Partidos Perdidos: <?php echo $jugador['partidos_perdidos']; ?></li>
                            <li>Goles: <?php echo $jugador['goles']; ?></li>
                            <li>Asistencias: <?php echo $jugador['asistencias']; ?></li>
                            <li>Paradas: <?php echo $jugador['paradas']; ?></li>
                            <li>Stats Defensivas: <?php echo $jugador['stats_defensivas']; ?></li>
                            <li>Win Rate: <?php echo $jugador['win_rate']; ?></li>
                            <li>Suma de Puntos: <?php echo $jugador['suma_puntos']; ?></li>
                            <li>Overall: <?php echo $jugador['overall']; ?></li>
                        </ul>
                    </div>
                    <div class="jugador-back-2">
                        <p>Estadísticas físicas de <?php echo $jugador['nombre']; ?></p>
                        <div class="chart-container">
                            <canvas id="radarChart-<?php echo $index; ?>"></canvas>
                        </div>      
                    </div>      
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const ctx = document.getElementById('radarChart-<?php echo $index; ?>').getContext('2d');
                    new Chart(ctx, {
                        type: 'radar',
                        data: {
                            labels: ['Ritmo', 'Disparo', 'Pase', 'Regate', 'Defensa', 'Físico'],
                            datasets: [{
                                data: [
                                    <?php echo $jugador['ritmo']; ?>, 
                                    <?php echo $jugador['disparo']; ?>, 
                                    <?php echo $jugador['pase']; ?>, 
                                    <?php echo $jugador['regate']; ?>, 
                                    <?php echo $jugador['defensa']; ?>, 
                                    <?php echo $jugador['fisico']; ?>
                                ],
                                backgroundColor: 'rgba(95, 192, 16, 0.3)',
                                borderColor: 'black',
                                pointBackgroundColor: '#82BC6A',
                                pointBorderColor: 'black',
                                pointRadius: 5
                            }]
                        },
                        options: {
                            scales: {
                                r: {
                                    angleLines: { color: 'black' },
                                    grid: { color: 'black' },
                                    pointLabels: { color: 'black', font: { size: 14 } },
                                    suggestedMin: 0,
                                    suggestedMax: 100,
                                    ticks: { display: false }
                                }
                            },
                            plugins: {
                                legend: { display: false }
                            }
                        }
                    });
                });
            </script>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</section>
<section id="partidos" class="match-section">
    <h2>Partidos</h2>
    <div class="container">
        <div class="match-list">
            <?php
                if (! empty($partidos)) {
                    foreach ($partidos as $partidoId => $partidoData) {
                        $homeTeam = $partidoData[0];
                        $awayTeam = $partidoData[1];
                        echo "
    <div class='match-item'>
  <div class='match-teams'>
     <p><strong>Fecha:</strong> {$homeTeam['fecha']} | <strong>Jornada:</strong> {$homeTeam['jornada']}</p>
    <div class='team-container'>
      <img src='media/img/equipaciones/{$homeTeam['color']}.png' alt='{$homeTeam['color']}'>
      <h3 class='team-header' data-team='{$homeTeam['color']}'>{$homeTeam['color']}</h3>
      <h2 class='result-local'>{$homeTeam['resultado_l']}</h2>
      <p><strong>Jugadores:</strong> {$homeTeam['jugadores']}</p>
    </div>
    <span class='vs'>VS</span>
    <div class='team-container'>
      <img src='media/img/equipaciones/{$awayTeam['color']}.png' alt='{$awayTeam['color']}'>
      <h3 class='team-header' data-team='{$awayTeam['color']}'>{$awayTeam['color']}</h3>
      <h2 class='result-local'>{$awayTeam['resultado_v']}</h2>
      <p><strong>Jugadores:</strong> {$awayTeam['jugadores']}</p>
    </div>
  </div>
  <div class='lineup'>
  <div class='eventos'>
        <h2>Goles</h2>
        <ul>";
                        $sqlEventos = "SELECT e.minuto, e.tipo_evento, j.nombre AS jugador_principal, js.nombre AS jugador_secundario
                       FROM eventos_partidos e
                       LEFT JOIN jugadores j ON e.id_jugador_principal = j.id
                       LEFT JOIN jugadores js ON e.id_jugador_secundario = js.id
                       WHERE e.id_partido = {$partidoId}";
                        $resultEventos = $conn->query($sqlEventos);
                        if ($resultEventos->num_rows > 0) {
                            while ($evento = $resultEventos->fetch_assoc()) {
                                echo "<li><strong>Minuto {$evento['minuto']}:</strong> {$evento['tipo_evento']} - {$evento['jugador_principal']}";
                                if ($evento['jugador_secundario']) {
                                    echo " (Asistencia de {$evento['jugador_secundario']})";
                                }
                                echo "</li>";
                            }
                        } else {
                            echo "<li>No hay eventos disponibles.</li>";
                        }
                        echo "</ul>
    </div>
    <div class='lineup-local'>
        <ul class='player-list'>";
                        $homePlayers    = explode(',', $homeTeam['jugadores']);
                        $groupedPlayers = ['GK' => [], 'CB' => [], 'CM' => [], 'ST' => []];

                        foreach ($homePlayers as $jugador) {
                            $jugador = trim($jugador); // Trim the player name
                            if (isset($jugadoresPorNombre[strtolower($jugador)])) {
                                $jugadorData                 = $jugadoresPorNombre[strtolower($jugador)];
                                $position                    = $jugadorData['posicion'];
                                $groupedPlayers[$position][] = $jugadorData['nombre'];
                            } else {
                                $groupedPlayers['unknown'][] = $jugador;
                            }
                        }

                        // Renderizar jugadores por posición
                        foreach ($groupedPlayers as $position => $players) {
                            $playerCountClass = "player-count-" . count($players);
                            foreach ($players as $index => $jugador) {
                                $positionClass = strtolower($position);
                                echo "<li class='player {$positionClass} position-{$index} {$playerCountClass}'>{$jugador}</li>";
                            }
                        }
                        echo "</ul>
    </div>";
                        echo "<div class='lineup-visit'>
    <ul class='player-list'>";
                        $awayPlayers    = explode(',', $awayTeam['jugadores']);
                        $groupedPlayers = ['GK' => [], 'CB' => [], 'CM' => [], 'ST' => []];

                        foreach ($awayPlayers as $jugador) {
                            $jugador = trim($jugador); // Trim the player name
                            if (isset($jugadoresPorNombre[strtolower($jugador)])) {
                                $jugadorData                 = $jugadoresPorNombre[strtolower($jugador)];
                                $position                    = $jugadorData['posicion'];
                                $groupedPlayers[$position][] = $jugadorData['nombre'];
                            } else {
                                $groupedPlayers['unknown'][] = $jugador;
                            }
                        }

                        // Renderizar jugadores por posición
                        foreach ($groupedPlayers as $position => $players) {
                            $playerCountClass = "player-count-" . count($players);
                            foreach ($players as $index => $jugador) {
                                $positionClass = strtolower($position);
                                echo "<li class='player {$positionClass} position-{$index} {$playerCountClass}'>{$jugador}</li>";
                            }
                        }
                        echo "</ul>
    </div>
  </div>
</div>";
                    }
                } else {
                    echo "<p>No hay partidos disponibles.</p>";
                }
                $conn->close();
            ?>
        </div>
    </div>
</section>

<footer class="footer-section" style="background-image: url(media/img/footer-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-left">
                    <a href="index.html" class="footer-logo"><img src="media/img/logo_sambaleague.png" alt="logo"></a>
                    <p data-translate="banner_description_2">Liga de
                        Fútbol
                        Oficial patrocinada por <a href="https://harvcbd.com/index.html" target="_blank">HARVEST</a></p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="footer-menu">
                    <div class="footer-item">
                        <h3 data-translate="about_us">Sobre
                            Nosotros</h3>
                        <ul>
                            <li><a href="#home" data-translate="home">Inicio</a></li>
                            <li><a href="#aboutus" data-translate="about_us">Sobre
                                    Nosotros</a></li>
                            <li><a href="#players" data-translate="players">Jugadores</a></li>
                            <li><a href="#partidos" data-translate="partidos">Partidos</a></li>
                            <li><a href="#harvest" data-translate="harvest">Harvest</a></li>
                        </ul>
                    </div>
                    <div class="footer-item">
                        <h3 data-translate="contact-info">Información de
                            Contacto</h3>
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20"
                                fill="none">
                                <path
                                    d="M14.4167 2.9165H6.08341C3.58341 2.9165 1.91675 4.1665 1.91675 7.08317V12.9165C1.91675 15.8332 3.58341 17.0832 6.08341 17.0832H14.4167C16.9167 17.0832 18.5834 15.8332 18.5834 12.9165V7.08317C18.5834 4.1665 16.9167 2.9165 14.4167 2.9165ZM14.8084 7.9915L12.2001 10.0748C11.6501 10.5165 10.9501 10.7332 10.2501 10.7332C9.55008 10.7332 8.84175 10.5165 8.30008 10.0748L5.69175 7.9915C5.42508 7.77484 5.38341 7.37484 5.59175 7.10817C5.80841 6.8415 6.20008 6.7915 6.46675 7.00817L9.07508 9.0915C9.70841 9.59984 10.7834 9.59984 11.4167 9.0915L14.0251 7.00817C14.2917 6.7915 14.6917 6.83317 14.9001 7.10817C15.1167 7.37484 15.0751 7.77484 14.8084 7.9915Z"
                                    fill="black"></path>
                            </svg>
                            <a href="mailto:support@harvest.com">support@harvest.com</a>
                        </p>
                    </div>
                    <div class="footer-item">
                        <h3 data-translate="social-media">Redes
                            Sociales</h3>
                        <ul class="social-icon">
                            <li><a href="https://www.instagram.com/sambaleague_/" target="_blank"><img
                                        src="media/img/instagram-logo.svg" alt="icon"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <p class="Copyright" data-translate="copyright">Copyright ©
                    2024 Samba League. Todos los derechos
                    reservados.</p>
            </div>
        </div>

    </div>
</footer>
</body>

</html>