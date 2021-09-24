<?php include "controller/conexion.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Configuración</title>

  <script type="text/javascript" src="assets/js/catalogo.js"></script>
</head>

<body>
  <div id="wrapper">

    <!-- titulo -->
    <div class="container menus rounded mt-5">
      <h2 class="mitr">CONFIGURACIÓN</h2>
    </div>

    <section>
      <div class="container mt-5 mb-3">
        <div class="justify-content-center align-items-center">

          <div class="d-flex align-items-start">
            <div class="nav border flex-column nav-pills me-3 bg-white shadow-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active" id="v-pills-catalogos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-catalogos" type="button" role="tab" aria-controls="v-pills-catalogos" aria-selected="true">CATALOGOS</button>
              <button class="nav-link" id="v-pills-catalogosWeb-tab" data-bs-toggle="pill" data-bs-target="#v-pills-catalogosWeb" type="button" role="tab" aria-controls="v-pills-catalogosWeb" aria-selected="false">CATALOGOS WEB</button>
              <button class="nav-link" id="v-pills-marcas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-marcas" type="button" role="tab" aria-controls="v-pills-marcas" aria-selected="false">MARCAS</button>
              <button class="nav-link" id="v-pills-sistemas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sistemas" type="button" role="tab" aria-controls="v-pills-sistemas" aria-selected="false">SISTEMAS</button>
              <button class="nav-link" id="v-pills-productos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-productos" type="button" role="tab" aria-controls="v-pills-productos" aria-selected="false">PRODUCTOS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">PREGUNTAS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">DIRECTORIO</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">NOSOTROS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">BANNERS</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">AVISOS</button>




            </div>
            <div class="tab-content" id="v-pills-tabContent" style="width: 100%;">
              <div class="tab-pane fade show active" id="v-pills-catalogos" role="tabpanel" aria-labelledby="v-pills-catalogos-tab">
                <?php include_once('controller/catalogo/config.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-catalogosWeb" role="tabpanel" aria-labelledby="v-pills-catalogosWeb-tab">
                <?php include('controller/catalogo/configWeb.php'); ?>
              </div>
              <div class="tab-pane fade" id="v-pills-marcas" role="tabpanel" aria-labelledby="v-pills-marcas-tab">
                
              </div>
              <div class="tab-pane fade" id="v-pills-sistemas" role="tabpanel" aria-labelledby="v-pills-sistemas-tab">...</div>
              <div class="tab-pane fade" id="v-pills-productos" role="tabpanel" aria-labelledby="v-pills-productos-tab">...</div>
            </div>
          </div>


        </div>
      </div>
    </section>

  </div>

</body>



</html>