
<?php
class Pinguino  extends Ave{
    public function volar() : void{
        parent::volar();
        echo "Soy un pinguino";
    }

    public function emitirSonido() : void {
        parent::emitirSonido();
        echo "PINGU";
    }
}


?>