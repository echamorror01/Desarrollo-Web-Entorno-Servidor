
<?php
 class Ave extends Animal{
    private string $especie;
    private string $color;
       public function __construct(string $sexo,string $habitat,string $especie,string $color){
        parent::__construct($sexo,$habitat);
        $this->especie=$especie;
        $this->color=$color;
    }

    public function __toString() : string {
        echo parent::__toString();
        $cadena=" <br>Especie: ->".$this->especie;
        $cadena.=" <br>color: ->".$this->color;
        $cadena.=$this->emitirSonido();
        return $cadena;
    }

    public function emitirSonido() : string {
        echo "<br>Emitir sonido Ave ";
    }
    public function volar() : void{
        echo "<br>Las aves vuelan ->";
    }
 }


?>