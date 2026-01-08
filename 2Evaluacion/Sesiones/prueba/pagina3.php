<?php
session_start();
echo "<h1>Estoy en la pagina 3</h1>";
echo "<br>" .$_SESSION["nombre"];
echo "<br>" .$_SESSION["apellido"];
$_SESSION["contador"]++;
echo "<br>Contador de visitas";
echo $_SESSION["contador"];
echo "<br>";
 echo "<a href='pagina4.php'>Ir a la pagina siguiente 4 </a>";
 echo "<br>";
 echo "<a href='pagina2.php'>Ir a la pagina anterior 2 </a>";




?>