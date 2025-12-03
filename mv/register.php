<?php
include "conexion.php";

// Validar campos
$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if ($nombre == "" || $email == "" || $password == "") {
    die("Todos los campos son obligatorios.");
}

// Verificar si el correo ya existe
$consulta = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conn, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    die("El correo ya está registrado. <a href='register.html'>Volver</a>");
}

// Encriptar contraseña
$password_segura = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la BD
$insertar = "INSERT INTO usuarios (nombre, email, password) 
             VALUES ('$nombre', '$email', '$password_segura')";

if (mysqli_query($conn, $insertar)) {
    echo "Registro exitoso. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error al registrar usuario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
