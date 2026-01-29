
<?php

 include "EmpleadoSueldo.php";
$Empleado1= new Empleado("Estrella","Chamorro",333);
echo $Empleado1;


Empleado::setSueldotope(5000);  //para acceder a la variable estática de la clase 
echo $Empleado1;

?>