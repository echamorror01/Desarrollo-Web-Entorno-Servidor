<?php

// Conexión a la base de datos usando PDO, si quieres cambiar los parámetros de conexión,
// puedes hacerlo al llamar a la función conectarPDO pasando los valores deseados.

function conectarPDO(
    $host = 'localhost',
    $bd = '',
    $usuario = 'root',
    $clave = ''
) 
{
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        return null;
    }
}

//ejemplo de uso
//$conexion = conectarPDO();
//ejemplo de uso con parámetros personalizados
//$conexion = conectarPDO('localhost', 'mi_base_de_datos', 'mi_usuario', 'mi_contraseña');


function consultar($pdo, $sql) {
    try {
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en SELECT: " . $e->getMessage();
        return false;
    }
}

//ejemplo de uso
//$resultado = consultar($conexion, "SELECT * FROM libros");
function ejecutar($pdo, $sql) {
    try {
        return $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Error en consulta: " . $e->getMessage();
        return false;
    }
}
//ejemplo de uso
//$filasAfectadas = ejecutar($conexion, "DELETE FROM libros WHERE id=10
function preparar($pdo, $sql, $params = []) {
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        if (stripos(trim($sql), 'SELECT') === 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $stmt->rowCount();
        }
    } catch (PDOException $e) {
        echo "Error en consulta preparada: " . $e->getMessage();
        return false;
    }
}

//ejemplo de uso para SELECT
//$resultadoPreparado = preparar($conexion, "SELECT * FROM libros WHERE autor = :autor", ['autor' => 'Gabriel García Márquez']);
//ejemplo de uso para INSERT
//$sql = "INSERT INTO ALUMNOS (NOMBRE, APELLIDOS, CORREO) VALUES (?, ?, ?)";
//$params = ['Ana', 'Pérez', 'ana@mail.com'];
//$insertados = preparar($pdo, $sql, $params);
//echo "Se insertaron $insertados registros";
//ejemplo de uso para UPDATE
//$sql = "UPDATE ALUMNOS SET CORREO = ? WHERE ID = ?";
//$params = ['ana@nuevomail.com', 1];
//$actualizados = preparar($pdo, $sql, $params);
//ejemplo de uso para DELETE
//$sql = "DELETE FROM ALUMNOS WHERE ID = ?";
//$params = [1];
//$eliminados = preparar($pdo, $sql, $params);


// Funciones para crear base de datos y tablas

// Crear base de datos si no existe
function crearBaseDatos($pdo, $nombreBD) {
    try {
        $sql = "CREATE DATABASE IF NOT EXISTS `$nombreBD` CHARACTER SET utf8 COLLATE utf8_general_ci";
        ejecutar($pdo, $sql);
        echo "Base de datos '$nombreBD' creada correctamente<br>";
    } catch (PDOException $e) {
        echo "Error al crear la base de datos: " . $e->getMessage() . "<br>";
    }
}
//ejemplo de uso
//crearBaseDatos($conexion, 'mi_nueva_base_de_datos');
// Crear tabla si no existe
function crearTabla($pdo, $sqlTabla) {
    try {
        ejecutar($pdo, $sqlTabla);
        echo "Tabla creada correctamente<br>";
    } catch (PDOException $e) {
        echo "Error al crear la tabla: " . $e->getMessage() . "<br>";
    }
}
//ejemplo de uso
//$sqlCrearTabla = "CREATE TABLE IF NOT EXISTS libros (id INT AUTO_INCREMENT PRIMARY KEY, titulo VARCHAR(100), autor VARCHAR(100), anio INT)";
//crearTabla($conexion, $sqlCrearTabla);

//ejemplo de uso completo
/*$pdo = conectarPDO('localhost', '', 'root', ''); // Para crear bases de datos, no pasamos dbname

// 1️⃣ Crear base de datos
crearBaseDatos($pdo, 'biblioteca');

// 2️⃣ Conectar ya a la base recién creada
$pdo = conectarPDO('localhost', 'biblioteca', 'root', '');

// 3️⃣ Crear tabla
$sqlTabla = "CREATE TABLE IF NOT EXISTS ALUMNOS (
    CODIGO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    CORREO VARCHAR(50)
)";
crearTabla($pdo, $sqlTabla);*/
// Cerrar la conexión





//ejemplo completo
/*
require 'tu_archivo.php'; // incluye tus funciones

// 1️⃣ Crear la conexión inicial sin dbname para crear la base de datos
$pdo = conectarPDO('localhost', '', 'root', '');

// 2️⃣ Crear base de datos
crearBaseDatos($pdo, 'biblioteca');

// 3️⃣ Conectar a la base recién creada
$pdo = conectarPDO('localhost', 'biblioteca', 'root', '');

// 4️⃣ Crear tabla
$sqlTabla = "CREATE TABLE IF NOT EXISTS ALUMNOS (
    CODIGO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    CORREO VARCHAR(50)
)";
crearTabla($pdo, $sqlTabla);

// 5️⃣ Insertar registro
$insertados = preparar($pdo, "INSERT INTO ALUMNOS (NOMBRE, APELLIDOS, CORREO) VALUES (?, ?, ?)", ['Ana', 'Pérez', 'ana@mail.com']);
echo "Se insertaron $insertados registros<br>";

// 6️⃣ Consultar registros
$alumnos = consultar($pdo, "SELECT * FROM ALUMNOS");
foreach ($alumnos as $a) {
    echo $a['NOMBRE'] . " " . $a['APELLIDOS'] . " - " . $a['CORREO'] . "<br>";
}

// 7️⃣ Actualizar registro
$actualizados = preparar($pdo, "UPDATE ALUMNOS SET CORREO=? WHERE NOMBRE=?", ['ana.nuevo@mail.com', 'Ana']);
echo "Se actualizaron $actualizados registros<br>";

// 8️⃣ Borrar registro
$eliminados = preparar($pdo, "DELETE FROM ALUMNOS WHERE NOMBRE=?", ['Ana']);
echo "Se borraron $eliminados registros<br>";

// 9️⃣ Cerrar la conexión (opcional)
$pdo = null;

*/

// Función para mostrar resultados en una tabla HTML
function mostrarTablaHTML($datos) {
    if (!$datos || count($datos) === 0) {
        echo "No hay datos para mostrar.";
        return;
    }

    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    // Cabecera automática
    echo "<tr>";
    foreach (array_keys($datos[0]) as $columna) {
        echo "<th>" . htmlspecialchars($columna) . "</th>";
    }
    echo "</tr>";

    // Filas de datos
    foreach ($datos as $fila) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td>" . htmlspecialchars($valor) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

function mostrarSelectHTML($datos, $name = 'pais') {
    if (!$datos || count($datos) === 0) {
        echo "No hay países para mostrar.";
        return;
    }

    echo "<select name='$name'>";
    echo "<option value=''>-- Seleccione un país --</option>";

    foreach ($datos as $fila) {
        // Solo hay una columna: PAIS
        $pais = reset($fila);
        echo "<option value='".htmlspecialchars($pais)."'>"
            . htmlspecialchars($pais) .
            "</option>";
    }

    echo "</select>";
}

?>

