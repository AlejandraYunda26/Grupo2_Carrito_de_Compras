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
$sql = "SELECT id_departamento, nombre_departamento FROM Departamento";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear un array para almacenar los departamentos
    $departamentos = array();
    
    // Iterar sobre los resultados y almacenarlos en el array
    while ($row = $result->fetch_assoc()) {
        $departamento = array(
            "id_departamento" => $row["id_departamento"],
            "nombre_departamento" => $row["nombre_departamento"]
        );
        array_push($departamentos, $departamento);
    }
    
    // Devolver los departamentos como JSON
    echo json_encode($departamentos);
} else {
    echo json_encode(array());
}
$conn->close();
?>
