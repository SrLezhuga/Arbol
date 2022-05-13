<?php
include("../conexion.php");

$catalogo = $_POST['catalogo'];
$marca = $_POST['marca'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$fecha = $_POST['fecha'];
$activo = $_POST['activo'];
$img = $_POST['img'];
$txt = $_POST['txt'];
$archivo = $_POST['archivo'];

if (!empty($_FILES['imgCatalogo']['name'])) {
    $imgCatalogo = $_FILES['imgCatalogo']['name'];
} else {
    $imgCatalogo = $img;
}

if (!empty($_FILES['archivoCatalogo']['name'])) {
    $archivoCatalogo = $_FILES['archivoCatalogo']['name'];
} else {
    $archivoCatalogo = $archivo;
}

$data = array();

$sql = 'insert into refaccionaria_arboledas_web.tab_catalogo (id_catalogo, marca_catalogo, titulo_catalogo, subtitulo_catalogo, fecha_catalogo, img_catalogo, archivo_catalogo, activo, etiquetas)
values  (' . $catalogo . ', "' . $marca . '", "' . $titulo . '", "' . $subtitulo . '", "' . $fecha . '", "' . $imgCatalogo . '", "' . $archivoCatalogo . '", "' . $activo . '", "' . $txt . '")
on duplicate key update marca_catalogo = "' . $marca . '", titulo_catalogo = "' . $titulo . '", subtitulo_catalogo = "' . $subtitulo . '", fecha_catalogo = ' . $fecha . ', img_catalogo = "' . $imgCatalogo . '", archivo_catalogo = "' . $archivoCatalogo . '", activo = "' . $activo . '", etiquetas = "' . $txt . '";';

$query = $con->prepare($sql);
if ($query->execute()) {

    if (!empty($_FILES['imgCatalogo']['name'])) {
        move_uploaded_file($_FILES["imgCatalogo"]["tmp_name"], "../../files/" . $_FILES['imgCatalogo']['name']);
    }
    if (!empty($_FILES['archivoCatalogo']['name'])) {
        move_uploaded_file($_FILES["archivoCatalogo"]["tmp_name"], "../../files/" . $_FILES['archivoCatalogo']['name']);
    }

    $data['status'] = 'ok';
    if ($catalogo == 'null') {
        $data['msj'] = 'Se creó un nuevo catálogo';
    } else {
        $data['msj'] = 'Se actualizó un catálogo';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
