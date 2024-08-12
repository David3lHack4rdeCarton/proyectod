<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agrega SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
include("../../../conexion.php");

// Verifica si se ha enviado un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario si están definidos
    $idEstudiante = $_POST["id_estudiante"];
    $nombre = $_POST["nombre"];
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $matricula = $_POST["matricula"];
    $carrera =  $_POST["carrera_id"];
    $calificacionG = $_POST["calificacionG"];
    $genero = $_POST["genero"];
    $edad = $_POST["edad"];
    $correo = $_POST["correo"];

    // Verifica que la conexión a la base de datos esté establecida
    if ($conn) {
        // Actualiza los datos en la base de datos
        $sql = "UPDATE estudiantes SET 
            nombre = '$nombre', 
            apellidoP = '$apellidoP', 
            apellidoM = '$apellidoM', 
            genero_id = '$genero', 
            edad = '$edad', 
            matricula = '$matricula', 
            carrera_id = '$carrera', 
            correo = '$correo', 
            calificacionG = '$calificacionG' 
            WHERE id_estudiantes = '$idEstudiante'";

        // Ejecuta la consulta
        if (mysqli_query($conn, $sql)) {
            // Muestra la alerta SweetAlert 2 después de la actualización exitosa
            echo '<script>
                    Swal.fire({
                        title: "Actualización exitosa",
                        text: "La información se ha actualizado correctamente.",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                    }).then(() => {
                        window.location.href = "../../consulta.php";
                    });
                  </script>';
            exit();
        } else {
            // Manejo de errores si la consulta no se ejecuta correctamente
            echo "Error en la actualización: " . mysqli_error($conn);
        }
    } else {
        // Manejo de errores si la conexión no está establecida
        echo "Error en la conexión a la base de datos.";
    }
} else {
    // Si no es una solicitud POST, redirige a alguna página o muestra un mensaje apropiado
    header('Location: ../../../home.php');
    exit();
}

// Cierra la conexión a la base de datos
$conn->close();
?>
