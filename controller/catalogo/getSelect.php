<?php
include("../conexion.php");

$query = $con->prepare("SELECT * FROM tab_catalogo");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<option value="" selected disabled>Seleccione un catálogo</option>';
while ($item = $query->fetch()) {
    echo '<option value="' . $item["id_catalogo"] . '">' . $item["titulo_catalogo"] . ' - ' . $item["subtitulo_catalogo"] . '</option>';
}
