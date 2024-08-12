<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Eliminando Estudiante</title>
    <style>
        body {
            background-color: #0d0f36; /* Cambia el color de fondo del body a azul */
        }
    </style>
</head>
<body>
    
</body>
</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
session_start();
include('../../../conexion.php'); // Ajusta la ruta según tu estructura de carpetas


// Verificar si se recibió el parámetro de eliminación
if (isset($_GET['id'])) {
    $idEstudiante = $_GET['id'];

    // Eliminar el registro del estudiante de la base de datos
    $eliminar = "DELETE FROM estudiantes WHERE id_estudiantes = '$idEstudiante'";
    $result = mysqli_query($conn, $eliminar);

    // Verificar si se eliminó correctamente
    if ($result) {
        echo "<script>
            Swal.fire({
                title: 'Eliminado correctamente',
                text: 'El estudiante ha sido eliminado.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '../../consulta.php';
            });
        </script>";
        exit();
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Error al eliminar el estudiante.',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '../../consulta.php';
            });
        </script>";
        exit();
    }
}
?>
