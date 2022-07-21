<style>
  .select2-container {
    min-width: 200px;

  }
</style>
1
<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-hidden="true">
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
              <label for="">Seleccionar Carrera:</label>
              <select class="js-example-basic-single" id="escuela" name="escuela" style="width: 100%;">
              </select>
            </div>

            <div class="form-group col-md-2">
              <label for="">Año</label>
              <input type="date" id="año" name="año" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Cantidad Preguntas:</label>
              <input type="text" id="cantidadPreguntas" name="cantidadPreguntas">
            </div>



            <div class="form-group col-md-6">
              <label for="">Archivo a subir:</label>
              <input type="file" id="archivoSubido" name="archivoSubido">
            </div>
          </div>



          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>

</script>