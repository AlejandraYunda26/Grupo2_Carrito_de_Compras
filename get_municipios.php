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

// Obtener el ID del departamento desde los parámetros de la solicitud
$id_departamento = $_GET["id_departamento"];

// Consulta para obtener los municipios correspondientes al departamento seleccionado
$sql = "SELECT id_municipio, nombre_municipio FROM Municipio WHERE id_departamento = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_departamento);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Crear un array para almacenar los municipios
    $municipios = array();
    
    // Iterar sobre los resultados y almacenarlos en el array
    while ($row = $result->fetch_assoc()) {
        $municipio = array(
            "id_municipio" => $row["id_municipio"],
            "nombre_municipio" => $row["nombre_municipio"]
        );
        array_push($municipios, $municipio);
    }
    
    // Devolver los municipios como JSON
    echo json_encode($municipios);
} else {
    echo json_encode(array());
}
$stmt->close();
$conn->close();
