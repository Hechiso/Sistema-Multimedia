<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registrar nuevo cajero</title>

    <link rel="stylesheet" href="../../css/estilos_principal.css">
    <link rel="stylesheet" href="../../css/estilos_nuevo.css">

</head>
<body class="cuerpo">

<!-- Div Izquierdo: Registro -->
    <div class="container">
       <form method="post" action="registrar.php" autocomplete="off">

            <h2>Registrar</h2>
            <input type="text" name="usuario" placeholder="Cajero" required>
            <input type="password" name="contra" placeholder="Constraseña" required>
            <br></br>
	    <button type="submit" name="enviar">Registrar</button>
        </form>
    </div>




</body>
</html>

