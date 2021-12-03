<?php
include "../conexion.php";

$Rs = $_POST['Rs'];

if ($_POST['Rs'] == 'ok') {

  $query = $con->prepare("SELECT * FROM tab_marcas WHERE active = 'Y' ORDER BY nombre_marca ASC");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();
  $numeroDeFilas = $query->rowCount();

  while ($row = $query->fetch()) {

    echo '
  <!--' . $row["nombre_marca"] . '-->

  <div class="row mt-2 mb-2 bg-white border" style="margin: 0rem 1rem;">
  <a class="text-dark" data-bs-toggle="collapse" href="#collapseGarantias' . $row["id_marca"] . '" aria-expanded="false" aria-controls="collapseGarantias' . $row["id_marca"] . '">
    <h5 class="mitr">
      <img class="img-fluid" src="assets/media/img/marcas/' . $row["img_marca"] . '" onContextMenu="return false;" draggable="false">
    </h5>
  </a>
  <div class="collapse" id="collapseGarantias' . $row["id_marca"] . '">
    <div class="mt-2 mb-2">
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold"><i class="fas fa-file-pdf"></i> Ejemplo archivo</div>
            &nbsp;&nbsp;&nbsp;<a href=""><i class="fas fa-download"></i> Pdf wagner garantias.pdf</a>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold"><i class="fas fa-file-pdf"></i> Ejemplo archivo</div>
            &nbsp;&nbsp;&nbsp;<a href=""><i class="fas fa-download"></i> Pdf wagner garantias.pdf</a>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold"><i class="fas fa-file-pdf"></i> Ejemplo archivo</div>
            &nbsp;&nbsp;&nbsp;<a href=""><i class="fas fa-download"></i> Pdf wagner garantias.pdf</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
  ';
  }
} else {
  return false;
}
