<?php
session_start();
$db = new SQLite3('articulos.db');

// Crear tablas si no existen
$db->exec("CREATE TABLE IF NOT EXISTS ventas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    fecha TEXT,
    hora TEXT,
    usuario TEXT,
    total REAL
)");

$db->exec("CREATE TABLE IF NOT EXISTS venta_detalles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_venta INTEGER,
    id_articulo INTEGER,
    cantidad INTEGER,
    precio_unitario REAL,
    total_linea REAL,
    FOREIGN KEY(id_venta) REFERENCES ventas(id)
)");

// Validar si hay productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "No hay productos en el ticket.";
    exit;
}

// 1. Calcular total de la compra
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['total'];
}

// 2. Insertar en tabla 'ventas'
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$usuario = $_SESSION['usuario'] ?? 'anonimo';

$stmt = $db->prepare("INSERT INTO ventas (fecha, hora, usuario, total) VALUES (:fecha, :hora, :usuario, :total)");
$stmt->bindValue(':fecha', $fecha);
$stmt->bindValue(':hora', $hora);
$stmt->bindValue(':usuario', $usuario);
$stmt->bindValue(':total', $total);
$stmt->execute();

// 3. Obtener el ID de la venta recién creada
$id_venta = $db->lastInsertRowID();

// 4. Insertar cada línea del ticket en 'venta_detalles'
foreach ($_SESSION['carrito'] as $item) {
    $stmt = $db->prepare("INSERT INTO venta_detalles (id_venta, id_articulo, cantidad, precio_unitario, total_linea)
                          VALUES (:id_venta, :id_articulo, :cantidad, :precio, :total)");
    $stmt->bindValue(':id_venta', $id_venta);
    $stmt->bindValue(':id_articulo', $item['id']);
    $stmt->bindValue(':cantidad', $item['cantidad']);
    $stmt->bindValue(':precio', $item['precio_unitario']);
    $stmt->bindValue(':total', $item['total']);
    $stmt->execute();
}

// 5. Vaciar el ticket de la sesión
unset($_SESSION['carrito']);

echo "✅ Compra guardada correctamente.";
?>

