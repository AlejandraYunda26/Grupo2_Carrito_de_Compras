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
    $terminos = isset($_POST["tyc"]) ? "Aceptado" : "No aceptado";

    // Validar si las contraseñas coinciden
    if ($password !== $confirmar_password) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root"; 
    $password_db = ""; 
    $dbname = "shoppingcart";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

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

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar datos en la tabla usuarios
    $sql = "INSERT INTO Usuario (nombres, apellidos, id_usuario, correo, telefono, direccion, password, foto_perfil, id_municipio, acepto_terminos) 
            VALUES ('$nombres', '$apellidos', '$id_usuario', '$correo', '$telefono', '$direccion', '$hashed_password', '$foto_perfil', '$municipio', '$terminos')";

    if ($conn->query($sql) === TRUE) {
        echo "¡Usuario registrado correctamente!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
