<?php
session_start();
include "conexion.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if ($email == "" || $password == "") {
    die("Completa todos los campos.<br><a href='login.html'>Volver</a>");
}

// Buscar usuario
$consulta = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conn, $consulta);

if (mysqli_num_rows($resultado) == 0) {
    die("El correo no existe. <a href='login.html'>Volver</a>");
}

$usuario = mysqli_fetch_assoc($resultado);

// Verificar contraseña
if (password_verify($password, $usuario['password'])) {

    // Guardar datos en sesión
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nombre'] = $usuario['nombre'];

    // Redirigir al panel
    header("Location: panel.php");
    exit();

} else {
    die("Contraseña incorrecta. <a href='login.html'>Volver</a>");
}

mysqli_close($conn);
?>
