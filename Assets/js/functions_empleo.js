
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {

    var idempleo = $('#idempleo').val();

    //insertar y actualizar


    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/empleo/get/' + idempleo;
    request.open("GET", ajaxUrl, true);
    request.send();
    console.log(ajaxUrl);
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                console.log(objData.NombrePuesto);
                //document.querySelector("#f").innerHTML = 2;
                //document.querySelector("#NombrePuesto").value = objData.NombrePuesto;
            }
        }

    }



}, false);


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

//Modal para editar la informacion
function fntEdit(element, idbtn) {
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Actualizar Imagen en el Banner";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar Datos";

    //let idbtn = idbtn;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Banner/getone/' + idbtn;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#id").value = objData.data.IdBaner;
                document.querySelector("#nombreArchivo").value = objData.data.Nombre;
                document.querySelector("#posicion").value = objData.data.Posicion;
            }
        }
        $('#modalRegistro').modal('show');
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

function openModal() {
    document.querySelector('#id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Publicar Imagen";
    document.querySelector('#titleModal').innerHTML = "Publicar Imagen en el Banner";
    document.querySelector("#formmodal").reset();
    $('#modalRegistro').modal('show');
}