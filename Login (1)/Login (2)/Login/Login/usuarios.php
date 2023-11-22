<?php
    include('conexion.php');
    session_start();

    if(!isset($_SESSION['usuario_id'])){
        header('Location: index.html');
    }

    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM usuarios WHERE ID ='".$_SESSION['usuario_id']."'";
    $usuario = $conn->query($sql);

    if($usuario->num_rows > 0){
        $roww = $usuario->fetch_assoc();
        $nombres = $roww['nombres'];
        $apellido = $roww['apellido'];
        $correo = $roww['correo'];
        $contrasena = $roww['contrasena'];
        $telefono = $roww['telefono'];
        $direccion = $roww['direccion'];
        $usuario = $roww['usuario'];

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/dashboard.css/usuari">
    <link rel="stylesheet" href="./assets/css/usuarios.css">
</head>
<body>


    <div class="side-bar">
        <div class="logo-name">
            <h1>LOGO</h1>
        </div>
        <ul>

        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo " <i class='".$row['icono']."'></i>
                            <li><a href='".$row['ruta']."'>".$row['item']."</a></li>";
                            
                }
            }
        ?>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="usuario">
                <form action="actualizar.php" method="POST" class="formulario__registro">
                    <input type="text" placeholder="nombre" name="nombres" value="<?php echo $nombres ?>">
                    <input type="text" placeholder="apellido" name="apellido" value="<?php echo $apellido ?>">
                    <input type="text" placeholder="correo_electronico" name="correo" value="<?php echo $correo ?>">
                    <input type="text" placeholder="contrasena" name="contrasena" value="<?php echo $contrasena ?>">
                    <input type="text" placeholder="telefono" name="telefono" value="<?php echo $telefono ?>">
                    <input type="text" placeholder="direccion" name="direccion" value="<?php echo $direccion ?>">
                    <input type="text" placeholder="usuario" name="usuario" value="<?php echo $usuario ?>">
                    <button>Nuevo Registro</button>
                </form>
            </div>
            
        </div>

    </div>
</body>
</html>