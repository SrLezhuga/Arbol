<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_catalogo_web");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un catálogo</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_catalogo_web"] . '">' . $item["nombre_catalogo_web"] . ' - ' . $item["info_catalogo_web"] . '</option>';
}
