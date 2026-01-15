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

 




// ===== CLASE DvdCine (la que ya tienes) =====
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

// ===== MENÚ =====
do {
    echo "\n--- MENÚ DE OPCIONES ---\n";
    echo "1. Mostrar lista de películas (Título y productora)\n";
    echo "2. Mostrar la película de mayor duración\n";
    echo "3. Pedir un género y mostrar títulos\n";
    echo "4. Fin\n";
    echo "Elige una opción: ";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {

        case 1:
            echo "\nLISTA DE PELÍCULAS:\n";
            foreach ($peliculas as $peli) {
                echo "- " . $peli->getTitulo() . " (" . $peli->getProductora() . ")\n";
            }
            break;

        case 2:
            $max = $peliculas[0];
            foreach ($peliculas as $peli) {
                if ($peli->getDuracion() > $max->getDuracion()) {
                    $max = $peli;
                }
            }
            echo "\nPELÍCULA MÁS LARGA:\n";
            echo $max->getTitulo() . " - " . $max->getDuracion() . " minutos\n";
            break;

        case 3:
            echo "\nIntroduce un género: ";
            $generoBuscado = strtolower(trim(fgets(STDIN)));
            echo "PELÍCULAS DEL GÉNERO '$generoBuscado':\n";

            $encontradas = false;
            foreach ($peliculas as $peli) {
                if (strtolower($peli->getGenero()) == $generoBuscado) {
                    echo "- " . $peli->getTitulo() . "\n";
                    $encontradas = true;
                }
            }

            if (!$encontradas) {
                echo "No se encontraron películas de ese género.\n";
            }
            break;

        case 4:
            echo "\nFin del programa.\n";
            break;

        default:
            echo "\nOpción no válida.\n";
    }

} while ($opcion != 4);






?>