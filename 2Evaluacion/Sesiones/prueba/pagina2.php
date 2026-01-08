<?php
session_start();
echo "<br> Variable enviada por get " . $_GET["variable1"];
echo "<br> Variable enviada por get " . $_GET["variable2"];

echo "<h1>Estoy en la pagina 2</h1>";
echo "<br>" .$_SESSION["nombre"];
echo "<br>" .$_SESSION["apellido"];
$_SESSION["contador"]++;
echo "<br>Contador de visitas";
 echo "<br>" .$_SESSION['contador'];
echo "<br>";
 echo "<a href='pagina3.php'>Ir a la pagina siguiente 3 </a>";
 echo "<br>";
 echo "<a href='pagina1.php'>Ir a la pagina anterior 1 </a>";

?>