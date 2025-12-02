<?php

$palabras = [
    "facil" => ["perro", "gato", "sol", "luna"],
    "intermedio" => ["programar", "desarrollador", "php", "internet"],
    "dificil" => ["tecnologia", "inteligenciaartificial", "computadora", "algoritmo"]
];

// Seleccionamos una dificultad al azar o puedes elegirla explícitamente
$dificultad = "intermedio";  // Cambia esto para seleccionar otra dificultad

// Si no se ha seleccionado una palabra, seleccionamos una palabra aleatoria
if (!isset($_SESSION['palabraElegida'])) {
    $_SESSION['palabraElegida'] = strtoupper($palabras[$dificultad][array_rand($palabras[$dificultad])]);
}

$palabraElegida = $_SESSION['palabraElegida'];  // La palabra elegida permanece constante

// Iniciamos los intentos y fallos
$intentos = isset($_GET['intentos']) ? $_GET['intentos'] : "";
$fallos = isset($_GET['fallos']) ? $_GET['fallos'] : 0;

// Si el usuario envió una letra nueva
if (isset($_GET['letra'])) {
    $letra = strtoupper($_GET['letra']);
    if (!str_contains($intentos, $letra)) { // si la letra no ha sido probada antes la agrega a la cadena de intentos
        $intentos .= $letra;
        if (!str_contains($palabraElegida, $letra)) { // verifica la letra si existe en la palabra si no esta aumenta los fallos 
            $fallos++;
        }
    }
}

// Mostrar palabra con guiones y letras acertadas
$mostrar = "";
$aciertos = true;
for ($i = 0; $i < strlen($palabraElegida); $i++) { // longitud de la cadena 
    $c = $palabraElegida[$i];
    if (str_contains($intentos, $c)) { // si el jugador ha adivinado una letra, se muestra la letra, de lo contrario un guión bajo 
        $mostrar .= $c . " ";
    } else {
        $mostrar .= "_ ";
        $aciertos = false;
    }
}

$maxFallos = 6; // Número máximo de fallos antes de perder
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego del Ahorcado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h2 {
            color: #2c3e50;
        }
        .form-container {
            margin-top: 20px;
        }
        .mensaje {
            font-size: 20px;
            font-weight: bold;
        }
        .fallos {
            color: red;
        }
        .aciertos {
            color: green;
        }
    </style>
</head>
<body>
   <h2>Juego del Ahorcado</h2>

    <p><strong>Palabra:</strong> <?= $mostrar ?></p>
    <p><strong>Intentos usados:</strong> <?= $intentos ?></p>
    <p><strong>Fallos:</strong> <?= $fallos ?> / <?= $maxFallos ?></p>

    <?php if ($fallos >= $maxFallos): ?>
        <p class="mensaje fallos">¡Has perdido! La palabra era: <?= $palabraElegida ?></p>
    <?php elseif ($aciertos): ?>
        <p class="mensaje aciertos">¡Has ganado!</p>
    <?php else: ?>
        <div class="form-container">
            <form method="GET">
                <label>Introduce una letra:</label>
                <input type="text" name="letra" maxlength="1" required>
                <input type="hidden" name="intentos" value="<?= $intentos ?>">
                <input type="hidden" name="fallos" value="<?= $fallos ?>">
                <button type="submit">Probar</button>
            </form>
        </div>
    <?php endif; ?>

</body>
</html> explicame todo esto paso a paso 