<?php
//Generar una matriz y rellenarla con random y guardarla en un fichero de texto
function matriz(){
    echo "Tamaño de la matriz";
    $tamaño=5;
    $matriz=[];
    for($i=0;$i<$tamaño;$i++){
        for($j=0;$j<$tamaño;$j++){  
            if($i==$j || $i+$j==4){
               $matriz[$i][$j]=0; //diagonal principal y secundaria
            
            }else{
                 $matriz[$i][$j]= rand(1,20);
            }
        }
    }
    return $matriz;
}

function mostrar($matriz){
 echo "<table border='1' cellpadding='5' cellspacing='0'>";
    for($i = 0; $i < 5; $i++){
        echo "<tr>";
        for($j = 0; $j < 5; $j++){
            echo "<td>".$matriz[$i][$j]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


function guardarmatriz($matriz){
$archivo=fopen("matriz.txt","w+b");
if($archivo){
    foreach($matriz as $fila){
        fwrite($archivo,implode(" ",$fila) . PHP_EOL);
    }
    fclose($archivo);
    echo "La matriz ha sido guardada correctamente";
}else{
    echo "Error";
}

}

function leermatriz($archivoNombre) {
    $matriz = [];
    $archivo = fopen($archivoNombre, "r");  // Abrir el archivo en modo lectura
    
    if ($archivo) {
        while (($linea = fgets($archivo)) !== false) {
            // Convertir la línea en un array de números (separados por espacios)
            $fila = explode(" ", trim($linea));  // 'trim' para eliminar espacios innecesarios
            $matriz[] = $fila;  // Agregar la fila a la matriz
        }
        fclose($archivo);
    } else {
        echo "Error al abrir el archivo para leer.<br>";
    }
    
    return $matriz;
}

// Uso
$miMatriz = matriz();
mostrar($miMatriz);
guardarmatriz($miMatriz);
$matrizLeida = leermatriz("matriz.txt");
mostrar($matrizLeida); // esto opcional
?>