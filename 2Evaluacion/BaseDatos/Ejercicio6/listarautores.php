<?php
$conexion = new mysqli("localhost", "root", "", "biblioteca");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$pais = "PORTUGAL"; // Puedes cambiarlo o pasarlo por GET

$sql = "SELECT * FROM autor WHERE PAIS = '$pais' ORDER BY NOMAUT";
$resultado = $conexion->query($sql);
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Autores</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: auto; }
        th, td { border: 1px solid red; padding: 8px; text-align: center; }
        th { background-color: #f2e6c9; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>

<h2 style="text-align:center;">LISTADO DE AUTORES DE <?php echo $pais; ?></h2>

<table>
<?php
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila['NOMAUT'] . "</td>";
    echo "<td>
            <form action='verlibros.php' method='GET'>
                <input type='hidden' name='NOMAUT' value='" . $fila['NOMAUT'] . "'>
                <button type='submit'>Ver libros</button>
            </form>
          </td>";
    echo "</tr>";
}
?>
</table>

</body>
</html>

<?php
$conexion->close();
?>
