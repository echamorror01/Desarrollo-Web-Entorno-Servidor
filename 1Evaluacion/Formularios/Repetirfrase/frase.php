
<?php
//Repetir frase

echo'<link rel="stylesheet" href="estilo.css">';
echo"<body>";
echo'<div class="bordes">';

$frase=$_GET["frase"];
$veces=$_GET["veces"];

echo "<h2>Frase: $frase</h2>" ;

for($i=1;$i<=$veces;$i++){
    $mensaje= $i. ".-". $frase; 
    if($i%2==0){
        echo'<div class="verde">'.$mensaje. '</div>';
    }else{
         echo'<div class="azul">'.$mensaje. '</div>';

    }
}
echo'<a href="radio.html">Volver a la pagina principal</a>';
echo"</div>";


echo"</body>";
?>