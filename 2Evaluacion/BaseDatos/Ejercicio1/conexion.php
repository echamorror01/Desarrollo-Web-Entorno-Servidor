<?php
include "datosconexion.php";
try {
  	$conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $usuario, $clave);
	// Establecer el modo de error PDO en excepción
   	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	 //echo "Base de datos conectada";
	   $conexion->exec("SET CHARACTER SET utf8");
	
    }
catch(Exception $e)
    {
	    echo "Error al realizar la conexión: " . $e->getMessage();
    }



?>