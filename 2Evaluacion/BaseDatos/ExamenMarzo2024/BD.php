

<?php
   include_once("productos.php");
   include_once("stocks.php");
   include_once("tiendas.php");

class Base{

    private static function realizarConexion(){  
	try {
        $conexion = new PDO("mysql:host=localhost; dbname=dwes2","root","");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
	} catch (PDOException $e) {
		echo 'ERROR - No se ha podido conectar con la BD: ' . $e->getMessage();
	}
		return $conexion;
    }


	public static function getProductos(){
		
		try{
			$conexion=self::realizarConexion();
			$sql = "SELECT cod, nombre_corto, PVP,familia FROM producto";
			$resultado=$conexion->query($sql);
			$arra_productos=array();
			while ($fila=$resultado->fetch()){
				$arra_productos[]= new Productos($fila);
			}
			$conexion=null;
        	return ($arra_productos);
		} catch (PDOException $e) {
			echo "ERROR - No se pudieron obtener los productos: " . $e->getMessage();
		}

    }

	public static function get1Producto($dato1){
        try{
			$conexion=self::realizarConexion();
	    $sql="SELECT * FROM PRODUCTO WHERE  COD= '$dato1'";
		$resultado=$conexion->query($sql);
	    $fila=$resultado->fetch();
		$producto1= new Productos($fila);
		}catch (PDOException $e){
        return 0;
         }
        $conexion=null;
	    return ($producto1);
    }

	public static function getTiendas1Articulo($dato1){
		$sql="SELECT cod as 'producto', nombre as 'tienda', unidades FROM  tienda   inner join stock  on  cod=tienda and producto='$dato1'";
		$conexion=self::realizarConexion();
		$resultado=$conexion->query($sql);
		$arra_stocks=array();
	    while ($fila=$resultado->fetch()){
			$arra_stocks[]= new Stocks($fila);
		}
        $conexion=null;
		return ($arra_stocks);
	}

	public static function get1Stock($dato1){
        try{
	    $sql="SELECT * FROM STOCK WHERE  PRODUCTO  = '$dato1'";
		//echo $sql;
		//exit;
        $conexion=self::realizarConexion();
		$resultado=$conexion->query($sql);
		$fila=$resultado->fetch();
		$stock1=	new Stocks($fila);
		}catch (PDOException $e){
        return 0;
         }
        $conexion=null;
        return ($stock1);
    }

	public static function getVariosStock($dato1){
        try{
	    $sql="SELECT * FROM STOCK WHERE  PRODUCTO  = '$dato1'";
		//echo $sql;
		//exit;
        $conexion=self::realizarConexion();
		$resultado=$conexion->query($sql);
		$arra_stock=array();
			while ($fila=$resultado->fetch()){
				$arra_stock[]= new Stocks($fila);
			}
		}catch (PDOException $e){
        return 0;
         }
        $conexion=null;
        return ($arra_stock);
    }

	public static function totalUnidades($dato1){
        try{
	    $sql="SELECT sum(UNIDADES) as 'suma' FROM STOCK WHERE  PRODUCTO  = '$dato1'";
     	$conexion=self::realizarConexion();
		$resultado=$conexion->query($sql);
	    $fila=$resultado->fetch();
		//$unidades=$fila[0];
		$unidades=$fila['suma'];
		}catch (PDOException $e){
        return 0;
         }
        $conexion=null;
        return ($unidades);
    }


	public static function comprar_producto($dato1,$dato2,$dato3){
		try{
		$sql="INSERT INTO BORRADOS1 (PRODUCTO,TIENDA,UNIDADES)  VALUES ('$dato1','$dato2','$dato3')";
		$conexion=self::realizarConexion($sql);
		$resultado=$conexion->exec($sql);
		$conexion=null;
		return 1;
		}catch (PDOException $e){
		return 0;
	 
	}
}


	public static function borrar_stock($dato1){
		try{
		$sql="DELETE FROM `STOCK` WHERE  PRODUCTO  = '$dato1'";
		$conexion=self::realizarConexion($sql);
		$resultado=$conexion->exec($sql);
		$conexion=null;
		return 1;
		}catch (PDOException $e){
		return 0;
	 
	}
}

public static function borrar_producto($dato1){
	try{
	$sql="DELETE FROM `PRODUCTO` WHERE  COD  = '$dato1'";
	$conexion=self::realizarConexion($sql);
	$resultado=$conexion->exec($sql);
	$conexion=null;
	return 1;
	}catch (PDOException $e){
	return 0;
 
}
}
public static function verBorrados(){
		
	try{
		$conexion=self::realizarConexion();
		$sql = "SELECT * FROM borrados1";
		
		$resultado=$conexion->query($sql);
		$arra_borrados=array();
		while ($fila=$resultado->fetch()){
			$arra_borrados[]= new stocks($fila);
		}
		$conexion=null;
		return ($arra_borrados);
	} catch (PDOException $e) {
		echo "ERROR - No se pudieron obtener los productos: " . $e->getMessage();
	}

}

public static function isertar_producto($dato1,$dato2,$dato3){
	try{
	$sql="INSERT INTO prodcuto (COD,Nombre,UNIDADES)  VALUES ('$dato1','$dato2','$dato3')";
	$conexion=self::realizarConexion($sql);
	$resultado=$conexion->exec($sql);
	$conexion=null;
	return 1;
	}catch (PDOException $e){
	return 0;
 
}
}


public static function get1Tienda($dato1){
	try{
	$sql="SELECT * FROM TIENDA WHERE  COD= '$dato1'";
	$conexion=self::realizarConexion();
	$resultado=$conexion->query($sql);
	$fila=$resultado->fetch();
	$tienda1= new Tiendas($fila);
	}catch (PDOException $e){
	return 0;
	 }
	$resultado->closeCursor();
	$conexion=null;
	return ($tienda1);
}

public static function borrar_borrado1(){
	try{
	$sql="DELETE FROM `borrados1` ";
	$conexion=self::realizarConexion($sql);
	$resultado=$conexion->exec($sql);
	$conexion=null;
	return 1;
	}catch (PDOException $e){
	return 0;
 
}
}


}