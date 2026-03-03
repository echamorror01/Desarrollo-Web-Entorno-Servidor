<?php

require_once __DIR__ . "/Productos.php";

// Clase estática: no se hace new Base(), se llama directamente Base::metodo()
class Base {

    // PRIVADO: solo la usan los métodos de esta misma clase
    // Crea y devuelve la conexión PDO cada vez que se necesita
    private static function realizarConexion() {
        try {
            // PDO necesita: tipo de BD, host, nombre de la BD, usuario y contraseña
            $conexion = new PDO("mysql:host=localhost;dbname=ferreteria", "root", "");
            // Hace que PDO lance excepciones cuando hay errores SQL
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Para que los acentos y ñ funcionen bien
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------
    // SELECT: devuelve TODOS los productos como array de objetos
    // ----------------------------------------------------------------
    public static function getProductos() {
        try {
            $sql = "SELECT * FROM PRODUCTOS";
            $conexion  = self::realizarConexion();
            // query() para consultas SELECT
            $resultado = $conexion->query($sql);
            $array = [];
            // fetch() lee una fila cada vez como array; la envolvemos en un objeto Productos
            while ($fila = $resultado->fetch()) {
                $array[] = new Productos($fila);
            }
            return $array;
        } catch (PDOException $e) {
            die("Error getProductos: " . $e->getMessage());
        } finally {
            // finally se ejecuta siempre (haya error o no). Cerramos la conexión.
            $conexion = null;
        }
    }

    // ----------------------------------------------------------------
    // SELECT con LIMIT: para paginación. $inicio = desde qué fila, $fin = cuántas
    // Ejemplo: getProductosLimites(0, 5) → filas 1 a 5
    //          getProductosLimites(5, 5) → filas 6 a 10
    // ----------------------------------------------------------------
    public static function getProductosLimites($inicio, $fin) {
        try {
            $sql = "SELECT * FROM PRODUCTOS LIMIT $inicio, $fin";
            $conexion  = self::realizarConexion();
            $resultado = $conexion->query($sql);
            $array = [];
            while ($fila = $resultado->fetch()) {
                $array[] = new Productos($fila);
            }
            return $array;
        } catch (PDOException $e) {
            die("Error getProductosLimites: " . $e->getMessage());
        } finally {
            $conexion = null;
        }
    }

    // ----------------------------------------------------------------
    // SELECT: devuelve UN solo producto por su código
    // ----------------------------------------------------------------
    public static function get1Producto($codigo) {
        try {
            $sql = "SELECT * FROM PRODUCTOS WHERE CODIGOARTICULO = '$codigo'";
            $conexion  = self::realizarConexion();
            $resultado = $conexion->query($sql);
            // fetch() sin bucle porque solo esperamos una fila
            $fila = $resultado->fetch();
            return new Productos($fila);
        } catch (PDOException $e) {
            die("Error get1Producto: " . $e->getMessage());
        } finally {
            $conexion = null;
        }
    }

    // ----------------------------------------------------------------
    // DELETE: borra un producto por su código
    // ----------------------------------------------------------------
    public static function borrarProducto($codigo) {
        try {
            $sql = "DELETE FROM PRODUCTOS WHERE CODIGOARTICULO = '$codigo'";
            $conexion = self::realizarConexion();
            // exec() para INSERT, UPDATE y DELETE (no devuelven filas)
            $conexion->exec($sql);
            return 1; // éxito
        } catch (PDOException $e) {
            return 0; // fallo
        } finally {
            $conexion = null;
        }
    }

    // ----------------------------------------------------------------
    // UPDATE: actualiza todos los campos de un producto (menos el código, que es la clave)
    // ----------------------------------------------------------------
    public static function actualizarProducto($codigo, $seccion, $nombre, $fecha, $pais, $precio) {
        try {
            $sql = "UPDATE PRODUCTOS SET 
                        SECCION        = '$seccion',
                        NOMBREARTICULO = '$nombre',
                        FECHA          = '$fecha',
                        PAISDEORIGEN   = '$pais',
                        PRECIO         = '$precio'
                    WHERE CODIGOARTICULO = '$codigo'";
            $conexion = self::realizarConexion();
            $conexion->exec($sql);
            return 1;
        } catch (PDOException $e) {
            return 0;
        } finally {
            $conexion = null;
        }
    }

    // ----------------------------------------------------------------
    // INSERT: inserta un producto nuevo
    // Devuelve 0 si el código ya existe (código de error 23000 = clave duplicada)
    // ----------------------------------------------------------------
    public static function insertarProducto($codigo, $seccion, $nombre, $fecha, $pais, $precio) {
        try {
            $sql = "INSERT INTO PRODUCTOS 
                        (CODIGOARTICULO, SECCION, NOMBREARTICULO, FECHA, PAISDEORIGEN, PRECIO)
                    VALUES 
                        ('$codigo', '$seccion', '$nombre', '$fecha', '$pais', '$precio')";
            $conexion  = self::realizarConexion();
            $afectados = $conexion->exec($sql);
            return $afectados; // número de filas insertadas (1 si todo bien)
        } catch (PDOException $e) {
            // Código 23000 = violación de clave primaria (el código ya existe)
            if ($e->getCode() == 23000) return 0;
            die("Error insertarProducto: " . $e->getMessage());
        } finally {
            $conexion = null;
        }
    }
}
?>
