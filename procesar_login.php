<?php
session_start();
include 'db.php'; // Conectar a la base de datos

$action = $_POST['action']; // Saber si es login o registro

if ($action == 'login') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Comprobar si el usuario existe y la contraseña coincide
    $sql = "SELECT * FROM Usuarios WHERE usuario='$usuario' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El login es exitoso
        $_SESSION['usuario'] = $usuario; // Guardar el nombre de usuario en la sesión
        header("Location: index.php");
    } else {
        // Error en el login
        echo "Usuario o contraseña incorrectos.";
    }

} elseif ($action == 'register') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    // Insertar el nuevo usuario
    $sql = "INSERT INTO Usuarios (nombre, usuario, password, numero_telefono, correo_electronico) 
            VALUES ('$nombre', '$usuario', '$password', '$telefono', '$correo')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirigir al login
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
