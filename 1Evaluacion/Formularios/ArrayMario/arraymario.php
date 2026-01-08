
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        p { text-align: center; 
        color: white}
        fieldset { background-color:  rgb(62, 77, 128); 
            text-align: center;}
    </style>
<body>
    <fieldset>
    <form action="" method="get">
            <p ><label for="numero">Numero: </label>
            <input type="text" name="numero" id="numero">
            <input type="submit" value="enviar"></p>
        
    </form>
</body>
</html>



<?php
if(isset($_GET["numero"])){
$linea = $_GET["numero"]?? "";
$archivo = fopen("Array.txt","a+b");
    if( $archivo == false ) {
        echo "Error al crear el archivo";
    }
    else{
            $linea = $linea . PHP_EOL;
            fwrite($archivo, $linea);
    }
    // Cerrar el archivo:
    fclose($archivo);



$largo = file("Array.txt");

echo "<p>".count($largo)."/10 </p>";

if(count($largo)==10){
    echo "<p>";
    print_r($largo);
    echo "</p><br>";
    unlink("Array.txt");
}
}
?>

