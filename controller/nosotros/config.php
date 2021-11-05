<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Nosotros:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formNosotros" name="formNosotros" class="form-select form-select-lg" aria-label="Default select example" onchange="getNosotros();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-nosotros" type="button" onclick="nuevoNosotros()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-nosotros" type="button" onclick="guardarNosotros()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_nosotros" placeholder="Marca" autocomplete="off">
                        <label for="id_nosotros"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="campo_nosotros" placeholder="Fecha Catálogo" autocomplete="off">
                        <label for="campo_nosotros"><i class="fas fa-bookmark"></i> Titulo</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <textarea class="form-control form-reset" placeholder="Información de la marca" id="txt_valor" autocomplete="off" style="height: 160px"></textarea>
                        <label for="txt_valor"><i class="fas fa-bookmark"></i> Respuesta</label>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" id="btn-ver-nosotros" onclick="verModalNosotros()" type="button" data-bs-toggle="modal" data-bs-target="#modalMarcas">Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick="limpiarNosotros()">Limpiar Formulario <i class="fas fa-eraser"></i></button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxNosotros" name="CheckBoxNosotros" value="Y">
                        <label class="form-check-label" for="CheckBoxNosotros">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalMarcas" tabindex="-1" aria-labelledby="modalLabelMarcas" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelMarcas">Vista Prevía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="mitr" id="modalNombreMarcas">Refaccionaria Arboledas</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <img class="mx-auto d-block img-thumbnail" id="modalImgMarcas" src="assets/media/img/loader/PlaceholderWeb.png" onerror="this.src='assets/media/img/loader/PlaceholderWeb.png';" style="width: 310px; height: 160px;">
                                </div>
                                <div class="col-lg-12 mb-2 text-justify">
                                    <p id="modalInfoMarcas">Refaccionaria Arboledas</p>
                                </div>
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
