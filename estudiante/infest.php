<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <h2 class="mb-4">Consulta de Estudiantes</h2>

    <div class="white-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Carrera</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí deberías incluir código PHP para obtener y mostrar la información de los estudiantes -->
            <!-- Ejemplo de una fila de datos -->
            <tr>
                <td>1</td>
                <td>Nombre Ejemplo</td>
                <td>ApellidoP Ejemplo</td>
                <td>ApellidoM Ejemplo</td>
                <td>22</td>
                <td>Hombre</td>
                <td>Licenciatura en Gastronomía</td>
                <td>
                    <button class="btn btn-danger">Eliminar</button>
                    <button class="btn btn-primary">Editar</button>
                </td>
            </tr>
            <!-- Puedes repetir esta estructura para cada estudiante -->
        </tbody>
    </table>
        <div class="mt-4">
            <a href="consultaphp/consultaa.php" class="btn btn-success">Agregar Estudiante</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
