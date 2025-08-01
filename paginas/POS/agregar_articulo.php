<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal</title> 
  <link rel="stylesheet" href="../../css/estilos_principal.css">
  <link rel="stylesheet" href="../../css/estilos_articulo.css">

</head>

<body class="cuerpo">
  <div class="producto">
    <h2>Ingresa los datos</h2>


<form method="POST" action="base.php">
  <div>
    <label>Medida:</label>
    <input type="text" name="medida[]" required>
  </div>
  <div>
    <label>SKU:</label>
    <input type="text" name="sku[]" required>
  </div>
  <div>
    <label>Precio:</label>
    <input type="number" name="precio[]" step="0.01" required>
  </div>

  <button type="submit">Agregar artículo</button>
</form>


  </div>
</body>
</html>

