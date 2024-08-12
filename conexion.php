<?php
$servername = "mysql";
$username = "david";
$password = "12345";
$dbname = "proyectoc";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si se pudo conectar a la base de datos
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}
?>


