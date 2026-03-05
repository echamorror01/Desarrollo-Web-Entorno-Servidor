<?php
include_once("BD.php");

if (isset($_GET['borrar'])){
    echo "voy";
    echo $_GET['borrar'];
    if ($_GET['borrar']=="si"){
        echo "entro";
        Base::borrar_borrado1();
    }
    header('Location: index.php');
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrado</title>
</head>
<body>
    <div id="encabezado">
       <h2 style='text-align:center'> Borrado  </h2>
       <hr>
    </div>
    <div style='text-align:center'>
    <form>
        ¿Estas seguro de borrar?
        <table  width="10%"  align="center">
            <tr>
                <td><a href="borrar.php?borrar=si"><input type='button' name='si' id='del' value='Si'></a></td>
                <td><a href="borrar.php?borrar=no"><input type='button' name='no' id='del' value='No'></a></td>
        <?php
            
        ?>
        </tr>
</table>
    </form>
</div>
    
</body>
</html>