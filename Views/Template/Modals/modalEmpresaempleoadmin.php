<script src="<?= media(); ?>/functions_registrarempleo.js"></script>

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


          <div class="row">
    <div class="col-md-12">
      <div class="tile">

        <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">

          <input type="hidden" name="accion" id="accion" value="REGISTRAR_EMPLEO">

          <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?php echo $data['idUser'] ?>">



          <div class="row">
            <div class="col-4 col-md-4">
              <label for="NombrePuesto">Nombre de Puesto </label>
              <textarea type="text" class="form-control" name="NombrePuesto" id="NombrePuesto" placeholder="Ingresar Nombre Puesto" required></textarea>
            </div>
            <div class="col-4 col-md-4">
              <label for="NombrePuesto">Elegir las Carreras </label>
              <select class="carreras form-control" name="carreras[]" data-live-search="true" id="carreras" multiple="multiple" required>
              </select>
            </div>
            <div class="col-4 col-md-4">
              <label for="titulaciones">Elegir las Titulaciónes</label>
              <select class="titulaciones form-control" name="titulaciones[]" data-live-search="true" id="titulaciones" multiple="multiple" required>
              </select>
            </div>
          </div>





          <div class="row">
            <div class="col-6 col-md-6">
              <label for="DescripcionPuesto">Descripción del Puesto</label>
              <textarea type="text" class="form-control summernote" id="DescripcionPuesto" name="DescripcionPuesto" placeholder="Ingresar Descripción Puesto"></textarea>
            </div>
            <div class="col-6 col-md-6">
              <label for="InformacionAdicional">Información Adicional</label>
              <textarea type="text" class="form-control summernote" id="InformacionAdicional" name="InformacionAdicional" id="InformacionAdicional" placeholder="Ingresar Informacion Adicional"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-8">
              <label for="LugarTrabajo">Lugar Trabajo</label>
              <input type="text" class="form-control" name="LugarTrabajo" id="LugarTrabajo" placeholder="Ingresar el Lugar Trabajo" required>
            </div>
            <div class="col-12 col-md-4">
              <label for="TrabajoRemoto">Modalidad de trabajo</label>
              <select class="form-control" name="TrabajoRemoto" id="TrabajoRemoto" class="mdb-select md-form" required>
                <option disabled selected>Seleccionar una Opcion</option>
                <option value="Remoto">Remoto</option>
                <option value="Presencial">Presencial</option>
                <option value="Remoto/Presencial">Remoto/Presencial</option>
                <option value="Otro">Otro</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-4">
              <label for="NumeroVacantes">NumeroVacantes</label>
              <input type="number" class="form-control" name="NumeroVacantes" id="NumeroVacantes" placeholder="Ingresar el Número de Vacantes" required>
            </div>

            <div class="col-4 col-md-4">
              <label for="competencias">Elegir las Competencias</label>
              <select class="competencias form-control" name="competencias[]" data-live-search="true" id="competencias" multiple="multiple" required>
              </select>
            </div>

            <div class="col-4 col-md-4">
              <label for="ProgramaEstudio">Elegir los Idiomas</label>
              <select class="idiomas form-control" name="idiomas[]" id="idiomas" multiple="multiple" required>

              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-4">
              <label for="Experiencias">Experiencias</label>
              <input type="text" class="form-control" name="Experiencias" id="Experiencias" placeholder="Ingresar las Experiencias" required>
            </div>
            <div class="col-12 col-md-4">
              <label for="TipoContrato">TipoContrato</label>
              <input type="text" class="form-control" name="TipoContrato" id="TipoContrato" placeholder="Ingresar el Tipo Contrato" required>
            </div>

            <div class="col-12 col-md-4">
              <label for="JornadaLaboral">JornadaLaboral</label>
              <select class="form-control" name="JornadaLaboral" id="JornadaLaboral" class="mdb-select md-form">
                <option disabled selected>Seleccionar una Opcion</option>
                <option value="Parcial">Parcial </option>
                <option value="Completa">Completa</option>
                <option value="Otro">Otro</option>
              </select>
            </div>


          </div>

          <div class="row">
            <div class="col-12 col-md-4">
              <label for="HorasSemanales">HorasSemanales</label>
              <input type="number" class="form-control" name="HorasSemanales" id="HorasSemanales" placeholder="Ingresar la Horas Semanales" required>
            </div>
            <div class="col-12 col-md-4">
              <label for="HorarioTrabajo">HorarioTrabajo</label>
              <input type="text" class="form-control" name="HorarioTrabajo" id="HorarioTrabajo" placeholder="Ingresar las Horario Trabajo" required>
            </div>
            <div class="col-12 col-md-4">
              <label for="RemuneracionBruta">Remuneración Bruta</label>
              <input type="number" class="form-control" name="RemuneracionBruta" id="RemuneracionBruta" placeholder="Ingresar la Remuneración Bruta" required>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-4">
              <label for="Contacto">Contacto</label>
              <input type="text" class="form-control" name="Contacto" id="Contacto" placeholder="Ingresar los Contactos" required>
            </div>
            <div class="col-12 col-md-2">
              <label for="FechaInico">Fecha Inicio Convocatoria</label>
              <input type="date" class="form-control" name="FechaInico" id="FechaInico" placeholder="Ingresar FechaInico">
            </div>
            <div class="col-12 col-md-2">
              <label for="FechaFin">Fecha Fin Convocatoria</label>
              <input type="date" class="form-control" name="FechaFin" id="FechaFin" placeholder="Ingresar Fecha Fin">
            </div>

          </div>

          <div class="row">
            <div class="col-6">
              <button type="button" class="btn btn-primary col-6" onclick="publicarOferta()">REGIS</button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-default col-6" class="close" data-dismiss="modal">Close</button>
            </div>
          </div>

        </form>
      </div>
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
<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript" src="<?= media(); ?>/js/plugins/select2.min.js"></script> 

<script>
  $(document).ready(function() {
    $('.summernote').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['lineHeights', ['0.2']],

      ]
    });
  });
</script>
