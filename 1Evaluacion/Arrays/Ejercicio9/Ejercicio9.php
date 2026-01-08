<?php
/*Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción). Utiliza un array asociativo para almacenar las parejas de palabras. 
El programa pedirá una palabra en español y 
dará la correspondiente traducción en inglés.*/


$diccionario = [
    "Hola" => "Hello",
    "Adios" => "Goodbye",
    "Casa" => "Home",
    "Manzana" => "Apple",
    "Libro" => "Book",
    "Perro" => "Dog",
    "Gato" => "Cat",
    "Amigo" => "Friend",
    "Cielo" => "Sky",
    "Agua" => "Water",
    "Sol" => "Sun",
    "Luna" => "Moon",
    "Playa" => "Beach",
    "Comida" => "Food",
    "Escuela" => "School",
    "Trabajo" => "Work",
    "Familia" => "Family",
    "Ciudad" => "City",
    "Montaña" => "Mountain",
    "Viento" => "Wind"
];


if(isset($_GET["palabra"])){
    $palabra=$_GET["palabra"];
if (array_key_exists($palabra, $diccionario)) {
    echo "La traducción de '$palabra' es: " . $diccionario[$palabra] . "\n";
} else {
    echo "Lo siento, no tengo la traducción para '$palabra'.\n";
}
}
?>


