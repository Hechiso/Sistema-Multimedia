<?php
session_start();
date_default_timezone_set("America/Mexico_City");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Asegúrate de que el cajero esté en sesión
if (!isset($_SESSION['usuario'])) {
    echo "⚠️ Sesión expirada. Inicia sesión nuevamente.";
    exit;
}

$cajero = $_SESSION['usuario'];



if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_POST['sku']) && isset($_POST['cantidad'])) {
    $sku = trim($_POST['sku']);
    $cantidad = (int) $_POST['cantidad'];

    if ($cantidad <= 0 || empty($sku)) {
        header("Location: Ventas.php");
        exit;
    }

    // Conexión a la base de datos
    $db = new SQLite3('articulos.db'); // ajusta ruta si es necesario

    $stmt = $db->prepare("SELECT id, medida, precio FROM articulos WHERE sku = :sku");
    $stmt->bindValue(':sku', $sku);
    $res = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

    if ($res) {
        $total = $res['precio'] * $cantidad;

        $_SESSION['carrito'][] = [
            'id' => $res['id'],
            'medida' => $res['medida'],
            'sku' => $sku,
            'cantidad' => $cantidad,
            'precio_unitario' => $res['precio'],
            'total' => $total
        ];
    } else {
        $_SESSION['error'] = "Producto con SKU '$sku' no encontrado.";
    }
}

header("Location: Ventas.php");
exit;



?>


