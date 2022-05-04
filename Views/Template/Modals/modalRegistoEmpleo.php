<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuario" name="formUsuario" class="form-horizontal">
          <input type="hidden" id="idBanner" name="idBanner" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>


          <div class="form-row">
            <div class="form-group col-md-10">
              <label for="txtNombre">nombreArchivo</label>
              <input type="text" class="form-control valid validText" id="nombreArchivo" name="txtNombre" required="">
            </div>
            <div class="form-group col-md-2">
              <label for="txtNombre">Posición</label>
              <input type="number" class="form-control valid validText" id="posicion" name="posicion" required="">
            </div>
          </div>


          <div class="barra">
            <div class="barra_azul" id="barra_estado">
              <span></span>
            </div>
          </div>


          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="">Archivo a subir:</label>
              <input type="file" id="archivoNacional" name="archivoSubido" required="">
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

<!-- Modal -->
<div class="modal fade" id="modalViewBanner" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-row">
          <div class="form-group col-md-10">
            <label for="txtNombre">nombreArchivo</label>
            <input type="text" class="form-control valid validText" id="vnombreArchivo" name="vnombreArchivo" required="">
          </div>
          <div class="form-group col-md-2">
            <label for="txtNombre">Posición</label>
            <input type="number" class="form-control valid validText" id="vposicion" name="vposicion" required="">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>