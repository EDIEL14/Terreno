<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registro - ArchiPlan Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: url('https://example.com/tu-imagen-de-fondo.jpg') no-repeat center center fixed; /* Cambia esta URL por la de tu imagen */
            background-size: cover; /* Cubrir toda la pantalla */
            color: #333; /* Color del texto */
            font-family: 'Arial', sans-serif; /* Fuente general */
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco con opacidad */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Sombra más intensa */
            margin-top: 100px; /* Margen superior */
            max-width: 400px; /* Ancho máximo del formulario */
        }
        h2 {
            text-align: center; /* Centrar el título */
            color: #28a745; /* Color verde para el título */
            margin-bottom: 20px; /* Espaciado inferior */
        }
        .form-control {
            border-radius: 5px; /* Bordes redondeados */
            transition: border-color 0.3s; /* Transición suave para el borde */
        }
        .form-control:focus {
            border-color: #28a745; /* Color verde al enfocar */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Sombra verde */
        }
        .btn-login {
            background-color: #28a745; /* Color verde */
            color: white; /* Color del texto en el botón */
            transition: background-color 0.3s; /* Transición suave para el botón */
        }
        .btn-login:hover {
            background-color: #218838; /* Color más oscuro al pasar el ratón */
        }
        .footer {
            text-align: center; /* Centrando el texto del pie */
            margin-top: 20px; /* Margen superior */
        }
        .footer a {
            color: #28a745; /* Color verde para los enlaces */
            text-decoration: none; /* Sin subrayado */
        }
        .footer a:hover {
            text-decoration: underline; /* Subrayar al pasar el ratón */
        }
        .input-group-text {
            background-color: #e9ecef; /* Fondo del ícono */
            border: none; /* Sin borde */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-lock"></i> Iniciar Sesión</h2>
        <form action="procesar_login.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
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
            <button type="submit" class="btn btn-login btn-block">Iniciar Sesión</button>
        </form>

        <div class="footer">
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </div>
        
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
