<?php
include "../conexion.php";

$query = $con->prepare("SELECT * FROM tab_marcas_lideres WHERE activo = 'Y' ORDER BY nombre_lideres ASC");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();

while ($row = $query->fetch()) {
    echo '
        <div class="slide">
            <img src="assets/media/img/marcas/' . $row['img_lider'] . '" height="100" width="250" alt="' . $row['nombre_lideres'] . '" onContextMenu="return false;" draggable="false" />
        </div>
        ';
}
