<?php
include "../conexion.php";

$retVal = (!empty($_POST['Rs'])) ? $parametro = $_POST['Rs'] : $parametro = '';

// FETCH_ASSOC
$query = $con->prepare("CALL BuscarCatalogo('%" . $parametro . "%')");
// Especificamos el fetch mode antes de llamar a fetch()
$query->setFetchMode(PDO::FETCH_ASSOC);

// Ejecutamos
$query->execute();

$rows = $query->rowCount();

if ($rows <= 0) {
  echo
  "
    <!--Item card -->
    <div class='cards border rounded bg-white align-items-center text-center align-self-center'>
      <img class='rounded' src='assets/media/img/loader/Placeholder.png'>
      <div class='cards-desc rounded'>
        <div class='cards-div'>
          <h4 class='mitr'>
            Mensaje del sistema
          </h4>
          <h6 class='glacial small'>
          No se encontro ningun resultado que coincidan con esta busqueda: " . $parametro . "
          </h6>
        </div>
      </div>
    </div>

    ";
} else {


  // Mostramos los resultados
  while ($row = $query->fetch()) {
    $url = $row["id_catalogo"];
    echo
    "
    <!--Item card -->
    <div class='cards rounded  align-items-center text-center align-self-center'>
    <input type='hidden' value='" . $row["etiquetas"] . "'>
      <img class='rounded' src='files/" . $row["img_catalogo"] . "' alt=''>
      <div class='cards-desc rounded'>
        <div class='cards-div'>
          <h4 class='mitr'>
            " . $row["titulo_catalogo"] . "
          </h4>
          <h6 class='glacial small'>
            " . $row["subtitulo_catalogo"] . "<br>" . $row["fecha_catalogo"] . "
          </h6>
          <div class='d-grid gap-2'>
            <a class='btn btn-sm btn-danger small' href='files/" . $row["archivo_catalogo"] . "' target='_blank' role='button'><i class='far fa-eye'></i> Ver Online</a>
            <a class='btn btn-sm btn-danger small' role='button' onclick='descargarCatalogo($url)' ><i class='fas fa-file-download'></i> Descargar</a>
          </div>
        </div>
      </div>
    </div>

    ";
  }
}
