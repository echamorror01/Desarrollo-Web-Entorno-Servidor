<?php
//Array de frutas y sacar uno aleatoria
 $miarray=["frutas","banana","melocoton","sandía","melon","pera","limon"];
    $aleatorio= array_rand($miarray); // esto saca un índice
    echo $miarray[$aleatorio];
    $fruta=$miarray[$aleatorio]; 
    $usuario_respuesta = "kiwi"; // Aquí el usuario escribiría su respuesta

// Verificar si la respuesta es correcta
if (strtolower($usuario_respuesta) == strtolower ($fruta)) {
    echo "¡Correcto! Has adivinado la fruta.";
} else
    echo "Incorrecto. Pista: La fruta que buscas empieza con la letra ";
    
    // Comparamos la primera letra de la fruta correcta con la del usuario
    $letrausuario= strtolower($usuario_respuesta[0]);
    $letrafruta= strtolower($fruta[0]);
    if($letrausuario< $letrafruta){
        echo "una letra anterior al tuyo";
    }else{
        echo "Una letra posterior a la tuya";
    }

?>