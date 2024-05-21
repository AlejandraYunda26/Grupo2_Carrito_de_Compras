<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppingcart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    $sql = "SELECT nombres, correo, telefono, direccion, id_municipio FROM usuario WHERE id_usuario  = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        echo json_encode($usuario);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
}

$conn->close();
?>
