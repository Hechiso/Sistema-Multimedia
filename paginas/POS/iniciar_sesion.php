<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Iniciar sesion cajero</title>

    <link rel="stylesheet" href="../../css/estilos_principal.css">
    <link rel="stylesheet" href="../../css/estilos_nuevo.css">
    
</head>
<body class="cuerpo">

<!-- Div Izquierdo: Registro -->
    <div class="container">
	    <form method="post" action="iniciar.php" autocomplete="off">
            <h2>Iniciar sesion</h2>
            <input type="text" name="usuario" placeholder="Cajero" required>
            <input type="password" name="contra" placeholder="Contraseña" required>
            <button type="submit" name="enviar">Iniciar</button>
        </form>
    </div>

</body>
</html>

