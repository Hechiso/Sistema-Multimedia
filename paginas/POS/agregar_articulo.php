<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal</title> 
  <link rel="stylesheet" href="../../css/estilos_principal.css">
  
  <style>
    body {
      background-color: #222;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .producto {
      background-color: #456;
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
      color: #fff;
    }

    h2 {
      text-align: center;
      margin-bottom: 2em;
      color: #fff;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    label {
      margin-bottom: 0;
      font-weight: bold;
    }

    input[type="text"] {
      padding: 0;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      width: 100%;
      margin-left: 10px;
    }

    .form-group {
      display: flex;
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body class="cuerpo">
  <div class="producto">
    <h2>Ingresa los datos</h2>

    <form action="" method="POST">
      <div class="form-group">
        <label for="medida">Medida</label>
        <input type="text" name="medida" required>
      </div>

      <div class="form-group">
        <label for="sku">Identificador</label>
        <input type="text" name="sku" required>
      </div>

      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio" required>
      </div>
    </form>
  </div>
</body>
</html>

