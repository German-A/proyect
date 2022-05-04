<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Conferencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuario" name="formUsuario" class="form-horizontal">
        <input type="hidden" id="idBanner" name="idBanner" value="">
          <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?= $data['idempresa'] ?>">
        
          <p class="text-primary">Todos los campos son obligatorios.</p>


          <div class="form-row">
            <div class="form-group col-md-9">
              <label for="nombreConferencia">Nombre de la Conferencia</label>
              <input type="text" class="form-control  " id="nombreConferencia" name="nombreConferencia" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="fechaConferencia">fecha de la Conferencia</label>
              <input type="datetime-local" class="form-control" id="fechaConferencia" name="fechaConferencia" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nombreExpositor">Nombre del Expositor</label>
              <input type="text" class="form-control  " id="nombreExpositor" name="nombreExpositor" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="cargoExpositor">Cargo del Expositor</label>
              <input type="text" class="form-control" id="cargoExpositor" name="cargoExpositor" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="linkConferencia">Url de la Conferencia</label>
              <input type="text" class="form-control  " id="linkConferencia" name="linkConferencia" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="fotoExpositor">Foto del Expositor</label>
              <input type="file" id="archivoNacional" name="archivoSubido">
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la Conferencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="form-row">

            <div class="form-group col-md-7">
              <label for="nombreConferencia">nombreConferencia</label>
              <input type="text" class="form-control" id="vnombreConferencia" name="nombreConferencia" required="">
            </div>
            <div class="form-group col-md-5">
              <label for="fechaConferencia">fechaConferencia</label>
              <input type="datetime-local" class="form-control"  id="vfechaConferencia"   name="vfechaConferencia" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nombreExpositor">nombreExpositor</label>
              <input type="text" class="form-control  " id="vnombreExpositor" name="nombreExpositor" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="cargoExpositor">cargoExpositor</label>
              <input type="text" class="form-control" id="vcargoExpositor" name="cargoExpositor" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="linkConferencia">linkConferencia</label>
              <input type="text" class="form-control  " id="vlinkConferencia" name="linkConferencia" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="fotoExpositor">fotoExpositor</label>
              <input type="file" id="archivoNacional" name="archivoSubido">
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>