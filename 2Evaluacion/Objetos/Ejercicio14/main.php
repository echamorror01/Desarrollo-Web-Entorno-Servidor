<?php


include "EmpleadoStatic.php";

$Empleado1= new Empleado("Estrella","Chamorro",5000,[680744267,258963654]);

echo $Empleado1->getNombre(); 
print_r ($Empleado1->getTelefonos()); //el this es para dentro de la propia clase
//cuidado porque es un array y hay que imprimirlo con el print_r

?>