function openModalPerfil(idpersona) {
    //let idpersona = idpersona;
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Usuarios/getEgresado/" + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
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
    let request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Usuarios/getEgresado/" + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
  
        if (objData.status) {
          console.log("foto");
          console.log(objData.data.idpersona);
          document.querySelector("#idUsuario").value = objData.data.idpersona;
          document.querySelector("#idUsuario2").value = objData.data.idpersona;
        }
      }
  
      $("#modalFormPerfilFoto").modal("show");
    };
  }
  
  function actualizarPerfil() {
    let txtNombre = document.querySelector("#txtNombre").value;
    let txtApellidom = document.querySelector("#txtApellidom").value;
    let txtApellidop = document.querySelector("#txtApellidop").value;
    let strPassword = document.querySelector("#txtPassword").value;
    let strPasswordConfirm = document.querySelector("#txtPasswordConfirm").value;
  
    if (txtNombre == "" || txtApellidom == "" || txtApellidop == "") {
      swal("Atención", "Todos los campos con (*) son obligatorios.", "error");
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
        swal("Atención", "Por favor verifique los campos en rojo.", "error");
        return false;
      }
    }
  
    divLoading.style.display = "flex";
  
    var fd = new FormData();
    fd.append("txtNombre", txtNombre);
    fd.append("txtApellidom", txtApellidom);
    fd.append("txtApellidop", txtApellidop);
    fd.append("strPassword", strPassword);
    fd.append("ruc", ruc);
    fd.append("ruc", ruc);
  }
  
  //Actualizar Perfil
  if (document.querySelector("#formPerfil")) {
    let formPerfil = document.querySelector("#formPerfil");
    formPerfil.onsubmit = function (e) {
      e.preventDefault();
  
      let request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/configuracion/putPerfilEgresado";
      let formData = new FormData(formPerfil);
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function () {
        if (request.readyState != 4) return;
        if (request.status == 200) {
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            $("#modalFormPerfil").modal("hide");
            swal(
              {
                title: "",
                text: objData.msg,
                type: "success",
                confirmButtonText: "Aceptar",
                closeOnConfirm: false,
              },
              function (isConfirm) {
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
  