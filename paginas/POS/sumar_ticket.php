<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'sumar_ticket.php'; // este no redirige, solo ejecuta
}
?>

<?php
$db = new SQLite3('articulos.db');

$resultado = $db->query("SELECT SUM(precio_total) AS total_ventas FROM ventas");
$fila = $resultado->fetchArray(SQLITE3_ASSOC);

$total = $fila['total_ventas'];

if ($total !== null) {
    echo "<p>Total de ventas actual: $" . number_format($total, 2) . "</p>";
}
?>
