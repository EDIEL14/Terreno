<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - ArchiPlan Store</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Fondo suave */
            color: #333; /* Color del texto */
        }

        /* Estilo para el encabezado */
        header {
            background: #35424a; /* Color oscuro */
            color: #ffffff; /* Texto blanco */
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra del encabezado */
        }

        header h1 {
            margin: 0; /* Sin margen */
        }

        nav {
            margin-top: 15px;
        }

        nav a {
            color: #ffffff; /* Texto blanco */
            margin: 0 15px; /* Espaciado entre enlaces */
            text-decoration: none; /* Sin subrayado */
            font-weight: bold; /* Negrita */
            transition: color 0.3s; /* Transición suave */
        }

        nav a:hover {
            color: #f4f4f4; /* Color más claro al pasar el mouse */
            text-decoration: underline; /* Subrayado al pasar el mouse */
        }

        /* Estilo para el contenido principal */
        main {
            padding: 20px;
            max-width: 800px; /* Ancho máximo */
            margin: 20px auto; /* Centrado en la página */
            background: #ffffff; /* Fondo blanco para el contenido */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        main h2 {
            color: #35424a; /* Color del título */
            margin-bottom: 20px; /* Espacio inferior */
            text-align: center; /* Centrar título */
        }

        main p {
            line-height: 1.6; /* Espaciado entre líneas */
            margin-bottom: 20px; /* Espacio inferior */
            font-size: 1.1rem; /* Tamaño de fuente ligeramente mayor */
            text-align: justify; /* Justificar texto */
        }

        /* Estilo para la imagen */
        .about-image {
            display: block;
            max-width: 100%; /* Adaptarse al ancho del contenedor */
            height: auto; /* Mantener proporciones */
            margin: 20px auto; /* Margen superior e inferior */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra suave */
        }

        /* Estilo para el pie de página */
        footer {
            text-align: center; /* Centrar texto */
            padding: 20px 0; /* Espaciado */
            background: #35424a; /* Color oscuro */
            color: #ffffff; /* Texto blanco */
            position: relative; /* Para control de posición */
            bottom: 0; /* Fijo en la parte inferior */
            width: 100%; /* Ancho completo */
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Sombra del pie de página */
        }
    </style>
</head>

<body>
    <header>
        <h1>Sobre ArchiPlan Store</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="plans.php">Planos Predeterminados</a>
            <a href="contact.php">Contacto</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Nuestra Historia</h2>
            <img src="https://th.bing.com/th/id/OIF.b6rbvk1zG9FBwAQQPqIsZg?w=222&h=200&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="ArchiPlan Store" class="about-image">
            <p>ArchiPlan Store fue fundada en 2024 con la misión de ofrecer soluciones arquitectónicas accesibles para todos. Nuestro catálogo cuenta con una amplia variedad de planos que se adaptan a todo tipo de proyectos.</p>
        </section>

        <section>
            <h2>Política de Compra</h2>
            <p>En ArchiPlan Store, queremos asegurarnos de que estés completamente satisfecho con tu compra. Todos nuestros planos son entregados en formato digital y no se realizan reembolsos una vez que el plano ha sido descargado. Por favor, asegúrate de verificar todos los detalles antes de finalizar tu compra.</p>
        </section>

        <section>
            <h2>Términos y Condiciones</h2>
            <p>Al utilizar ArchiPlan Store, aceptas nuestros términos y condiciones. Todos los derechos sobre los planos vendidos en nuestra tienda pertenecen a sus respectivos creadores. No está permitido revender ni distribuir los planos sin el consentimiento del autor. El incumplimiento de estas reglas puede llevar a la cancelación de tu cuenta.</p>
        </section>
    </main>

    <footer>
        <p>© 2024 ArchiPlan Store - Todos los derechos reservados</p>
    </footer>
</body>

</html>
