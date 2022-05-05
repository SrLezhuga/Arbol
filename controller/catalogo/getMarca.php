<?php
include("../conexion.php");

$query = $con->prepare("SELECT nombre_marca FROM tab_marcas ORDER BY nombre_marca ASC");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione una marca</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["nombre_marca"] . '">' . $item["nombre_marca"]  . '</option>';
}
