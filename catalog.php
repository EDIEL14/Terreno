<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Planos</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a tu archivo CSS -->
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef2f3; /* Color de fondo suave */
            color: #333;
            line-height: 1.6;
        }

        header {
            background: linear-gradient(to right, #4a90e2, #50b3ff); /* Gradiente de fondo */
            color: white;
            padding: 30px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra del encabezado */
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .planos-categorias {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007bff; /* Color del título */
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 15px 0; /* Espaciado entre elementos */
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff; /* Color del botón */
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transiciones suaves */
            font-size: 1.1rem; /* Tamaño de fuente */
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5); /* Sombra del botón */
            border: none;
            cursor: pointer;
            position: relative; /* Posición relativa para el efecto */
        }

        .cta-button:hover {
            background-color: #0056b3; /* Color en hover */
            transform: translateY(-3px); /* Efecto de elevación */
        }

        footer {
            background-color: #343a40; /* Fondo oscuro */
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px; /* Espacio superior para separar del contenido */
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1); /* Sombra superior */
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem; /* Ajuste del tamaño en pantallas pequeñas */
            }
            h2 {
                font-size: 1.5rem; /* Ajuste del tamaño en pantallas pequeñas */
            }
            .cta-button {
                padding: 12px 20px; /* Ajuste de padding en pantallas pequeñas */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Catálogo de Planos</h1>
    </header>

    <div class="planos-categorias">
        <h2>Seleccione que tipo de planos desea ver:</h2>
        <ul>
            <li><a href="planos_oficinas.php" class="cta-button">Planos de Oficinas</a></li>
            <li><a href="planos_comerciales.php" class="cta-button">Planos Comerciales</a></li>
            <li><a href="planos_residenciales.php" class="cta-button">Planos Residenciales</a></li>
        </ul>
    </div>

    <footer>
        <p>© 2024 ArchiPlan Store - Todos los derechos reservados</p>
    </footer>
</body>
</html>
