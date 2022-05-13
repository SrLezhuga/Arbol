<?php
include("../conexion.php");

$id_Subbanner = $_POST["id_Subbanner"];
$img_subBanner = $_POST["img_subBanner"];
$activo = $_POST['activo'];

$imgSubBanner = (!empty($_FILES['imgSubBanner']['name'])) ? $_FILES['imgSubBanner']['name'] : $img_subBanner;

$data = array();

$sql = "INSERT INTO refaccionaria_arboledas_webtab_subslider (id_subslider, img, active) 
        VALUES ($id_Subbanner, '$imgSubBanner', '$activo')
        ON DUPLICATE KEY UPDATE 
        img = '" . $imgSubBanner . "',
        active = '" . $activo . "';
        ";

$query = $con->prepare($sql);
if ($query->execute()) {

    if (!empty($_FILES['imgSubBanner']['name'])) {
        move_uploaded_file($_FILES["imgSubBanner"]["tmp_name"], "../../assets/media/img/banners/" . $_FILES['imgSubBanner']['name']);
    }

    $data['status'] = 'ok';
    if ($id_Subbanner == 'null') {
        $data['msj'] = 'Se creó un nuevo banner';
    } else {
        $data['msj'] = 'Se actualizó un banner';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
