function openModalRepositorio() {
  document.querySelector("#idrepositorio").value = "";
  document
    .querySelector(".modal-header")
    .classList.replace("headerUpdate", "headerRegister");
  document
    .querySelector("#btnRepositorio")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnRepositorio").innerHTML = "Guardar";
  document.querySelector("#titleRepositorio").innerHTML = "Repositorio";
  document.querySelector("#formmodalRepositorio").reset();

  $("#modalRegistroRepositorio").modal("show");
}

function GuardarRepositorio() {
  var idrepositorio = $("#idrepositorio").val();
  var txtNombre = $("#txtNombre").val();
  var txtPosicion = $("#txtPosicion").val();
  var inputElement = document.getElementById("archivoSubido");
  var archivoSubido = inputElement.files[0];

  if (txtNombre == "") {
    swal("Atención!", "Ingresar el Nombre", "warning");
    return;
  }

  if (txtPosicion == "") {
    swal("Atención!", "Ingresar la Posición", "warning");
    return;
  }

  if (idrepositorio != 0) {
  } else {
    if (inputElement.files["length"] == 0) {
      swal("Atención", "Ingresar la Imagen.", "warning");
      return false;
    }
  }

  var fd = new FormData();
  fd.append("idrepositorio", idrepositorio);
  fd.append("txtNombre", txtNombre);
  fd.append("txtPosicion", txtPosicion);
  fd.append("archivoSubido", archivoSubido);
  divLoading.style.display = "flex";
  $.ajax({
    method: "POST",
    url: "" + base_url + "/repositorio/set",
    data: fd,
    processData: false, // tell jQuery not to process the data
    contentType: false, // tell jQuery not to set contentType
  }).done(function (response) {
    var info = JSON.parse(response);

    if (info.status == true) {
      swal("Repositorio", info.msg, "success");
      datatable.api().ajax.reload();
      $("#modalRegistroRepositorio").modal("hide");
    }

    if (info.status == false) {
      swal("Error!", info.msg, "error");
    }

    divLoading.style.display = "none";
    return;
  });
}

function fntEdit(id) {
  document.querySelector("#titleRepositorio").innerHTML =
    "ACTUALIZAR Repositorio";
  document
    .querySelector(".modal-header")
    .classList.replace("headerRegister", "headerUpdate");
  document
    .querySelector("#btnRepositorio")
    .classList.replace("btn-primary", "btn-info");
  document.querySelector("#btnRepositorio").innerHTML = "Actualizar";

  $.ajax({
    method: "GET",
    url: "" + base_url + "/repositorio/getOne/" + id,
    processData: false, // tell jQuery not to process the data
    contentType: false, // tell jQuery not to set contentType
  }).done(function (response) {
    var info = JSON.parse(response);

    if (info.status == true) {
      document.querySelector("#formmodalRepositorio").reset();
      document.getElementById("idrepositorio").value =
        info.data["idrepositorio"];
      document.getElementById("txtNombre").value = info.data["nombre"];
      document.getElementById("txtPosicion").value = info.data["posicion"];
    }
    if (info.status == false) {
      swal("Error!", info.msg, "error");
    }

    $("#modalRegistroRepositorio").modal("show");
  });
}

function fntDelete(id) {
  var id = id;

  swal(
    {
      title: "Eliminar Repositorio",
      text: "¿Realmente quiere eliminar el Repositorio?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, eliminar!",
      cancelButtonText: "No, cancelar!",
      closeOnConfirm: false,
      closeOnCancel: true,
    },
    function (isConfirm) {
      if (isConfirm) {
        var fd = new FormData();
        fd.append("id", id);

        $.ajax({
          method: "POST",
          url: "" + base_url + "/repositorio/delete",
          data: fd,
          processData: false, // tell jQuery not to process the data
          contentType: false, // tell jQuery not to set contentType
        }).done(function (response) {
          var info = JSON.parse(response);
          console.log(info);
          console.log(info.status);

          if (info.status == true) {
            swal("Repositorio", info.msg, "success");
            datatable.api().ajax.reload();
          }
          if (info.status == false) {
            swal("Error!", info.msg, "error");
          }
        });
      }
    }
  );
}

$(document).ready(function () {
  datatable = $("#datatable").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/repositorio/getList",
      dataSrc: "",
    },
    columns: [
      {
        data: "idrepositorio",
      },
      {
        data: "nombre",
      },
      {
        data: "filename",
      },
      {
        data: "posicion",
      },
      {
        data: "created_by",
      },
      {
        data: "updated_by",
      },
      {
        data: "options",
      },
    ],
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copyHtml5",
        text: "<i class='far fa-copy'></i> Copiar",
        titleAttr: "Copiar",
        className: "btn btn-secondary",
      },
      {
        extend: "excelHtml5",
        text: "<i class='fas fa-file-excel'></i> Excel",
        titleAttr: "Esportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: "<i class='fas fa-file-pdf'></i> PDF",
        titleAttr: "Esportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "csvHtml5",
        text: "<i class='fas fa-file-csv'></i> CSV",
        titleAttr: "Esportar a CSV",
        className: "btn btn-info",
      },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,

    order: [[0, "desc"]],
  });
});
