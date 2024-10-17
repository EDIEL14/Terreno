<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ya está logueado, redirigir si es así
if (isset($_SESSION['usuario'])) {
    header('Location: index.php'); // Redirigir a la página de inicio o perfil
    exit();
}

// Incluir archivo de conexión a la base de datos
include 'db.php'; // Asegúrate de tener un archivo de conexión a la base de datos

// Manejar el registro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $numero_telefono = $_POST['numero_telefono'];
    $correo_electronico = $_POST['correo_electronico'];

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO Usuarios (nombre, usuario, password, numero_telefono, correo_electronico) 
            VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $nombre, $usuario, $password, $numero_telefono, $correo_electronico);

        if ($stmt->execute()) {
            // Registro exitoso, redirigir a la página de inicio de sesión
            header('Location: login.php?registro=exitoso');
            exit();
        } else {
            echo "Error: " . $stmt->error; // Mostrar error
        }
    } else {
        echo "Error: " . $conn->error; // Mostrar error
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ArchiPlan Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f2f2f2, #e6e6e6);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
            max-width: 450px;
        }
        h2 {
            text-align: center;
            color: #28a745;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
        }
        .footer p {
            margin: 0;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        button.btn-success {
            background-color: #28a745;
            border: none;
        }
        button.btn-success:hover {
            background-color: #218838;
        }
        .input-group-text {
            background-color: #e9ecef;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    </div>
                    <input type="text" class="form-control" name="usuario" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="numero_telefono">Número de Teléfono:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="numero_telefono">
                </div>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="correo_electronico" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Registrar</button>
        </form>
        <div class="footer text-center">
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
