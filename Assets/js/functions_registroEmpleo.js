let tableUsuarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {
    //actualizar
    tableUsuarios = $('#tableUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        // },
        "ajax": {
            "url": " " + base_url + "/registroempleo/getEmpresas",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idEmpleos" },
            { "data": "NombrePuesto" },
            { "data": "escuelaid" },
            { "data": "titulacionesid" },
            { "data": "FechaInico" },
            { "data": "FechaFin" },
            { "data": "status" },
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
    if (document.querySelector("#formUsuario")) {
        let formUsuario = document.querySelector("#formUsuario");
        formUsuario.onsubmit = function(e) {
            e.preventDefault();
            let strNombre = document.querySelector('#nombreArchivo').value;
            let posicion = document.querySelector('#posicion').value;
            if (strNombre == '' || posicion == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains('is-invalid')) {
                    swal("Atención", "Por favor verifique los campos en rojo.", "error");
                    return false;
                }
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Banner/setBanner';
            let formData = new FormData(formUsuario);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        tableUsuarios.api().ajax.reload();
                        $('#modalFormUsuario').modal("hide");
                        formUsuario.reset();
                        swal("Usuarios", objData.msg, "success");
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

}, false);

window.addEventListener('load', function() {
    //fntRolesUsuario();
}, false);

//visualizar informacion 
function fntViewBanner(idpersona) {

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Banner/getunBanner/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#vnombreArchivo").value = objData.data.Nombre;
                document.querySelector("#vposicion").value = objData.data.Posicion;
                console.log(objData.data.Nombre);
                $('#modalViewBanner').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

//Modal para editar la informacion
function fntEditBanner(element, idpersona) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Banner";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    //let idpersona = idpersona;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Banner/getunBanner/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                // document.querySelector("#idBanner").value = objData.data.IdBaner;

                document.querySelector("#idBanner").value = objData.data.IdBaner;
                document.querySelector("#nombreArchivo").value = objData.data.Nombre;
                document.querySelector("#posicion").value = objData.data.Posicion;

                console.log(objData.data.Nombre);
                console.log(objData.data.Posicion);
            }
        }

        $('#modalFormUsuario').modal('show');
    }
}

//visualizar Borrar 
function fntDelBanner(IdBaner) {

    //let idBanner = idpersona;
    swal({
        title: "Cancelar Empleo",
        text: "¿Realmente quiere cancelar el Empleo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/registroempleo/delBanner/' + IdBaner;
            let strData = "IdBaner=" + IdBaner;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Cancelado!", objData.msg, "success");
                        tableUsuarios.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}


function openModal() {
    document.querySelector('#idBanner').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Subir Imagen";
    document.querySelector('#titleModal').innerHTML = "Nuevo Banner";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}

function openModalPerfil() {
    $('#modalFormPerfil').modal('show');
}