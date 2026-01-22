
<?php

include("Ejercicio10.php"); //para incluir lo del ejercicio 10

$Empleado1= new Empleado("Juan","Gordillo"); //Aqui por defecto tiene que coger 1000
$Empleado2= new Empleado("Mario","Guerrero", 5000);

echo $Empleado1 . "<br>";
echo "Empleado 1" . $Empleado1->debepagarimpuestos() . "<br>";
echo "Empleado 2" . $Empleado2->debepagarimpuestos()."<br>";

?>