<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
  $query = $con->prepare("SELECT pregunta, respuesta FROM tab_preguntas WHERE activo = 'Y'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->execute();
  $count = 1;


  echo '<div class="accordion" id="accordionPanelsStayOpenExample">';
  while ($row = $query->fetch()) {

    $collapsed = ($count == 1) ? $collapsed = "" : $collapsed = "collapsed";

    echo '
    
    <!-- Pregunta ' . $count . ' -->
    
    <div class="accordion-item mb-2">
      <h2 class="accordion-header" id="panelsStayOpen-heading' . $count . '">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' . $count . '" aria-expanded="true" aria-controls="panelsStayOpen-collapse' . $count . '">
        ' . $count . '. ' . $row["pregunta"] . '
        </button>
      </h2>
      <div id="panelsStayOpen-collapse' . $count . '" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading' . $count . '">
        <div class="accordion-body">
          <p class="small">
          ' . nl2br($row["respuesta"]) . '
          </p>
        </div>
      </div>
    </div>

    ';
    $count++;
  }
  echo '</div>';
} else {
  return false;
}
