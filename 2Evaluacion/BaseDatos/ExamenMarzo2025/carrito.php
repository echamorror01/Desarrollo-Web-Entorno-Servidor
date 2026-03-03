<?php
  session_start();
  if (isset($_SESSION["usuario"])){
    $usuario=$_SESSION["usuario"];
  }else {
    $usuario="SIN SESION";
    $_SESSION["usuario"];
  }
  require_once "Comidas.php";
	require_once "BD.php";
	/* Actualizar*/
	if (isset($_REQUEST['Actualizar']) && (isset($_REQUEST['cantidades']))){
		  foreach ($_REQUEST['cantidades'] as $clave => $cant){
		    		$pp=Base::actualizar_carrito2($cant,$clave);
	  		 }
		  Base::borrar_0_carrito(0);
	 }
		
		
		
	
	
	$array_de_carrito = Base::getcarrito();
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <link rel="stylesheet" href="css/estilos.css" /> 
<title>CARRITO</title>
</head>
<body>
<div id="cabecera">Restaurante "EL GRAN HOTEL"       <span> (Alumno:<?php echo $_SESSION["usuario"];; ?>)</span></div>
 <div id="contenedor"> 
      
<h1>Carrito de comidas</h1> 

<form method="get" action="<?Php  echo   $_SERVER['PHP_SELF'];  ?>"> 
    <table>
        <tr> 
            <th>Comida</th> 
            <th>Cantidad</th> 
            <th>Precio</th> 
            <th>Subtotal</th> 
        </tr> 
       <?Php $total=0; 
	   foreach ($array_de_carrito as $carrito){?>
        <tr> 
            <td><?Php echo $carrito->getnombreCarrito(); ?></td> 
            <td>
            <input type="hidden" name="codigos[]"  value="<?Php echo $carrito->getcodigoCarrito(); ?>"/>
            <input type="text" name="cantidades[<?Php echo $carrito->getcodigoCarrito(); ?>]" size="3" value="<?Php echo $carrito->getcantidadCarrito(); ?>"/>
            
            
            </td> 
            <td class="numero"><?Php echo $carrito->getprecioCarrito(); ?> €</td> 
            <td><?Php echo $carrito->getcantidadCarrito()* $carrito->getprecioCarrito()?> €</td>
           <?Php $total=$total+$carrito->getcantidadCarrito()* $carrito->getprecioCarrito();?>
         </tr>
            <?php } ?>
    </table> 
    <?Php echo " Total carrito =".$total; ?> €
    <br/> 
    <input type="submit" name="Actualizar" value="Actualizar"/>
</form> 
<br/> 
<p>Para quitar una comida, pon 0 en cantidad</p>

<a href="index.php">Ir al restaurante</a>
</div>
   
</body>
</html>