<?php
session_start();
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario ya existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    if ($stmt === false) {
        die('Error preparando la consulta: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('s', $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Usuario ya existe
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "El usuario ya está registrado."
                }).then(function() {
                    window.location.href = "../loginn.php";
                });
              </script>';
    } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contraseña) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die('Error preparando la consulta: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('sss', $nombre, $correo, $contrasena);
        
        if ($stmt->execute()) {
            // Registro exitoso
            echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Registro exitoso",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "../loginn.php";
                    });
                  </script>';
        } else {
            // Error al registrar
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Error al registrar."
                    }).then(function() {
                        window.location.href = "../loginn.php";
                    });
                  </script>';
        }
    }
    $stmt->close();
}

$conn->close();
?>

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
<body>
    
</body>
</html>
