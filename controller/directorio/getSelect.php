<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_cedis");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione una cedis</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_cedis"] . '">' . $item["cedis"] . ' - ' . $item["direccion_cedis"] . '</option>';
}
