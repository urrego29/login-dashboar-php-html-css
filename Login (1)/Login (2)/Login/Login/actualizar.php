<?php
    include('conexion.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombres = $_POST['nombres'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $sql = "UPDATE usuarios SET nombres = '$nombres', apellido = '$apellido', correo = '$correo', contrasena = '$contrasena', telefono = '$telefono', direccion = '$direccion' WHERE ID = '".$_SESSION['usuario_id']."'";
        
        $actualizacion = $conn->query($sql);

        header('Location: dashboard.php');
    }
?>