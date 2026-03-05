<?php

require_once "bd.php";

if(isset($_POST['nombreFruta'])){
$nombreFruta = $_POST['nombreFruta'] ?? null;

echo "Gracias por votar por: $nombreFruta";
if($nombreFruta != null){

    Base::actualizarFruta($nombreFruta);
}
}

 



if(isset($_POST['Reiniciar'])){
Base::borrarvotos();
}

if(isset($_POST['nombreFruta']) && isset($_POST['Insertar'])){
    Base::insertarFruta($nombreFruta);
}
 if(isset($_POST['eliminar'])){
    $nombreFruta = $_POST['eliminar'] ?? null;
    if($nombreFruta != null){
        Base::eliminarFruta($nombreFruta);
    }
 }

$arrayFrutas=Base::getFrutas();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css" />
</head>
<body>
      <div id="contenedor"> 
    <h2>Encuesta: ¿Cuál es tu fruta favorita?</h2>

<!-- ================= VOTAR ================= -->
<form method="post">
    <?php foreach ($arrayFrutas as $fruta){ ?>
        <input type="radio" name="nombreFruta"
        value="<?php echo $fruta->getNombreFruta(); ?>" required>
        <?php echo $fruta->getNombreFruta(); ?>
        <br>
    <?php } ?>
    <br>
    <input type="submit" name="votar" value="Votar">
</form>

<br><br>

<!-- ================= BORRAR (BOTÓN A LA DERECHA) ================= -->
<?php foreach ($arrayFrutas as $fruta){ ?>
    <form method="post" class="fila-fruta">
        <span><?php echo $fruta->getNombreFruta(); ?></span>

        <input type="hidden" name="eliminar"
        value="<?php echo $fruta->getNombreFruta(); ?>">

        <input type="submit" value="Borrar">
    </form>
<?php } ?>

<br>
    <h3>Resultados:</h3>
    <ul>
        <?php foreach ($arrayFrutas as $fruta){ ?>
            <li><?php echo $fruta->getNombreFruta() . ": " . str_repeat("*", $fruta->getVotos()); ?></li>
        <?php } ?>
    </ul>
    <form method="post" action=""> 
        <input type="submit" name="Reiniciar" value="Reiniciar Votos"/>
    </form>  
    <form action="" method="post">
        <input type="text" name="nombreFruta" placeholder="Nombre de la fruta" required>
        <input type="submit" name="Insertar" value="Insertar Fruta"/>
    </form>  
</div>
</body>
</html>
