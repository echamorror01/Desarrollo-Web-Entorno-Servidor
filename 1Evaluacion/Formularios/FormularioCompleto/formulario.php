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
//Creamos un array asociativo 
    $usuario=[
        "Nombre"=>$nombre,
        "Apellidos"=>$apellidos,
        "Sexo"=>$sexo,
        "Fecha"=>$fecha,
        "Modulos"=>$modulos,
    ];

    // Convertir array a JSON
    $json = json_encode($usuario, JSON_UNESCAPED_UNICODE);
   
    //Escribimos 
    $archivo = fopen("datosEjercicio.txt", "a+b");
    if ($archivo) {
        fwrite($archivo, $json . PHP_EOL); // Escribir línea + salto de línea
        fclose($archivo); // Cerrar archivo
        echo "Usuario guardado correctamente";
    } else {
        echo "Error al abrir el archivo.";
    }
// Ver el contenido de todo el archivo (leer)
}elseif(isset($_GET["accion"]) && $_GET["accion"] == "Ver contenido"){
if((leercontenido())){
    echo'<pre>';   //para respetar la estructura
    print_r(leercontenido());
    echo'</pre>';
}
else{
    echo "No se pudo abrir el archivo para lectura.";
}


// Ordenar por nombre  
}elseif(isset($_GET["accion"]) && $_GET["accion"] == "Ordenar por nombre"){
if((leercontenido())){
   $array = leercontenido();

if ($array) {
    usort($array, function($a, $b) {  // ordenar 
        return strcmp($a['Nombre'], $b['Nombre']);  //strcmp va comparando una cadena con otra 
    });

    echo '<pre>';
    print_r($array);
    echo '</pre>';
} else {
    echo "No se pudo abrir el archivo para lectura.";
}
}
else{
    echo "No se pudo abrir el archivo para lectura.";
}

 }else{
 echo "No se ha recibido ninguna acción ";
}



function leercontenido(){
    $usuarios=[];
// Abrimos el archivo en modo lectura ("r")
$archivo = fopen("datosEjercicio.txt", "r");
if ($archivo) {
    // Leemos línea por línea hasta el final del archivo
    while (($linea = fgets($archivo)) !== false) {
       // $linea = trim($linea); // Eliminar saltos de línea esto no hace falta pero por si acaso 
        if (!empty($linea)) {
            $usuarios[] = json_decode($linea, true); // Convertir JSON a array asociativo
        }
    }
    fclose($archivo); // Cerramos el archivo
    return $usuarios;
} else {
   return false;
}
    
}





?>





