<!-- Modal -->
<div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formmodal" name="formmodal" class="form-horizontal">
          <input type="hidden" id="id" name="id" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>

          <div class="form-row">
            <div class="form-group col-md-10">
              <label for="txtNombreEmpresa">Nombre de la Empresa</label>
              <input type="text" class="form-control" id="txtNombreEmpresa" name="txtNombreEmpresa" required="">
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="">Archivo a subir:</label>
                <input type="file" id="archivoSubido" name="archivoSubido">
              </div>
            </div>
          </div>

          <div class="tile-footer">
            <a href="javascript:void(0);" class="btn btn-primary" id="btnText" onclick="AgregarEmpresa()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</a>          
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

