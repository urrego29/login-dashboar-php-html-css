<?php
include('conexion.php');
    session_start();

    if(!isset($_SESSION['usuario_id'])){
        header('Location: index.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>
<body>

<?php
    include('conexion.php');
    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);
?>
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
</body>
</html>