<?php

/* Diseña un programa Php que trabaje con la clase DvdCine creada en el ejercicio anterior. Debe crear un array de  10 elementos de la clase DvDCine con los datos que siguen aquí. Diseñar un menú de opciones como el siguiente y programarlo.
		
new DvdCine ("El hobbit. La desolación de Smaug", "Peter Jackson", "New Line Cinema."
            + "Metro-Goldwyn-Mayer", "Ian McKellen, Martin Freeman", "Ciencia ficción", "Bla...", 123);
new DvdCine ("El Padrino", "Francis Ford Copola", "Paramount Pictures"
            , "Al Pacino, Marlon Brando", "Drama", "Bla...", 175);
new DvdCine ("Titanic", "Francis Ford Copola", "Paramount Pictures. 20th Century Fox"
            , "Di Caprio", "Drama", "Bla...", 123);
new DvdCine ("El Rey León", "WD", "Walt Dysney"
            , "------", "Animación", "Bla...", 86);
new DvdCine ("Los Vengadores", "--", "Marvel Studios. Walt Dysney"
            , "--", "Ciencia ficción", "Bla...", 114);
new DvdCine ("Avatar", "Francis Ford Copola", "20th Century Fox"
            , "--", "Ciencia ficción", "Bla...", 126);
new DvdCine ("Harry Potter. Las reliquias de la muerte", "--", "Warner Bros.", "--", "Ciencia ficción", "Bla...", 131);
new DvdCine ("El señor de los anillos. El retorno del rey", "Francis Ford Copola", "New Line Cinema", "--", "Ciencia ficción", "Bla...", 175);
new DvdCine ("Toy Story 3", "----", "Dysney/Pixar", "--", "Animación", "Bla...", 78);
new DvdCine ("The Dark Knight Rises", "--", "Warner Bros.", "--", "Ciencia ficción", "Bla...", 99);

Menú de opciones:
Mostrar la lista de películas (Título y productora)
Mostrar la película de más duración (Título y minutos)
Pedir un género y mostrar el título de las pelis de ese género.
Fin

*/

class DvdCine
{
    private $titulo;
    private $director;
    private $productora;
    private $actoresprincipales;
    private $genero;
    private $resumen;
    private $duracion;

    public function __construct($titulo, $director, $productora, $actoresprincipales, $genero, $resumen, $duracion)
    {
        $this->titulo = $titulo;
        $this->director = $director;
        $this->productora = $productora;
        $this->actoresprincipales = $actoresprincipales;
        $this->genero = $genero;
        $this->resumen = $resumen;
        $this->duracion = $duracion;
    }

    public function getTitulo() { return $this->titulo; }
    public function getProductora() { return $this->productora; }
    public function getGenero() { return $this->genero; }
    public function getDuracion() { return $this->duracion; }
}

// ===== CREACIÓN DEL ARRAY DE PELÍCULAS =====
$peliculas = [
    new DvdCine("El hobbit. La desolación de Smaug", "Peter Jackson",
        "New Line Cinema. Metro-Goldwyn-Mayer", "Ian McKellen, Martin Freeman",
        "Ciencia ficción", "Bla...", 123),

    new DvdCine("El Padrino", "Francis Ford Copola",
        "Paramount Pictures", "Al Pacino, Marlon Brando",
        "Drama", "Bla...", 175),

    new DvdCine("Titanic", "Francis Ford Copola",
        "Paramount Pictures. 20th Century Fox", "Di Caprio",
        "Drama", "Bla...", 123),

    new DvdCine("El Rey León", "WD",
        "Walt Dysney", "------",
        "Animación", "Bla...", 86),

    new DvdCine("Los Vengadores", "--",
        "Marvel Studios. Walt Dysney", "--",
        "Ciencia ficción", "Bla...", 114),

    new DvdCine("Avatar", "Francis Ford Copola",
        "20th Century Fox", "--",
        "Ciencia ficción", "Bla...", 126),

    new DvdCine("Harry Potter. Las reliquias de la muerte", "--",
        "Warner Bros.", "--",
        "Ciencia ficción", "Bla...", 131),

    new DvdCine("El señor de los anillos. El retorno del rey",
        "Francis Ford Copola", "New Line Cinema", "--",
        "Ciencia ficción", "Bla...", 175),

    new DvdCine("Toy Story 3", "----",
        "Dysney/Pixar", "--",
        "Animación", "Bla...", 78),

    new DvdCine("The Dark Knight Rises", "--",
        "Warner Bros.", "--",
        "Ciencia ficción", "Bla...", 99)
];


          
  //Opcion seleccionada
  $opcion= $_POST["opcion"] ?? null;
  $generobuscado= $_POST["genero"] ?? "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        h2 { color: #333; }
        .resultado { background: #f4f4f4; padding: 15px; margin-top: 20px; }
    </style>
</head>
</head>
<body>
    <h2>Menú de películas</h2>
    <form method="post">
    <label>Elige una opción:</label><br><br>

    <select name="opcion">
        <option value="1">Mostrar lista de películas</option>
        <option value="2">Película de mayor duración</option>
        <option value="3">Buscar por género</option>
        <option value="4">Fin</option>
    </select>

    <br><br>

    <label>Género (solo opción 3):</label><br>
    <input type="text" name="genero" placeholder="Ciencia ficción, Drama, Animación">

    <br><br>
    <button type="submit">Aceptar</button>
</form>


<?php

if ($opcion) {
    echo "<div class='resultado'>";

    switch ($opcion) {

        case 1:
            echo "<h3>Lista de películas</h3>";
            foreach ($peliculas as $peli) {
                echo "- <strong>{$peli->getTitulo()}</strong> ({$peli->getProductora()})<br>";
            }
            break;

        case 2:
            $max = $peliculas[0];
            foreach ($peliculas as $peli) {
                if ($peli->getDuracion() > $max->getDuracion()) {
                    $max = $peli;
                }
            }
            echo "<h3>Película más larga</h3>";
            echo $max->getTitulo() . " - " . $max->getDuracion() . " minutos";
            break;

        case 3:
            echo "<h3>Películas del género: $generobuscado</h3>";
            $encontradas = false;

            foreach ($peliculas as $peli) {
                if (strtolower($peli->getGenero()) == strtolower($generobuscado)) {
                    echo "- " . $peli->getTitulo() . "<br>";
                    $encontradas = true;
                }
            }

            if (!$encontradas) {
                echo "No se encontraron películas de ese género.";
            }
            break;

        case 4:
            echo "<h3>Fin del programa</h3>";
            break;
    }

    echo "</div>";
}
?>
</body>
</html>