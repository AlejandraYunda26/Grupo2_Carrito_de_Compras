<?php
// Conexión a la base de datos
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

// Consulta para obtener los departamentos
$sql = "SELECT nombres, apellidos FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear un array para almacenar los departamentos
    $usuarios = array();
    
    // Iterar sobre los resultados y almacenarlos en el array
    while ($row = $result->fetch_assoc()) {
        $usuario = array(
            "id_usuario" => $row["id_usuario"],
            "nombre_usuario" => $row["nombres"],
            "apellido_usuario" => $row["apellidos"],
        );
        array_push($usuarios, $usuario);
    }
    
    // Devolver los departamentos como JSON
    echo json_encode($usuarios);
} else {
    echo json_encode(array());
}
$conn->close();
?>
