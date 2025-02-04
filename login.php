<?php
    session_start();
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Consulta para obtener el usuario
        $sql  = "SELECT * FROM usuarios WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: conf-samba.php");
                exit();
            } else {
                // Contraseña incorrecta
                $error = "Nombre de usuario o contraseña incorrectos.";
            }
        } else {
            // Usuario no encontrado
            $error = "Nombre de usuario o contraseña incorrectos.";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="media/img/logo_sambaleague.ico">
    <link rel="stylesheet" href="media/css/style.css">
    <title>Samba League</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
         @font-face {
            font-family: 'Samba';
            src: url("media/fuentes/nightmichypersonaluseonly-gx6a3.otf");
        }
        .swal2-popup .swal2-styled.swal2-confirm {
            background-color: #3E6D1E;
            color: #fff;
            cursor: pointer;
        }

        .swal2-popup .swal2-styled.swal2-confirm:hover {
            background-color: #4CAF50;
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
                        <input type="text" id="username" name="username" required>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit">Login</button>
                    </form>
                    <?php if (isset($error)): ?>
                        <script>
                        Swal.fire({
                        title: 'Error',
                        text: '<?php echo $error; ?>',
                        icon: 'error',
                        confirmButtonClass: 'swal2-confirm-custom', // Aplica la clase personalizada
                        }).then(function() {
                            window.location.href = 'index.php'; // Redirigir a la página de login
                        });
                        </script>
                    <?php endif; ?>
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

<script src="media/js/script.js"></script>
</body>
</html>