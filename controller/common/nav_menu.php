<!-- Nav Top -->
<nav class="navbar-top sticky-top text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a class="navbar-brand color-white" href="mailto:hola@refaccionariaarboledas.com.mx">
                    <i class="far fa-envelope"></i> hola@refaccionariaarboledas.com.mx
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a class="navbar-brand color-white" href="tel:3338371280">
                    <i class="fas fa-phone-alt"></i> INFO: 3338371280
                </a>
                <a class="navbar-brand color-white" href="tel:3338371285">
                    <i class="fas fa-phone-alt"></i> VENTAS: 3338371285
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Nav Mid -->
<nav class="navbar-portal text-center">

    <div class="container-fluid p-0 m-0">
        <div class="row g-0 justify-content-md-center align-items-center ">
            <div class="col text-end">
                <a class="btn shadow-lg btn-outline-danger btn-portal mitr" href="#" role="button"><i class="fas fa-shopping-cart"></i> <br> COMPRA <br> EN LÍNEA</a>
            </div>
            <div class="col text-center" style="padding-top: 10px;">
                <a href="index">
                    <img class="img-arbol-menu" src="assets/media/img/LogoRojo.png" alt="Refaccionaria Arboledas" onContextMenu='return false;' draggable='false'>
                </a>
            </div>
            <div class="col text-start">
                <a class="btn shadow-lg btn-outline-danger btn-portal mitr" href="#" role="button"><i class="fas fa-shield-alt"></i> <br> ESCUDERIA <br> ARBOLEDAS</a>
            </div>
        </div>
    </div>
</nav>

<!-- Nav Bottom -->
<nav class="navbar navbar-expand-lg sticky-top-2 mitr" id="header">
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="color-black"><i class="fas fa-chevron-down"></i></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
            <div class="row justify-content-md-center align-items-center">
                <div class="col-lg-auto col-sm-12 cool-link">
                    <a class="nav-link color-black" href="sistemas">SISTEMAS</a>
                </div>
                <div class="col-lg-auto col-sm-12 cool-link">
                    <a class="nav-link color-black" href="marcas">MARCAS</a>
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
</nav>







<script>
    $(document).ready(function() {
        var $cabecera = $('#header');
        var $logo = $('#logo');
        var previousScroll = 0;
        $(window).scroll(function(event) {
            var scroll = $(this).scrollTop();
            if (scroll >= 175) {
                $logo.addClass('logoOnOff');
                $cabecera.addClass('bgcolor');
            } else {
                $logo.removeClass('logoOnOff');
                $cabecera.removeClass('bgcolor');
            }
            previousScroll = scroll;
        });

    });
</script>