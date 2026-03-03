<?php
$conexion = new mysqli("localhost", "root", "", "biblioteca");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$nombre = $_GET['NOMAUT'] ?? '';

$sql = "SELECT * FROM libro WHERE NOMAUT = '$nombre'";
$resultado = $conexion->query($sql);
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Libros del Autor <?php echo $nombre;?></title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid red; padding: 8px; text-align: center; }
        th { background-color: #f2e6c9; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Libros de: <?php echo $nombre; ?></h2>

<table>
<tr>
    <th>ISBNLIB</th>
    <th>TITULO</th>
    <th>EDITORIAL</th>
</tr>

<?php
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila['ISBNLIB'] . "</td>";
    echo "<td>" . $fila['TITLIB'] . "</td>";
    echo "<td>" . $fila['EDILIB'] . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>

<?php
$conexion->close();
?>
