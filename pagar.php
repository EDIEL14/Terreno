<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "planos");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el id del plano
$id_plano = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obtener detalles del plano seleccionado
$sql = "SELECT * FROM Planos_Comerciales WHERE id_plano = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_plano);
$stmt->execute();
$result = $stmt->get_result();
$plano = $result->fetch_assoc();

// Cierra la conexión
$stmt->close();
$conn->close();

// Establecer la zona horaria de tu ciudad natal (ejemplo: Ciudad de México)
date_default_timezone_set("America/Cancun"); 
$fecha_hora_actual = date("d/m/Y H:i:s");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar Plano</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        header {
            background: linear-gradient(135deg, #007BFF, #003E7E);
            color: #fff;
            padding: 40px 0;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 600;
            color: #007BFF;
        }
        .form-label {
            font-weight: 500;
            color: #444;
        }
        .form-control {
            border-radius: 12px;
            padding: 14px;
            font-size: 1.05rem;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007BFF;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        }
        .btn-primary {
            background: linear-gradient(135deg, #007BFF, #0056b3);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            transition: background 0.4s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003A80);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
        }
        .btn-back {
            text-decoration: none;
            color: #007BFF;
            margin-top: 15px;
            display: inline-block;
            transition: color 0.3s;
        }
        .btn-back:hover {
            color: #003E7E;
            text-decoration: underline;
        }
        p {
            font-size: 1.1rem;
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9rem;
            color: #777;
        }
        .font-weight-bold {
            font-weight: 600;
            color: #000;
        }
        .price {
            font-size: 1.8rem;
            color: #28a745;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pagar Plano</h1>
    </header>

    <div class="container">
        <h2>Detalles de la Compra</h2>
        <?php if ($plano): ?>
            <form action="procesar_compra.php" method="post">
                <p><strong>Nombre del Plano:</strong> <span class="font-weight-bold"><?php echo htmlspecialchars($plano['nombre']); ?></span></p>
                <p><strong>Precio:</strong> <span class="price"><?php echo "$" . number_format($plano['precio'], 2); ?></span></p>

                <input type="hidden" name="id_plano" value="<?php echo $plano['id_plano']; ?>">
                <input type="hidden" name="precio_plano" value="<?php echo $plano['precio']; ?>">

                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre del Usuario</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_usuario" placeholder="Ingresa tu Usuario" required>
                </div>

                <div class="mb-4">
                    <label for="monto_pago" class="form-label">Monto</label>
                    <input type="number" class="form-control" name="monto_pagado" step="0.01" placeholder="Ingresa el monto" required>
                </div>

                <div class="mb-4">
                    <label for="cambio" class="form-label">Cambio</label>
                    <input type="text" class="form-control" name="cambio" id="cambio" readonly>
                </div>

                <p><strong>Fecha y Hora:</strong> <span class="font-weight-bold"><?php echo $fecha_hora_actual; ?></span></p>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Completar compra</button>
                </div>
            </form>

            <a href="planos_comerciales.php" class="btn-back">Atrás</a>

        <?php else: ?>
            <p>No se encontró el plano solicitado.</p>
        <?php endif; ?>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Tu Empresa de Planos | Todos los derechos reservados.</p>
    </footer>

    <script>
        const montoPagoInput = document.querySelector('input[name="monto_pagado"]');
        const cambioInput = document.getElementById('cambio');
        const precioPlano = <?php echo json_encode($plano['precio']); ?>;

        montoPagoInput.addEventListener('input', function() {
            const montoPagado = parseFloat(this.value) || 0;
            cambioInput.value = (montoPagado - precioPlano).toFixed(2);
        });
    </script>
</body>
</html>
