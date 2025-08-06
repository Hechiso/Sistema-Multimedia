<?php
// Misma lista que antes (normalmente vendría de una DB)
$articulos = [
    1 => ['nombre' => 'Camisa blanca', 'descripcion' => 'Camisa de algodón, talla M.'],
    2 => ['nombre' => 'Pantalón azul', 'descripcion' => 'Pantalón jeans, talla 32.'],
    3 => ['nombre' => 'Zapatos negros', 'descripcion' => 'Zapatos de cuero, talla 9.']
];

// Verificamos si llega un ID por GET
if (isset($_GET['id']) && array_key_exists($_GET['id'], $articulos)) {
    $id = $_GET['id'];
    $articulo = $articulos[$id];
} else {
    $articulo = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Artículo</title>
</head>
<body>
    <h1>Detalle del Artículo</h1>

    <?php if ($articulo): ?>
        <h2><?php echo htmlspecialchars($articulo['nombre']); ?></h2>
        <p><?php echo htmlspecialchars($articulo['descripcion']); ?></p>
        <a href="Descripciones.php">Volver a la lista</a>
    <?php else: ?>
        <p>Artículo no encontrado.</p>
        <a href="Descripciones.php">Volver a la lista</a>
    <?php endif; ?>
</body>
</html>

