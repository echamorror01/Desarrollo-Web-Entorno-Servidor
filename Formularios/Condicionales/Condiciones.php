<?php
//Condicionales

echo'<link rel="stylesheet" href="estilo.css">';
echo"<body>";
echo'<div class="bordes">';

$usuario=$_GET["usuario"];
$contraseña=$_GET["contraseña"];

if($usuario=="Juan"|| $usuario=="Beatriz" || $usuario=="Laura" || $usuario=="Elena"){
    echo"Estas dentro del sistema";
}else{
    echo"Usuario no autorizado";
}

echo'<br>';
echo'<a href="radio.html">Volver a la pagina principal</a>';
echo"</div>";

echo"</body>";

?>