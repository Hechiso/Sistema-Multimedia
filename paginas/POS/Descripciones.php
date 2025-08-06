<?php
// Simulamos artículos
$articulos = [
    1 => ['nombre' => 'Camisa blanca', 'descripcion' => 'Camisa de algodón, talla M.'],
    2 => ['nombre' => 'Pantalón azul', 'descripcion' => 'Pantalón jeans, talla 32.'],
    3 => ['nombre' => 'Zapatos negros', 'descripcion' => 'Zapatos de cuero, talla 9.']
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Artículos</title>
</head>
<body>
    <h1>Artículos Disponibles</h1>
    <ul>
        <?php foreach ($articulos as $id => $articulo): ?>
            <li>
                <a href="detalles.php?id=<?php echo $id; ?>">
                    <?php echo htmlspecialchars($articulo['nombre']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

