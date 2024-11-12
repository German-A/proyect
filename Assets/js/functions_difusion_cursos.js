$(document).ready(function() {
    datatable = $('#datatable').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/difusion/getDifusion",
            "dataSrc": ""
        },
        "columns": [{
                "data": "id_difusion_ofertas"
            },
            {
                "data": "nombre_puesto"
            },
            {
                "data": "condicion_laboral"
            },
            {
                "data": "modalidad_laboral"
            },
            {
                "data": "fecha_termino"
            },
            {
                "data": "link"
            },
            {
                "data": "status"
            },
            {
                "data": "options"
            }
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

});




function openModal() {
    document.querySelector('#id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnText').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Publicar";
    document.querySelector('#titleModal').innerHTML = "Publicar Imagen en el Banner";
    document.querySelector("#formmodal").reset();
    $('#modal').modal('show');
}

$(".programa_estudio").select2({
    ajax: {
      url: base_url + "/difusion/getSelectCarreras",
      type: "post",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          palabraClave: params.term, // search term
        };
      },
      processResults: function (response) {
        return {
          results: response,
        };
      },
      cache: true,
    },
  });

  $("#nombre_empresa").select2({
    ajax: {
      url: base_url + "/difusion/getSelectEmpresas",
      type: "post",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          palabraClave: params.term, // search term
        };
      },
      processResults: function (response) {
        return {
          results: response,
        };
      },
      cache: true,
    },
  });


//Modal para editar la informacion
function fntEdit(element, idbtn) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    //let idbtn = idbtn;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Banner/getone/' + idbtn;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#id").value = objData.data.id_disusion;
                document.querySelector("#descripcion").value = objData.data.descripcion;
            }
        }
        $('#modal').modal('show');
    }
}


$(".lista").select2({

});









// let divLoading = document.querySelector("#divLoading");
// document.addEventListener('DOMContentLoaded', function() {

//     var idempleo = $('#idempleo').val();

//     //insertar y actualizar


//     let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     let ajaxUrl = base_url + '/empleo/get/' + idempleo;
//     request.open("GET", ajaxUrl, true);
//     request.send();
//     console.log(ajaxUrl);
//     request.onreadystatechange = function() {

//         if (request.readyState == 4 && request.status == 200) {
//             let objData = JSON.parse(request.responseText);

//             if (objData.status) {
//                 console.log(objData.NombrePuesto);
//                 //document.querySelector("#f").innerHTML = 2;
//                 //document.querySelector("#NombrePuesto").value = objData.NombrePuesto;
//             }
//         }

//     }



// }, false);


//visualizar informacion 
function fntView(idbtn) {

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Banner/getone/' + idbtn;
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


//visualizar Borrar 
function fntDelete(IdBaner) {

    //let idBanner = idbtn;
    swal({
        title: "Eliminar Banner",
        text: "¿Realmente quiere eliminar el Banner?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Banner/delete/' + IdBaner;
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


//postular
function ftnPostular(empleoid) {

    //let idBanner = idbtn;
    swal({
        title: "Postular",
        text: "¿Realmente quiere postular a la convocatoria?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, postular!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Empleo/postular/' + empleoid;
            let strData = "empleoid=" + empleoid;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Inscrito!", objData.msg, "success");
            
                    } else {
                        swal("Atención!", objData.msg, "warning");
                    }
                }
            }
        }

    });

}

