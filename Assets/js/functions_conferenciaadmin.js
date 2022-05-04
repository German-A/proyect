let tableUsuarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {
    //actualizar
    var idempresa = $('#idEmpresa').val();
    tableUsuarios = $('#tableUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        // },
        "ajax": {
            "url": " " + base_url + "/conferenciaempresaadmin/getBanners/" + idempresa + "",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idConferencia" },
            { "data": "nombreEmpresa" },
            { "data": "nombreConferencia" },
            { "data": "fechaConferencia" },
            { "data": "nombreExpositor" },
            { "data": "fotoExpositor" },
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
            let nombreConferencia = document.querySelector('#nombreConferencia').value;
            let fechaConferencia = document.querySelector('#fechaConferencia').value;
            let nombreExpositor = document.querySelector('#nombreExpositor').value;
            let cargoExpositor = document.querySelector('#cargoExpositor').value;
            let linkConferencia = document.querySelector('#linkConferencia').value;

            if (nombreConferencia == '' || fechaConferencia == '') {
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
            let ajaxUrl = base_url + '/conferenciaempresaadmin/setConferecnia';
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
                        swal("Conferencia", objData.msg, "success");
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
    let ajaxUrl = base_url + '/conferenciaempresaadmin/getunBanner/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#vnombreConferencia").value = objData.data.nombreConferencia;
                document.querySelector("#vfechaConferencia").value = objData.data.fechaConferencia;
                document.querySelector("#vnombreExpositor").value = objData.data.nombreExpositor;
                document.querySelector("#vcargoExpositor").value = objData.data.cargoExpositor;
                document.querySelector("#vlinkConferencia").value = objData.data.linkConferencia;
                console.log(objData.data.fechaConferencia);

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
    document.querySelector('#titleModal').innerHTML = "Actualizar Conferencia";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    //let idpersona = idpersona;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/conferenciaempresaadmin/getunBanner/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                // document.querySelector("#idBanner").value = objData.data.IdBaner;

                document.querySelector("#idBanner").value = objData.data.idConferencia;
                document.querySelector("#nombreConferencia").value = objData.data.nombreConferencia;
                document.querySelector("#fechaConferencia").value = objData.data.fechaConferencia;
                document.querySelector("#nombreExpositor").value = objData.data.nombreExpositor;
                document.querySelector("#cargoExpositor").value = objData.data.cargoExpositor;
                document.querySelector("#linkConferencia").value = objData.data.linkConferencia;

                console.log(objData.data.nombreExpositor);

            }
        }

        $('#modalFormUsuario').modal('show');
    }
}

//visualizar Borrar 
function fntDelBanner(IdBaner) {

    //let idBanner = idpersona;
    swal({
        title: "Eliminar Conferencia",
        text: "¿Realmente quiere eliminar la Conferencia?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/conferenciaempresaadmin/delBanner/' + IdBaner;
            let strData = "IdBaner=" + IdBaner;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
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
    document.querySelector('#btnText').innerHTML = "Registrar Conferencia";
    document.querySelector('#titleModal').innerHTML = "Nuevo Conferencia";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}

function openModalPerfil() {
    $('#modalFormPerfil').modal('show');
}