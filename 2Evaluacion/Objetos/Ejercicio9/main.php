<?php
/*Esta c */

include("Ejercicio9.php");

$EmpleadoTelefono1= new Empleado("Estrella","Chamorro", 4000,[680744267]);

echo "Empleado 1";
echo "Nombre" . $EmpleadoTelefono1->getNombre() . "<br>";
echo  "Telefono Añadido" .$EmpleadoTelefono1->añadirTelefonos(924560145) . "<br>";
echo "Lista de telefonos" .$EmpleadoTelefono1->listartelefonos() ."<br>";
$EmpleadoTelefono1->vaciarTelefonos();
echo "Lista de telefonos" .$EmpleadoTelefono1->listartelefonos();


?>
