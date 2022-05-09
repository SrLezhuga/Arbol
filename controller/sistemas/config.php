<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Sistema:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formSistemas" name="formSistemas" class="form-select form-select-lg" aria-label="Default select example" onchange="getSistemas();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary"  type="button" onclick="nuevoSistemas()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-sistemas" type="button" onclick="guardarSistemas()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_sistema" placeholder="Marca" autocomplete="off">
                        <label for="id_sistema"><i class="fas fa-bookmark"></i> Id sistema</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="nombre_sistema" placeholder="Fecha Catálogo" autocomplete="off">
                        <label for="nombre_sistema"><i class="fas fa-bookmark"></i> Nombre sistema</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Información del sistema" id="info_sistema" autocomplete="off" style="height: 100px"></textarea>
                        <label for="info_sistema"><i class="fas fa-bookmark"></i> Información del sistema</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="img_file_sistema" placeholder="Imagen" autocomplete="off">
                            <label for="img_file_sistema"><i class="fas fa-bookmark"></i> Icono</label>
                        </div>
                        <input id="imgSistema" type="file">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="file-field mb-1" style="top: 50%; transform: translateY(-50%);">
                <figure class="figure">
                    <img class="img_Sistema mx-auto d-block img-thumbnail figure-img" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 160px; height: 160px;">
                    <figcaption class="figure-caption">Tamaño: 300 x 300 pixeles</figcaption>
                </figure>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-sistemas" onclick="verModalSistemas()" type="button" data-bs-toggle="modal" data-bs-target="#modalSistemas">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarSistemas()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxSistema" name="CheckBoxSistema" value="Y">
                        <label class="form-check-label" for="CheckBoxSistema">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSistemas" tabindex="-1" aria-labelledby="modalLabelMarcas" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelMarcas">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="accordion accordion-flush" id="accordionTest">
                        <div class="accordion-item mb-3 rounded border">
                            <h2 class="accordion-header" id="flush-heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                    <img class="rounded-circle" id="modalImgSistema" src="" oncontextmenu="return false;" draggable="false">
                                    <h6 class="mitr pl-5 text-start" id="modalNombreSistemas">EMBRAGUE Y CARDÁN</h6>
                                </button>
                            </h2>
                            <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionTest">
                                <div class="accordion-body vh-15 small" id="modalInfoSistemas">Las marcas más reconocidas en la industria en productos y kits para tu sistema de embrague y cardán.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</fieldset>
