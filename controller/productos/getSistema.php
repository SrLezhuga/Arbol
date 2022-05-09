<?php
include("../conexion.php");

$query = $con->prepare("SELECT nombre_linea FROM tab_lineas ORDER BY nombre_linea ASC");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un sistema</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["nombre_linea"] . '">' . $item["nombre_linea"]  . '</option>';
}
