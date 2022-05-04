let datatable;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {
    //actualizar
    datatable = $('#example1').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        // },
        "ajax": {
            "url": " " + base_url + "/empresasadmin/getEmpresas",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idempresa" },
            { "data": "nombreEmpresa" },
            { "data": "ruc" },
            { "data": "Direccion" },
            { "data": "nombres" },
            { "data": "email_user" },
            { "data": "imagen" },
            { "data": "status" },
            { "data": "options" }
        ],

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
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [
            [0, "desc"]
        ]
    });
    //insertar y actualizar
    if (document.querySelector("#formmodal")) {
        let formmodal = document.querySelector("#formmodal");
        formmodal.onsubmit = function(e) {
            e.preventDefault();
            // let strNombre = document.querySelector('#nombreArchivo').value;
            // let posicion = document.querySelector('#posicion').value;
            const input = document.getElementById('archivoSubido');
            let id = document.querySelector('#id').value;

            if (id != 0) {

            } else {
                if (input.files['length'] == 0) {
                    swal("Atención", "Todos los campos son obligatorios.", "error");
                    return false;
                }
            }

            //|| input.files['length']==0
            // if (strNombre == '' || posicion == '') {
            //     swal("Atención", "Todos los campos son obligatorios.", "error");
            //     return false;
            // }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains('is-invalid')) {
                    swal("Atención", "Por favor verifique los campos en rojo.", "error");
                    return false;
                }
            }
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/empresasadmin/set';
            let formData = new FormData(formmodal);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        datatable.api().ajax.reload();
                        $('#modalRegistro').modal("hide");
                        formmodal.reset();
                        swal("Empresa Actualizada", objData.msg, "success");
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
function fntView(idbtn) {

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/empresasadmin/getone/' + idbtn;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#vnombres").value = objData.data.nombres;
                document.querySelector("#vapellidop").value = objData.data.apellidop;
                document.querySelector("#vapellidom").value = objData.data.apellidom;
                document.querySelector("#vemail_user").value = objData.data.email_user;
                document.querySelector("#vdni").value = objData.data.dni;
                document.querySelector("#vtelefono").value = objData.data.telefono;

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
    document.querySelector('#titleModal').innerHTML = "Actualizar Datos de la Empresa";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar Datos";

    //let idbtn = idbtn;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/empresasadmin/getone/' + idbtn;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#id").value = objData.data.idpersona;
                document.querySelector("#nombres").value = objData.data.nombres;
                document.querySelector("#apellidop").value = objData.data.apellidop;
                document.querySelector("#apellidom").value = objData.data.apellidom;
                document.querySelector("#email_user").value = objData.data.email_user;
                document.querySelector("#dni").value = objData.data.dni;
                document.querySelector("#telefono").value = objData.data.telefono;
                document.querySelector("#nombreEmpresa").value = objData.data.nombreEmpresa;
                document.querySelector("#ruc").value = objData.data.ruc;
                document.querySelector("#Direccion").value = objData.data.Direccion;


            }
        }
        $('#modalRegistro').modal('show');
    }
}

//visualizar Borrar 
function fntDelete(IdBaner) {

    //let idBanner = idbtn;
    swal({
        title: "Eliminar Empresa",
        text: "¿Realmente quiere eliminar el Usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/empresasadmin/delete/' + IdBaner;
            let strData = "IdBaner=" + IdBaner;
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
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Registrar";
    document.querySelector('#titleModal').innerHTML = "Registrar Empresa";
    document.querySelector("#formmodal").reset();
    $('#modalRegistro').modal('show');
}