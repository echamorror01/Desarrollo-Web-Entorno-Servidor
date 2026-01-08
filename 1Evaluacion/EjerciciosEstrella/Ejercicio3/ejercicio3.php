<?php
//Generar una matriz y rellenarla con random y guardarla en un fichero de texto
function matriz(){
    echo "Tamaño de la matriz";
    $tamaño=5;
    $matriz=[];
    for($i=0;$i<$tamaño;$i++){
        for($j=0;$j<$tamaño;$j++){  
         $matriz[$i][$j]= rand(1,20);
            
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


// Uso
$miMatriz = matriz();
mostrar($miMatriz);
guardarmatriz($miMatriz);

?>

<!-- Formulario HTML para ingresar el tamaño de la matriz -->
<form method="" action="" method="get">
    <label for="tamano">Numero a sustituir</label>
    <input type="number" id="numero" name="numero" min="1" required>
    <button type="submit">Sustituir</button><br>
    <a href="">Inicializar la matriz</a>
</form>
