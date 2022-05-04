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
            "url": " " + base_url + "/registroegresado/getBanners",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idpersona" },
            { "data": "nombres" },
            { "data": "email_user" },
            { "data": "imagen" },
            { "data": "dni" },
            { "data": "telefono" },
            { "data": "descripcion" },
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
            let nombres = document.querySelector('#nombres').value;
            let apellidop = document.querySelector('#apellidop').value;

            const input = document.getElementById('archivoSubido');
            let id = document.querySelector('#idBanner').value;



            if (nombres == '' || apellidop == '') {
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
            let ajaxUrl = base_url + '/registroegresado/setBanner';
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
                        swal("Usuario Egresado", objData.msg, "success");
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
    fntRolesUsuario();


    //imprimir();
    //getDataSociedad();

}, false);

function llenar(idescuela, nombreEscuela, idFacultad, nombreFacultad) {
    console.log(nombreEscuela);
    $("#idFacultad").append("<option value=" + idFacultad + " selected='selected'>" + nombreFacultad + "</option>");
    $("#idescuela").append("<option value=" + idescuela + " selected='selected'>" + nombreEscuela + "</option>");
}

//Modal para editar la informacion
function fntEditBanner(element, idpersona) {

    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Egresado";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    $('#idescuela').val(null).trigger('change');
    $('#idFacultad').val(null).trigger('change');


    //let idpersona = idpersona;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/registroegresado/getunBanner/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                // document.querySelector("#idBanner").value = objData.data.IdBaner;

                document.querySelector("#idBanner").value = objData.data.idpersona;
                document.querySelector("#nombres").value = objData.data.nombres;
                document.querySelector("#apellidop").value = objData.data.apellidop;
                document.querySelector("#apellidom").value = objData.data.apellidom;
                document.querySelector("#email_user").value = objData.data.email_user;
                document.querySelector("#dni").value = objData.data.dni;
                document.querySelector("#telefono").value = objData.data.telefono;
                document.querySelector("#numeroMatricula").value = objData.data.numeroMatricula;
                document.querySelector("#direccion").value = objData.data.direccion;
                document.querySelector("#telefonoFijo").value = objData.data.telefonoFijo;
                document.querySelector("#sexo").value = objData.data.sexo;

                document.querySelector("#idsede").value = objData.data.idsede;

                var id = objData.data.idescuela;
                var nombreEscuela = objData.data.nombreEscuela;

                var idf = objData.data.idFacultad;
                var nombreFacultad = objData.data.nombreFacultad;

                console.log(objData.data.idescuela);




                // var id = objData.data.idescuela;

                // newElement.textContent = "<option value=" + id + " selected='selected'>Auto 0< /option>";

                // $(".idescuela").append(newElement);
                /// <option value="3620194" selected="selected">select2/select2</option>  




            }
            llenar(id, nombreEscuela, idf, nombreFacultad);
        }

        $('#modalFormUsuario').modal('show');
    }
}



function fntRolesUsuario() {
    if (document.querySelector('#listRolid')) {
        let ajaxUrl = base_url + '/registroegresado/getFacultades';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                //document.querySelector('#listRolid').innerHTML = request.responseText;
                //get idfactulad

                $(".js-example-data-array-selected").select2({ data: data });


                //$('#listRolid').selectpicker('render');
            }
        }
    }
}



//get Facultades
$(".idFacultad").select2({
    maximumSelectionLength: 1,
    ajax: {
        url: " " + base_url + "/registroegresado/getFacultad",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                palabraClave: params.term
            };
        },
        processResults: function(response) {
            return {
                results: response,
            };
        },
        cache: true,

    }
});



function imprimir() {
    var id = 1;
    var select = document.getElementById("idFacultad");
    var id = select.value;


    $(".idescuela").select2({
        maximumSelectionLength: 1,
        ajax: {
            url: " " + base_url + '/registroegresado/getEscue/' + id,
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                console.log(response, );
                return {
                    results: response,

                };

            },
            cache: true,

        }
    });
}


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



//visualizar Borrar 
function fntDelBanner(IdBaner) {

    //let idBanner = idpersona;
    swal({
        title: "Eliminar Egresado",
        text: "¿Realmente quiere eliminar al Usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/registroegresado/delBanner/' + IdBaner;
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
    document.querySelector('#btnText').innerHTML = "Registrar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Egresado";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');

    $('#idFacultad').val(null).trigger('change');
    $('#idescuela').val(null).trigger('change');


}

function openModalPerfil() {
    $('#modalFormPerfil').modal('show');
}


function cargarExcel() {
    let ajaxUrl = base_url + '/registroegresado/setUsuario';
    let formUsuario = document.querySelector("#filesForm");
    var Form = new FormData($('#filesForm')[0]);
    $.ajax({
        url: ajaxUrl,
        type: "post",
        data: Form,
        processData: false,
        contentType: false,
        complete: function(e) {
            msg = JSON.parse(e.responseText);

            if (msg['status'] == true) {
                swal("Modulo Egresados", msg['msg'], "success");
            } else {
                swal("Modulo Egresados", msg['msg'], "warning");
            }

            console.log(msg);

            formUsuario.reset();
        },
    })
}