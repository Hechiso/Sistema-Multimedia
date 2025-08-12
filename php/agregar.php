<?php

$archivo = "Precios.txt";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../paginas/POS/POS.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['medida'];
    $sku = $_POST['sku'];
    $codigo = $_POST['precio'];

    echo "<p>Precio recibido: $codigo</p>"; // Aquí sí imprime el valor
}

    file_put_contents($archivo, "Precio: " . $codigo . PHP_EOL, FILE_APPEND);
?>

