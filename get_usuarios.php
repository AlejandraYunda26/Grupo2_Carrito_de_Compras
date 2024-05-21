<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoppingcart";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los usuarios
$sql = "SELECT id_usuario, nombres, apellidos FROM Usuario";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los usuarios
    $usuarios = array();
    
    // Iterar sobre los resultados y almacenarlos en el array
    while ($row = $result->fetch_assoc()) {
        $usuario = array(
            "id" => $row["id_usuario"],
            "nombre_completo" => $row["nombres"] . " " . $row["apellidos"]
        );
        array_push($usuarios, $usuario);
    }
    
    // Devolver los usuarios como JSON
    echo json_encode($usuarios);
} else {
    echo json_encode(array());
}

// Cerrar la conexión
$conn->close();
?>