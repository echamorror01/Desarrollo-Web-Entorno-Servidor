<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login sin sesiones</title>
    <style>
        p { text-align: center; }
        fieldset { background-color: rgb(217, 211, 31); }
    </style>
</head>
<body>

<?php
// intentos, por defecto 0
$intentos = isset($_GET["intentos"]) ? intval($_GET["intentos"]) : 0;

// Arrays separados de usuarios y contraseñas
$usuarios = ["juan02", "mario09", "maria05"];
$contraseñas = ["contraseña", "suarez", "figueroa"];

// Crear el array asociativo a partir de los arrays de usuarios y contraseñas
$usuarios_contraseñas = [];
for ($i = 0; $i < count($usuarios); $i++) {
    $usuarios_contraseñas[$usuarios[$i]] = $contraseñas[$i];
}

// variable para saber si ha iniciado sesión
$logueado = false;

// mensaje
$mensaje = "";

if (isset($_GET["Usuario"]) && isset($_GET["contraseña"])) {

    $name = $_GET["Usuario"];
    $pass = $_GET["contraseña"];

    // Comprobar si el usuario y contraseña coinciden en el array asociativo
    if (isset($usuarios_contraseñas[$name]) && $usuarios_contraseñas[$name] === $pass) {

        $mensaje = "<fieldset><p> Estás dentro del sistema</p></fieldset>";
        $logueado = true;    
        $intentos = 0;        

    } else {

        $intentos++;
        $mensaje = "<fieldset><p> Usuario o contraseña incorrectos. Intento $intentos de 3.</p></fieldset>";
    }
}

// si supera los intentos, enseño mensaje y lo saco del sistema
if ($intentos >= 3) {
    echo "<fieldset><p> Has superado el número máximo de intentos.</p></fieldset>";
    exit();
}

// muestramos mensaje si existe
echo $mensaje;

// si está logueado, no vuelvo a mostrar el formulario
if ($logueado) {
    exit();  
}
?>

<form action="" method="get">
    <fieldset>
        <p><label for="Usuario">Usuario: </label>
        <input type="text" name="Usuario" id="Usuario" required></p>

        <p><label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" required></p>

        <input type="hidden" name="intentos" value="<?= $intentos ?>">

        <p><input type="submit" value="Enviar"></p>
    </fieldset>
</form>

</body>
</html>
