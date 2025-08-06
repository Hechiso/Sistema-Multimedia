<?php

$carpeta = __DIR__ . '/../paginas/articulos/i3/';
$archivos = glob("$carpeta/*.json");

function mostrarArticulo($data) {

    echo "<div class='articulo'>";

    echo "<p><strong>Categoría:</strong> " . htmlspecialchars($data['categoria']) . "</p>";
    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($data['fecha']) . "</p>";
    echo "<p><strong>Autor:</strong> " . htmlspecialchars($data['autor']) . "</p>";

    echo "</div>";

    /*------------------------------------------------------*/    

    echo "<div class='contenido'>";
    echo "<h2>" . htmlspecialchars($data['titulo']) . "</h2>";

    foreach ($data['contenido'] as $parrafo) {
        echo "<p>" . nl2br(htmlspecialchars($parrafo)) . "</p>";
    }

    echo "</div><hr>";
}


foreach ($archivos as $archivo) {
    $json = file_get_contents($archivo);
    $data = json_decode($json, true);
    if ($data) {
        mostrarArticulo($data);
    } else {
        echo "⚠️ Error al decodificar el archivo: $archivo<br>";
    }
}

?>

