<?php
//Radio

echo'<link rel="stylesheet" href="estilo.css">';

echo"<body>";
echo'<div class="bordes">';

if(!empty($_GET["nombre"])){   //si el el nombre no esta vacio 
$nombre=$_GET["nombre"];
$estudios=$_GET["estudios"];
$contador=0;


$listadeestudios=implode("<br>",$estudios);  //el implode une todos los elementos del array colocando un separador 


echo"Tu nombre es: $nombre <br> Datos academicos: $listadeestudios";
}else{
    
    echo"Debes introducir un nombre";
    echo"<br>";
    echo'<a href="radio.html">Volver a la pagina principal</a>';
}

echo"</div>";
echo"</body>";
echo'<a href="radio.html">Volver a la pagina principal</a>';
?>