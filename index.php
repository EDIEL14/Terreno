<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Planos Arquitectónicos</title>
    <link rel="stylesheet" href="styles.css"> <!-- Puedes enlazar tu archivo CSS aquí -->
    <style>
        /* Estilos para el diseño de la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #007bff; /* Color de fondo del encabezado */
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline; /* Efecto hover en los enlaces del menú */
        }

        .hero {
            background: url('hero-image.jpg') no-repeat center center/cover; /* Asegúrate de que la imagen exista */
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }

        .hero-content {
            background-color: rgba(0, 0, 0, 0.6); /* Fondo semitransparente */
            padding: 20px;
            border-radius: 8px;
        }

        .cta-button {
            background-color: #007BFF; /* Color de fondo */
            color: white; /* Color del texto */
            padding: 10px 20px; /* Espaciado interno */
            border-radius: 5px; /* Bordes redondeados */
            text-decoration: none; /* Sin subrayado */
            display: inline-block; /* Para que se comporte como un bloque */
        }

        .cta-button:hover {
            background-color: #0056b3; /* Color al pasar el mouse */
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .hero {
                height: 300px; /* Ajusta la altura en pantallas más pequeñas */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> a ArchiPlan Store</h1>
        <nav>
    <a href="index.php"><span class="symbol">🏡</span> Inicio</a>
    <a href="fav.php"><span class="symbol">🗺️</span> Favoritos</a>
    <a href="about.php"><span class="symbol">ℹ️</span> Sobre Nosotros</a>
    <a href="contact.php"><span class="symbol">📞</span> Contacto</a>
    <a href="logout.php"><span class="symbol">🚪</span> Cerrar Sesión</a>
        </nav>

    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Planos Arquitectónicos para Todo Tipo de Proyectos</h2>
                <p>Explora nuestra selección de planos arquitectónicos profesionales para proyectos residenciales, comerciales y más.</p>
                <a href="catalog.php" class="cta-button">👁️ Ver Planos</a>
            </div>
        </section>        
    </main>

    <footer>
        <p>© 2024 ArchiPlan Store - Todos los derechos reservados</p>
    </footer>
</body>
</html>
