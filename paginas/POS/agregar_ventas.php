<?php
session_start();
date_default_timezone_set("America/Mexico_City");

// Asegúrate de que el cajero esté en sesión
if (!isset($_SESSION['usuario'])) {
    echo "⚠️ Sesión expirada. Inicia sesión nuevamente.";
    exit;
}

$cajero = $_SESSION['usuario'];

// Conexión a SQLite
$db = new SQLite3('articulos.db');

// Crear la tabla si no existe
$db->exec("CREATE TABLE IF NOT EXISTS ventas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    fecha TEXT NOT NULL,
    hora TEXT NOT NULL,
    cajero TEXT NOT NULL,
    sku TEXT NOT NULL,
    cantidad REAL NOT NULL,
    medida TEXT NOT NULL,
    precio_unitario REAL NOT NULL,
    precio_total REAL NOT NULL
)");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sku = trim($_POST['sku'] ?? '');
    $cantidad = (float) ($_POST['cantidad'] ?? 0);

    if ($sku === '' || $cantidad <= 0) {
        echo "❌ Datos inválidos.";
        exit;
    }

    // Buscar artículo
    $stmt = $db->prepare("SELECT medida, precio FROM articulos WHERE sku = :sku");
    $stmt->bindValue(":sku", $sku, SQLITE3_TEXT);
    $res = $stmt->execute();
    $articulo = $res->fetchArray(SQLITE3_ASSOC);

    if (!$articulo) {
        echo "❌ Artículo no encontrado.";
        exit;
    }

    $medida = $articulo['medida'];
    $precio_unitario = $articulo['precio'];
    $precio_total = $precio_unitario * $cantidad;

    // Registrar la venta
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    $stmt = $db->prepare("INSERT INTO ventas (fecha, hora, cajero, sku, cantidad, medida, precio_unitario, precio_total)
                          VALUES (:fecha, :hora, :cajero, :sku, :cantidad, :medida, :precio_unitario, :precio_total)");
    $stmt->bindValue(":fecha", $fecha);
    $stmt->bindValue(":hora", $hora);
    $stmt->bindValue(":cajero", $cajero);
    $stmt->bindValue(":sku", $sku);
    $stmt->bindValue(":cantidad", $cantidad);
    $stmt->bindValue(":medida", $medida);
    $stmt->bindValue(":precio_unitario", $precio_unitario);
    $stmt->bindValue(":precio_total", $precio_total);

    $stmt->execute();


if ($stmt->execute()) {



} else {
    echo "❌ Error al registrar la venta.";
}


}

// Ahora listamos todas las ventas actuales
echo "<h3>🧾 Detalle del ticket actual:</h3>";

$ventas = $db->query("SELECT * FROM ventas ORDER BY id DESC");
while ($fila = $ventas->fetchArray(SQLITE3_ASSOC)) {
    echo "<p><strong>{$fila['fecha']} {$fila['hora']}</strong> - SKU: {$fila['sku']}, Cant: {$fila['cantidad']} {$fila['medida']}, Unit: $" . number_format($fila['precio_unitario'], 2) . ", Total: $" . number_format($fila['precio_total'], 2) . "</p>";
}

?>

