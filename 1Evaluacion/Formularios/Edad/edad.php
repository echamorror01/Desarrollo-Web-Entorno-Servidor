
<?php
//Edad

$nombre=$_GET["nombre"];
$edad=$_GET["edad"];

echo'<link rel="stylesheet" href="estilo.css">';
echo'<div class="color">';

switch($edad){
    case($edad>=0 && $edad<=5):
        $mensaje= "Nombre: $nombre Edad: $edad <br> Estas en la primera infancia";
        break;
    case($edad>=6 && $edad<=11):
        $mensaje="Nombre: $nombre Edad: $edad <br> Estas en la etapa infantil";
        break;
    case($edad>=12 && $edad<=18):
        $mensaje="Nombre: $nombre Edad: $edad <br> Eres un adolescente";
        break;
    case($edad>=14 && $edad<=26):
        $mensaje="Nombre: $nombre Edad: $edad <br> Estas en la etapa de la jueventud";
        break;
    case($edad>=27 && $edad<=59):
        $mensaje="Nombre: $nombre Edad: $edad <br> Eres una persona adulta";
        break;
    case($edad>=60):
        $mensaje="Nombre: $nombre Edad: $edad <br> Eres una persona de la tercera edad";
        break;
        default:
        echo"Error";                   

}
echo '<p style="color: red">';
echo"$mensaje";
echo'</p>';
echo"<br>";
echo'<a href="edad.html">Volver a la pagina principal</a>';






?>