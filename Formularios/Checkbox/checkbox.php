
<?php
//Checkbox

echo'<link rel="stylesheet" href="estilo.css">';

echo"<body>";
echo'<div class="bordes">';

if(!empty($_GET["nombre"])){   //si el el nombre no esta vacio 
$nombre=$_GET["nombre"];
$deporte=$_GET["deporte"];
$contador=0;


$listadedeportes=implode("<br>",$deporte);  //el implode une todos los elementos del array colocando un separador 
$contador=count($deporte);

echo"Tu nombre es: $nombre , has seleccionado $contador deportes y son los siguientes: $listadedeportes";
}else{
    
    echo"Debes introducir un nombre";
    echo"<br>";
    echo'<a href="checkbox.html">Volver a la pagina principal</a>';
}

echo"</div>";
echo"</body>";
echo'<a href="checkbox.html">Volver a la pagina principal</a>';
?>