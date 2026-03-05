<?php

// Se incluye la clase entidad para poder instanciar objetos Productos.
require_once 'Productos.php';

/**
 * Clase Base.
 * Contiene métodos estáticos para realizar operaciones CRUD sobre la tabla productos.
 */
class Base
{
    /**
     * Método privado que crea y devuelve una conexión PDO.
     * Se configura para lanzar excepciones y usar UTF-8.
     */
    private static function realizarConexion()
    {
        $host = 'localhost';
        $bd = 'ferreteria';
        $usuario = 'root';
        $contrasena = '';

        $dsn = "mysql:host={$host};dbname={$bd};charset=utf8";

        $conexion = new PDO($dsn, $usuario, $contrasena);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec('SET NAMES utf8');

        return $conexion;
    }

    /**
     * Obtiene todos los registros de la tabla productos.
     * Devuelve un array de objetos Productos.
     */
    public static function getTodos()
    {
        $conexion = null;
        $sentencia = null;
        $lista = [];

        try {
            $conexion = self::realizarConexion();
            $sql = 'SELECT * FROM productos';
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();

            while ($registro = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $lista[] = new Productos($registro);
            }
        } catch (Exception $e) {
            $lista = [];
        } finally {
            $sentencia = null;
            $conexion = null;
        }

        return $lista;
    }

    /**
     * Obtiene registros con límite para paginación.
     * $inicio indica desde qué fila comenzar y $fin cuántas filas traer.
     */
    public static function getConLimites($inicio, $fin)
    {
        $conexion = null;
        $sentencia = null;
        $lista = [];

        try {
            $conexion = self::realizarConexion();
            $sql = 'SELECT * FROM productos LIMIT :inicio, :fin';
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
            $sentencia->bindValue(':fin', (int)$fin, PDO::PARAM_INT);
            $sentencia->execute();

            while ($registro = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $lista[] = new Productos($registro);
            }
        } catch (Exception $e) {
            $lista = [];
        } finally {
            $sentencia = null;
            $conexion = null;
        }

        return $lista;
    }

    /**
     * Obtiene un único registro por clave primaria (CODIGOARTICULO).
     * Devuelve un objeto Productos o null si no existe.
     */
    public static function getUno($id)
    {
        $conexion = null;
        $sentencia = null;
        $objeto = null;

        try {
            $conexion = self::realizarConexion();
            $sql = 'SELECT * FROM productos WHERE CODIGOARTICULO = :id';
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();

            $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
            if ($registro) {
                $objeto = new Productos($registro);
            }
        } catch (Exception $e) {
            $objeto = null;
        } finally {
            $sentencia = null;
            $conexion = null;
        }

        return $objeto;
    }

    /**
     * Borra un registro según su clave primaria.
     * Devuelve 1 si se borra correctamente, o 0 si ocurre error.
     */
    public static function borrar($id)
    {
        $conexion = null;
        $sentencia = null;

        try {
            $conexion = self::realizarConexion();
            $sql = 'DELETE FROM productos WHERE CODIGOARTICULO = :id';
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();

            return 1;
        } catch (Exception $e) {
            return 0;

            } finally {
            $sentencia = null;
            $conexion = null;
        }
    }

    /**
     * Actualiza un registro existente.
     * Recibe todos los campos necesarios y localiza por CODIGOARTICULO.
     * Devuelve 1 si todo va bien o 0 si hay error.
     */
    public static function actualizar($codigoArticulo, $seccion, $nombreArticulo, $fecha, $paisDeOrigen, $precio)
    {
        $conexion = null;
        $sentencia = null;

        try {
            $conexion = self::realizarConexion();
            $sql = 'UPDATE productos
                    SET SECCION = :seccion,
                        NOMBREARTICULO = :nombreArticulo,
                        FECHA = :fecha,
                        PAISDEORIGEN = :paisDeOrigen,
                        PRECIO = :precio
                    WHERE CODIGOARTICULO = :codigoArticulo';

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':seccion', $seccion);
            $sentencia->bindParam(':nombreArticulo', $nombreArticulo);
            $sentencia->bindParam(':fecha', $fecha);
            $sentencia->bindParam(':paisDeOrigen', $paisDeOrigen);
            $sentencia->bindParam(':precio', $precio);
            $sentencia->bindParam(':codigoArticulo', $codigoArticulo);
            $sentencia->execute();

            return 1;
        } catch (Exception $e) {
            return 0;
        } finally {
            $sentencia = null;
            $conexion = null;
        }
    }

    /**
     * Inserta un nuevo registro en productos.
     * Si detecta error 23000 (clave duplicada), devuelve 0.
     * En caso contrario, devuelve el número de filas afectadas.
     */
    public static function insertar($codigoArticulo, $seccion, $nombreArticulo, $fecha, $paisDeOrigen, $precio)
    {
        $conexion = null;
        $sentencia = null;

        try {
            $conexion = self::realizarConexion();
            $sql = 'INSERT INTO productos (CODIGOARTICULO, SECCION, NOMBREARTICULO, FECHA, PAISDEORIGEN, PRECIO)
                    VALUES (:codigoArticulo, :seccion, :nombreArticulo, :fecha, :paisDeOrigen, :precio)';

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':codigoArticulo', $codigoArticulo);
            $sentencia->bindParam(':seccion', $seccion);
            $sentencia->bindParam(':nombreArticulo', $nombreArticulo);
            $sentencia->bindParam(':fecha', $fecha);
            $sentencia->bindParam(':paisDeOrigen', $paisDeOrigen);
            $sentencia->bindParam(':precio', $precio);
            $sentencia->execute();

            return $sentencia->rowCount();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return 0;
            }
            return 0;
        } catch (Exception $e) {
            return 0;
        } finally {
            $sentencia = null;
            $conexion = null;
        }
    }
}
