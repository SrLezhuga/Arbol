<?php
include "../conexion.php";

$query = $con->prepare("SELECT * FROM tab_nosotros");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["campo"] . '">' . $item["campo"]  . '</option>';
}