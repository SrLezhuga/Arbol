<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_slider");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un banner</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_slider"] . '">Banner  ' . $item["id_slider"] . '</option>';
}
