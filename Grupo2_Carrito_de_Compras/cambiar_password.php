<?php
// Obtener los datos del formulario
$password_actual = $_POST['password_actual'];
$password_nuevo = $_POST['password_nuevo'];
$confirmar_password = $_POST['confirmar_password'];

// Validar los datos (simulado)
if (!empty($password_actual) && !empty($password_nuevo) && !empty($confirmar_password)) {
    // Verificar si el password actual coincide con el almacenado en la base de datos (simulado)
    $password_actual_almacenado = "password123"; // Esto debería obtenerse de la base de datos
    if ($password_actual == $password_actual_almacenado) {
        // Verificar si el nuevo password coincide con la confirmación
        if ($password_nuevo == $confirmar_password) {
            // Actualizar el password en la base de datos
            // Aquí deberías implementar la lógica para actualizar el password del usuario en tu base de datos

            // Redirigir de nuevo a la página de gestión de cuenta con un mensaje de éxito
            header("Location: gestionar_cuenta.html?mensaje=Password actualizado correctamente");
        } else {
            // Redirigir de nuevo a la página de gestión de cuenta con un mensaje de error
            header("Location: gestionar_cuenta.html?mensaje=El nuevo password y la confirmación no coinciden");
        }
    } else {
        // Redirigir de nuevo a la página de gestión de cuenta con un mensaje de error
        header("Location: gestionar_cuenta.html?mensaje=El password actual es incorrecto");
    }
} else {
    // Si faltan datos, redirigir de nuevo a la página de gestión de cuenta con un mensaje de error
    header("Location: gestionar_cuenta.html?mensaje=Por favor, completa todos los campos");
}