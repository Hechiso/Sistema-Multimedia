<?php

    foreach ($lista_musica as $musica) {
        $ruta = $directorio . $musica;
        $nombre = pathinfo($musica, PATHINFO_FILENAME);
        echo "<div class='item-musica'>";
        echo "<p>" . htmlspecialchars($nombre) . "</p>";
        echo "<audio controls preload='none' src='$ruta'></audio>";
        echo "</div>";
    }

?>

