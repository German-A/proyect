
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
            <div class="form-group col-md-7">
              <label for="numeroresolucion">Numero de Resolucion</label>
              <input type="text" class="form-control" id="numeroresolucion" name="numeroresolucion" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="numeroresolucion">Archivo</label>
              <input type="file" id="archivoSubido" name="archivoSubido">
            </div>
            <div class="form-group col-md-2">
              <label for="fecharesolucion">Fecha</label>
              <input type="date" class="form-control" id="fecharesolucion" name="fecharesolucion" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 text-center">
              <button class="btn btn-primary" onclick="nuevoItem()">Agregar Escuela</button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="escuelaid">Elegir la Escuela</label>
            </div>
            <div class="form-group col-md-2">
              <label for="bachiller">Bachilleres</label>
            </div>
            <div class="form-group col-md-2">
              <label for="titulo">Titulados</label>
            </div>
            <div class="form-group col-md-2">
              <label for="segundaespecialidad">2° Especialidades</label>
            </div>
            <div class="form-group col-md-2">
              <label for="segundaespecialidad">Eliminar</label>
            </div>
          </div>

          <div id='items'>
            <div id='form'>
              <div class='form-row'>
                <input type="hidden" class=" id">
                <div class="form-group col-md-4">
                  <select class="js-example-basic-single form-control"  name="escuelaid">
                  </select>
                </div>
                <div class="form-group col-md-2">            
                  <input type="text" class="form-control" id="bachiller" name="bachiller" required="">
                </div>
                <div class="form-group col-md-2">             
                  <input type="number" class="form-control" id="titulo" name="titulo" required="">
                </div>
                <div class="form-group col-md-2">                  
                  <input type="number" class="form-control" id="segundaespecialidad" name="segundaespecialidad" required="">
                </div>
                <div class='col-md-1' style="text-align:center">
                  <p class=" btn btn-outline-danger delete" onclick="quitarLote(this)">x</p>
                </div>
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

<script>
  var clone = document.getElementById("form").cloneNode(true);
  var cantidadItem = 1;
  var idsItem = 1;
  let numeroLineas;
  //Añadir una fila
  function nuevoItem() {
    var element = document.getElementById("items");
    cantidadItem++;
    var clon = clone.cloneNode(true);
    clon.setAttribute("id", "form_" + idsItem);
    idsItem++;
    element.appendChild(clon);
    select();
  }

  function quitarLote(element) {
    document.getElementById("items").removeChild(element.parentElement.parentElement.parentElement);
  }

  function select() {
    $('.js-example-basic-single').select2({
      dropdownParent: $("#modalRegistro"),
      ajax: {
        url: " " + base_url + "/especialidades/getEscuelas",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            palabraClave: params.term
          };
        },
        processResults: function(response) {
          return {
            results: response,
          };
        },
        cache: true,

      }
    });

  }
</script>