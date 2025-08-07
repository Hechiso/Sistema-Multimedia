<?php
session_start();

// Conexión con SQLite3
$db = new SQLite3('articulos.db');  // Ajusta la ruta según tu estructura

// Asegúrate de establecer la zona horaria correcta
date_default_timezone_set('America/Mexico_City');

// Validación de sesión
if (!isset($_SESSION['usuario'])) {
    echo "⚠ Usuario no identificado.";
    exit;
}

$usuario = $_SESSION['usuario'];
$fecha_actual = date('Y-m-d');  // por ejemplo: '2025-08-07'

// Consulta las ventas del día hechas por el usuario actual
$sql = "SELECT * FROM ventas WHERE fecha = :fecha AND usuario = :usuario";
$stmt = $db->prepare($sql);

if (!$stmt) {
    echo "❌ Error en la preparación de la consulta.";
    exit;
}

// En SQLite3, se debe especificar el tipo de dato al hacer bind
$stmt->bindValue(':fecha', $fecha_actual, SQLITE3_TEXT);
$stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);

// Ejecutar la consulta
$result = $stmt->execute();

if (!$result) {
    echo "❌ Error al ejecutar la consulta.";
    exit;
}

// Mostrar resultados
$total_dia = 0;

echo "<h2>📅 Corte de caja - Usuario: <b>$usuario</b> - Fecha: $fecha_actual</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Hora</th><th>Total de la venta</th></tr>";

// Recorremos los resultados
while ($venta = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($venta['hora']) . "</td>";
    echo "<td>$" . number_format($venta['total'], 2) . "</td>";
    echo "</tr>";

    $total_dia += $venta['total'];
}

echo "</table>";
echo "<h3>🧾 Total vendido hoy: <span style='color:green;'>$" . number_format($total_dia, 2) . "</span></h3>";
?>

