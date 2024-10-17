<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - ArchiPlan Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9; /* Fondo claro */
            color: #444; /* Color del texto */
        }

        /* Estilo para el encabezado */
        header {
            background-color: #2c3e50; /* Color oscuro elegante */
            color: #ecf0f1; /* Texto claro */
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        nav a {
            color: #ecf0f1;
            margin: 0 15px;
            font-size: 1.1rem;
            text-decoration: none;
            font-weight: 600;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Estilo para el pie de página */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px 0;
            text-align: center;
            font-size: 0.9rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para la información de contacto */
        .contact-info {
            margin-top: 30px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .contact-info a {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2980b9; /* Botón azul */
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 10px 0;
            text-decoration: none;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 250px;
        }

        .contact-info a:hover {
            background-color: #3498db; /* Azul más claro al pasar el mouse */
        }

        .contact-info img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .hours {
            font-size: 1.1rem;
            color: #2c3e50;
        }

        .location {
            margin-top: 30px;
            font-size: 1.1rem;
            text-align: center;
            font-weight: bold;
        }

        .location p {
            margin: 0;
        }

        .location span {
            color: #16a085; /* Verde elegante */
        }

        /* Estilo de botones */
        .btn-contact {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Contacto</h1>
        <nav class="mt-3">
            <a href="index.php">Inicio</a>
            <a href="plans.php">Planos Predeterminados</a>
            <a href="about.php">Sobre Nosotros</a>
        </nav>
    </header>

    <main class="container my-4">
        <section>
            <h2 class="text-center">Ponte en Contacto con Nosotros</h2>

            <div class="contact-info">
                <a href="https://api.whatsapp.com/send?phone=9982140280" target="_blank">
                    <img src="https://logodownload.org/wp-content/uploads/2015/04/whatsapp-logo-1.png" alt="WhatsApp">
                    <span>Contáctanos mediante WhatsApp</span>
                </a>
                <a href="mailto:ediellozano733@gmail.com">
                    <img src="https://png.pngtree.com/png-clipart/20220704/original/pngtree-mail-vector-icon-email-address-png-image_8299408.png" alt="Email">
                    <span>Correo Electrónico</span>
                </a>
            </div>

            <div class="text-center">
                <button class="btn btn-primary btn-contact">Llámanos: +52 998-214-0280</button>
            </div>

            <div class="hours text-center my-3">
                HORARIO DE ATENCIÓN: Lunes a Viernes de 8:00 AM a 4:00 PM
            </div>

            <div class="location">
                <p>ArchiPlan Store</p>
                <p><span>Cancún, Quintana Roo, MX</span></p>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 ArchiPlan Store - Todos los derechos reservados</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
