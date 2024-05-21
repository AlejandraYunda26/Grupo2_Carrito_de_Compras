<?php
// Verificar si se envió el nombre del producto en el formulario
if(isset($_POST['producto'])) {
    // Obtener el nombre del producto del formulario
    $producto = $_POST['producto'];

    // Aquí deberías implementar la lógica para eliminar el producto del carrito en tu base de datos
    // Por ejemplo, puedes ejecutar una consulta SQL DELETE para eliminar el producto de la tabla de "carrito"

    // Redirigir de nuevo a la página del carrito
    header("Location: carrito.html");
    exit;
} else {
    // Si no se envió el nombre del producto en el formulario, redirigir a la página principal o mostrar un mensaje de error
    header("Location: index.php");
    exit;
}
?>
