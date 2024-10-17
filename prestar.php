        <?php
        // Configura la zona horaria a Cancún, Quintana Roo, México
        date_default_timezone_set('America/Cancun');

        // Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "planos");

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Verifica si se recibió el id_plano
        if (isset($_GET['id_plano'])) {
            $id_plano = intval($_GET['id_plano']);

            // Consulta para obtener los detalles del plano
            $sql = "SELECT * FROM Planos_Residenciales WHERE id_planos = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_plano);
            $stmt->execute();
            $result = $stmt->get_result();
            $plano = $result->fetch_assoc();
            if (!$plano) {
                die("Plano no encontrado.");
            }
        } else {
            die("ID de plano no proporcionado.");
        }

        $cambio = ""; // Inicializa la variable cambio
        $compra_exitosa = false; // Variable para verificar si la compra fue exitosa

        // Si el formulario de compra es enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_usuario = $_POST['nombre_usuario'];
            $monto_pagado = floatval($_POST['monto_pagado']);
            $precio_plano = floatval($plano['precio']);
            $cambio = $monto_pagado - $precio_plano;
            $fecha_hora = date("Y-m-d H:i:s"); // Fecha y hora actual en tiempo de Cancún

            // Insertar en la tabla Historial_Compras
            $sql = "INSERT INTO Historial_Compras (nombre_usuario, tipo_plano, precio_plano, monto_pagado, cambio, fecha_hora) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssddds", $nombre_usuario, $plano['nombre'], $precio_plano, $monto_pagado, $cambio, $fecha_hora);

            if ($stmt->execute()) {
                $compra_exitosa = true; // Establecer a verdadero si la compra fue exitosa
            } else {
                echo "<div class='error'>Error al procesar la compra: " . $conn->error . "</div>";
            }
        }
        ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar Plano</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e8f1f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            color: #1d3557;
            font-size: 30px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        h2 {
            font-size: 24px;
            color: #457b9d;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        label {
            align-self: flex-start;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:disabled {
            background-color: #f0f0f0;
        }

        input:focus {
            outline: none;
            border-color: #1d3557;
            box-shadow: 0 0 8px rgba(29, 53, 87, 0.2);
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #1d3557;
            color: white;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        button:hover {
            background-color: #457b9d;
            transform: scale(1.05);
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            color: #457b9d;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .btn-back:hover {
            color: #1d3557;
        }

        .success {
            background-color: #dff7df;
            border: 1px solid #c3e6cb;
            color: #2f803b;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: left;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .success h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }

        .success .detalle-compra {
            margin-top: 15px;
            text-align: left;
        }

        .detalle {
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .detalle strong {
            color: #2f803b;
        }

        .detalle span {
            font-weight: normal;
        }

        .success hr {
            border: none;
            border-top: 1px solid #c3e6cb;
            margin: 15px 0;
        }
    </style>

    <script>
        function calcularCambio() {
            const montoPlano = parseFloat(document.getElementById("precio_plano").value.replace(/[$,]/g, ""));
            const montoPagado = parseFloat(document.getElementById("monto_pagado").value) || 0;
            const cambio = montoPagado - montoPlano;

            document.getElementById("cambio").value = cambio >= 0 ? '$' + cambio.toFixed(2) : 'Monto insuficiente';
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Pagar Plano</h1>

        <!-- Formulario de compra -->
        <form method="post">
            <h2>Detalles de la Compra</h2>

            <label for="tipo_plano">Nombre del Plano:</label>
            <input type="text" id="tipo_plano" value="<?php echo $plano['nombre']; ?>" disabled>

            <label for="precio_plano">Monto del Plano:</label>
            <input type="text" id="precio_plano" value="$<?php echo number_format($plano['precio'], 2); ?>" disabled>

            <label for="nombre_usuario">Nombre del Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>

            <label for="monto_pagado">Monto:</label>
            <input type="number" id="monto_pagado" name="monto_pagado" step="0.01" required oninput="calcularCambio()">

            <label for="cambio">Cambio:</label>
            <input type="text" id="cambio" disabled>

            <label for="fecha_hora">Fecha y Hora:</label>
            <input type="text" id="fecha_hora" value="<?php echo date('Y-m-d H:i:s'); ?>" disabled>

            <button type="submit">Finalizar Compra</button>
        </form>

        <a href="planos_residenciales.php" class="btn-back">Atrás</a>

        <?php if ($compra_exitosa): ?>
        <div class="success">
            <h2>Compra realizada con éxito</h2>
            <hr>
            <div class="detalle-compra">
                <div class="detalle">
                    <strong>Nombre del Plano:</strong> <span><?php echo $plano['nombre']; ?></span>
                </div>
                <div class="detalle">
                    <strong>Monto del Plano:</strong> <span>$<?php echo number_format($precio_plano, 2); ?></span>
                </div>
                <div class="detalle">
                    <strong>Nombre del Usuario:</strong> <span><?php echo $nombre_usuario; ?></span>
                </div>
                <div class="detalle">
                    <strong>Monto Pagado:</strong> <span>$<?php echo number_format($monto_pagado, 2); ?></span>
                </div>
                <div class="detalle">
                    <strong>Cambio:</strong> <span>$<?php echo number_format($cambio, 2); ?></span>
                </div>
                <div class="detalle">
                    <strong>Fecha y Hora:</strong> <span><?php echo $fecha_hora; ?></span>
                </div>
            </div>
            <hr>
            <p>¡Gracias por su compra!</p>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>
