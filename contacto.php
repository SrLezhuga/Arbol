<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | Contacto</title>
</head>

<body>
  <div id="wrapper">

    <!-- Nav Menu-->
    <?php require('controller/common/nav_menu.php'); ?>
    <!-- titulo -->
    <div class="container menus rounded">
      <h2 class="mitr">CONTACTO</h2>
    </div>

    <section>
      <div class="container mb-3 mt-5">
        <div class="row justify-content-center align-items-center" id="contenedor">
          <div id="flex-container" class="testimonials border rounded shadow-lg">
            <div id="left-zone">
              <ul class="list" id="CardCedis"></ul>
            </div>
            <div id="right-zone"></div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container mt-5 mb-5">
        <div class="row justify-content-center align-items-center">
          <!-- from -->
          <div class="col-lg-8 col-md-8 col-sm-12 bg-white rounded border shadow-lg">
            <div class="row">
              <!-- campo nombre -->
              <div class="col-lg-12">
                <div class="mb-3 mt-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-user"></i> Nombre:</label>
                  </div>
                </div>
              </div>
              <!-- campo correo -->
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-at"></i> Correo:</label>
                  </div>
                </div>
              </div>
              <!-- campo telefono -->
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <label for="floatingSelect"><i class="fas fa-phone-alt"></i> Teléfono:</label>
                  </div>
                </div>
              </div>
              <!-- campo estado -->
              <div class="col-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <input class="form-control dt" list="datalistOptions" id="floatingSelect" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                      <option value="Aguascalientes">
                      <option value="Baja California">
                      <option value="Baja California Sur">
                      <option value="Campeche">
                      <option value="Coahuila">
                      <option value="Colima">
                      <option value="Chiapas">
                      <option value="Chihuahua">
                      <option value="Durango">
                      <option value="Distrito Federal">
                      <option value="Guanajuato">
                      <option value="Guerrero">
                      <option value="Hidalgo">
                      <option value="Jalisco">
                      <option value="México">
                      <option value="Michoacán">
                      <option value="Morelos">
                      <option value="Nayarit">
                      <option value="Nuevo León">
                      <option value="Oaxaca">
                      <option value="Puebla">
                      <option value="Querétaro">
                      <option value="Quintana Roo">
                      <option value="San Luis Potosí">
                      <option value="Sinaloa">
                      <option value="Sonora">
                      <option value="Tabasco">
                      <option value="Tamaulipas">
                      <option value="Tlaxcala">
                      <option value="Veracruz">
                      <option value="Yucatán">
                      <option value="Zacatecas">
                    </datalist>
                    <label for="floatingSelect"><i class="fas fa-location-arrow"></i> Estado:</label>
                  </div>
                </div>
              </div>
              <!-- campo mensaje -->
              <div class="col-12">
                <div class="mb-3">
                  <div class="form-floating">
                    <textarea class="form-control" rows="5" placeholder="Mensaje" id="floatingTextarea" style="height: auto;"></textarea>
                    <label for="floatingTextarea"><i class="fas fa-comment-dots"></i> Mensaje:</label>
                  </div>
                </div>
              </div>
              <!-- btn enviar -->
              <div class="col-12">
                <div class="mb-3 d-grid gap-2">
                  <button type="button" class="btn btn-lg btn-danger"><i class="fas fa-paper-plane"></i> Enviar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php require('controller/common/footer.php'); ?>
  </div>
</body>

<script>
  $(document).ready(function() {
    var busqueda = 'ok';
    $.ajax({
      url: "controller/contacto/precarga.php",
      type: "post",
      data: {
        Rs: busqueda
      },
      error: function() {
        alert("error petición ajax");
      },
      success: function(data) {
        $("#CardCedis").append(data);
      }
    });
  });
</script>

<script>
  // Makeshift carousel function that gets invoked with the Index to start it off, then the callback increments the index to recursively invoke the same function. Works even in IE11!
  var testimonialItems = document.querySelectorAll(".item label");
  var timer;

  function cycleTestimonials(index) {
    timer = setTimeout(function() {
      var evt;
      if (document.createEvent) {
        //If browser = IE, then polyfill
        evt = document.createEvent('MouseEvent');
        evt.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
      } else {
        //If Browser = modern, then create new MouseEvent
        evt = new MouseEvent("click", {
          view: window,
          bubbles: true,
          cancelable: true,
          clientX: 20
        });
      }
      var ele2 = document.querySelector(ele)
      ele2.dispatchEvent(evt);
      index++; // Increment the index
      if (index >= testimonialItems.length) {
        index = 0; // Set it back to `0` when it reaches `3`
      }
      cycleTestimonials(index); // recursively call `cycleTestimonials()`
      document.querySelector(".testimonials").addEventListener("click", function() {
        clearTimeout(timer); //stop the carousel when someone clicks on the div
      });
    }, 2000); //adjust scroll speed in miliseconds
  }
  //run the function
  cycleTestimonials(0);
</script>



</html>