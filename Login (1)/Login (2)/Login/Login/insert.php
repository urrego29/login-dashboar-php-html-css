<?php
// Archivo de conexión a la base de datos (db_connection.php)
include('conexion.php');

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_completo = $_POST['nombres'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales
    $sql = "INSERT INTO usuarios (nombres, correo, contrasena, usuario) VALUES ('".$nombre_completo."', '".$correo."', '".$contrasena."', '".$usuario."')";
    $result = $conn->query($sql);

    header('Location: index.html'); // Redirigir a la página de inicio del usuario
}

$conn->close();
?>