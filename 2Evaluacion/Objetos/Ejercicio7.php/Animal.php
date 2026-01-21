
<?php
/*Un Animal es una clase base que no se puede instanciar (Abstracta).
Tiene un método abstracto emitirSonido() que muestra un mensaje por pantalla. Implementa el método en cada clase adecuada.
 */
abstract class Animal
{
    private string $nombre;
    private string $sexo;
    private string $habitat;

    public function __construct(string $sexo, string $habitat,string $nombre)
    {
        $this->sexo = $sexo;
        $this->habitat = $habitat;
        $thid-> nombre= $nombre;
    }

    abstract public function emitirSonido(): string ;

    public function __toString() : string {
    $cadena=" <br>Sexo: ->".$this->sexo;
    $cadena.=" <br>Habitat: ->".$this->habitat;
    return $cadena;
}
}