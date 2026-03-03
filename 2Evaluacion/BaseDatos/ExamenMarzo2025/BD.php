<?php
require_once "TipoComidas.php";
require_once "Comidas.php";
require_once "Carritos.php";

class Base{
	/* Conexion a la Base de datos */
    public static function realizarConexion(){
		try {    
        	$conexion = new PDO("mysql:host=localhost; dbname=restaurante","root","");
	    	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$conexion->exec("SET CHARACTER SET utf8");
			return $conexion;
    	}catch(Exception $e){
	  		echo "Error al realizar la conexión: " . $e->getMessage();
		}  
	}
/* Seleccionamos todas las comidas*/
	public static function getComidas(){
		try{
        	$sql="SELECT * FROM COMIDAS ORDER BY NOMBRECOMIDA ASC";
        	$conexion=self::realizarConexion();
			$resultado=$conexion->query($sql);
	   	 	$arra_comidas=array();
        	while ($fila=$resultado->fetch()){
            	$arra_comidas[]= new Comidas($fila);
        	}
		}catch (PDOException $e){
			echo $e->getMessage();
		} finally{
			$conexion=null;
		}
        return ($arra_comidas);
    }
	
	/* Select que a partir del codigo te agrega la comida */
	public static function getComida($dato1){
		try{
        	$sql="SELECT * FROM COMIDAS WHERE CODIGOCOMIDA='$dato1'";
			$conexion=self::realizarConexion();
			$resultado=$conexion->query($sql);
	    	$arra_comida=array();
        	while ($fila=$resultado->fetch()){
            	$arra_comida[]= new Comidas($fila);
        	}
			$resultado->closeCursor();
		}catch (PDOException $e){
				echo $e->getMessage();
		} finally{
				$conexion=null;
		}
        return ($arra_comida);
    }
	
	/* Para insertar en el carrito  */
	public static function insertar_carrito($dato1,$dato2,$dato3,$dato4,$dato5,$dato6,$dato7){
		try{

$sql="INSERT INTO `CARRITO` (`codigoCarrito`, `nombreCarrito`, `descripcionCarrito`, `precioCarrito`, `codigoTipoCarrito`, `cantidadCarrito`, `clienteCarrito`)
			VALUES ('$dato1', '$dato2', '$dato3', '$dato4', '$dato5', '$dato6','$dato7') ";
			$conexion=self::realizarConexion();
			$afectados=$conexion->exec($sql);
			return 1;
		}catch (PDOException $e){
			return 0;
		}finally{
			$conexion=null;
		 }
		}
	/*Para ver el carrito  */
	public static function getCarrito(){
		try{
        	$sql="SELECT * FROM CARRITO ORDER BY NOMBRECARRITO ASC";
        	$conexion=self::realizarConexion();
			$resultado=$conexion->query($sql);
		   	$arra_carrito=array();
        	while ($fila=$resultado->fetch()){
            	$arra_carrito[]= new Carritos($fila);
        	}
		}catch (PDOException $e){
				echo $e->getMessage();
		} finally{
				$conexion=null;
		}
        return ($arra_carrito);
    }
	
	/* para ver la cantidad */
	public static function getcantidad($dato1){
		try{
        	$sql="SELECT * FROM CARRITO WHERE CODIGOCARRITO='$dato1'";
			$conexion=self::realizarConexion();
			$resultado=$conexion->query($sql);
			$arra_carrito=array();
        	while ($fila=$resultado->fetch()){
            	$arra_carrito[]= new Carritos($fila);
        	}
			foreach ($arra_carrito as $carrito){
        		return ($carrito->getcantidadCarrito());
			}
    	}catch (PDOException $e){
			echo $e->getMessage();
		} finally{
			$conexion=null;
		}
	}
	/*Actualizar carrito la cantidad   */
	public static function actualizar_carrito($dato1){
		try{
			$sql = "UPDATE CARRITO SET CANTIDADCARRITO=CANTIDADCARRITO+1 WHERE CODIGOCARRITO='$dato1'";
        	$conexion=self::realizarConexion();;
			$resultado=$conexion->exec($sql);
			return 1;
			}catch (PDOException $e){
				return 0;
	     }finally{
			$conexion=null;
		 }
	}
	/* Actualizar carrito */
	public static function actualizar_carrito2($dato1,$dato2){
		try{
			$sql = "UPDATE CARRITO SET CANTIDADCARRITO= '$dato1' WHERE CODIGOCARRITO='$dato2'";
			$conexion=self::realizarConexion();;
			$resultado=$conexion->exec($sql);
		   	return 1;
			}catch (PDOException $e){
				return 0;
	     }finally{
			$conexion=null;
		 }
	}
		/*Borrar carrito poniendo un 0 */
	public static function borrar_0_carrito($dato1){
		try{
		    $sql="DELETE FROM `CARRITO` WHERE  CANTIDADCARRITO  = '$dato1'";
        	$conexion=self::realizarConexion();;
			$afectados=$conexion->exec($sql);
			return 1;
		}catch (PDOException $e){
			return 0;
	     }finally{
			$conexion=null;
		 }
		}
		/*Insertar comida  */
		public static function insertar_comida($dato1,$dato2,$dato3,$dato4){
		try{
			$sql="INSERT INTO `COMIDAS` ( `nombreComida`, `descripcionComida`, `precioComida`, `codigoTipoComida`)";
			$sql.=" VALUES ('$dato1', '$dato2', '$dato3', '$dato4') ";
			$conexion=self::realizarConexion();;
			$afectados=$conexion->exec($sql);
			if ($afectados>0){
				$mensaje=null;
			}
		}catch (PDOException $e){
			$memsaje= $e->getMessage();
		}finally {
            $conexion=null;
			return $mensaje;
        }
		}
	/* Borrar comida */
		public static function borrar_comida($dato1){
			try{
		    	$sql="DELETE FROM `COMIDAS` WHERE  CODIGOCOMIDA  = '$dato1'";
				
        		$conexion=self::realizarConexion();;
				$afectados=$conexion->exec($sql);
				return 1;
			}catch (PDOException $e){
				return 0;
	     	} finally{
				$conexion=null;
		 	}
		}
 /* Para ver tipo comida */
		public static function getTipoComidas(){
			try{
				$sql="SELECT * FROM TIPOCOMIDAS";
				$conexion=self::realizarConexion();
				$resultado=$conexion->query($sql);
				$arra_tipocomida=array();
				while ($fila=$resultado->fetch()){
					$arra_tipocomida[]= new TipoComidas($fila);
				}
			}catch (PDOException $e){
				echo $e->getMessage();
			} finally{
				$conexion=null;
				}
			return ($arra_tipocomida);
			}
	}




?>