<header class="sticky-top">
    <!-- Nav Top -->
    <nav class="navbar-top text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a class="navbar-brand color-white smaller" href="mailto:hola@refaccionariaarboledas.com.mx">
                        <i class="far fa-envelope"></i> Correo
                    </a>
                    &nbsp;
                    <a class="navbar-brand color-white smaller" href="https://api.whatsapp.com/send?phone=523315878534" target="_blank">
                        <i class="fab fa-whatsapp"></i> Whatsapp
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a class="navbar-brand color-white smaller" href="tel:3338371280">
                        <i class="fas fa-phone-alt"></i> INFO: 3338371280
                    </a>
                    &nbsp;
                    <a class="navbar-brand color-white smaller" href="tel:3338371285">
                        <i class="fas fa-phone-alt"></i> VENTAS: 3338371285
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Nav Mid -->
    <nav class="navbar-portal text-center" id="nav1">

        <div class="container-fluid p-0 m-0">
            <div class="row g-0 justify-content-md-center align-items-center ">
                <div class="col text-center">
                    <a class="btn btn-light btn-menus mitr rounded" href="https://web.refaccionariaarboledas.com.mx/clientes/wcp.wcplogin.aspx" target="_blank" role="button">
                        <img src="assets/media/img/Carrito.png">
                        COMPRA <br> EN LÍNEA
                    </a>
                    <a href="index">
                        <img class="img-arbol-menu" src="assets/media/img/LogoRojo.png" alt="Refaccionaria Arboledas" onContextMenu='return false;' draggable='false'>
                    </a>
                    <a class="btn btn-light btn-menus mitr rounded" href="https://web.refaccionariaarboledas.com.mx/wspv20/wsp.weblogin.aspx" target="_blank" role="button">
                        <img src="assets/media/img/Escudo.png">
                        ESCUDERÍA <br> ARBOLEDAS
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Nav Bottom -->
    <nav class="navbar navber-menu navbar-expand-lg mitr" id="nav2">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container-fluid">
                <div class="row justify-content-md-center align-items-center">
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="index">INICIO</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="sistemas">SISTEMAS</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="marcas">MARCAS</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="garantias">GARANTIAS</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="catalogo">CATÁLOGO</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="nosotros">NOSOTROS</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="preguntas">PREGUNTAS FRECUENTES</a>
                    </div>
                    <div class="col-lg-auto col-sm-12 cool-link">
                        <a class="nav-link color-black" href="contacto">CONTACTO</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button class="navbar-toggler no-shadow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="color-black"><i class="fas fa-chevron-down"></i></span>
            </button>
        </div>
    </nav>
</header>

<script>
    $(document).ready(function() {
        var $barra1 = $('#nav1');
        var $barra2 = $('#nav2');
        var previousScroll = 0;
        $(window).scroll(function(event) {
            var scroll = $(this).scrollTop();
            if (scroll >= .5) {
                $barra1.addClass('sticky-top-2');
                $barra2.addClass('sticky-top-3');
            } else {
                $barra1.removeClass('sticky-top-2');
                $barra2.removeClass('sticky-top-3');
            }
            previousScroll = scroll;
        });

    });
</script>