
<?php

 final class Gato extends Mamifero{
    public function amamantar(): void{
        parent::amamantar();
        echo "Soy un Gato";
    }

        public function emitirSonido() : string {
        parent::emitirSonido();
        echo " MIAU";
    }

}

?>