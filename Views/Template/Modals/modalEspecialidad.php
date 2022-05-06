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
            <div class="form-group col-md-4">
              <label for="bachiller">Cantidad Bachilleres</label>
              <input type="text" class="form-control" id="bachiller" name="bachiller" required="">
            </div>
            <div class="form-group col-md-4">
              <label for="titulo"> Cantidad de Titulados</label>
              <input type="number" class="form-control" id="titulo" name="titulo" required="">
            </div>
            <div class="form-group col-md-4">
              <label for="segundaespecialidad"> Cantidad de especialidades</label>
              <input type="number" class="form-control" id="segundaespecialidad" name="segundaespecialidad" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="escuelaid">Elegir la Escuela</label>
              <select class="idFacultad form-control standardSelect" onchange="imprimir()" name="escuelaid" id="escuelaid" multiple="multiple">
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="año">Año</label>
              <input type="date" class="form-control" id="año" name="año" required="">
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
          <div class="form-group col-md-10">
            <label for="txtNombre">nombreArchivo</label>
            <input type="text" class="form-control  " id="vnombreArchivo" name="vnombreArchivo" required="">
          </div>
          <div class="form-group col-md-2">
            <label for="txtNombre">Posición</label>
            <input type="number" class="form-control  " id="vposicion" name="vposicion" required="">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>