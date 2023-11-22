<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "proyecto";

// Crear la conexión a la base de datos
$conn = new mysqli($server, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?> 