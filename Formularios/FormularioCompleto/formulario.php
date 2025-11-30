<?php
//Tenemos que crear el grabado del formulario y el ver contenido todo 

//Grabar el contenido en un documento 

if (isset($_GET["accion"]) && $_GET["accion"] == "Grabar") {
    // Obtener los valores del formulario
    $nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : '';
    $apellidos = isset($_GET["apellidos"]) ? $_GET["apellidos"] : '';
    $sexo = isset($_GET["sexo"]) ? $_GET["sexo"] : '';
    $fecha = isset($_GET["fecha"]) ? $_GET["fecha"] : '';
    $modulos = isset($_GET["modulos"]) ? $_GET["modulos"] : '';
    if (is_array($modulos)) {
        //convertimos el array en cadena , apuntado en la libreta 
        $modulos = implode(", ", $modulos);
    }

    $comentarios = isset($_GET["comentarios"]) ? $_GET["comentarios"] : '';

    
    $archivo = fopen("datosEjercicio.txt", "a+b");// la a escribe y lee y no borra el contenido 
    
    if ($archivo) {
        fwrite($archivo, "Nombre: " . $nombre . PHP_EOL);  // Salto de línea
        fwrite($archivo, "Apellidos: " . $apellidos . PHP_EOL);
        fwrite($archivo, "Sexo: " . $sexo . PHP_EOL);
        fwrite($archivo, "Fecha: " . $fecha . PHP_EOL);
        fwrite($archivo, "Módulos: " . $modulos . PHP_EOL);
        fwrite($archivo, "Comentarios: " . $comentarios . PHP_EOL);
        fwrite($archivo, "-------------------------------" . PHP_EOL);  //para separar los datos de los demas

        // Cerramos el archivo
        fclose($archivo);
        echo "Datos grabados con éxito";
    } else {
       
        echo "Error";
    }
    
// Ver el contenido de todo el archivo (leer)
}elseif(isset($_GET["accion"]) && $_GET["accion"] == "Ver contenido"){
     $archivo = fopen("datosEjercicio.txt", "rb"); //modo lectura
    if($archivo){
        while(feof($archivo)==false){
        $linea=fgets($archivo);
        if ($linea !== false) {
                echo nl2br($linea);
            }
     }
     fclose($archivo);
    }else{
        echo "No se puede abrir el archivo ";
    }
     
}else{
    echo "No se ha recibido ninguna acción ";
}









?>





