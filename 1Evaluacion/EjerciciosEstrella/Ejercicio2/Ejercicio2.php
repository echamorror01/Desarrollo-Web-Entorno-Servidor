

<?php
// JUAN LO UNICO QUE ME FALTA ES CONTAR LAS VECES ME LO GUARDA BIEN EN EL FICHERO 
function fruta($fruit) {
    // Definir el nombre del archivo donde se guardarán los votos
    $filename = 'votos.txt';

    // Leer el contenido actual del archivo (si existe)
    if (file_exists($filename)) {
        $votes = file_get_contents($filename);
        $votesArray = explode("\n", $votes);
    } else {
        // Si el archivo no existe, inicializar un array vacío
        $votesArray = [];
    }

    // Incrementar el contador de votos para la fruta elegida
    if (in_array($fruit, $votesArray)) {
        $index = array_search($fruit, $votesArray);
        $votesArray[$index]++;
    } else {
        $votesArray[] = $fruit;
    }

    // Convertir el array a una cadena y guardar en el archivo
    file_put_contents($filename, implode("\n", $votesArray));
}

// Verificar si se ha realizado un voto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fruta'])) {
    $fruit = $_POST['fruta'][0]; // Tomar el primer valor seleccionado en caso de más opciones
    fruta($fruit);
    echo "Votaste por la fruta: " . $fruit;
} else {
?>

<h2>Encuesta: ¿Cuál es tu fruta favorita?</h2>
<form method="post">
    <input type="radio" name="fruta[]" value="Manzana">Manzana <br>
    <input type="radio" name="fruta[]" value="Platano">Platano <br>
    <input type="radio" name="fruta[]" value="Naranja">Naranja <br>
    <input type="radio" name="fruta[]" value="Uva">Uva <br>
    <br>
    <input type="submit" value="Votar">
</form>

<?php
}

?>


