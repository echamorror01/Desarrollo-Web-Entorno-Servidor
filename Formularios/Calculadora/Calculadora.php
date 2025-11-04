<?php
//Generar la calculadora

$numero=$_GET["numero"];
$opciones=$_GET["opciones"];
echo'<link rel="stylesheet" href="estilo.css">';
echo'<div class="color">';
switch ($opciones){
    case "opcion1":
            $doblar= $numero *2;
            echo"El doble de $numero es $doblar";
    break;
    case "opcion2":
        $cuadrado=$numero * $numero;
        echo"El cuadrado de $numero es $cuadrado";
        break;
    case "opcion3":
        $cubo=$numero * $numero *$numero;
        echo"El cubo de $numero es $cubo";
        break;
    case "opcion4":
        $raiz=sqrt($numero);       
        echo"La raiz de $numero es $raiz";
        break;
        default:
        echo"Opcion no válida";
        break;
}
echo"<br>";
echo"<br>";
echo'<a href="Calculadora.html">Volver a la pagina principal</a>';
echo"</div>";
?>