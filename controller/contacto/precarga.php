<?php
include "../conexion.php";

if ($_POST['Rs'] == 'ok') {
    $query = $con->prepare("SELECT * FROM web_arbol.tab_cedis WHERE activo = 'Y' ORDER BY cedis ASC ");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $count = 1;

    while ($row = $query->fetch()) {

        $checked = ($count == 1) ? $checked = "" : $checked = "checked";

        echo '
            <!-- ' . $row['cedis'] . ' -->
            <li class="item">
            <input type="radio" id="radio_testimonial-' . $count . '" name="basic_carousel" checked="' . $checked . '" />
            <label class="label_testimonial" for="radio_testimonial-' . $count . '">' . $row['cedis'] . '</label>
            <div class="content-test content_testimonial">
                <span class="picto">
                <img src="assets/media/img/iconos/' . $row['logo_cedis'] . '" onContextMenu="return false;" draggable="false">
                </span>
                <h1 class="mitr">' . $row['cedis'] . '</h1>
                <p>' . $row['direccion_cedis'] . ' Col. ' . $row['col_cedis'] . '
                <br>C.P. ' . $row['cp_cedis'] . '. ' . $row['mun_cedis'] . ',  ' . $row['est_cedis'] . '.
                </p>
                <p>
                <i class="fas fa-phone-alt"></i> Info: <a href="tel:' . $row['tel_info'] . '">' . $row['tel_info'] . '</a>
                &nbsp;
                <i class="fas fa-phone-alt"></i> Ventas: <a href="tel:' . $row['tel_ventas'] . '">' . $row['tel_ventas'] . '</a>
                </p>
                <p>
                <i class="far fa-envelope"></i> Correo: <a href="mailto:' . $row['email_cedis'] . '">' . $row['email_cedis'] . '</a>
                </p>
                <p class="testimonialFrom">
                <a href="' . $row['map_cedis'] . ' target="_blank" class="btn btn-danger"><i class="fas fa-map-marker-alt"></i> Ver en Google Maps</a>
                </p>
            </div>
            </li>
    ';
        $count++;
    }
} else {
    return false;
}
