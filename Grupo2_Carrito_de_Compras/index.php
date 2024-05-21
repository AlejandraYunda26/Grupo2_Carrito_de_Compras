<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh; /* Asegura que el body cubra toda la pantalla */
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: #dfdcdc;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container {
            display: flex;
            align-items: center;
        }
        .logo {
            width: 200px;
            height: auto;
        }
        .options {
            display: flex;
            align-items: center;
        }
        .option {
            color: #181818;
            margin-right: 20px;
            cursor: pointer;
        }
        a[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .icons-container i {
            color: #181818;
            font-size: 24px; /* Ajusta el tamaño de los iconos */
            margin-left: 10px;
        }
        .main-content {
            text-align: center;
            margin: 20px;
            z-index: 2; /* Asegura que el contenido principal esté sobre la imagen de fondo */
        }
        .main-content a {
            margin: 10px;
            display: inline-block;
            color: #0056b3;
            text-decoration: none;
        }
        .main-content a:hover {
            text-decoration: underline;
        }
        .bottom-image-container {
            flex: 1;
            background: url('portada.png') no-repeat center center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .bottom-links {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    
<div class="header">
    <div class="options">
        <div class="option">Hombre</div>
        <div class="option">Mujer</div>
        <div class="option">Cosas</div>
    </div>
    <div class="logo-container">
        <img class="logo" src="Logo.png" alt="Logo">
    </div>
    <div class="icons-container">
        <i class="fas fa-user"></i>
        <i class="fas fa-search"></i>
        <i class="fas fa-shopping-cart"></i>
    </div>
</div>

<div class="main-content">
    <h2>Bienvenido</h2>
    <p>¡Bienvenido a nuestro sitio web!</p>
</div>

<div class="bottom-image-container">
    <div class="bottom-links">
        <a type="submit" href="registros.html">Registrarse</a>
        <a type="submit" href="seleccionar_usu.html">Gestionar Cuenta</a>
        <a type="submit" href="gestionar_usu.html">Carrito</a>
    </div>
</div>

</body>
</html>
