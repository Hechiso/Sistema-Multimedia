<?php
date_default_timezone_set("America/Mexico_City");

// Conexión a la base de datos
$db = new SQLite3('articulos.db');

// Crear tabla 'articulos' si no existe
$db->exec("CREATE TABLE IF NOT EXISTS articulos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    medida TEXT NOT NULL,
    sku TEXT NOT NULL UNIQUE,
    precio REAL NOT NULL
)");

// Crear tabla 'stock' si no existe
$db->exec("CREATE TABLE IF NOT EXISTS stock (
    producto_id INTEGER PRIMARY KEY,
    cantidad DECIMAL(10,2) NOT NULL,
    FOREIGN KEY(producto_id) REFERENCES articulos(id)
)");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = (int) $_POST["producto_id"];
    $cantidad = (float) $_POST["cantidad"];

    // Verificar que el producto exista en 'articulos'
    $stmt = $db->prepare("SELECT id FROM articulos WHERE id = ?");
    $stmt->bindValue(1, $producto_id, SQLITE3_INTEGER);
    $resultado = $stmt->execute();
    if (!$resultado->fetchArray()) {
        echo "❌ Producto no encontrado en el catálogo.";
        exit;
    }

    // Revisar si ya está en stock
    $stmt = $db->prepare("SELECT cantidad FROM stock WHERE producto_id = ?");
    $stmt->bindValue(1, $producto_id, SQLITE3_INTEGER);
    $resultado = $stmt->execute();
    $fila = $resultado->fetchArray();

    if ($fila) {
        // Actualizar stock
        $stmt = $db->prepare("UPDATE stock SET cantidad = cantidad + ? WHERE producto_id = ?");
        $stmt->bindValue(1, $cantidad, SQLITE3_FLOAT);
        $stmt->bindValue(2, $producto_id, SQLITE3_INTEGER);
        $stmt->execute();
        echo "✅ Stock actualizado.";
    } else {
        // Insertar nuevo producto
        $stmt = $db->prepare("INSERT INTO stock (producto_id, cantidad) VALUES (?, ?)");
        $stmt->bindValue(1, $producto_id, SQLITE3_INTEGER);
        $stmt->bindValue(2, $cantidad, SQLITE3_FLOAT);
        $stmt->execute();
        echo "✅ Producto agregado al stock.";
    }
}
?>

