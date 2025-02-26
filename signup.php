<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el nombre y el correo coinciden con un jugador existente
    $stmt = $conn->prepare("SELECT id FROM Jugadores WHERE nombre = ? AND email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Encriptar la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $hashed_password, $email);

        if ($stmt->execute()) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "El nombre o el correo no coinciden con ningún jugador existente.";
    }

    $stmt->close();
    $conn->close();
}
?>