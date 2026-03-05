<?php
//pepito 
include_once("BD.php");

if ((isset($_GET["comprar"])) && (isset($_GET["como"])) )  {	
        foreach ( $_GET["como"] as $como ){
             $arra_de_miStock=Base::getVariosStock($como);
             foreach ($arra_de_miStock as $miStock){
                $produc1=$miStock->getProducto();
                $tienda1=$miStock->getTienda();
                $unidades1=$miStock->getUnidades();
                Base::comprar_producto($produc1,$tienda1,$unidades1);
             }
                        
             Base::borrar_stock($produc1);
             Base::borrar_producto($produc1);
    }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <!--<link rel="stylesheet" type="text/css" href="estilo/miestilo.css"/>-->
</head>
<body>

<div id="contenedor">
    
<pre>
        <a href="verBorrados.php">Ver registros borrados</a>   <a href="borrar.php">Borrado definitivo de registros borrados</a>
        </pre>
        <hr>
        <h1 style='text-align:center'>Listado de productos</h1>


    <div id="productos">
        <form    action="<?Php  echo   $_SERVER['PHP_SELF'];  ?>" method="get">
        <table width="80%" border="1" align="center">
            <tr>
            <th>Codigo</th><th>Nombre</th><th>Precio</th><th>Familia</th>
            <th>Total Unidades</th><th>Tiendas</th>
            <th class="bot"><input type='submit' name='comprar' id='comprar' value='Comprar'></th>
            </tr>
        <?php
        $array_de_productos = Base::getProductos();
        foreach ($array_de_productos as $pro){
           // echo $pro->getFamilia();
            $valor=Base::get1Stock($pro->getCodigo());
            $unidades=$valor->getUnidades();
          
            ?>
            <tr>
            <td><?php echo $pro->getCodigo(); ?></td>
            <td><?php echo $pro->getNombreCorto() ?></td>
            <td><?php echo $pro->getPVP(); ?></td>
            <td><?php echo $pro->getFamilia(); ?></td>
            <td><?php echo Base::totalUnidades($pro->getCodigo()); ?></td>
            <td class="bot"><a href="verTiendas.php?frm_codigo=<?Php echo $pro->getCodigo(); ?>"><input type='button' name='desglose' id='del' value='Ver tiendas'></a></td>
            <td class='bot'><input type="checkbox" name="como[]" id="como1" value="<?Php echo $pro->getCodigo(); ?>"></td>
            </tr>
       <?php
            }
        ?>
    </table>
    </form>
    </div>  <!--fin de productos-->

  <br class="divisor" />
  
    <div id="pie">
       
    </div> <!--fin de pie-->
</div> <!--fin de contenedor-->
</body>
</html>
