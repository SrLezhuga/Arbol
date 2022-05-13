<?php
include("../conexion.php");

$id_slider = $_POST["id_slider"];
$img_movil = $_POST["img_movil"];
$img_pc = $_POST["img_pc"];
$activo = $_POST['activo'];

if (!empty($_FILES['imgPc']['name'])) {
    $imgPc = $_FILES['imgPc']['name'];
} else {
    $imgPc = $img_pc;
}

if (!empty($_FILES['imgMovil']['name'])) {
    $imgMovil = $_FILES['imgMovil']['name'];
} else {
    $imgMovil = $img_movil;
}

$data = array();

$sql = "INSERT INTO refaccionaria_arboledas_web.tab_slider 
(id_slider, img_pc, img_movil, active, accion) 
VALUES ($id_slider, '$imgPc', '$imgMovil', '$activo', null)
            ON DUPLICATE KEY UPDATE 
            img_pc = '" . $imgPc . "',
            img_movil = '" . $imgMovil . "',
            active = '" . $activo . "';
        ";

$query = $con->prepare($sql);
if ($query->execute()) {

    if (!empty($_FILES['imgPc']['name'])) {
        move_uploaded_file($_FILES["imgPc"]["tmp_name"], "../../assets/media/img/banners/" . $_FILES['imgPc']['name']);
    }
    if (!empty($_FILES['imgMovil']['name'])) {
        move_uploaded_file($_FILES["imgMovil"]["tmp_name"], "../../assets/media/img/banners/" . $_FILES['imgMovil']['name']);
    }

    $data['status'] = 'ok';
    if ($id_slider == 'null') {
        $data['msj'] = 'Se creó un nuevo banner';
    } else {
        $data['msj'] = 'Se actualizó un banner';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
