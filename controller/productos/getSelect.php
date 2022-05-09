<?php
include("../conexion.php");

$query = $con->prepare("SELECT id_sistema, marca, descripcion_item FROM tab_sistemas ORDER BY marca, descripcion_item ASC");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un producto</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_sistema"] . '">' . $item["marca"]  . ' - ' . $item['descripcion_item'] . '</option>';
}
