<?php
include("../conexion.php");

$titulo = $_POST['titulo'];
$informacion = $_POST['informacion'];
$garantia = $_POST['garantia'];
$activo = $_POST['activo'];
$nombre_archivo = $_POST['PDF_Garantia'];

if (!empty($_FILES['File_PDF_Garantia']['name'])) {
    $pdf = $_FILES['File_PDF_Garantia']['name'];
} else {
    $pdf = $nombre_archivo;
}

$data = array();

$sql = "INSERT INTO web_arbol.tab_garantias (id_garantia, marca_garantia, nombre_pdf, archivo, active) 
VALUES (" . $garantia . ", '" . $informacion . "', '" . $titulo . "', '" . $pdf . "', '" . $activo . "')
ON DUPLICATE KEY UPDATE 
marca_garantia = '" . $informacion . "', 
nombre_pdf = '" . $titulo . "', 
archivo = '" . $pdf . "', 
active = '" . $activo . "'";

$query = $con->prepare($sql);

if ($query->execute()) {

    if (!empty($_FILES['File_PDF_Garantia']['name'])) {
        move_uploaded_file($_FILES["File_PDF_Garantia"]["tmp_name"], "../../files/garantias/" . $_FILES['File_PDF_Garantia']['name']);
    }

    $data['status'] = 'ok';
    if ($garantia == 'null') {
        $data['msj'] = 'Se creó una garantia';
    } else {
        $data['msj'] = 'Se actualizó una garantia';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);

