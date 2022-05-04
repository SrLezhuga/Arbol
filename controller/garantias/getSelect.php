<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_garantias");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione una garantia</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_garantia"] . '">' . $item["marca_garantia"]  . ' - ' . $item['nombre_pdf'] . '</option>';
}
