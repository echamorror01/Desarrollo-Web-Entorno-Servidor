
<?php
//Checkbox

echo'<link rel="stylesheet" href="estilo.css">';

echo"<body>";
echo'<div class="bordes">';
if(isset($_GET["nombre"])){   //si existe el nombre me haces todo esto 
$nombre=$_GET["nombre"];
$deporte=$_GET["deporte"];
$contador=0;


$listadedeportes=implode("<br>",$deporte);  //el implode te guarda los deportes seleccionados
echo"<br>";
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