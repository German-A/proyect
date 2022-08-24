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
            "url": " " + base_url + "/empresaapobarempleoadmin/getEmpleosRuc",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idEmpleos" },
            { "data": "ruc" },
            { "data": "nombreEmpresa" },
            { "data": "Direccion" },
            { "data": "FechaInico" },
            { "data": "FechaFin" },
            { "data": "NombrePuesto" },
            { "data": "LugarTrabajo" },
            { "data": "Contacto" },
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


}, false);
window.addEventListener('load', function() {
    //fntRolesUsuario();
}, false);



//visualizar Borrar 
function fntAprobarBanner(idempleo) {

    //let idBanner = idbtn;
    swal({
        title: "Aprobar Publicación",
        text: "¿Realmente quiere aprobar la publicación de el Empleo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, publicar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/empresaapobarempleoadmin/aprobarRucEmpleo/' + idempleo;
            let strData = "idempleo=" + idempleo;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Aprobado!", objData.msg, "success");
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
    document.querySelector('#btnText').innerHTML = "Publicar Imagen";
    document.querySelector('#titleModal').innerHTML = "Publicar Imagen en el Banner";
    document.querySelector("#formmodal").reset();
    $('#modalRegistro').modal('show');
}