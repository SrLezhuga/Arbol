<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
    $query = $con->prepare("SELECT * FROM tab_promo WHERE active = 'Y'");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $count = 1;

    while ($row = $query->fetch()) {

        $active = ($count == 1) ? $active = "active" : $active = "";

        echo '

      <!-- carusel item ' . $row['id_promo'] . '-->
      <div class="carousel-item ' . $active . '" data-bs-interval="5000">
        <a href="' . $row['url_promo'] . '">
            <img class="img-fluid rounded" src="assets/media/img/modal/' . $row['img_promo'] . '" alt="Proveedores de Refacciones Automotrices por mayoreo" onContextMenu="return false;" draggable="false">
        </a>
      </div>
    ';
        $count++;
    }
} else {
    return false;
}
