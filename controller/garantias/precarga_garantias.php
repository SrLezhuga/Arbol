<?php
include "../conexion.php";

$Rs = $_POST['Rs'];

if ($_POST['Rs'] == 'ok') {

  $query1 = $con->prepare("SELECT DISTINCT tg.marca_garantia, tm.img_marca FROM tab_garantias AS tg
    JOIN tab_marcas tm
    ON tg.marca_garantia = tm.nombre_marca
    AND tg.active = tm.active
    WHERE tg.active = 'Y' ORDER BY tg.marca_garantia ASC");
  $query1->setFetchMode(PDO::FETCH_ASSOC); 
  $query1->execute();

  while ($item1 = $query1->fetch()) {

    $marcas = $item1['marca_garantia'];
    echo ' <!--' . $item1["marca_garantia"] . '-->
    
      <div class="row mt-2 mb-2 bg-white border shadow-lg" style="margin: 0rem;">
      <a class="text-dark" data-bs-toggle="collapse" href="#collapseGarantias' . $item1["marca_garantia"] . '" aria-expanded="false" aria-controls="collapseGarantias' . $item1["marca_garantia"] . '">
          <img class="img-fluid" src="assets/media/img/marcas/' . $item1["img_marca"] . '" onContextMenu="return false;" draggable="false">
      </a>
      <div class="collapse" id="collapseGarantias' . $item1["marca_garantia"] . '">
        <div class="mt-2 mb-2">
          <ul class="list-group list-group-flush">';

    $query2 = $con->prepare("SELECT * FROM tab_garantias WHERE marca_garantia = '$marcas' AND  active = 'Y'");
    $query2->setFetchMode(PDO::FETCH_ASSOC);
    $query2->execute();

    while ($row = $query2->fetch()) {

      echo '
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold"><i class="fas fa-file-pdf"></i> ' . $row["nombre_pdf"] . '</div>
                &nbsp;&nbsp;&nbsp;<a href="files/garantias/' . $row["archivo"] . '" target="_blank"><i class="fas fa-download"></i> Descargar</a>
              </div>
            </li>';
    }
    echo '</ul>
        </div>
      </div>
    </div>';
  }
} else {
  return false;
}
