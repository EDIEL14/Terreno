<?php
// Configurar la zona horaria para Cancún, Quintana Roo, México
date_default_timezone_set('America/Cancun');

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "planos");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha pasado el ID del plano
if (!isset($_GET['id'])) {
    die("ID de plano no válido.");
}

$id_plano = intval($_GET['id']);

// Consulta para obtener detalles del plano seleccionado
$sql = "SELECT * FROM Planos_Oficinas WHERE id_plano = $id_plano";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    die("Plano no encontrado.");
}

// Variables para el costo y tipo de plano
$nombre_plano = htmlspecialchars($row['nombre']);
$precio_plano = $row['precio'];

// Lógica para manejar la compra
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre_usuario = htmlspecialchars($_POST['nombre']);
    $tipo_plano = htmlspecialchars($_POST['tipo_plano']);
    $monto_pagado = floatval($_POST['monto_pagado']);
    $cambio = $monto_pagado - $precio_plano;

    // Guardar la compra en el historial
    $insert_sql = "INSERT INTO Historial_Compras (nombre_usuario, tipo_plano, precio_plano, monto_pagado, cambio, fecha_hora) 
                   VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ssddd", $nombre_usuario, $tipo_plano, $precio_plano, $monto_pagado, $cambio);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Compra realizada con éxito.</p>";
    } else {
        echo "<p class='error-message'>Error al guardar la compra: " . $conn->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Pagar Plano - <?php echo $nombre_plano; ?></title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f4f9;
            margin: 0;
            padding: 0;
            color: #444;
        }

        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            position: sticky;
            top: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .main-content {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .main-content:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        }

        h1, h2 {
            color: #2980b9;
            margin-bottom: 20px;
            font-size: 2.2rem;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        input[type="text"], input[type="number"] {
            width: calc(100% - 30px);
            padding: 14px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #2980b9;
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.5);
        }

        .cambio-container {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #27ae60;
        }

        button[type="submit"] {
            background-color: #27ae60;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 1.2rem;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
        }

        button[type="submit"]:hover {
            background-color: #219150;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #2980b9;
            color: #fff;
            padding: 12px;
            font-size: 1.1rem;
        }

        td {
            padding: 12px;
            text-align: center;
            font-size: 1rem;
            background-color: #f9f9f9;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: #fff;
            margin-top: 50px;
            font-size: 0.9rem;
        }

        .btn-back {
            background-color: #2980b9;
            color: #fff;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-back:hover {
            background-color: #1f6391;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .success-message, .error-message {
            margin-top: 20px;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .success-message {
            color: #27ae60;
        }

        .error-message {
            color: #e74c3c;
        }

        @media (max-width: 600px) {
            .main-content {
                padding: 15px;
            }

            h1, h2 {
                font-size: 1.8rem;
            }

            button[type="submit"], .btn-back {
                font-size: 1rem;
            }
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Pagar Plano</h1>
    </header>

    <div class="main-content">
        <h2>Detalles de Compra</h2>
        <label for="tipo_plano">Tipo de Plano:</label>
        <input type="text" id="tipo_plano" name="tipo_plano" value="<?php echo $nombre_plano; ?>" readonly>

        <p><strong>Precio:</strong> $<?php echo number_format($precio_plano, 2); ?></p>

        <form method="POST">
            <label for="nombre">Nombre del Usuario:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="monto_pagado">Monto a Pagar:</label>
            <input type="number" id="monto_pagado" name="monto_pagado" step="0.01" required>

            <div class="cambio-container">
                <p><strong>Cambio:</strong> <span id="cambio">0.00</span></p>
            </div>

            <p><strong>Fecha y Hora:</strong> <?php echo date('d-m-Y H:i:s'); ?></p>

            <button type="submit">Finalizar Compra</button>
        </form>

        <a href="planos_oficinas.php" class="btn-back">Atrás</a>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <h2>Resumen de la Compra</h2>
            <table>
                <tr>
                    <th>Nombre del Usuario</th>
                    <th>Monto Pagado</th>
                    <th>Precio del Plano</th>
                    <th>Cambio</th>
                    <th>Fecha y Hora de la compra</th>
                </tr>
                <tr>
                    <td><?php echo $nombre_usuario; ?></td>
                    <td>$<?php echo number_format($monto_pagado, 2); ?></td>
                    <td>$<?php echo number_format($precio_plano, 2); ?></td>
                    <td>$<?php echo number_format($cambio, 2); ?></td>
                    <td><?php echo date('d-m-Y H:i:s'); ?></td>
                </tr>
            </table>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Tu Empresa de Planos | Todos los derechos reservados.</p>
    </footer>

    <script>
        document.getElementById('monto_pagado').addEventListener('input', function() {
            const montoPagado = parseFloat(this.value) || 0;
            const precioPlano = parseFloat(<?php echo $precio_plano; ?>);
            const cambio = montoPagado - precioPlano;
            document.getElementById('cambio').innerText = cambio.toFixed(2);
        });
    </script>
</body>
</html>
