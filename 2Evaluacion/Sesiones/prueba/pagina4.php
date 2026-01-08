<?php
session_start();
echo "<h1>Estoy en la pagina 3</h1>";
echo "<br>" .$_SESSION["nombre"];
echo "<br>" .$_SESSION["apellido"];
$_SESSION["contador"]++;
echo "<br>Contador de visitas";
echo $_SESSION["contador"];
echo "<br>";
/*session_destroy();*/ // se destruye la sesión 
echo "<br>";
 echo "<a href='pagina1.php'>Ir a la pagina anterior 1 </a>";
echo "<br>";
 echo "<a href='pagina3.php'>Ir a la pagina anterior 3 </a>";
header("Location:adios.php")// pega un salto a esta página

?>