<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
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

            <div class="form-group col-md-4">
              <label for="txtNombreEmpresa">Empresa</label><br>
              <select class="form-control lista select" name="txtNombreEmpresa" id="txtNombreEmpresa" data-live-search="true" x>
                <option value="0" disabled selected>Seleccionar</option>
                <option value="1">Ministerio de Trabajo y Promoción del Empleo</option>
                <option value="2">Universia</option>
                <option value="3">abril jobs</option>
              </select>
            </div>

            <div class="form-group col-md-7">
              <label for="txtNombreCurso">Nombre curso</label>
              <input type="text" class="form-control" id="txtNombreCurso" name="txtNombreCurso" required="">
            </div>
          </div>

          <div class="form-row">

            <div class="form-group col-md-4">
              <label for="txtTipoCurso">Tipo Curso</label><br>
              <select class="form-control lista select" name="txtTipoCurso" id="txtTipoCurso" data-live-search="true" x>
                <option value="0" disabled selected>Seleccionar</option>
                <option value="cursos">Cursos</option>
                <option value="talleres">Talleres</option>
              </select>
            </div>

            <div class="form-group col-md-7">
              <label for="txtUrl">Url</label>
              <input type="text" class="form-control" id="txtUrl" name="txtUrl" required="">
            </div>
          </div>

          <div class="tile-footer">
            <a href="javascript:void(0);" class="btn btn-primary" id="btnText" onclick="Guardar()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</a>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Visuzalización de Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" id="vnombres" name="nombres" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="apellidop">Apellido Paterno</label>
            <input type="text" class="form-control" id="vapellidop" name="apellidop" required="">
          </div>
          <div class="form-group col-md-3">
            <label for="apellidom">Apellido Materno</label>
            <input type="text" class="form-control" id="vapellidom" name="apellidom" required="">
          </div>
        </div>

        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="email_user">Correo</label>
            <input type="text" class="form-control" id="vemail_user" name="email_user" required="">
          </div>

          <div class="form-group col-md-3">
            <label for="dni">Dni</label>
            <input type="text" class="form-control" id="vdni" name="dni" required="">
          </div>

          <div class="form-group col-md-3">
            <label for="telefono">Celular</label>
            <input type="text" class="form-control" id="vtelefono" name="telefono" required="">
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>