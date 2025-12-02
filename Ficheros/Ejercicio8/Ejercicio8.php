<?php
//Recupera el código fuente de una página html; y usando las funciones para cadenas de php muestra por pantalla cuántas veces aparece la etiqueta
//  <h1> o cualquier otra etiqueta. 
// Utilizar  la función file_get_contents()  y la funcion es substr_count().


// URL de la página HTML que deseas recuperar
$url = 'Ejercicio8.html';

// Recupera el código fuente de la página HTML
$html = file_get_contents($url);

// Contar cuántas veces aparece la etiqueta <h1>
$h1_count = substr_count($html, '<h1>');

// Mostrar el número de veces que aparece la etiqueta <h1>
echo 'Número de veces que aparece <h1>: ' . $h1_count . '<br>';

// Si deseas contar otras etiquetas, por ejemplo <p>, puedes hacerlo así:
$p_count = substr_count($html, '<p>');
echo 'Número de veces que aparece <p>: ' . $p_count . '<br>';

// También puedes buscar otras etiquetas, como <div>, <a>, etc.
$div_count = substr_count($html, '<div>');
echo 'Número de veces que aparece <div>: ' . $div_count . '<br>';
?>



