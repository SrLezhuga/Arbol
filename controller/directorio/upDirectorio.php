<?php
include("../conexion.php");




$id_cedis = $_POST["id_cedis"];
$cedis = $_POST["cedis"];
$direccion_cedis = $_POST["direccion_cedis"];
$col_cedis = $_POST["col_cedis"];
$cp_cedis = $_POST["cp_cedis"];
$mun_cedis = $_POST["mun_cedis"];
$est_cedis = $_POST["est_cedis"];
$email_cedis = $_POST["email_cedis"];
$tel_info = $_POST["tel_info"];
$tel_ventas = $_POST["tel_ventas"];
$img_logo_cedis = $_POST["img_logo_cedis"];
$img_directorio = $_POST["img_directorio"];
$textareaMap_cedis = $_POST["textareaMap_cedis"];
$activo = $_POST['activo'];

if (!empty($_FILES['imgDirectorio']['name'])) {
    $imgDirectorio = $_FILES['imgDirectorio']['name'];
} else {
    $imgDirectorio = $img_directorio;
}

if (!empty($_FILES['imgLogoCedis']['name'])) {
    $imgLogoCedis = $_FILES['imgLogoCedis']['name'];
} else {
    $imgLogoCedis = $img_logo_cedis;
}

$data = array();


$sql = "INSERT INTO web_arbol.tab_cedis (id_cedis, cedis, direccion_cedis, col_cedis, cp_cedis, mun_cedis, est_cedis, map_cedis, email_cedis, tel_info, tel_ventas, img_cedis, logo_cedis, activo)
VALUES  (" . $id_cedis . ",
         '" . $cedis . "',
         '" . $direccion_cedis . "',
         '" . $col_cedis . "',
         " . $cp_cedis . ",
         '" . $mun_cedis . "',
         '" . $est_cedis . "',
         '" . $textareaMap_cedis . "',
         '" . $email_cedis . "',
         '" . $tel_info . "',
         '" . $tel_ventas . "',
         '" . $imgDirectorio . "',
         '" . $imgLogoCedis . "',
         '" . $activo . "')
            ON DUPLICATE KEY UPDATE 
            cedis = '" . $cedis . "',
            direccion_cedis = '" . $direccion_cedis . "',
            col_cedis = '" . $col_cedis . "',
            cp_cedis = '" . $cp_cedis . "',
            mun_cedis = '" . $mun_cedis . "',
            est_cedis = '" . $est_cedis . "',
            map_cedis =  '" . $textareaMap_cedis . "',
            email_cedis =  '" . $email_cedis . "',
            tel_info =   '" . $tel_info . "',
            tel_ventas =  '" . $tel_ventas . "',
            img_cedis =  '" . $imgDirectorio . "',
            logo_cedis =   '" . $imgLogoCedis . "',
            activo =  '" . $activo . "';
        ";

$query = $con->prepare($sql);
if ($query->execute()) {

    if (!empty($_FILES['imgDirectorio']['name'])) {
        move_uploaded_file($_FILES["imgDirectorio"]["tmp_name"], "../../assets/media/img/" . $_FILES['imgDirectorio']['name']);
    }
    if (!empty($_FILES['imgLogoCedis']['name'])) {
        move_uploaded_file($_FILES["imgLogoCedis"]["tmp_name"], "../../assets/media/img/iconos/" . $_FILES['imgLogoCedis']['name']);
    }

    $data['status'] = 'ok';
    if ($id_cedis == 'null') {
        $data['msj'] = 'Se creó un nuevo directorio';
    } else {
        $data['msj'] = 'Se actualizó un directorio';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
