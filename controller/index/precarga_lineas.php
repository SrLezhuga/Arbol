<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_lineas WHERE active = 'Y'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  while ($row = $query->fetch()) {

    echo '

      <!-- carusel item ' . $row['id_linea'] . '-->
      <div class="accordion accordion-flush" id="accordion' . $row['id_linea'] . '">
        <div class="accordion-item mb-3 rounded border">
          <h2 class="accordion-header" id="flush-heading' . $row['id_linea'] . '">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row['id_linea'] . '" aria-expanded="false" aria-controls="flush-collapse' . $row['id_linea'] . '">
              <img class="rounded-circle" src="assets/media/img/iconos/' . $row['img_linea'] . '" onContextMenu="return false;" draggable="false">
              <h6 class="mitr pl-5 text-start">' . $row['nombre_linea'] . '</h6>
            </button>
          </h2>
          <div id="flush-collapse' . $row['id_linea'] . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . $row['id_linea'] . '" data-bs-parent="#accordion' . $row['id_linea'] . '">
            <div class="accordion-body vh-15 small">' . $row['info_linea'] . '</div>
          </div>
        </div>
      </div>

    ';
  }
} else {
  return false;
}
