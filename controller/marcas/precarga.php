<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT * FROM tab_marcas WHERE active = 'Y' ORDER BY nombre_marca ASC");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();

  while ($row = $query->fetch()) {
    
    echo '
    <!--' . $row["nombre_marca"] . '-->
 
    <div class="accordion accordion-flush p-0" id="accordion' . $row["id_marca"] . '">
      <div class="accordion-item mb-3 rounded border">
        <h2 class="accordion-header" id="flush-heading' . $row["id_marca"] . '">
          <button class="accordion-button collapsed p-0 m-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row["id_marca"] . '" aria-expanded="false" aria-controls="flush-collapse' . $row["id_marca"] . '">
            <img class="img-marcas mx-auto d-block" src="assets/media/img/marcas/' . $row["img_marca"] . '" onContextMenu="return false;" draggable="false">
          </button>
        </h2>
        <div id="flush-collapse' . $row["id_marca"] . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . $row["id_marca"] . '" data-bs-parent="#accordion' . $row["id_marca"] . '">
          <div class="accordion-body vh-15 small">
            <h6 class="card_title mitr text-center">' . $row["nombre_marca"] . '</h6>
            <h6 class="small">' . $row["info_marca"] . '</h6> 
          </div>
        </div>
      </div>
    </div>

    ';
  }
} else {
  return false;
}



