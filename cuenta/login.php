<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alerta</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            background-color: #0d0f36; /* Cambia el color de fondo del body a azul */
        }
    </style>
</head>
<body class="bg-blue">
    
</body>
</html>

<?php
include '../conexion.php';

// Lógica de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Utilizando mysqli para la preparación y ejecución de la consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?");
    $stmt->bind_param('ss', $correo, $contraseña);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Inicio de sesión exitoso",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "../home.php";
                });
              </script>';
        exit();
    } else {
        // Credenciales incorrectas
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Credenciales incorrectas",
                    text: "Por favor, inténtalo de nuevo.",
                }).then(function() {
                    window.location.href = "../loginn.php";
                });
              </script>';
        exit();
    }
}
?>
