<?php

/*
Diseña un programa Php que cree una clase llamada DvdCine. 
Su atributos serán: título, director, productora, actores principales, género, resumen y duración. 
Debe incluir un constructor que reciba como parámetros los atributos.
Crea un método llamado esThriller que devuelva true o false según la película sea o no de este género. 
Crea todos los métodos gets/sets.
Crea un método llamada mismaProductora que reciba un objeto de la clase DvdCine como parámetro. Este método devuelve true o false si el objeto
 utilizado con el método es de la misma productora que el pasado como parámetro.*/

 
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

 

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function setDirector($director)
    {
        $this->director = $director;
        return $this;
    }

    public function getProductora()
    {
        return $this->productora;
    }

    public function setProductora($productora)
    {
        $this->productora = $productora;
        return $this;
    }

    public function getActoresprincipales()
    {
        return $this->actoresprincipales;
    }

    public function setActoresprincipales($actoresprincipales)
    {
        $this->actoresprincipales = $actoresprincipales;
        return $this;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
        return $this;
    }

    public function getResumen()
    {
        return $this->resumen;
    }

    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
        return $this;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
        return $this;
    }

       public function esThriller(){
         return strtolower($this->genero)=="thriller";  //hace referencia al genero del objeto 
      

    }
   public function mismaproductora(DvdCine $otrapelicula){
      return $this->productora== $otrapelicula->getProductora();
      // el this es el valor actual del atributo del objeto y comparamos la otra pelicula con el get
   }

}

$pelicula = new DvdCine("Inception", "Christopher Nolan", "Warner Bros", ["Leonardo DiCaprio"], "Thriller", "", 148);
echo $pelicula->esThriller() ? "true" : "false"; // Devuelve true

echo "<br>";
$pelicula1 = new DvdCine("Inception", "Christopher Nolan", "Warner Bros", ["Leonardo DiCaprio"], "Sci-Fi", "", 148);
$pelicula2 = new DvdCine("The Dark Knight", "Christopher Nolan", "Warner Bros", ["Christian Bale"], "Action", "", 152);

echo $pelicula1->mismaProductora($pelicula2) ? "true" : "false"; // Devuelve true porque ambas son de "Warner Bros"
