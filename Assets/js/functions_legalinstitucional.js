let datatable;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {
    //actualizar
    datatable = $('#datatable').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        // },
        "ajax": {
            "url": " " + base_url + "/legalinstitucional/get",
            "dataSrc": ""
        },
        "columns": [
            { "data": "IdInstitucional" },
            { "data": "Nombre" },
            { "data": "NombreArchivo" },
            { "data": "Posicion" },
            { "data": "FechaRegistro" },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [{
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr": "Copiar",
            "className": "btn btn-secondary"
        }, {
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr": "Esportar a Excel",
            "className": "btn btn-success"
        }, {
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Esportar a PDF",
            "className": "btn btn-danger"
        }, {
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr": "Esportar a CSV",
            "className": "btn btn-info"
        }],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [
            [0, "desc"]
        ]
    });
    //insertar y actualizar
//insertar y actualizar


}, false);


function Agregar() {
    var id = $("#id").val();
    var nombreArchivo = $("#nombreArchivo").val();
    var posicion = $("#posicion").val();
    var inputElement = document.getElementById("archivoSubido");
    var archivoSubido = inputElement.files[0];
  
    if (nombreArchivo == "") {
      swal("Atención!", "Ingresar el Nombre", "warning");
      return;
    }
  
    if (posicion == "") {
      swal("Atención!", "Ingresar la Posición", "warning");
      return;
    }
  
    if (id != 0) {
    } else {
      if (inputElement.files["length"] == 0) {
        swal("Atención", "Ingresar la Imagen.", "warning");
        return false;
      }
    }
  
    var fd = new FormData();
    fd.append("id", id);
    fd.append("nombreArchivo", nombreArchivo);
    fd.append("posicion", posicion);
    fd.append("archivoSubido", archivoSubido);
    divLoading.style.display = "flex";
    $.ajax({
      method: "POST",
      url: "" + base_url + "/Legalinstitucional/set",
      data: fd,
      crossDomain: true,
  
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
    }).done(function (response) {
      var info = JSON.parse(response);
      if (info.status == true) {
        swal("Manuales", info.msg, "success");
        datatable.api().ajax.reload();
        $("#modalRegistro").modal("hide");
      }
      if (info.status == false) {
        swal("Error!", info.msg, "error");
      }
      divLoading.style.display = "none";
      return;
    });
  }
  

window.addEventListener('load', function() {
    //fntRolesUsuario();
}, false);

//visualizar informacion 
function fntView(idbtn) {

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Legalinstitucional/getone/' + idbtn;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#vnombreArchivo").value = objData.data.Nombre;
                document.querySelector("#vposicion").value = objData.data.Posicion;
                console.log(objData.data.Nombre);
                $('#modalView').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

//Modal para editar la informacion
function fntEdit(element, idbtn) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Imagen en el Legalinstitucional";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnText').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar Datos";

    //let idbtn = idbtn;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Legalinstitucional/getone/' + idbtn;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#id").value = objData.data.IdInstitucional;
                document.querySelector("#nombreArchivo").value = objData.data.Nombre;
                document.querySelector("#posicion").value = objData.data.Posicion;
            }
        }
        $('#modalRegistro').modal('show');
    }
}

//visualizar Borrar 
function fntDelete(IdNacional) {

    //let idLegalinstitucional = idbtn;
    swal({
        title: "Eliminar Legalinstitucional",
        text: "¿Realmente quiere eliminar el Legalinstitucional?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Legalinstitucional/delete/' + IdNacional;
            let strData = "IdNacional=" + IdNacional;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        datatable.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function openModal() {
    document.querySelector('#id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnText').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Publicar Imagen";
    document.querySelector('#titleModal').innerHTML = "Publicar Imagen en el Legalinstitucional";
    document.querySelector("#formmodal").reset();
    $('#modalRegistro').modal('show');
}
