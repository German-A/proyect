<?php
headerAdmin($data);
getModal('modalPerfil', $data);
getModal('modalPerfilFoto', $data);
?>
<main class="app-content ">

  <div class="row d-flex justify-content-around">
    <div class="col-12 col-md-7 mb-3">
      <div class="row bg-white p-4">
        <div class="col-12 col-md-10">
          <h4>Datos Generales</h4>
          <h6>Nombre Completos:&nbsp<span id="nombreEgresado"></span></h6>
          <h6>Correo Electronico:&nbsp<span id="email_user"></span></h6>
          <h6>Telefono:&nbsp<span id="telefono"></span></h6>

          <button class="btn btn-sm btn-warning" type="button" onclick="openModalPerfil(<?= $_SESSION['idUser'] ?>);"><i class="fas fa-pencil-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span>Editar Datos Generales</span></button>

        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 text-center ">
      <div class="row bg-white p-1">
        <div class="col-12">
          <h4>Foto de Perfil</h4>
        </div>
        <div class="col-12 mb-2">
          <?php
          if (isset($_SESSION['userData']['imagen'])) { ?>
            <img class="user-img" src="<?= media() . '/archivos/usuarios/' . $_SESSION['userData']['imagen']; ?>" style="max-width: 120px; max-height: 100px; min-width: 120px; min-height: 100px;">
          <?php } else { ?>
            <img class="user-img" src="<?= media() ?>/images/avatar.png" style="max-width: 240px;">
          <?php } ?><br>
        </div>
        <div class="col-12  mb-2">
          <button class="btn btn-sm btn-info" type="button" onclick="openModalFotoPerfil(<?= $_SESSION['idUser'] ?>);"><i class="fas fa-pencil-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span>Editar Foto</span></button>
        </div>
      </div>
    </div>


    <div class="col-12">

      <div class="col-6">

        <h5>POSTGRADO</h5>
        <div id="listaPostgrados">

        </div>

        <a href="javascript:void(0)" class="btn btn-sm btn-warning" onclick="agregarPostrado();">Agregar</a>

      </div>

      <h5>PRESENTACIÓN</h5>

      <h5>TRABAJOS Y PRÁCTICAS</h5>

      <h5>FORMACIÓN</h5>


      <h5>CONOCIMIENTOS</h5>

    </div>

</main>
<?php footerAdmin($data); ?>



