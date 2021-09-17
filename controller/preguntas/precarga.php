<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT pregunta, respuesta FROM tab_preguntas WHERE activo = 'Y'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();
  $count = 1;

  while ($row = $query->fetch()) {
    $show = ($count == 1) ? $show = "show" : $show = "";
    $bool = ($count == 1) ? $bool = "true" : $bool = "false";
    $collapsed = ($count == 1) ? $collapsed = "" : $collapsed = "collapsed";

    echo '
    
    <!-- Pregunta ' . $count . ' -->
    <div class="accordion-item rounded border shadow-lg">
      <h2 class="accordion-header" id="heading' . $count . '">
        <button class="accordion-button ' . $collapsed . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $count . '" aria-expanded="' . $bool . '" aria-controls="collapse' . $count . '">
        ' . $count . '. ' . $row["pregunta"] . '
        </button>
      </h2>
      <div id="collapse' . $count . '" class="accordion-collapse collapse ' . $show . '" aria-labelledby="heading' . $count . '" data-bs-parent="#accordionPreguntas">
        <div class="accordion-body">
          <p class="small">
          ' . nl2br($row["respuesta"]) . '
          </p>
        </div>
      </div>
    </div>
    <br>

    ';
    $count++;
  }
} else {
  return false;
}
