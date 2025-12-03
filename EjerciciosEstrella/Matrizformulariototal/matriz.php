<?php
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

// Procesar el primer formulario (tamaño de la matriz)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tamano']) && !isset($_POST['submit_valores'])) {
    $tamaño = (int) $_POST['tamano'];  // Obtener el tamaño desde el formulario

    if ($tamaño > 0) {
        // Mostrar el formulario para ingresar los valores de la matriz
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='tamano' value='$tamaño'>"; // Enviar el tamaño
        echo "<h3>Ingresa los valores de la matriz $tamaño x $tamaño:</h3>";

        // Generar campos de entrada para cada celda de la matriz
        for ($i = 0; $i < $tamaño; $i++) {
            for ($j = 0; $j < $tamaño; $j++) {
                echo "<label>Celda ($i,$j):</label>";
                echo "<input type='number' name='celda[$i][$j]' required> ";
            }
            echo "<br><br>";
        }

        echo "<button type='submit' name='submit_valores'>Guardar y Mostrar</button>";
        echo "</form>";
    } else {
        echo "Por favor, ingresa un tamaño válido mayor a 0.<br>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_valores'])) {
    // Procesar el formulario con los valores ingresados por el usuario
    $tamaño = (int) $_POST['tamano'];
    $matriz = [];
    
    // Rellenar la matriz con los valores ingresados por el usuario
    foreach ($_POST['celda'] as $fila) {
        $matriz[] = array_map('intval', $fila); // Convertir los valores a enteros
    }

    // Mostrar la matriz
    mostrar($matriz);

    // Guardar la matriz en el archivo
    guardarmatriz($matriz);
}
?>

<!-- Formulario para ingresar el tamaño de la matriz -->
<form method="post" action="">
    <label for="tamano">Tamaño de la matriz:</label>
    <input type="number" id="tamano" name="tamano" min="1" required>
    <button type="submit">Generar formulario de valores</button>
</form>
