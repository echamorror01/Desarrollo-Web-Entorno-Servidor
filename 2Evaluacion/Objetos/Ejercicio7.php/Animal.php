
<?php
/*Un Animal es una clase base que no se puede instanciar (Abstracta).
Tiene un método abstracto emitirSonido() que muestra un mensaje por pantalla. Implementa el método en cada clase adecuada.
 */
abstract class Animal
{
    private string $sexo;
    private string $habitat;

    public function __construct(string $sexo, string $habitat)
    {
        $this->sexo = $sexo;
        $this->habitat = $habitat;
    }

    abstract public function emitirSonido();

public function __toString() : string {
$cadena=" <br>Sexo: ->".$this->sexo;
$cadena.=" <br>Habitat: ->".$this->habitat;
    return $cadena;
}
}