<?php 
  session_start();
  if (isset($_SESSION["usuario"])){
    $usuario=$_SESSION["usuario"];
  }else {
    $usuario="SIN SESION";
    $_SESSION["usuario"]="Estrella Chamorro Real ";
  }
  	require_once "Comidas.php";
	require_once "BD.php";
	
	if ((isset($_REQUEST["f_comida"])) && (isset($_REQUEST["f_descripcion"])) && (isset($_REQUEST["f_precio"]) && is_numeric($_REQUEST["f_precio"])) && (isset($_REQUEST["f_tipo"])) )    {
		$afectados=Base::insertar_comida($_REQUEST["f_comida"],$_REQUEST["f_descripcion"],$_REQUEST["f_precio"],$_REQUEST["f_tipo"]);
		header('Location:index.php');
		
	}
	
    if(isset($_REQUEST['idcomida'])){  
			$cantidad=Base::getcantidad($_REQUEST['idcomida']);
			
			if ($cantidad>0){
				Base::actualizar_carrito ($_REQUEST['idcomida']);
				}
			else{	
				$array_de_comida = Base::getComida($_REQUEST['idcomida']);
				foreach ($array_de_comida as $comida){
					$codigo=$comida->getcodigoComida();
					$nombre=$comida->getnombreComida();
					$descripcion=$comida->getdescripcionComida();
					$precio=$comida->getprecioComida();
					$tipo=$comida->getcodigoTipoComida();
					$cantidad=1;
					$usario=$usuario;
				}
				Base::insertar_carrito($codigo,$nombre,$descripcion,$precio,$tipo,$cantidad,$usario);
			}
			
        
   	 } 
        if(isset($_REQUEST['idcomida2'])){
            $valor=Base::borrar_comida($_REQUEST['idcomida2']);
            
            if ($valor=='0'){
                  echo '<script> alert("Imposible realizar el borrado")</script>';

              }
          else {
            
            header('Location:index.php');}
        }
?>



<!DOCTYPE html> 
<html lang="es">
<meta charset="UTF-8">  
<head> 
    <link rel="stylesheet" href="css/estilos.css" />  
    <title>Carrito de comidas</title> 
</head> 

<body> 
<div id="cabecera">Restaurante "EL GRAN HOTEL"      <span> (Alumno:<?php  echo $_SESSION["usuario"];?>)</span></div>
<div id="contenorAniadir">
<h1>Gestion comidas</h1>
<form action="<?Php  echo   $_SERVER['PHP_SELF'];  ?>" method="post">
<table> 
    <tr> 
        <th>Comida</th> 
        <th>Descripción</th> 
        <th>Precio</th> 
        <th>Tipo</th> 
    </tr>
    <tr>
    <td><input type="text" name="f_comida" size="20"></td>
    <td><input type="text" name="f_descripcion" size="40"></td>
    <td><input type="text" name="f_precio" size="5"></td>
  
  <td><select name="f_tipo"> 
    <?php           
     echo "<option value=''>Elige tipo</option>  ";                 
        $array_tipoComidas=Base::getTipoComidas();
            foreach ($array_tipoComidas as $tipo) {
                        echo "<option value='".$tipo->getcodigoTipoComida()."'>";
                    echo $tipo->getnombreTipoComida();
                 echo "</option>";
            
            }
    ?>
    </select>
  </td>
    <td><input type='submit' name='up' id='up' value='Insertar'></td>
	</tr>
    </table>
   </form>
</div>


<?php



$array_de_comidas = Base::getComidas();
?>



   <div id="contenedor"> 
       
        <h1>Listado de Comidas del Restaurante</h1>
<table> 
    <tr> 
        <th>Comida</th> 
        <th>Descripción</th> 
        <th>Precio</th> 
        <th>Acción</th> 
        <th>Eliminar</th> 
    </tr> 
    <?php 
		foreach ($array_de_comidas as $comida){?>
        <tr> 
            <td><?Php echo $comida->getnombreComida(); ?></td> 
            <td> <?Php echo $comida->getdescripcionComida(); ?></td> 
            <td class="numero"><?Php echo $comida->getprecioComida(); ?> €</td> 
            <td><a href="index.php?idcomida=<?Php echo $comida->getcodigoComida() ?>">Añadir al carrito</a></td>
            <td><a href="index.php?idcomida2=<?Php echo $comida->getcodigoComida() ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
         </tr>
            <?php } ?>
          
     
</table>
<br>
<a href="carrito.php">Ver carrito</a>
        
    </div>

</body> 
</html>