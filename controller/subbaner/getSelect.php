<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_subslider");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un banner</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_subslider"] . '">Banner  ' . $item["id_subslider"] . '</option>';
}
