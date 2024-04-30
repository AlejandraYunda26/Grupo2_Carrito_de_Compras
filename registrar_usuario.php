<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $id_usuario = $_POST["id_usuario"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $municipio = $_POST["municipio"];
    $password = $_POST["password"];
    $confirmar_password = $_POST["confirmar_password"];
    $terminos = isset($_POST["terminos"]) ? "Aceptado" : "No aceptado";

    // Validar si las contraseñas coinciden
    if ($password !== $confirmar_password) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    // Validar otros campos si es necesario

    // Procesar la foto de perfil si se ha subido
    $foto_perfil = "";
    if ($_FILES["foto_perfil"]["error"] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES["foto_perfil"]["tmp_name"];
        $nombre_foto = $_FILES["foto_perfil"]["name"];
        $tamaño = $_FILES["foto_perfil"]["size"];
        $tipo = $_FILES["foto_perfil"]["type"];

        if ($tipo != "image/png") {
            echo "Solo se permiten imágenes en formato PNG.";
            exit();
        }

        if ($tamaño > 2000000) {
            echo "La imagen es demasiado grande. El tamaño máximo permitido es de 2MB.";
            exit();
        }

        $foto_perfil = "fotos_perfil/" . $nombre_foto;

        move_uploaded_file($nombre_temporal, $foto_perfil);
    }

    // Guardar los datos en la base de datos
    // Aquí deberías escribir el código para guardar los datos en la base de datos

    // Mostrar mensaje de éxito
    echo "¡Usuario registrado correctamente!";
}

