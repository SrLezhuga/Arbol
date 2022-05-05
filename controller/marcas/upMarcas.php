<?php
include("../conexion.php");

$marcas = $_POST['marcas'];
$informacion = $_POST['informacion'];
$titulo = $_POST['titulo'];
$activo = $_POST['activo'];
$img = $_POST['img'];

if (!empty($_FILES['imgMarcas']['name'])) {
    $imgMarcas = $_FILES['imgMarcas']['name'];
} else {
    $imgMarcas = $img;
}

$data = array();

$sql = 'INSERT INTO web_arbol.tab_marcas (id_marca, nombre_marca, info_marca, img_marca, active) 
VALUES (' . $marcas . ', "' . $titulo . '", "' . $informacion . '", "' . $imgMarcas . '", "' . $activo . '")
on duplicate key update 
nombre_marca = "' . $titulo . '", 
info_marca = "' . $informacion . '", 
img_marca = "' . $imgMarcas . '", ';

$query = $con->prepare($sql);

if ($query->execute()) {

    if (!empty($_FILES['imgMarcas']['name'])) {
        move_uploaded_file($_FILES["imgMarcas"]["tmp_name"], "../../assets/media/img/marcas/" . $_FILES['imgMarcas']['name']);
    }

    $data['status'] = 'ok';
    if ($marcas == 'null') {
        $data['msj'] = 'Se creó un nuevo catálogo web';
    } else {
        $data['msj'] = 'Se actualizó un catálogo web';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
