<fieldset class="border p-2 bg-white shadow-lg">
    <legend class="w-auto"><b>Garantia:</b></legend>

    <div class="row">
        <div class="col-8">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book-open"></i></span>
                <select id="formGarantias" name="formGarantias" class="form-select form-select-lg" aria-label="Default select example" onchange="getGarantias();"></select>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-secondary" id="btn-crear-Garantias" type="button" onclick="nuevoGarantias()">Nuevo <i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        <div class="col-2">
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-danger" id="btn-guardar-Garantias" type="button" onclick="guardarGarantias()">Guardar <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="hidden" class="form-control form-reset" id="id_garantia" placeholder="Garantia" autocomplete="off">
                        <label for="id_garantia"><i class="fas fa-bookmark"></i> Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <select id="marca_garantia" name="marca_garantia" class="form-select form-select-lg" aria-label="Default select example"></select>
                        <label for="marca_garantia"><i class="fas fa-bookmark"></i> Marca</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control form-reset" id="nombre_pdf" placeholder="Nombre PDF" autocomplete="off">
                        <label for="nombre_pdf"><i class="fas fa-bookmark"></i> Nombre Archivo</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="file-field">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control form-reset" id="PDF_Garantia" placeholder="PDF" autocomplete="off">
                            <label for="PDF_Garantia"><i class="fas fa-bookmark"></i> PDF</label>
                        </div>
                        <input id="File_PDF_Garantia" type="file">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-secondary" type="button" disabled>Vista Previa <i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-grid gap-2 mb-1">
                        <button class="btn btn-danger" type="button" onclick='cleanGarantias()'>
                            Limpiar Formulario <i class="fas fa-eraser"></i>
                        </button>
                    </div>
                </div>
                <div class="col-6" style="font-size: 1.5rem;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckBoxGarantias" name="CheckBoxGarantias" value="Y">
                        <label class="form-check-label" for="CheckBoxGarantias">Visible</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</fieldset>


<script>


</script>