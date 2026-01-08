<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
<?php
//Si se quiere subir una imagen
if (isset($_POST['frm_subir'])) {
   $directorioVacio=true;
   $directorio=$_POST['frm_carpeta'];
   if (isset($directorio) && $directorio != "")
   $directorioVacio=false;
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['frm_archivo']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['frm_archivo']['type'];
      $tamano = $_FILES['frm_archivo']['size'];
      $temp = $_FILES['frm_archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if ((!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") ) && ($tamano < 50000))) || $directorioVacio='true') {
      echo "<div class='centrar_tabla'>";
      echo "<table>";
      echo "<tr><td><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
      - Se permiten archivos .jpg  y de 50 kb como máximo.</b>   </td></tr>";
      echo "</table>";
      echo "<a href='03.-formularioSubidaArch.php'> Volver a la página anterior </a>";
      echo "</div>";
     }
     else {
      $directorio=$_POST['frm_carpeta'];
      if(!file_exists($directorio))
         mkdir($directorio,0777,true);
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
         if (move_uploaded_file($temp, $directorio.'/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod($directorio.'/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo "<div class='centrar_tabla'>";
            echo "<table>"; 
            echo "<tr><td colspan='2'> <b>Se ha subido correctamente la imagen.</b>  </td>   </tr></>";
            echo "<tr>  <td>Nombre </td> <td>$archivo</td></tr>";
            echo "<tr>  <td>Tipo </td> <td>$tipo</td></tr>";
            echo "<tr>  <td>Tamaño </td> <td>$tamano bytes</td></tr>";
           
            //Mostramos la imagen subida
            echo "<tr><td colspan='2'><p><img src='".$directorio.'/'.$archivo."'></p></td></tr>";
            echo "</table>";
            echo "<a href='03.-formularioSubidaArch.php'> Volver a la página anterior </a>";
            echo "</div>";
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo "<div class='centrar_tabla'>";
           echo "<table>";
           echo "<tr><td><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b>   </td></tr>";
           echo "</table>";
           echo "<a href='03.-formularioSubidaArch.php'> Volver a la página anterior </a>";
           echo "</div>";
        }
      }
   }
}
?>