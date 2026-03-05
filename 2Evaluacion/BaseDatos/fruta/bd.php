<?php

require_once "frutas.php";

class Base{

    public static function realizarConexion(){   
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=frutas","root","");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }
        catch(Exception $e)
        {
          echo "Error al realizar la conexión: " . $e->getMessage();
        }    
    }

//Funcion que obtiene todas las comidas de db y las instancia en un array de objetos comida
           public static function getFrutas(){
            try{
                $sql="SELECT * FROM FRUTAS";
                $conexion=self::realizarConexion();
                $resultado=$conexion->query($sql);
                $array_frutas=array();
                while ($fila=$resultado->fetch()){
                    $array_frutas[]= new Frutas($fila['Fruta'], $fila['Votos']);
                }
            } catch (PDOException $e){
                echo $e->getMessage();
            } finally{
		        $conexion=null;
            }
            return ($array_frutas);
        }

        
        public static function actualizarFruta($nombre){
    $mensaje = ""; 
    try {
        $sql="UPDATE FRUTAS SET VOTOS=VOTOS+1 WHERE FRUTA='$nombre'";
        $conexion = self::realizarConexion();
        $afectados = $conexion->exec($sql);

        if ($afectados > 0){
            $mensaje = "Se ha realizado la inserción correctamente";
        } else {
            $mensaje = "No se pudo realizar la inserción";
        }
    } catch (PDOException $e){
        $mensaje = "Imposible realizar la inserción: " . $e->getMessage();
        if ($e->getCode() == 23000) {
            $mensaje .= "<br> Violación de restricciones de integridad";
        }
    } finally {
        $conexion = null;
    }
    return $mensaje;       
}

       public static function borrarvotos(){
    $mensaje = ""; 
    try {
        $sql="UPDATE FRUTAS SET VOTOS=0";
        $conexion = self::realizarConexion();
        $afectados = $conexion->exec($sql);

        if ($afectados > 0){
            $mensaje = "Se ha realizado la inserción correctamente";
        } else {
            $mensaje = "No se pudo realizar la inserción";
        }
    } catch (PDOException $e){
        $mensaje = "Imposible realizar la inserción: " . $e->getMessage();
        if ($e->getCode() == 23000) {
            $mensaje .= "<br> Violación de restricciones de integridad";
        }
    } finally {
        $conexion = null;
    }
    return $mensaje;       
}

       public static function insertarFruta($nombre){
    $mensaje = ""; 
    try {
        $sql="insert into FRUTAS (FRUTA, VOTOS) values ('$nombre', 0)";
        $conexion = self::realizarConexion();
        $afectados = $conexion->exec($sql);

        if ($afectados > 0){
            $mensaje = "Se ha realizado la inserción correctamente";
        } else {
            $mensaje = "No se pudo realizar la inserción";
        }
    } catch (PDOException $e){
        $mensaje = "Imposible realizar la inserción: " . $e->getMessage();
        if ($e->getCode() == 23000) {
            $mensaje .= "<br> Violación de restricciones de integridad";
        }
    } finally {
        $conexion = null;
    }
    return $mensaje;       
}


     public static function eliminarFruta($nombre){
    $mensaje = ""; 
    try {
        $sql="DELETE FROM FRUTAS WHERE FRUTA='$nombre'";
        $conexion = self::realizarConexion();
        $afectados = $conexion->exec($sql);

        if ($afectados > 0){
            $mensaje = "Se ha realizado la inserción correctamente";
        } else {
            $mensaje = "No se pudo realizar la inserción";
        }
    } catch (PDOException $e){
        $mensaje = "Imposible realizar la inserción: " . $e->getMessage();
        if ($e->getCode() == 23000) {
            $mensaje .= "<br> Violación de restricciones de integridad";
        }
    } finally {
        $conexion = null;
    }
    return $mensaje;       
}


}