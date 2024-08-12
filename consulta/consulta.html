<?php
include("../conexion.php");
session_start();

?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Estudiantes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                background-color: #0d0f36; /* Cambia el color de fondo del body a azul */
                color: #fff; /* Cambia el color del texto a blanco */
            }

            .table-container {
                border-radius: 15px; /* Ajusta el radio del borde según tus preferencias */
                background: linear-gradient(to bottom, #69d2cd, #294380); /* Agrega un degradado azul */
                padding: 20px; /* Ajusta el espacio interno según tus preferencias */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Agrega una sombra si deseas */
            }

            .white-container {
                background-color: #fff; /* Cambia el color de fondo a blanco */
                border-radius: 15px; /* Ajusta el radio del borde según tus preferencias */
                padding: 20px; /* Ajusta el espacio interno según tus preferencias */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Agrega una sombra si deseas */
            }
            
        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/logo-uta.png" alt="Logo" height="30">
            </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Lista de Estudiantes</h2>

        <div class="white-container">

        <?php
 // Realiza la consulta a la base de datos para obtener la información de los estudiantes
 $consultaEstudiantes = "SELECT e.id_estudiantes, e.nombre, e.apellidoP, e.apellidoM, e.matricula, c.nombre AS carrera, e.calificacionG FROM estudiantes e
 INNER JOIN carreras c ON e.carrera_id = c.id_carreras";

$resultadoEstudiantes = mysqli_query($conn, $consultaEstudiantes);
?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Matrícula</th>
            <th>Carrera</th>
            <th>Calificación General</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody class="table-primary">
        <?php
        while ($mostrar = mysqli_fetch_assoc($resultadoEstudiantes)) {
            echo "<tr>";
            echo "<td><strong>" . $mostrar['id_estudiantes'] . "</strong></td>";
            echo "<td><strong>" . $mostrar['nombre'] . "</strong></td>";
            echo "<td><strong>" . $mostrar['apellidoP'] . "</strong></td>";
            echo "<td><strong>" . $mostrar['apellidoM'] . "</strong></td>";
            echo "<td><strong>" . $mostrar['matricula'] . "</strong></td>";
            echo "<td><strong>" . $mostrar['carrera'] . "</strong></td>";
            echo "<td><strong>" . $mostrar['calificacionG'] . "</strong></td>";
            echo "<td>";
            echo "<a href='consultaphp/php/editaralumno.php?id=" . $mostrar['id_estudiantes'] . "' class='btn btn-warning edit-link' data-nombre='" . $mostrar['nombre'] . "'>Editar</a>";
            echo "<a href='consultaphp/php/eliminaralum.php?id=" . $mostrar['id_estudiantes'] . "' class='btn btn-danger ms-1 delete-link' data-nombre='" . $mostrar['nombre'] . "'>Eliminar</a>";

            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>



            <div class="mt-4">
                <a href="consultaphp/consultaa.php" class="btn btn-success">Agregar Estudiante</a>
            </div>
        </div>
    </div>



    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const editLinks = document.querySelectorAll('.edit-link');
        const deleteLinks = document.querySelectorAll('.delete-link');

        editLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const nombre = link.dataset.nombre;

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: `¿Quieres editar los datos de ${nombre}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, editar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = link.getAttribute('href');
                    }
                });
            });
        });

        deleteLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const nombre = link.dataset.nombre;

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: `¿Quieres eliminar a ${nombre}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = link.getAttribute('href');
                    }
                });
            });
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
