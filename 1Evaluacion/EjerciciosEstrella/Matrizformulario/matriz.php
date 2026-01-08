<?php
// Función para generar la matriz
function matriz($tamaño){
    $matriz = [];
    for ($i = 0; $i < $tamaño; $i++) {
        for ($j = 0; $j < $tamaño; $j++) {
            if ($i == $j || $i + $j == $tamaño - 1) {
                $matriz[$i][$j] = 0; // Diagonal principal y secundaria
            } else {
                $matriz[$i][$j] = rand(1, 20);
            }
        }
    }
    return $matriz;
}

// Función para mostrar la matriz en HTML
function mostrar($matriz){
    echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>";
    foreach ($matriz as $fila) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td style='padding: 10px; text-align: center;'>$valor</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Función para guardar la matriz en un archivo
function guardarmatriz($matriz, $archivoNombre = "matriz.txt"){
    $archivo = fopen($archivoNombre, "w+b");
    if ($archivo) {
        foreach ($matriz as $fila) {
            fwrite($archivo, implode(" ", $fila) . PHP_EOL);
        }
        fclose($archivo);
        echo "La matriz ha sido guardada correctamente.<br>";
    } else {
        echo "Error al guardar la matriz.<br>";
    }
}

// Función para leer la matriz desde el archivo
function leermatriz($archivoNombre = "matriz.txt") {
    $matriz = [];
    $archivo = fopen($archivoNombre, "r");  // Abrir el archivo en modo lectura
    
    if ($archivo) {
        while (($linea = fgets($archivo)) !== false) {
            $fila = array_map('intval', explode(" ", trim($linea)));  // Convertir la línea a enteros
            $matriz[] = $fila;
        }
        fclose($archivo);
    } else {
        echo "Error al abrir el archivo para leer.<br>";
    }
    
    return $matriz;
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tamano'])) {
    $tamaño = (int) $_POST['tamano'];  // Obtener el tamaño desde el formulario
    if ($tamaño > 0) {
        $miMatriz = matriz($tamaño);  // Generar la matriz
        mostrar($miMatriz);  // Mostrar la matriz generada
        guardarmatriz($miMatriz);  // Guardar la matriz en el archivo
    } else {
        echo "Por favor, ingrese un tamaño válido mayor a 0.<br>";
    }
} else {
    echo "Introduce el tamaño de la matriz para generarla.";
}

?>

<!-- Formulario HTML para ingresar el tamaño de la matriz -->
<form method="post" action="">
    <label for="tamano">Tamaño de la matriz:</label>
    <input type="number" id="tamano" name="tamano" min="1" required>
    <button type="submit">Generar Matriz</button>
</form>
