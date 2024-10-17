<?php
$servername = "localhost";
$username = "root"; // Tu usuario de MySQL
$password = ""; // Tu contraseña de MySQL
$dbname = "planos"; // Cambia esto si es necesario

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
