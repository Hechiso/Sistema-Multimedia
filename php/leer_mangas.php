<?php
    $video_dir = '../media/mangas/';
    $extensiones_video = ['pdf', 'txt', 'README'];

    foreach (scandir($video_dir) as $archivo) {
        if ($archivo === '.' || $archivo === '..') continue;

        $ruta_completa = $video_dir . $archivo;

        // Saltar si no es un archivo
        if (!is_file($ruta_completa)) continue;

        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        if (in_array(strtolower($extension), $extensiones_video)) {
            $nombre_sin_ext = pathinfo($archivo, PATHINFO_FILENAME);
            $video_path = $video_dir . $archivo;
            $imagen_path = $video_dir . $nombre_sin_ext . '.jpg';

            // Verificar si la miniatura existe
            if (!file_exists($imagen_path)) {
                $imagen_path = '../media/mangas/mangas.jpg'; // Imagen por defecto si no existe miniatura
            }

            echo '<a href="' . htmlspecialchars($video_path) .'">';
            echo '<img src="' . htmlspecialchars($imagen_path) .  '">';
	 
	    echo '</a>';





        }
    }
?>

