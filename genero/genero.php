<?php
include("../conexion.php");

$carrera = 'Ingeniería en Desarrollo y Gestión de Software';

$query = "SELECT
            g.nombre AS genero,
            COUNT(*) AS cantidad
          FROM
            estudiantes e
          INNER JOIN generos g ON e.genero_id = g.id_generos
          INNER JOIN carreras c ON e.carrera_id = c.id_carreras
          WHERE
            c.nombre = '$carrera'
          GROUP BY
            g.nombre";

$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['genero']] = $row['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Pastel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../img/logo-uta.png" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Género
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="genero/genero.php">T.S.U. en Desarrollo de Negocios Área Mercadotecnia</a></li>
                        <li><a class="dropdown-item" href="#">Licenciatura en Innovación de Negocios y Mercadotecnia</a></li>
                        <li><a class="dropdown-item" href="#">T.S.U. en Gastronomía</a></li>
                        <li><a class="dropdown-item" href="#">Licenciatura en Gastronomía</a></li>
                        <li><a class="dropdown-item" href="#">T.S.U. en Mantenimiento Industrial Área Instalaciones</a></li>
                        <li><a class="dropdown-item" href="#">Ingeniería en Mantenimiento Industrial</a></li>
                        <li><a class="dropdown-item" href="#">T.S.U. en Tecnologías de la Información Área Desarrollo de Software Multiplataforma</a></li>
                        <li><a class="dropdown-item" href="#">Ingeniería en Desarrollo y Gestión de Software</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../estudiante/infest.php">Estudiante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../consulta/consulta.php">Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../consulta/desercion.php">Deserción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../php/cerrarsesion.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<canvas id="myPieChart" width="50" height="5S0"></canvas>

<script>
    function updateChart(data) {
        const generos = Object.keys(data);
        const cantidad = Object.values(data);

        const ctx = document.getElementById('myPieChart').getContext('2d');
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: generos,
                datasets: [{
                    data: cantidad,
                    backgroundColor: getRandomColorArray(generos.length)
                }]
            }
        });
    }

    function getRandomColorArray(length) {
        const colors = [];
        for (let i = 0; i < length; i++) {
            colors.push('#' + Math.floor(Math.random()*16777215).toString(16));
        }
        return colors;
    }

    // Este es solo un ejemplo para simular la respuesta del servidor
    const responseData = <?php echo json_encode($data); ?>;

    // Llamar a la función con los datos reales una vez que obtengas la respuesta del servidor
    updateChart(responseData);
</script>

</body>
</html>
