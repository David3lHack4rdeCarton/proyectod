<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Agregando Estudiante</title>
</head>
<body>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Agregando Estudiante</title>
</head>
<body>
    
</body>
</html>

<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluye el archivo de conexión a la base de datos
    include("../../../conexion.php");

    // Obtiene los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $apellidoP = mysqli_real_escape_string($conn, $_POST["apellidoP"]);
    $apellidoM = mysqli_real_escape_string($conn, $_POST["apellidoM"]);
    $genero = intval($_POST["genero"]);
    $edad = intval($_POST["edad"]);
    $matricula = mysqli_real_escape_string($conn, $_POST["matricula"]);
    $carrera = mysqli_real_escape_string($conn, $_POST["carrera"]);
    $correo = mysqli_real_escape_string($conn, $_POST["correo"]);
    $calificacionG = intval($_POST["calificacionG"]);

    // Prepara y ejecuta la consulta para obtener el ID de la carrera
// Corregir esta parte
$stmt = $conn->prepare("SELECT id_carreras FROM carreras WHERE nombre = ?");
$stmt->bind_param("s", $carrera);
$stmt->execute();
$stmt->bind_result($carrera_id);
$stmt->fetch();
$stmt->close();


// Corregir esta parte
$query = "INSERT INTO estudiantes (nombre, apellidoP, apellidoM, genero_id, edad, matricula, carrera_id, correo, calificacionG) 
VALUES ('$nombre', '$apellidoP', '$apellidoM', $genero, $edad, '$matricula', 
        (SELECT id_carreras FROM carreras WHERE nombre = '$carrera'), '$correo', $calificacionG)";





    // Ejecutar la consulta
    if ($conn->query($query) === TRUE) {
        // Si la inserción fue exitosa, muestra una alerta SweetAlert
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Estudiante agregado correctamente',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.href = '../../consulta.php';
                });
              </script>";
    } else {
        // Si hay un error, muestra una alerta SweetAlert
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al agregar el estudiante',
                });
              </script>";
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
