<?php
//Hacer una matriz  de 5x5 rellenar las diagonales con 0 y lo demás con numeros aleatorios y rellenar las 4 partes con numeros 

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

// Uso
$miMatriz = matriz();
mostrar($miMatriz);




?>