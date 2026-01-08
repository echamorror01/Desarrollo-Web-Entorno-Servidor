<?php
$usuarios = [
    "admin" => "1234",
    "user1" => "pass123",
    "user2" => "mypassword"
];

// Inicializamos intentos ANTES del formulario
if(!isset($_GET["intentos"])){
    $intentos = 0;
} else {
    $intentos = intval($_GET["intentos"]);
}

$mensaje = "";

if(isset($_GET['usuario']) && isset($_GET['contraseña'])){
    $usuario = $_GET["usuario"];
    $contraseña = $_GET["contraseña"];

    if(isset($usuarios[$usuario]) && $usuarios[$usuario] == $contraseña){
        $mensaje = "Bienvenido, $usuario";
        $intentos = 0; // Reiniciamos si acierta
    } else {
        $intentos++;
        if($intentos >= 3){
            $mensaje = "Has alcanzado el número máximo de intentos. Inténtalo de nuevo.";
            $intentos = 0; // Reiniciamos después del aviso
        } else {
            $mensaje = "Usuario o contraseña incorrectos. Intento $intentos de 3.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form action="" method="get">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        <br>
        <!-- Campo oculto con el contador actualizado -->
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    

    <p><?php echo $mensaje; ?></p>
</body>
</html>
