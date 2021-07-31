<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | Preguntas Frecuentes</title>
</head>

<body class="d-flex flex-column h-100">

  <!-- Nav Menu-->
  <?php require('controller/common/nav_menu.php'); ?>
  <!-- titulo -->
  <div class="container menus rounded">
    <h2 class="mitr">PREGUNTAS FRECUENTES</h2>
  </div>

  <header>

    <div class="container section-nosotros">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
          <h2 class="mitr">PREGUNTAS FRECUENTES</h2>
          <div class="separator-top"></div>
        </div>
      </div>
    </div>


  </header>

  <section>
    <div class="container  mt-5 mb-3">
      <div class="justify-content-center align-items-center">


        <div class="accordion" id="accordionExample">

          <!-- 1 -->
          <div class="accordion-item rounded shadow">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                1. ¿POR QUÉ ELEGIR COMPRAR CON USTEDES?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <small> Porque tenemos más de 30 años de experiencia en el mercado, somo una empresa consolidada en la cual puedes confiar. Siempre trabajamos para darte el mejor servicio y tenerte las mejores refacciones para tus clientes. Constantemente nos estamos renovando para ser tu mejor opción en mayoreo de autopartes.</small>
              </div>
            </div>
          </div>
          <br>

          <!-- 2 -->
          <div class="accordion-item rounded shadow">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                2. ¿ES SEGURO COMPRAR CON USTEDES?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <br>

          <!-- 3 -->
          <div class="accordion-item rounded shadow">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                3. ¿DÓNDE ESTÁN UBICADOS?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <br>

          <!-- 4 -->
          <div class="accordion-item rounded shadow">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                4. SOY DE OTRO ESTADO DONDE NO TIENEN SUCURSAL ¿PUEDO COMPRAR?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <br>

          <!-- 1 -->
        </div>


      </div>
    </div>
  </section>



  <?php require('controller/common/footer.php'); ?>

</body>



</html>