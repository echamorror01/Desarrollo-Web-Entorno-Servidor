<?php
// Función para crear un mazo de cartas usando arrays asociativos
function crearMazo() {
    $mazo = [];
    $palos = ['Corazones', 'Diamantes', 'Tréboles', 'Espadas'];
    
    // Definimos los valores de las cartas, las figuras (J, Q, K) tienen valor 0.5
    $cartas = [
        ['valor' => 1, 'nombre' => 'As'],
        ['valor' => 2, 'nombre' => '2'],
        ['valor' => 3, 'nombre' => '3'],
        ['valor' => 4, 'nombre' => '4'],
        ['valor' => 5, 'nombre' => '5'],
        ['valor' => 6, 'nombre' => '6'],
        ['valor' => 7, 'nombre' => '7'],
        ['valor' => 8, 'nombre' => '8'],
        ['valor' => 9, 'nombre' => '9'],
        ['valor' => 10, 'nombre' => '10'],
        ['valor' => 0.5, 'nombre' => 'J'],
        ['valor' => 0.5, 'nombre' => 'Q'],
        ['valor' => 0.5, 'nombre' => 'K']
    ];

    // Crear el mazo combinando los valores y los palos
    foreach ($palos as $palo) {
        foreach ($cartas as $carta) {
            $mazo[] = ['valor' => $carta['valor'], 'nombre' => $carta['nombre'], 'palo' => $palo];
        }
    }

    shuffle($mazo); // Barajamos el mazo
    return $mazo;
}

// Función para mostrar la carta en formato más legible
function mostrarCarta($carta) {
    return "{$carta['nombre']} de {$carta['palo']} ({$carta['valor']} puntos)";
}

// Función principal del juego
function jugarSieteYMedia() {
      static $mazo;
    static $jugador;
    static $cartasJugador;

    if (!isset($mazo)) {
        $mazo = crearMazo();
        $jugador = 0; // El jugador empieza con 0 puntos
        $cartasJugador = [];
    }

    // Comprobamos si se ha enviado una respuesta por formulario
    if (isset($_POST['respuesta'])) {
        $respuesta = $_POST['respuesta'];
        if (strtolower($respuesta) == 's') {
            $carta = array_pop($mazo); // Extraemos una carta del mazo
            $cartasJugador[] = $carta; // Guardamos la carta en el array del jugador
            $jugador += $carta['valor']; // Sumamos el valor de la carta

            // Si el jugador pasa de 7.5, pierde automáticamente
            if ($jugador > 7.5) {
                echo "¡Te pasaste! Tu puntaje es $jugador. ¡Perdiste!<br>";
                echo "<a href=''>Jugar otra vez</a><br>";
                return;
            }
        } else {
            echo "Tu puntaje final es: $jugador<br>";
            echo "<a href=''>Jugar otra vez</a><br>";
            return;
        }
    }

    // Mostrar el puntaje y las cartas del jugador
    echo "Tu puntaje actual es: $jugador<br><br>";
    echo "<h3>Cartas que has sacado:</h3>";

    foreach ($cartasJugador as $carta) {
        echo mostrarCarta($carta) . "<br>";
    }

    // Mostrar el formulario para decidir si tomar otra carta
    echo '<form method="post">
            <label>¿Quieres tomar otra carta? (s/n): </label>
            <input type="text" name="respuesta" maxlength="1">
            <input type="submit" value="Enviar">
          </form>';
}

// Ejecutamos el juego
jugarSieteYMedia();
?>
