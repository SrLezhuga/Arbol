<?php
include("../conexion.php");

$sistemas = $_POST['sistemas'];
$informacion = $_POST['informacion'];
$titulo = $_POST['titulo'];
$activo = $_POST['activo'];
$img = $_POST['img'];

if (!empty($_FILES['imgSistema']['name'])) {
    $imgSistema = $_FILES['imgSistema']['name'];
} else {
    $imgSistema = $img;
}

$data = array();

$sql = 'INSERT INTO refaccionaria_arboledas_webtab_lineas (id_linea, img_linea, nombre_linea, info_linea, active) 
VALUES (' . $sistemas . ', "' . $imgSistema . '", "' . $titulo . '", "' . $informacion . '",  "' . $activo . '")
on duplicate key update 
img_linea = "' . $imgSistema . '", 
nombre_linea = "' . $titulo . '", 
info_linea = "' . $informacion . '", 
active = "' . $activo . '";';

$query = $con->prepare($sql);

if ($query->execute()) {

    if (!empty($_FILES['imgSistema']['name'])) {
        move_uploaded_file($_FILES['imgSistema']['tmp_name'], "../../assets/media/img/iconos/" . $_FILES['imgSistema']['name']);
    }

    $data['status'] = 'ok';
    if ($sistemas == 'null') {
        $data['msj'] = 'Se creó un nuevo sistema';
    } else {
        $data['msj'] = 'Se actualizó un sistema';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
