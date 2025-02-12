<style>
  .select2-container {
    min-width: 100%;

  }
</style>
<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Objetivo Educaiconal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formmodal" name="formmodal" class="form-horizontal">
          <input type="hidden" id="id" name="id" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>


          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="txtObjetivo">Objetivo Educacional</label>
              <input type="text" class="form-control" id="txtObjetivo" name="txtObjetivo" required="">
            </div>


            <div class="form-group col-md-12">
              <label for="carrera">Carrera</label>
              <select class="form-control carrera" data-live-search="true" id="carrera" name="carrera"  required>
                <option value="0" selected>Seleccionar</option>
              </select>
            </div>

          </div>

          <div class="tile-footer">
            <!-- <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp; -->

            <a href="javascript:void(0);" class="btn btn-primary" id="btnText" onclick="GuardarEmpresa()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</a>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>