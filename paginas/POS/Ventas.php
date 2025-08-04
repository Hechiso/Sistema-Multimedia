<?php
// Aumenta el tiempo de vida de la sesión a 8 horas (28800 segundos)
ini_set('session.gc_maxlifetime', 28800);
ini_set('session.cookie_lifetime', 28800);
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

echo '<hr></hr>';
include 'agregar_ventas.php';
 


 echo '<hr></hr>'; 
 include 'sumar_ticket.php';

?>

      </div>



      <div class="izquierda">
	 <form method="POST" action="agregar_ventas.php">
             <label class="codigo">escribe el codigo</label>
	     <input type="text" class="fecha" name="sku"></input>
             <br></br>
	     <label class="codigo">cantidad</label>
             <input type="text" class="fecha" name="cantidad"></input>
             <br></br>
             <button type="submit">agregar a ticket</button>
	 </form>
         
	 <form method="POST" action="sumar_ticket.php">
             <br></br>
             <button type="submit" class="cerrar">Cerrar compra</button>
         </form>

      </div>

  </div>

<script src="../../js/reloj_actual.js"></script>


</body>
</html>

