<?php
require_once '../bd.php';

$conexion = conectarPDO('localhost', 'biblioteca', 'root', '');

echo '<br><br><a href="biblioteca.html">Volver al formulario</a>';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["accion"])) {

    $accion = $_POST["accion"];

    switch ($accion) {

        // Mostrar autores y países
        case "mostrar_autores":
            $sql = "SELECT nomaut AS Nombre, Pais FROM autor";
            $autores = consultar($conexion, $sql);
            mostrarTablaHTML($autores);
            break;

        // Mostrar países distintos en un select
        case "mostrar_paises":
            $sql = "SELECT DISTINCT Pais FROM autor ORDER BY Pais ASC";
            $paises = consultar($conexion, $sql);
            mostrarTablaHTML($paises);
           
            break;
        // Mostrar autores de un país
        case "autores_por_pais":
            if (isset($_POST["pais"])) {
                $pais = $_POST["pais"];

                $sql = "SELECT nomaut AS Nombre, pais AS País 
                        FROM autor 
                        WHERE Pais = :pais 
                        ORDER BY nomaut ASC";

                $autoresPais = preparar($conexion, $sql, [':pais' => $pais]);

                mostrarTablaHTML($autoresPais);
            }
            break;

        default:
            echo "Acción no válida";
    }
}


/*
Acceder a la tabla "autor" de la base de datos "biblioteca" y mostrar en pantalla los distintos países 
que se encuentran en la tabla "autor". Para mostrar los países, debes utilizar un elemento de control de 
formulario "select" de html.
*/
?>