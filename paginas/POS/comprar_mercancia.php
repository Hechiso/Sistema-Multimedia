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

    <form method="POST" action="mercancia.php">
      <div>
        <label>ID:</label>
        <input type="text" name="producto_id" required>
      </div>
      <div>
        <label>Cantidad:</label>
        <input type="text" name="cantidad" required>
      </div>
      <div>
        <button type="submit">Añadir a stock</button>
      </div>
    </form>
  </div>
</body>
</html>

