<?php
session_start(); // se guardar en el servidor 
echo "<h1>Estoy en la pagina 1</h1>";
$_SESSION["nombre"]= "Estrella";
$_SESSION["apellido"]="Chamorro";
if(isset($_SESSION["contador"]))
    $_SESSION["contador"]++;
else
    $_SESSION["contador"]=1;
echo "<br><br>Contador de visitas"; 
echo $_SESSION["contador"];
 echo"<br>";
 //echo "<a href='pagina2.php'>Ir a la pagina siguiente 2 </a>";  ENLACE
 echo "<a href='pagina2.php?variable1=IES & variable2=IES2'>"."Ir a pagina 2</a>";  //cuando haga click en el enlace pagina numero 2 me sale arriba variable=IES

 echo"<br>";

?>