<?php
$host = "localhost";
$user = "root";        // Cambia si usas otro usuario
$pass = "";            // Cambia si tu MySQL tiene contraseña
$db   = "scam_lad";    // NOMBRE DE TU BASE DE DATOS

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
