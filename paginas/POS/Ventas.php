<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal</title> 
  <link rel="stylesheet" href="../../css/estilos_principal.css">
  <link rel="stylesheet" href="../../css/estilos_POS.css">
  
</head>

<body class="cuerpo">
 
  <a href="#">escanear codigo</a>
  <a href="#">escribir codigo</a>
  <a href="#">cancelar compra</a>
  <a href="#" class="fecha">corte</a>

  <br></br>
  <hr></hr> 

  <div class="contenedor">
      <div class="derecha">
          <p>Hoy es 
             <?php echo date("d/m/Y"); ?> 
             y la hora actual es 
             <span id="hora"></span>
	  </p>
<?php
if (isset($_SESSION['usuario'])) {
    echo "Bienvenido," . htmlspecialchars($_SESSION['usuario']) . "!  hora de vender";
} else {
    echo "No has iniciado sesión.";
}
?>
      </div>



      <div class="izquierda">
	 <form>
             <label class="codigo">escribe el codigo</label>
             <input type="text"></input>
         </form>
      </div>

  </div>

<script src="../../js/reloj_actual.js"></script>


</body>
</html>

