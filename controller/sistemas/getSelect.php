<?php
include("../conexion.php");

$query = $con->prepare("SELECT id_linea, nombre_linea FROM tab_lineas ORDER BY nombre_linea ASC");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione una marca</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_linea"] . '">' . $item["nombre_linea"]  . '</option>';
}
