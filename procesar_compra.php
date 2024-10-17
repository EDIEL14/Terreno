<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "planos");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_plano = intval($_POST['id_plano']);
    $monto_pagado = floatval($_POST['monto_pagado']);
    $precio_plano = floatval($_POST['precio_plano']);
    $cambio = floatval($_POST['cambio']);
    $fecha_hora = date("Y-m-d H:i:s"); // Fecha y hora en UTC

    // Inserta la compra en la tabla Historial_Compras
    $sql = "INSERT INTO Historial_Compras (nombre_usuario, tipo_plano, precio_plano, monto_pagado, cambio, fecha_hora) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Se asume que el nombre de usuario será proporcionado más adelante (
    $nombre_usuario = $_POST['nombre_usuario']; // Usar el nombre de usuario del formulario
    
    // Obteniendo el nombre del plano
    $sql_plano = "SELECT nombre FROM Planos_Comerciales WHERE id_plano = ?";
    $stmt_plano = $conn->prepare($sql_plano);
    $stmt_plano->bind_param("i", $id_plano);
    $stmt_plano->execute();
    $resultado_plano = $stmt_plano->get_result();
    $plano = $resultado_plano->fetch_assoc();
    $tipo_plano = $plano['nombre'];

    $stmt->bind_param("ssdddd", $nombre_usuario, $tipo_plano, $precio_plano, $monto_pagado, $cambio, $fecha_hora);

    if ($stmt->execute()) {
        $mensaje = "Compra realizada con éxito.";
        // Mostrar detalles de la compra
        $detalles = "<h2>Detalles de la Compra</h2>
            <p><strong>Nombre del Usuario:</strong> " . htmlspecialchars($nombre_usuario) . "</p>
            <p><strong>Nombre del Plano:</strong> " . htmlspecialchars($tipo_plano) . "</p>
            <p><strong>Precio del Plano:</strong> $" . number_format($precio_plano, 2) . "</p>
            <p><strong>Monto Pagado:</strong> $" . number_format($monto_pagado, 2) . "</p>
            <p><strong>Cambio:</strong> $" . number_format($cambio, 2) . "</p>";
        
        // Cambia la zona horaria a tu ciudad natal (ejemplo: "America/Mexico_City")
        date_default_timezone_set('America/Cancun');
        $fecha_hora_real = date("Y-m-d H:i:s");
        $detalles .= "<p><strong>Fecha y Hora:</strong> " . $fecha_hora_real . "</p>";
        
    } else {
        $mensaje = "Error al procesar la compra: " . $stmt->error;
        $detalles = "";
    }

    $stmt->close();
    $stmt_plano->close();
}

// Cierra la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Compra</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        p {
            font-size: 1.2rem;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Detalles de Compra</h1>
    </header>

    <div class="container">
        <h2><?php echo isset($mensaje) ? $mensaje : "Error"; ?></h2>
        <?php echo isset($detalles) ? $detalles : ""; ?>
    </div>

    <footer>
        <p>&copy; 2024 Tu Empresa de Planos | Todos los derechos reservados.</p>
    </footer>
</body>
</html>
