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
            <div class="form-group col-md-9">
              <label for="numeroresoulcion">Numero de Resolucion</label>
              <input type="text" class="form-control" id="numeroresoulcion" name="numeroresoulcion" required="">
            </div>
            <div class="form-group col-md-3">
              <label for="fecharesolucion">Fecha</label>
              <input type="date" class="form-control" id="fecharesolucion" name="fecharesolucion" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-9 text-center">
              <button class="bt- btn-primary" onclick="nuevoItem()">agregar</button>
            </div>
          </div>



          <div id='items'>
            <div id='form'>
              <div class='form-row'>
                <input type="hidden" class=" id">
                <div class="form-group col-md-4">
                  <label for="escuelaid">Elegir la Escuela</label>
                  <select class="js-example-basic-single form-control " name="escuelaid" >
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="bachiller">Bachilleres</label>
                  <input type="text" class="form-control" id="bachiller" name="bachiller" required="">
                </div>
                <div class="form-group col-md-2">
                  <label for="titulo">Titulados</label>
                  <input type="number" class="form-control" id="titulo" name="titulo" required="">
                </div>
                <div class="form-group col-md-2">
                  <label for="segundaespecialidad">2° Especialidades</label>
                  <input type="number" class="form-control" id="segundaespecialidad" name="segundaespecialidad" required="">
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