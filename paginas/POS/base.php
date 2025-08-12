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
    $medidas = $_POST['medida'];
    $skus = $_POST['sku'];
    $precios = $_POST['precio'];


if (!is_array($medidas) || !is_array($skus) || !is_array($precios)) {
    echo "❌ Error: los datos enviados no son válidos.";
    exit();
}



    // Conexión a la base SQLite
    $db = new SQLite3('articulos.db');

$db->exec("CREATE TABLE IF NOT EXISTS articulos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    medida TEXT NOT NULL,
    sku TEXT NOT NULL UNIQUE,
    precio REAL NOT NULL
)");

    // Preparar statement
    $stmt = $db->prepare("INSERT INTO articulos (medida, sku, precio) VALUES (:medida, :sku, :precio)");

    for ($i = 0; $i < count($medidas); $i++) {
        $stmt->bindValue(':medida', $medidas[$i], SQLITE3_TEXT);
        $stmt->bindValue(':sku', $skus[$i], SQLITE3_TEXT);
        $stmt->bindValue(':precio', $precios[$i], SQLITE3_FLOAT);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error al guardar artículo: " . $skus[$i] . " - " . $e->getMessage() . "<br>";
        }
    }

    echo "✅ Artículos guardados correctamente.";
    $db->close();
}
?>

