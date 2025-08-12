<?php
// Mostrar errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos SQLite
$db = new SQLite3('articulos.db');

// Consulta todos los artículos
$resultado = $db->query("SELECT * FROM articulos");
?>

<?php
// Mostrar errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos SQLite
$db = new SQLite3('articulos.db');

// Consulta todos los artículos
$resul = $db->query("SELECT * FROM stock");
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Artículos</title>
    <link rel="stylesheet" href="../../css/estilos_principal.css">
    <style>
	body{
            color: #fff;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: auto;
        }
        th, td {
            padding: 0.6rem;
            border: 1px solid #029;
            text-align: center;
        }
        th {
            background-color: #012;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body class="cuerpo">

<h1>📦 Artículos Registrados</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Medida</th>
        <th>SKU</th>
        <th>Precio</th>
    </tr>
    <?php while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) : ?>
    <tr>
        <td><?= htmlspecialchars($fila['id']) ?></td>
        <td><?= htmlspecialchars($fila['medida']) ?></td>
        <td><?= htmlspecialchars($fila['sku']) ?></td>
	<td>$<?= number_format($fila['precio'], 2) ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<table>
    <tr>
        <th>ID</th>
        <th>cantidad</th>
    </tr>
    <?php while ($fila = $resul->fetchArray(SQLITE3_ASSOC)) : ?>
    <tr>
        <td><?= htmlspecialchars($fila['producto_id']) ?></td>
        <td><?= htmlspecialchars($fila['cantidad']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>



</body>
</html>

