<?php
include("../conexion.php");

$nosotros = $_POST['nosotros'];
$valor = $_POST['valor'];
$campo = $_POST['campo'];
$activo = $_POST['activo'];

$data = array();

$sql = "INSERT INTO web_arbol.tab_nosotros (campo, valor, activo)
values  ('" . $campo . "', '" . $valor . "', '" . $activo . "')
ON DUPLICATE KEY UPDATE
campo = '" . $campo . "', 
valor = '" . $valor . "', 
activo = '" . $activo . "';
 ";

$query = $con->prepare($sql);

if ($query->execute()) {
    $data['status'] = 'ok';
    if ($nosotros == 'null') {
        $data['msj'] = 'Se creó nuevo registro';
    } else {
        $data['msj'] = 'Se actualizó registro';
    }
} else {
    $data['status'] = 'error';
    $data['msj'] = 'No se guardaron los cambios: Error ' . $query->errorInfo();
}

echo json_encode($data);
