<?php
$directorio = "../media/japones/";
$videos = array_diff(scandir($directorio), array('.', '..'));

$extensiones_validas = ['mp4', 'webm', 'ogg'];
$lista_videos = [];

foreach ($videos as $archivo) {
    $ext = pathinfo($archivo, PATHINFO_EXTENSION);
    if (in_array(strtolower($ext), $extensiones_validas)) {
        $lista_videos[] = $directorio . $archivo;
    }
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="color-scheme" content="light dark">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reproductor de Video</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<!-- HTML protegido -->
    <h1>Mi Reproductor de Videos</h1>

     <video id="videoPlayer" controls autoplay muted></video>

    <script>
        const listaReproduccion = <?php echo json_encode($lista_videos); ?>;
    </script>
    <script src="reproductor_x.js"></script>
    <a href="videos_cortos.php">atras</a>


</body>
</html>


