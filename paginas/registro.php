<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Inicia Sesion</title>

    <link rel="stylesheet" href="../css/estilos_principal.css">
    <link rel="stylesheet" href="../css/estilos_nuevo.css">
   
</head>
<body class="cuerpo">



    <!-- Div Derecho: Inicio de sesión -->
    <div class="container right">
	<form method="post" action="../php/iniciar.php" autocomplete="off">
            <h2>Entrar</h2>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <button type="submit" name="enviar">Entrar</button>
        </form>
</div>

</body>
</html>

