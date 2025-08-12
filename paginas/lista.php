<?php
// Permitir acceso desde cualquier origen (puedes limitarlo a tu IP si lo deseas)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Aquí va tu código PHP existente para generar la lista de videos
$directorio = ".";
$extensiones_validas = ['mp4', 'webm', 'ogg'];
$archivos = array_diff(scandir($directorio), ['.', '..']);

$videos = [];
foreach ($archivos as $archivo) {
    $ext = pathinfo($archivo, PATHINFO_EXTENSION);
    if (in_array(strtolower($ext), $extensiones_validas)) {
	    $videos[] = "http://192.168.1.9/videos/" . $archivo;
    }
}
echo json_encode($videos);
?>