<!-- Modal  agregarPostrado-->
<div class="modal fade" id="modalRegistroPostgrado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titlePostgrado">Nuevo Grado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formmodalPostgrado" name="formmodalPostgrado" class="form-horizontal">
          <input type="hidden" id="idPostgrado" name="idPostgrado" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>


          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtTitulo">Titulo</label>
              <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-10">
              <label for="txtInstitucion">Institución</label>
              <input type="text" class="form-control" id="txtInstitucion" name="txtInstitucion" required="">
            </div>
            <div class="form-group col-md-2">
              <label for="txtTipo">Tipo</label><br>
              <select class="form-control select2" name="txtTipo" id="txtTipo" style="width: 100%">
                <option value="0" disabled selected>Seleccionar</option>
                <option value="1">Diplomado</option>
                <option value="2">Magister</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="txtCursando">¿Estás cursando?</label>
              <select class="form-control select2" name="txtCursando" id="txtCursando" style="width: 100%">
                <option value="0" disabled selected>Seleccionar</option>
                <option value="1">Si</option>
                <option value="2">No</option>
              </select>
            </div>

            <div class="form-group col-md-2">
              <label for="txtDesde">Desde</label>
              <select class="form-control select2" name="txtDesde" id="txtDesde" style="width: 100%">
                <option value="0" disabled selected>Seleccionar</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
              </select>
            </div>

            <div class="form-group col-md-2">
              <label for="txtHasta">Hasta</label>
              <select class="form-control select2" name="txtHasta" id="txtHasta" style="width: 100%">
                <option value="0" disabled selected>Seleccionar</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
              </select>
            </div>

          </div>

          <div class="tile-footer">
            <a href="javascript:void(0)" class="btn btn-info" id="btnPostgrado" onclick="GuardarPostgrado()">Guardar</a>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  function openModalPerfil(idpersona) {
    //let idpersona = idpersona;
    let request = window.XMLHttpRequest ?
      new XMLHttpRequest() :
      new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Usuarios/getEgresado/" + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);

        if (objData.status) {
          console.log(objData.data.idpersona);
          document.querySelector("#idUsuario").value = objData.data.idpersona;
          document.querySelector("#txtNombre").value = objData.data.nombres;
          document.querySelector("#txtApellidop").value = objData.data.apellidop;
          document.querySelector("#txtApellidom").value = objData.data.apellidom;
          document.querySelector("#txtTelefono").value = objData.data.telefono;
          document.querySelector("#txtEmail").value = objData.data.email_user;
        }
      }

      $("#modalFormPerfil").modal("show");
    };
  }

  function openModalFotoPerfil(idpersona) {
    //let idpersona = idpersona;
    let request = window.XMLHttpRequest ?
      new XMLHttpRequest() :
      new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Usuarios/getEgresado/" + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);

        if (objData.status) {
          console.log('foto');
          console.log(objData.data.idpersona);
          document.querySelector("#idUsuario").value = objData.data.idpersona;
          document.querySelector("#idUsuario2").value = objData.data.idpersona;


        }
      }

      $("#modalFormPerfilFoto").modal("show");
    };
  }

  function datosGenerales() {

    var txtNombre = $("#txtNombre").val();
    var txtApellidop = $("#txtApellidop").val();
    var txtApellidom = $("#txtApellidom").val();
    var txtTelefono = $("#txtTelefono").val();
    var txtEmail = $("#txtEmail").val();
    var txtPassword = $("#txtPassword").val();
    var txtPasswordConfirm = $("#txtPasswordConfirm").val();

    if (txtPassword != txtPasswordConfirm) {
      swal("Atención!", "Las contraseñas deben ser Iguales", "warning");
      return;
    }

    if (txtNombre == '') {
      swal("Atención!", "Ingresar el Nombre", "warning");
      return;
    }

    if (txtApellidop == '') {
      swal("Atención!", "Ingresar el Apellido Paterno", "warning");
      return;
    }

    if (txtApellidom == '') {
      swal("Atención!", "Ingresar el Apellido Materno", "warning");
      return;
    }

    if (txtTelefono == '') {
      swal("Atención!", "Ingresar un Número de Celular", "warning");
      return;
    }

    if (txtEmail == '') {
      swal("Atención!", "Ingresar el Correo Electrónico", "warning");
      return;
    }

    var fd = new FormData();
    fd.append("txtNombre", txtNombre);
    fd.append("txtApellidop", txtApellidop);
    fd.append("txtApellidom", txtApellidom);
    fd.append("txtTelefono", txtTelefono);
    fd.append("txtEmail", txtEmail);
    fd.append("txtPassword", txtPassword);

    $.ajax({
      method: "POST",
      url: "" + base_url + "/solicitudempleo/registrarempleoEmpresa",
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


  function agregarPostrado() {
    document.querySelector('#idPostgrado').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnPostgrado').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnPostgrado').innerHTML = "Guardar";
    document.querySelector('#titlePostgrado').innerHTML = "POSTGRADO";
    document.querySelector("#formmodalPostgrado").reset();
    $('#txtTipo').val(0).trigger('change');
    $('#txtCursando').val(0).trigger('change');
    $('#txtDesde').val(0).trigger('change');
    $('#txtHasta').val(0).trigger('change');
    $('#modalRegistroPostgrado').modal('show');
  }


  function GuardarPostgrado() {
    var txtTitulo = $("#txtTitulo").val();
    var txtInstitucion = $("#txtInstitucion").val();
    var txtTipo = $("#txtTipo").val();
    var txtCursando = $("#txtCursando").val();
    var txtDesde = $("#txtDesde").val();
    var txtHasta = $("#txtHasta").val();

    if (txtTitulo == '') {
      swal("Atención!", "Ingresar el Titulo", "warning");
      return;
    }
    if (txtInstitucion == '') {
      swal("Atención!", "Ingresar la Institución", "warning");
      return;
    }
    if (txtTipo == '' || txtTipo == null) {
      swal("Atención!", "Seleccionar el Tipo", "warning");
      return;
    }
    if (txtCursando == '' || txtCursando == null) {
      swal("Atención!", "Seleccionar si esta aun esta Cursando", "warning");
      return;
    }
    if (txtDesde == '' || txtDesde == null) {
      swal("Atención!", "Seleccionar la Fecha Inicial", "warning");
      return;
    }

    var fd = new FormData();
    fd.append("txtTitulo", txtTitulo);
    fd.append("txtInstitucion", txtInstitucion);
    fd.append("txtTipo", txtTipo);
    fd.append("txtCursando", txtCursando);
    fd.append("txtDesde", txtDesde);
    fd.append("txtHasta", txtHasta);

    $.ajax({
      method: "POST",
      url: "" + base_url + "/configuracion/registrarPostgradp",
      data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function(response) {
      var info = JSON.parse(response);
      if (info.status == true) {
        swal("Registrado", info.msg, "success");
        $('#txtTipo').val(0).trigger('change');
        $('#txtCursando').val(0).trigger('change');
        $('#txtDesde').val(0).trigger('change');
        $('#txtHasta').val(0).trigger('change');
        $('#modalRegistroPostgrado').modal("hide");
      }
      if (info.status == false) {
        swal("Error!", info.msg, "error");
      }

      return;
    });
  }

  $(document).ready(function() {
    datosEgresado();
    postgrado();

    // datosGenerales();

    if (document.querySelector("#formUsuario")) {
      let formUsuario = document.querySelector("#formUsuario");
      formUsuario.onsubmit = function(e) {
        e.preventDefault();

        let strNombre = document.querySelector("#txtNombre").value;
        let strApellido = document.querySelector("#txtApellido").value;
        let strEmail = document.querySelector("#txtEmail").value;
        let strTelefono = document.querySelector("#txtTelefono").value;
        let intTipousuario = document.querySelector("#listRolid").value;
        let strPassword = document.querySelector("#txtPassword").value;
        let intStatus = document.querySelector("#listStatus").value;

        if (
          strApellido == "" ||
          strNombre == "" ||
          strEmail == "" ||
          strTelefono == "" ||
          intTipousuario == ""
        ) {
          swal("Atención", "Todos los campos son obligatorios.", "error");
          return false;
        }

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
          if (elementsValid[i].classList.contains("is-invalid")) {
            swal(
              "Atención",
              "Por favor verifique los campos en rojo.",
              "error"
            );
            return false;
          }
        }
        divLoading.style.display = "flex";
        let request = window.XMLHttpRequest ?
          new XMLHttpRequest() :
          new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl = base_url + "/Usuarios/setUsuario";
        let formData = new FormData(formUsuario);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
          if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
              if (rowTable == "") {
                tableUsuarios.api().ajax.reload();
              } else {
                htmlStatus =
                  intStatus == 1 ?
                  '<span class="badge badge-success">Activo</span>' :
                  '<span class="badge badge-danger">Inactivo</span>';
                rowTable.cells[1].textContent = strNombre;
                rowTable.cells[2].textContent = strApellido;
                rowTable.cells[3].textContent = strEmail;
                rowTable.cells[4].textContent = strTelefono;
                rowTable.cells[5].textContent =
                  document.querySelector("#listRolid").selectedOptions[0].text;
                rowTable.cells[6].innerHTML = htmlStatus;
                rowTable = "";
              }
              $("#modalFormUsuario").modal("hide");
              formUsuario.reset();
              swal("Usuarios", objData.msg, "success");
            } else {
              swal("Error", objData.msg, "error");
            }
          }
          divLoading.style.display = "none";
          return false;
        };
      };
    }
    //Actualizar Perfil
    if (document.querySelector("#formPerfil")) {
      let formPerfil = document.querySelector("#formPerfil");
      formPerfil.onsubmit = function(e) {
        e.preventDefault();

        let txtNombre = document.querySelector("#txtNombre").value;
        let txtApellidom = document.querySelector("#txtApellidom").value;
        let txtApellidop = document.querySelector("#txtApellidop").value;

        let strPassword = document.querySelector("#txtPassword").value;
        let strPasswordConfirm = document.querySelector(
          "#txtPasswordConfirm"
        ).value;

        if (txtNombre == "" || txtApellidom == "" || txtApellidop == "") {
          swal(
            "Atención",
            "Todos los campos con (*) son obligatorios.",
            "error"
          );
          return false;
        }

        if (strPassword != "" || strPasswordConfirm != "") {
          if (strPassword != strPasswordConfirm) {
            swal("Atención", "Las contraseñas no son iguales.", "info");
            return false;
          }
          if (strPassword.length < 5) {
            swal(
              "Atención",
              "La contraseña debe tener un mínimo de 5 caracteres.",
              "info"
            );
            return false;
          }
        }

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
          if (elementsValid[i].classList.contains("is-invalid")) {
            swal(
              "Atención",
              "Por favor verifique los campos en rojo.",
              "error"
            );
            return false;
          }
        }
        divLoading.style.display = "flex";
        let request = window.XMLHttpRequest ?
          new XMLHttpRequest() :
          new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl = base_url + "/configuracion/putPerfilEgresado";
        let formData = new FormData(formPerfil);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
          if (request.readyState != 4) return;
          if (request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
              $("#modalFormPerfil").modal("hide");
              swal({
                  title: "",
                  text: objData.msg,
                  type: "success",
                  confirmButtonText: "Aceptar",
                  closeOnConfirm: false,
                },
                function(isConfirm) {
                  if (isConfirm) {
                    location.reload();
                  }
                }
              );
            } else {
              swal("Error", objData.msg, "error");
            }
          }
          divLoading.style.display = "none";
          return false;
        };
      };
    }
    //Actualizar FotoPerfil
    if (document.querySelector("#FormPerfilFoto")) {
      let formPerfil = document.querySelector("#FormPerfilFoto");
      formPerfil.onsubmit = function(e) {
        e.preventDefault();

        const input = document.getElementById('file');
        let id = document.querySelector('#idUsuario2').value;

        console.log(id);
        console.log(id);
        if (id != 0) {
          console.log('sss');
          var img = input.files['length'];
          console.log(img);
          if (img == 0) {
            console.log('ddddd');
            swal("Atención", "Debe subir una foto nueva.", "error");
            return false;
          }

        } else {
          console.log('confoto');
        }


        divLoading.style.display = "flex";
        let request = window.XMLHttpRequest ?
          new XMLHttpRequest() :
          new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl = base_url + "/configuracion/putPerfilFotoEgresado";
        let formData = new FormData(formPerfil);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
          if (request.readyState != 4) return;
          if (request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
              $("#modalFormPerfilFoto").modal("hide");
              swal({
                  title: "",
                  text: objData.msg,
                  type: "success",
                  confirmButtonText: "Aceptar",
                  closeOnConfirm: false,
                },
                function(isConfirm) {
                  if (isConfirm) {
                    location.reload();
                  }
                }
              );
            } else {
              swal("Error", objData.msg, "error");
            }
          }
          divLoading.style.display = "none";
          return false;
        };
      };
    }
  });


  function datosEgresado() {
    $.ajax({
      method: "GET",
      url: "" + base_url + "/configuracion/getoneEgresado",
      //data: datax
      //data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function(response) {
      var info = JSON.parse(response);
      var nombre = info.data.nombres + info.data.apellidop + info.data.apellidom;
      var email_user = info.data.email_user;
      var telefono = info.data.telefono;

      $("#nombreEgresado").html(nombre);
      $("#email_user").html(email_user);
      $("#telefono").html(telefono);
      console.log();

    });

  }

  function postgrado() {
    listado = '';
    $.ajax({
      method: "GET",
      url: "" + base_url + "/configuracion/getPostgrado",
      //data: datax
      //data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function(response) {
      var info = JSON.parse(response);
      for (var i = 0; i < info.length; i++) {
        listado = listado+ 
          `<div class="text-center  mb-2">
            <h5 class="azul">` + info[i].desde + ` - `+ info[i].hasta + ` - ` + info[i].titulo + ` - ` + info[i].options +`</h5>
          </div>                          
        `;
      }
      console.log(listado);

      $("#listaPostgrados").html(listado);

    });

  }
</script>





<script>
  //get Idiomas
  $(".select2").select2({
    dropdownParent: $("#formmodalPostgrado"),
  });
</script>