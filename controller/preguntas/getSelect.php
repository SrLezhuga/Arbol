<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_preguntas");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione una pregunta</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_pregunta"] . '">' . $item["pregunta"]  . '</option>';
}
