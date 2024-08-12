<?php
// Archivo: editar_estudiante.php

include_once '../../../conexion.php';

// Verifica si se recibió un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza la consulta para obtener la información del estudiante a editar
    $consultaEstudiante = "SELECT * FROM estudiantes WHERE id_estudiantes = $id";
    $resultadoEstudiante = mysqli_query($conn, $consultaEstudiante);

    // Verifica si se encontró el estudiante
    if ($resultadoEstudiante && mysqli_num_rows($resultadoEstudiante) > 0) {
        $estudiante = mysqli_fetch_assoc($resultadoEstudiante);

        // Verifica si se ha enviado el formulario de edición
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera los datos del formulario
            $nombre = $_POST['nombre'];
            $apellidoP = $_POST['apellidoP'];
            $apellidoM = $_POST['apellidoM'];
            $matricula = $_POST['matricula'];
            $carrera_id = $_POST['carrera_id'];
            $calificacionG = $_POST['calificacionG'];
            $genero = $_POST['genero'];
            $edad = $_POST['edad'];
            $correo = $_POST['correo'];

            // Actualiza los datos en la base de datos
            $consultaActualizar = "UPDATE estudiantes SET nombre='$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', matricula='$matricula', carrera_id=$carrera_id, calificacionG=$calificacionG, genero='$genero', edad=$edad, correo='$correo' WHERE id_estudiantes=$id";

            if (mysqli_query($conn, $consultaActualizar)) {
                // Redirecciona a la lista de estudiantes después de la edición
                header('Location: consulta.php');
                exit();
            } else {
                $mensajeError = "Error al actualizar el estudiante: " . mysqli_error($conn);
            }
        }
    } else {
        $mensajeError = "No se encontró el estudiante con ID: $id";
    }
} else {
    $mensajeError = "ID de estudiante no válido";
}


// Incluye el encabezado de la página
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0f36; /* Cambia el color de fondo del body a azul */
            color: #fff; /* Cambia el color del texto a blanco */
        }

        .form-container {
            background: linear-gradient(to bottom, #69d2cd, #294380); /* Agrega un degradado azul */
            border-radius: 15px; /* Ajusta el radio del borde según tus preferencias */
            padding: 20px; /* Ajusta el espacio interno según tus preferencias */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Agrega una sombra si deseas */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Editar Estudiante</h2>

    <?php
    // Muestra el mensaje de error, si hay alguno
    if (isset($mensajeError)) {
        echo "<div class='alert alert-danger'>$mensajeError</div>";
    }
    ?>

    <?php if (isset($estudiante)): ?>
        <form action="update.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $estudiante['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidoP" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="<?php echo $estudiante['apellidoP']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidoM" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="<?php echo $estudiante['apellidoM']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="matricula" class="form-label">Matrícula:</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $estudiante['matricula']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="carrera_id" class="form-label">Carrera:</label>
                <select class="form-select" id="carrera_id" name="carrera_id" required>
                    <?php
                    // Consulta para obtener todas las carreras
                    $queryCarreras = "SELECT * FROM carreras";
                    $resultCarreras = $conn->query($queryCarreras);

                    while ($rowCarrera = $resultCarreras->fetch_assoc()) {
                        // Compara la carrera actual con la del estudiante
                        $selected = ($estudiante['carrera_id'] == $rowCarrera['id']) ? 'selected' : '';

                        echo '<option value="' . $rowCarrera['id'] . '" ' . $selected . '>' . $rowCarrera['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="calificacionG" class="form-label">Calificación General:</label>
                <input type="text" class="form-control" id="calificacionG" name="calificacionG" value="<?php echo $estudiante['calificacionG']; ?>" required>
            </div>
            <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
                <select class="form-select" id="genero" name="genero" required>
                    <?php
                    include("../../conexion.php");
                    $queryGeneros = "SELECT * FROM generos";
                    $resultGeneros = $conn->query($queryGeneros);

                    while ($rowGenero = $resultGeneros->fetch_assoc()) {
                        echo '<option value="' . $rowGenero['id_generos'] . '">' . $rowGenero['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $estudiante['edad']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $estudiante['correo']; ?>" required>
            </div>
            <input type="hidden" name="id_estudiante" value="<?php echo $idEstudiante; ?>">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="../../consulta.php" class="btn btn-secondary">Regresar</a>
        </form>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
