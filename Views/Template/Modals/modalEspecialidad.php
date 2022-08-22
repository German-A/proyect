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
            <div class="form-group col-md-12">
              <label for="numeroresolucion">Numero de Resolucion</label>
              <input type="text" class="form-control" id="numeroresolucion" name="numeroresolucion" required="">
            </div>
            <div class="form-group col-md-9">
              <label for="numeroresolucion">Archivo</label>
              <input type="file" class="form-control" id="archivoSubido" name="archivoSubido">
            </div>
            <div class="form-group col-md-3">
              <label for="fecharesolucion">Fecha</label>
              <input type="date" class="form-control" id="fecharesolucion" name="fecharesolucion" required="">
            </div>
          </div>


          <!-- Bachiller  -->
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="titulo">Bachilleres</label>
            </div>
            <div class="form-group col-md-2">
              <label for="segundaespecialidad">Eliminar</label>
            </div>
          </div>

          <div id='items'>
            <div id='form'>
              <div class='form-row'>
                <input type="hidden" class="id">
                <div class="form-group col-md-8">
                  <select class="jsbachilleres select2" style="width: 100%" name="escuelaid" required="">
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <input type="text" class="form-control" id="bachiller" name="bachiller" required="">
                </div>
                <div class='col-md-1' style="text-align:center">
                  <p class="btn btn-outline-danger delete" onclick="quitarLote(this)">x</p>
                </div>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 text-center">
              <a href="javascript:void(0);" onclick="nuevoItemBachiller()" class="btn btn-primary">Agregar Bachiller</a>
            </div>
          </div>
          <!-- Bachiller  -->

          <!-- Titulos -->
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="titulo">Titulos</label>
            </div>
            <div class="form-group col-md-2">
              <label for="segundaespecialidad">Eliminar</label>
            </div>
          </div>

          <div id='itemstitulo'>
            <div id='formtitulo'>
              <div class='form-row'>
                <input type="hidden" class="id">
                <div class="form-group col-md-8">
                  <select class="js-titulos select2 form-control " style="width: 100%" name="tituloid" required="">
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <input type="number" class="form-control titulo" name="titulo" required="">
                </div>
                <div class='col-md-1' style="text-align:center">
                  <p class=" btn btn-outline-danger delete" onclick="quitarLotetitulo(this)">x</p>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 text-center">
              <a href="javascript:void(0);" class="btn btn-primary" onclick="nuevoItemTitulo()">Agregar Titulo</a>
            </div>
          </div>

          <div class="tile-footer">
            <button type="button" class="btn btn-primary " onclick="publicarOferta()">ENVIAR PARA APROBACIÓN</button>

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
  function nuevoItemBachiller() {
    var element = document.getElementById("items");
    cantidadItem++;
    var clon = clone.cloneNode(true);
    clon.setAttribute("id", "form_" + idsItem);
    idsItem++;
    element.appendChild(clon);
    selectBachilleres();
  }

  function selectBachilleres() {
    $('.jsbachilleres').select2({
      dropdownParent: $("#formmodal"),
      ajax: {
        url: " " + base_url + "/especialidades/getBachilleres",
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

  function quitarLote(element) {
    document.getElementById("items").removeChild(element.parentElement.parentElement.parentElement);
  }

  /*bachilleres*/
  var clonetitulo = document.getElementById("formtitulo").cloneNode(true);
  var cantidadItembc = 1;
  var idsItembc = 1;
  let numeroLineasbc;
  //Añadir una fila
  function nuevoItemTitulo() {
    var elementbc = document.getElementById("itemstitulo");
    cantidadItembc++;
    var clonetitul = clonetitulo.cloneNode(true);
    clonetitul.setAttribute("id", "formtitulo_" + idsItembc);
    idsItembc++;
    elementbc.appendChild(clonetitul);
    selecTitulo();
  }

  function quitarLotetitulo(element) {
    document.getElementById("itemstitulo").removeChild(element.parentElement.parentElement.parentElement);
  }

  function selecTitulo() {
    $('.js-titulos').select2({
      dropdownParent: $("#formmodal"),
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


  function publicarOferta() {
    var numeroresolucion = $("#numeroresolucion").val();
    var bachilleres = $("#jsbachilleres").val();
    var fecharesolucion = $("#fecharesolucion").val();

    var inputElement = document.getElementById("archivoSubido");
    var archivoSubido = inputElement.files[0];

    var listaLotes = new Array();
    for (var i = 0; i < bachilleres.length; i++) {
      listaLotes.push({
        bachilleres: bachilleres[i],
      });
    }

    var fd = new FormData();
    fd.append("numeroresolucion", numeroresolucion);
    fd.append("fecharesolucion", fecharesolucion);
    fd.append("carreras", JSON.stringify(listaLotes));

    $.ajax({
      method: "POST",
      url: "" + base_url + "/solicitudempleo/registrarempleoEmpresa",
      //data: datax
      data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function(response) {
      var info = JSON.parse(response);
      console.log(info);
      divLoading.style.display = "none";
      if (info.status == true) {
        listado =
          `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
        $("#correoweb").html(listado);
      }
      if (info.status == false) {
        console.log(info.status);
        listado =
          `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
        $("#correoweb").html(listado);
      }
      $('#modalPerfiles').modal('show');
      //swal("Atención!", "TERMINADO", "warning");
      //window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin/" + idEmpresa + "";
    });


  }
</script>