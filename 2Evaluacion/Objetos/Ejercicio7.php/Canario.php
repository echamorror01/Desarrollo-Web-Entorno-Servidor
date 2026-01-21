
<?php

class Canario extends Ave{
    public function volar(): void{
        parent::volar();
        echo "Soy un canario";
    }
    
        public function emitirSonido() : void {
            parent::emitirSonido();
            echo "PIOPIO";
        }

}





?>