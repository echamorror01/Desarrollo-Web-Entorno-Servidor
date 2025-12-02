



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="formulariio">
<div class="centrar_tabla">
<table width="200" border="1">
  <tr>
    <th colspan="2">Subir ficheros al servidor</th>
   
  </tr>
  <tr>
    <td>Seleccione el archivo:</td>
    <td><input name="farchivo" type="file"></td>
  </tr>
  <tr>
    <td colspan="2"><input name="Enviar" type="submit" value="Subir archivo"></td>
    
  </tr>
</table>
<?php
if (isset($_POST['Enviar'])){
    $carpeta_temporal=$_FILES['farchivo']['tmp_name'];
    $nombre = $_FILES['farchivo']['name'];
    $tamanio = $_FILES['farchivo']['size'];
    $tipo = $_FILES['farchivo']['type'];

 ?> <br/><br/><br/>  
    <table width="200" border="1">
    <tr>
    <th colspan="2">Datos del archivo</th>
    
    </tr>
    <tr>
    <td>Carpeta temporal:</td>
    <td><?php echo $carpeta_temporal; ?></td>
    </tr>
    <tr>
    <td>Nombre del archivo:</td>
    <td><?php echo $nombre; ?></td>
    </tr>
     <tr>
    <td>Tamaño del archivo:</td>
    <td><?php echo $tamanio."Kb"; ?></td>
    </tr>
    <tr>
    <td>Tipo de archivo:</td>
    <td><?php echo $tipo; ?></td>
    </tr>
    
<?php 


if (move_uploaded_file($carpeta_temporal, $nombre)){
		echo "<tr>
    <th colspan='2'>fichero subido al servidor</td></tr>";
}
else{
    echo "<tr>
    <th colspan='2'><h2>Error al subir el archivo</h2></td></tr>";
	
}

}
?>
</table>
</div>
</form>
</body>
</html>