<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="color-scheme" content="light dark">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reproductor de Video</title>
    <link rel="stylesheet" href="../css/estilos_principal.css">
</head>
<body class="cuerpo">
<!-- HTML protegido -->

<a href="varios.php">varios</a>
<a href="videos.php">caliente</a>
<a href="jap.php">japones</a>
<a href="est.php">estiramientos</a>
<a href="des.php">desfiles</a>
<a href="videos_p.php">x-videos</a>
<a href="mangas_p.php">mangas</a>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>


