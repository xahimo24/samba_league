<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM jugadores WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: conf-samba.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
