<?php
$productos = [
    ['nombre' => 'Producto 1', 'precio' => 10.00, 'cantidad' => 1],
    ['nombre' => 'Producto 2', 'precio' => 15.00, 'cantidad' => 2]
];

$total_carrito = 0;

foreach ($productos as $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad'];
    $total_carrito += $subtotal;
}
// Verificar si se enviaron los datos del formulario
if(isset($_POST['producto']) && isset($_POST['cantidad'])) {
    // Obtener el nombre del producto y la cantidad del formulario
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // Aquí deberías implementar la lógica para actualizar el carrito en tu base de datos
    // Por ejemplo, puedes actualizar la cantidad en una tabla de "carrito" en tu base de datos
    // con una consulta SQL UPDATE

    // Redirigir de nuevo a la página del carrito
    header("Location: carrito.html");
    exit;
} else {
    // Si no se enviaron los datos del formulario, redirigir a la página principal o mostrar un mensaje de error
    header("Location: index.php");
    exit;
}
?>

