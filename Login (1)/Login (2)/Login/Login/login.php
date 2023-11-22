<?php
// Archivo de conexión a la base de datos (db_connection.php)
include('conexion.php');

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT id, nombres, apellido FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nombre'] = $row['nombres'];
        $_SESSION['usuario_apellido'] = $row['apellido'];
        header('Location: dashboard.php'); // Redirigir a la página de inicio del usuario
    } else {
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}

$conn->close();
?>
