let datatable;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener(
  "DOMContentLoaded",
  function () {
    datatable = $("#example1").dataTable({
      aProcessing: true,
      aServerSide: true,
      // "language": {
      //     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      // },
      ajax: {
        url: " " + base_url + "/empresaapobarempleoadmin/getSeguimientoEmpleo",
        dataSrc: "",
      },
      columns: [
        { data: "idEmpleos" },
        { data: "NombrePuesto" },
        { data: "status" },
        { data: "escuelaid" },
        { data: "titulacionesid" },
        { data: "FechaInico" },
        { data: "FechaFin" },
        { data: "nombreEmpresa" },
        { data: "DescripcionPuesto" },
        { data: "InformacionAdicional" },
        { data: "LugarTrabajo" },
        { data: "TrabajoRemoto" },
        { data: "NumeroVacantes" },
        { data: "Experiencias" },
        { data: "JornadaLaboral" },
        { data: "HorasSemanales" },
        { data: "HorarioTrabajo" },
        { data: "RemuneracionBruta" },
        { data: "Contacto" },
        { data: "options" },
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
  },
  false
);
window.addEventListener(
  "load",
  function () {
    //fntRolesUsuario();
  },
  false
);

//visualizar informacion
function fntView(idbtn) {
  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  let ajaxUrl = base_url + "/Banner/getone/" + idbtn;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      if (objData.status) {
        document.querySelector("#vnombreArchivo").value = objData.data.Nombre;
        document.querySelector("#vposicion").value = objData.data.Posicion;
        console.log(objData.data.Nombre);
        $("#modalView").modal("show");
      } else {
        swal("Error", objData.msg, "error");
      }
    }
  };
}

//visualizar Borrar
function fntdifusionempleos(idempleo) {
  //let idBanner = idbtn;
  swal(
    {
      title: "Aprobar Publicación",
      text: "¿Realmente quiere aprobar la publicación de el Empleo?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, publicar!",
      cancelButtonText: "No, cancelar!",
      closeOnConfirm: false,
      closeOnCancel: true,
    },
    function (isConfirm) {
      if (isConfirm) {
        let request = window.XMLHttpRequest
          ? new XMLHttpRequest()
          : new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxUrl =
          base_url +
          "/empresaapobarempleoadmin/aprobarEmpleodifusionempleos/" +
          idempleo;
        let strData = "idempleo=" + idempleo;
        request.open("POST", ajaxUrl, true);
        request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        request.send(strData);
        request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
              swal("Aprobado!", objData.msg, "success");
              datatable.api().ajax.reload();
            } else {
              swal("Atención!", objData.msg, "error");
            }
          }
        };
      }
    }
  );
}

function openModal() {
  document.querySelector("#id").value = "";
  document
    .querySelector(".modal-header")
    .classList.replace("headerUpdate", "headerRegister");
  document
    .querySelector("#btnActionForm")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Publicar Imagen";
  document.querySelector("#titleModal").innerHTML =
    "Publicar Imagen en el Banner";
  document.querySelector("#formmodal").reset();
  $("#modalRegistro").modal("show");
}
