<?php
include("../conexion.php");

$id_promo = $_POST["id_promo"];
$img_promo = $_POST["img_promo"];
$activo = $_POST['activo'];
$url_promo = $_POST['url_promo'];

if (!empty($_FILES['imgPromo']['name'])) {
    $imgPromo = $_FILES['imgPromo']['name'];
} else {
    $imgPromo = $img_promo;
}

$data = array();

$sql = "INSERT INTO web_arbol.tab_promo 
        (id_promo, img_promo, url_promo, active) 
        VALUES ($id_promo, '$imgPromo', '$url_promo', '$activo')
            ON DUPLICATE KEY UPDATE 
            img_promo = '" . $imgPromo . "',
            url_promo = '" . $url_promo . "',
            active = '" . $activo . "';
        ";

$query = $con->prepare($sql);
if ($query->execute()) {

    if (!empty($_FILES['imgPromo']['name'])) {
        move_uploaded_file($_FILES["imgPromo"]["tmp_name"], "../../assets/media/img/modal/" . $_FILES['imgPromo']['name']);
    }

    $data['status'] = 'ok';
    if ($id_promo == 'null') {
        $data['msj'] = 'Se creó una nueva promoción';
    } else {
        $data['msj'] = 'Se actualizó una promoción';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
