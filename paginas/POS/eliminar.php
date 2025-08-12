<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: POS.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = $_POST['sku'] ?? '';

    if (empty($sku)) {
        echo "❌ SKU vacío. No se puede eliminar.";
        exit();
    }

    $db = new SQLite3('articulos.db');

    // Comprobar si existe el producto
    $checkStmt = $db->prepare("SELECT * FROM articulos WHERE sku = :sku");
    $checkStmt->bindValue(':sku', $sku, SQLITE3_TEXT);
    $result = $checkStmt->execute();

    if (!$result->fetchArray()) {
        echo "⚠️ No se encontró un producto con ese SKU.";
        $db->close();
        exit();
    }

    // Eliminar producto
    $deleteStmt = $db->prepare("DELETE FROM articulos WHERE sku = :sku");
    $deleteStmt->bindValue(':sku', $sku, SQLITE3_TEXT);

    if ($deleteStmt->execute()) {
        echo "✅ Producto con SKU $sku eliminado correctamente.";
    } else {
        echo "❌ Error al eliminar el producto.";
    }

    $db->close();
}
?>

