<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoppingcart";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

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

    // Preparar la consulta para insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombres, apellidos, id_usuario, correo, telefono, direccion, municipio, password, terminos)
            VALUES ('$nombres', '$apellidos', '$id_usuario', '$correo', '$telefono', '$direccion', '$municipio', '$password', '$terminos')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "¡Usuario registrado correctamente!";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
