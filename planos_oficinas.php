<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "planos");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los planos de oficinas
$sql = "SELECT * FROM Planos_Oficinas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Planos de Oficinas</title>
    <style>
        /* Estilos previos */
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
            letter-spacing: 1px;
            text-align: center; 
        }

        /* Barra lateral */
        .sidebar {
            width: 280px;
            background: #343a40;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 60px; 
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar a {
            padding: 20px 20px;
            text-decoration: none;
            color: #fff;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #007BFF;
        }

        .sidebar h2 {
            color: #ffc107; 
            text-align: center;
            margin-bottom: 30px;
        }

        /* Contenedor principal */
        .main-content {
            margin-left: 280px; 
            padding: 20px;
        }

        h2 {
            margin-top: 20px;
            color: #007BFF;
            text-align: center;
            font-size: 2rem;
        }

        .plano {
            background: #f1f3f5;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.3s;
            position: relative;
        }

        .plano:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .plano h2 {
            font-size: 1.8rem;
            color: #333;
        }

        button {
            background-color: #007BFF;
            border: none;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        button:hover {
            background-color: #0056b3;
        }

        .details {
            display: none;
            margin-top: 15px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px 0;
            background-color: #007BFF;
            color: #fff;
        }

        @media (max-width: 768px) {
            .plano {
                padding: 15px;
            }

            button {
                width: 100%;
                padding: 10px;
            }

            .sidebar {
                position: relative;
                height: auto;
                width: 200%;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Estilo para el símbolo */
        .symbol {
            display: inline-block;
            margin-right: 5px;
            font-size: 20px; 
            vertical-align: middle;
        }
    </style>
    
    <script>
        function toggleDetails(id) {
            const details = document.getElementById(id);
            details.style.display = details.style.display === "none" ? "block" : "none"; // Toggle
        }
    </script>
</head>
<body>
    <header>
        <h1>🏢 Planos para Oficinas</h1>
    </header>

    <div class="sidebar">

        <h2>Ir al Inicio</h2>
        <a href="index.php">
            <span class="symbol">🏡</span> Inicio
        </a>

        <h2>Ver otros planos</h2>
        <a href="planos_residenciales.php">
            <span class="symbol">🏠</span> Planos Residenciales
        </a>

        <a href="planos_comerciales.php">
            <span class="symbol">🏪</span> Planos Comerciales
        </a>

        <h2>Contacto</h2>
        <a href="contact.php">
            <span class="symbol">📞</span> Contacto
        </a>
    </div>

    <div class="main-content">
        <div class="container">
            <h2>Lista de Planos de Oficinas</h2>
            <p style="text-align: center; font-size: 1.1rem;">Aquí encontrarás una selección de nuestros planos de oficinas.</p>

            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="plano">
                        <h2><?php echo htmlspecialchars($row['nombre']); ?></h2>
                        <button onclick="toggleDetails('details-<?php echo $row['id_plano']; ?>')">Ver detalles</button>
                        <div id="details-<?php echo $row['id_plano']; ?>" class="details">
                            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <p><strong>Medidas:</strong> <?php echo htmlspecialchars($row['medidas']); ?></p>
                            <p><strong>Precio:</strong> <?php echo "$" . number_format($row['precio'], 2); ?></p>
                        </div>

                        <!-- Botón de compra fuera del contenedor de detalles -->
                        <button onclick="window.location.href='comprar.php?id=<?php echo $row['id_plano']; ?>'">Comprar</button>

                        <!-- Botón Añadir a Favoritos -->
                        <button onclick="window.location.href='fav.php?add_fav=<?php echo $row['id_plano']; ?>'">Añadir a Favoritos</button>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="text-align: center; font-size: 1.1rem;">No hay planos de oficinas disponibles.</p>
            <?php endif; ?>

            <?php $conn->close(); ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Tu Empresa de Planos | Todos los derechos reservados.</p>
    </footer>
</body>
</html>
