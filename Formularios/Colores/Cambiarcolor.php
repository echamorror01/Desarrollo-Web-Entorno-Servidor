
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body
    style= "background-color: 
<?php
//cambiar de color la pagina 
$opciones=$_GET["opciones"] ?? "opcion1";    // valor por defecto o @delante de opciones 

switch ($opciones){
    case "opcion1":
       echo"white";
    break;
    case "opcion2":
       echo"red";
        break;
    case "opcion3":
       echo"green";
        break;
    case "opcion4":
        echo"blue";
        break;
    case "opcion5":
       echo"yellow";
        break;
    case "opcion6":
        echo"cyan";
        break;
    case "opcion7":
        echo"purple";
        break;
    case "opcion8":
       echo"Black";
        break;                
        default:
        echo"White";
        break;
}

?>;">
    <form action="" method="get">
        <h2>Cambiar de color de fondo mi pagina</h2>
        <label for="colores">ELEGIR FONDO</label>
        <select name="opciones" id="opciones">
            <option value="opcion1">Blanco</option>
            <option value="opcion2">Rojo</option>
            <option value="opcion3">Verde lima</option>
            <option value="opcion4">Azul</option>
             <option value="opcion5">Amarillo</option>
              <option value="opcion6">Cian</option>
               <option value="opcion7">Fucsia</option>
                <option value="opcion8">Negro</option>
        </select>   
        <input type="submit" value="CambiarColor"> 
    </form>
  
</body>
</html>





