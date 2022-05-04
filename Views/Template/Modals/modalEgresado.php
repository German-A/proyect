<style>
  .select2-container {
    min-width: 200px;

  }
</style>

<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
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
            <div class="form-group col-md-6">
              <label for="nombres">nombres</label>
              <input type="text" class="form-control" id="nombres" name="nombres" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="apellidop">apellidop</label>
              <input type="text" class="form-control" id="apellidop" name="apellidop" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="apellidom">apellidom</label>
              <input type="text" class="form-control" id="apellidom" name="apellidom" required="">
            </div>
          </div>

          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="email_user">email_user</label>
              <input type="text" class="form-control" id="email_user" name="email_user" required="">
            </div>

            <div class="form-group col-md-3">
              <label for="dni">dni</label>
              <input type="text" class="form-control" id="dni" name="dni" required="">
            </div>

            <div class="form-group col-md-3">
              <label for="telefono">telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" required="">
            </div>

            <div class="form-group col-md-3">
              <label for="idsede">Sede</label>
                <select class="form-control select2 narrow wrap " name="idsede" id="idsede" class="mdb-select md-form">
                  <option disabled selected>Seleccionar una Opcion</option>
                  <option value="1">Trujillo </option>
                  <option value="2">Valle Jequetepeque </option>
                  <option value="3">Santiago de Chuco</option>
                  <option value="4">Huamachuco</option>
                </select>
            </div>

          </div>


          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="numeroMatricula">numeroMatricula</label>
              <input type="text" class="form-control" id="numeroMatricula" name="numeroMatricula" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="direccion">direccion</label>
              <input type="text" class="form-control" id="direccion" name="direccion" required="">
            </div>
            <div class="form-group col-md-2">
              <label for="telefonoFijo">telefonoFijo</label>
              <input type="text" class="form-control" id="telefonoFijo" name="telefonoFijo" required="">
            </div>

            <div class="form-group col-md-2">
              <label for="sexo">sexo</label>
              <select class="form-control select2 narrow wrap " name="sexo" id="sexo" class="mdb-select md-form">
                  <option disabled selected>Seleccionar una Opcion</option>
                  <option value="M">Masculino </option>
                  <option value="F">Femenino </option> 
                </select>
            </div>
          </div>

          <div class="form-row">
            
            <div class="form-group col-md-4">
              <label for="ProgramaEstudio">Elegir la Factultad</label>
              <select class="idFacultad form-control standardSelect" onchange="imprimir()" name="idFacultad" id="idFacultad" multiple="multiple" >
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="ProgramaEstudio">Elegir la Escuela</label>
              <select class="idescuela form-control standardSelect" onchange="imprimir()" name="idescuela" id="idescuela" multiple="multiple" >
             
            </select>
            </div>

            <div class="form-group col-md-4">
              <label for="archivoSubido">Archivo a subir:</label>
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



<?php footerAdmin($data); ?>