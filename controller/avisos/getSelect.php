<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_promo");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un aviso</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_promo"] . '">Aviso  ' . $item["id_promo"] . '</option>';
}
