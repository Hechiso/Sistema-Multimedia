<?php
$directorio = "../media/musica/";
$videos = array_diff(scandir($directorio), array('.', '..'));

$extensiones_validas = ['mp3', 'wam', 'ogg'];
$lista_videos = [];

foreach ($videos as $archivo) {
    $ext = pathinfo($archivo, PATHINFO_EXTENSION);
    if (in_array(strtolower($ext), $extensiones_validas)) {
        $lista_videos[] = $directorio . $archivo;
    }
}
shuffle($lista_videos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reproductor de Música</title>
  <link rel="stylesheet" type="text/css" href="../css/estilos_principal.css">
  <link rel="stylesheet" type="text/css" href="../css/estilos_musica.css">
</head>
  

<body class="cuerpo">



 <audio id="videoPlayer" controls></audio>

    <script>
        const listaReproduccion = <?php echo json_encode($lista_videos); ?>;
    </script>



    <script src="reproductor_musica.js"></script>
 
 <div class="lista-mp3">
    <?php foreach ($lista_musica as $archivo): ?>
      <?php $nombre = pathinfo($archivo, PATHINFO_FILENAME); ?>
      <button class="btn-musica" onclick="reproducir('<?php echo htmlspecialchars($directorio . $archivo); ?>')">
        <?php echo htmlspecialchars($nombre); ?>
      </button>
    <?php endforeach; ?>
  </div>

  <script>
    const reproductor = document.getElementById("reproductor");

    function reproducir(ruta) {
        reproductor.src = ruta;
        reproductor.play();
    }
  </script>
  
</body>
</html>

