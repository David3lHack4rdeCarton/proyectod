<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0f36;
            color: #fff;
        }

        .form-container {
            background: linear-gradient(to bottom, #69d2cd, #294380);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Formulario de Estudiantes</h2>

    <form action="php/agregaraulm.php" method="post">
       <!-- Nombre Completo -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" required>
                </div>
            </div>
        </div>

        <!-- Grupo de Género y Edad -->
        <div class="row mb-3">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" required>
            </div>
        </div>

        <!-- Grupo de Matrícula, Carrera, Correo y Calificación General -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="matricula" class="form-label">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <div class="col-md-6">
    <label for="carrera" class="form-label">Carrera</label>
    <select class="form-select" id="carrera" name="carrera" required>
        <?php
        include("../../conexion.php");
        $query = "SELECT * FROM carreras";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id_carreras'] . '">' . $row['nombre'] . '</option>';
        }
        ?>
    </select>
</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="col-md-6">
                <label for="calificacionG" class="form-label">Calificación General</label>
                <input type="text" class="form-control" id="calificacionG" name="calificacionG" required>
            </div>
        </div>

        <!-- Grupo de Botones -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="../consulta.php" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
