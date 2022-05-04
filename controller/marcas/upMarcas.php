<?php
include("../conexion.php");

$titulo = $_POST['titulo'];
$informacion = $_POST['informacion'];
$garantia = $_POST['garantia'];
$activo = $_POST['condiciones'];
$nombre_archivo = $_POST['nombre_archivo'];

if (!empty($_FILES['InputFilePDF']['name'])) {
    $pdf = $_FILES['InputFilePDF']['name'];
} else {
    $pdf = $nombre_archivo;
}

$data = array();

$sql = 'INSERT INTO web_arbol.tab_garantias (id_garantia, marca_garantia, nombre_pdf, archivo, active) 
VALUES (' . $garantia . ', "' . $informacion . '", "' . $titulo . '", "' . $pdf . '", "' . $activo . '")
ON DUPLICATE KEY UPDATE 
marca_garantia = "' . $informacion . '", 
nombre_pdf = "' . $titulo . '", 
archivo = "' . $pdf . '", 
active = "' . $activo . '";';

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
