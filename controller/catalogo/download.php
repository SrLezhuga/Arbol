<?php
include "../conexion.php";

$id = $_GET["id"];
$path_a_tu_doc = "../../files";

$query = $con->prepare("SELECT archivo_catalogo FROM tab_catalogo WHERE id_catalogo = $id");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$row = $query->fetch();

$enlace = $path_a_tu_doc."/".$row['archivo_catalogo'];
header ("Content-Disposition: attachment; filename=".$row['archivo_catalogo']." ");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
