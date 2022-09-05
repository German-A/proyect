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

          <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil(<?= $_SESSION['idUser'] ?>);"><i class="fas fa-pencil-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span>Editar Datos Generales</span></button>

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


    <br><br><br><br><br><br><br><br>
    </b>
    <div class="row user">

      <div class="col-md-2">
        <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos personales</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Datos fiscales</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="user-timeline">
            <div class="timeline-post">
              <div class="post-media">
                <div class="content">
                  <h5>DATOS PERSONALES <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil(<?php echo $_SESSION['idUser']; ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span>Editar</span></button></h5>
                </div>
              </div>

              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="width:150px;">Identificación:</td>
                    <td><?= $_SESSION['userData']['identificacion']; ?></td>
                  </tr>
                  <tr>
                    <td>Nombres:</td>
                    <td><?= $_SESSION['userData']['nombres']; ?></td>
                  </tr>
                  <tr>
                    <td>Apellidos:</td>
                    <td><?= $_SESSION['userData']['apellidos']; ?></td>
                  </tr>
                  <tr>
                    <td>Teléfono:</td>
                    <td><?= $_SESSION['userData']['telefono']; ?></td>
                  </tr>
                  <tr>
                    <td>Email (Usuario):</td>
                    <td><?= $_SESSION['userData']['email_user']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="user-settings">
            <div class="tile user-settings">
              <h4 class="line-head">Datos fiscales</h4>
              <form id="formDataFiscal" name="formDataFiscal">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <label>Identificación Tributaria</label>
                    <input class="form-control" type="text" id="txtNit" name="txtNit" value="<?= $_SESSION['userData']['nit']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Nombre fiscal</label>
                    <input class="form-control" type="text" id="txtNombreFiscal" name="txtNombreFiscal" value="<?= $_SESSION['userData']['nombrefiscal']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-4">
                    <label>Dirección fiscal</label>
                    <input class="form-control" type="text" id="txtDirFiscal" name="txtDirFiscal" value="<?= $_SESSION['userData']['direccionfiscal']; ?>">
                  </div>
                </div>
                <div class="row mb-10">
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
<?php footerAdmin($data); ?>




<script>
  function openModal() {
    document.querySelector("#idUsuario").value = "";
    document
      .querySelector(".modal-header")
      .classList.replace("headerUpdate", "headerRegister");
    document
      .querySelector("#btnActionForm")
      .classList.replace("btn-info", "btn-primary");
    document.querySelector("#btnText").innerHTML = "Guardar";
    document.querySelector("#titleModal").innerHTML = "Nuevo Usuario";
    document.querySelector("#formUsuario").reset();
    $("#modalFormUsuario").modal("show");
  }

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

  $(document).ready(function() {
    datosEgresado();

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
</script>