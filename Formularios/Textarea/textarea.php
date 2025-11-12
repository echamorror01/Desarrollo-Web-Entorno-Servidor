
<?php
//Cambiar al mayusculas
echo'<link rel="stylesheet" href="estilo.css">';
echo'<body>';
echo'<div class="contenedor">';
echo'<p class="negro">CONTRATO</p>';

$comentario=$_GET["comentario"];
$COMENTARIO=strtoupper($comentario);
echo"$COMENTARIO";


echo'<br>';
echo'<a href="textarea.php">Volver a la pagina principal</a>';
echo'</div>';
echo'</body>';

?>