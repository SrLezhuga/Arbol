<?php
include("../conexion.php");

$catalogo = $_POST['catalogo'];
$informacion = $_POST['informacion'];
$titulo = $_POST['titulo'];
$url = $_POST['url'];
$activo = $_POST['activo'];
$img = $_POST['img'];

if (!empty($_FILES['imgCatalogoWeb']['name'])) {
    $imgCatalogo = $_FILES['imgCatalogoWeb']['name'];
} else {
    $imgCatalogo = $img;
}

$data = array();

$sql = 'insert into refaccionaria_arboledas_webtab_catalogo_web (id_catalogo_web, nombre_catalogo_web, img_catalogo_web, info_catalogo_web, url_catalogo_web, active)
values  (' . $catalogo . ', "' . $titulo . '", "' . $imgCatalogo . '", "' . $informacion . '", "' . $url . '", "' . $activo . '")
on duplicate key update nombre_catalogo_web = "' . $titulo . '", img_catalogo_web = "' . $imgCatalogo . '", info_catalogo_web = "' . $informacion . '", url_catalogo_web = "' . $url . '", active = "' . $activo . '";';

$query = $con->prepare($sql);
if ($query->execute()) {

    if (!empty($_FILES['imgCatalogoWeb']['name'])) {
        move_uploaded_file($_FILES["imgCatalogoWeb"]["tmp_name"], "../../assets/media/img/marcas/" . $_FILES['imgCatalogoWeb']['name']);
    }

    $data['status'] = 'ok';
    if ($catalogo == 'null') {
        $data['msj'] = 'Se creó un nuevo catálogo web';
    } else {
        $data['msj'] = 'Se actualizó un catálogo web';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
