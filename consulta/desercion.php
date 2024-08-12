<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Deserción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <h2 class="mb-4">Consulta de Deserción</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Carrera</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Motivo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123456</td>
                <td>Ingeniería</td>
                <td>Nombre Ejemplo</td>
                <td>nombre@example.com</td>
                <td>Motivo de Deserción</td>
                <td>
                    <button class="btn btn-danger">Eliminar</button>
                    <button class="btn btn-primary">Editar</button>
                </td>
            </tr>
            <!-- Puedes repetir esta estructura para cada caso de deserción -->
        </tbody>
    </table>

    <div class="mt-4">
        <a href="#" class="btn btn-success">Agregar Deserción</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
