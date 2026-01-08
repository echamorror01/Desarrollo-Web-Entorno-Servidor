
<?php
/* Elegir al azar cuatro dígitos. El programa consistirá en adivinar los dígitos generados al
azar para poder entrar en el sistema, para ello tiene cuatro intentos, para ello dispone de
cinco intentos. El programa te deberá indicar el número de intentos que te quedan. Si
introduces correctamente los números, aparecerá un mensaje en pantalla indicando que
has entrado al sistema, en caso contrario mostrará un mensaje indicando el acceso no
permitido al sistema. (ver video adjunto) 
LA CONTRASEÑA ES 1,2,3,4
 */


$intentos = isset($_GET["intentos"]) ? intval($_GET["intentos"]) : 0;


$logueado = false;

// envío

$mensaje = "";

if (isset($_GET["numero1"]) && isset($_GET["numero2"]) &&  isset($_GET["numero3"]) &&  isset($_GET["numero4"])) {

    $numero1 = $_GET["numero1"];
    $numero2 = $_GET["numero2"];
    $numero3 = $_GET["numero3"];
    $numero4 = $_GET["numero4"];
    
    if($numero1==1 && $numero2==2 && $numero3==3 && $numero4==4){
           $logueado = true;    
            $intentos = 0; 
           ?>
           <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso permitido</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #eef8f1;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            text-align: center;
            padding: 40px;
            background: #ffffff;
            border: 2px solid #4CAF50;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .box h1 {
            font-size: 38px;
            margin-bottom: 10px;
            color: #2e7d32;
        }

        .box p {
            font-size: 18px;
            color: #555;
        }

        .icon {
            font-size: 70px;
            margin-bottom: 15px;
            color: #4CAF50;
        }

        .btn {
            margin-top: 20px;
            padding: 12px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="icon">✔️</div>
    <h1>¡Enhorabuena!</h1>
    <p>Acceso permitido al sistema.</p>
    <button class="btn" onclick="history.back()">Volver</button>
</div>

</body>
</html>
<?php
            
    }else{
    
        $intentos++;
        $mensaje = "<fieldset><p> Numeros. Intento $intentos de 5.</p></fieldset>";
    }
    }
// si supera los intentos, enseño mensje  y lo saco del sistema
if ($intentos >= 5) {
      ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso denegado</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            text-align: center;
            padding: 40px;
            background: #ffffff;
            border: 2px solid #ff6b6b;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .box h1 {
            font-size: 38px;
            margin-bottom: 10px;
            color: #d00000;
        }

        .box p {
            font-size: 18px;
            color: #555;
        }

        .icon {
            font-size: 70px;
            margin-bottom: 15px;
            color: #ff6b6b;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="icon">⛔</div>
    <h1>Acceso denegado</h1>
    <p>No tienes permiso para acceder a esta página.</p>
</div>

</body>
</html>
    <?php
    exit();
}

// muestramos mensaje si existe
echo $mensaje;

// si está logueado, no vuelvo mostrar el formulario
if ($logueado) {
    exit();  
}

?>
<!DOCTYPE html>

<head>
        <meta charset="UTF-8">
        <title>Combinacion Caja Fuerte</title>
    </head>
    <body>
        <h3>Introduzca la combinacion caja fuerte</h3>
                <form action="" method="get">
                <input type="number" name="numero1" min="0" max="9" step="1" placeholder="-">
                <input type="number" name="numero2" min="0" max="9" step="1" placeholder="-">
                <input type="number" name="numero3" min="0" max="9" step="1" placeholder="-">
                <input type="number" name="numero4" min="0" max="9" step="1" placeholder="-">
                <input type="hidden" name="intentos" value="<?= $intentos ?>">
                <br><input type="submit" name="enviar" >
                <br>
                
            </form>     
    </body>
</html>

