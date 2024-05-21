<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppingcart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_actualizado = $_POST['nombre_actualizado'];
    $correo_actualizado = $_POST['correo_actualizado'];
    $telefono_actualizado = $_POST['telefono_actualizado'];
    $direccion_actualizado = $_POST['direccion_actualizado'];

    // Obtener el ID del usuario desde la sesión
    $id_usuario = $_SESSION['id_usuario'];

    // Actualizar la información del usuario en la base de datos
    $sql = "UPDATE usuario SET nombres=?, correo=?, telefono=?, direccion=? WHERE id_usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nombre_actualizado, $correo_actualizado, $telefono_actualizado, $direccion_actualizado, $id_usuario);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "¡Información actualizada correctamente!";
    } else {
        echo "No se pudo actualizar la información del usuario.";
    }

    $stmt->close();
}

$conn->close();
?>
