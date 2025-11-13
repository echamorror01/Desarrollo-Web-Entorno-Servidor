<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
    <form action="" method="get">
        <table class="bordes">
            <tr>
                <th colspan="2" class="color">Uso de select</th>
            </tr>
        <tr>
            <td><label for="name">Nombre</label></td>
            <td><input type="text" name="nombre"></td>
        </tr>
        <tr>   
            <td><label for="name">Ingresos</label></td>  <!--El name tiene que ser igual  checked para que ponga el tik por defecto-->
            <td><label for="">Impuestos</label>
                <select name="opciones" id="impuestos">
                <option value="opcion1">1-1000</option>
                <option value="opcion2">1001-3000</option>
                <option value="opcion3">3000</option>
            </select>                
                 </td>  <!--cuidado con los[] porque es un array -->
        </tr>
         <tr>
            <td colspan="2"  style="text-align:center;">
                <input type="submit" value="Enviar">
            </td> 
         </tr>
         </table>
        
    </form>
    <?php
//Select

echo'<link rel="stylesheet" href="estilo.css">';

echo"<body>";
echo'<div class="bordes">';

$nombre=isset($_GET["nombre"])?$_GET["nombre"]:"";  //si existe el nombre me lo coge y si no nada  


if(!empty($nombre)){  //si no está vacio
$opciones=$_GET["opciones"];
switch($opciones){
    case"opcion1":
        echo"No debes pagar impuestos";
        break;
    case "opcion2":
        echo"No debes pagar impuestos";
        break;
    case "opcion3":
        echo"Debes pagar impuestos";
        break;
        default:
        echo"opcion no valida";
        break;
                
}
}

echo"</div>";
echo"</body>";

?>
</body>
</html>