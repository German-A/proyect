let tableUsuarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");


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
        title: "Eliminar Usuario",
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
            let ajaxUrl = base_url + '/Banner/delBanner/' + IdBaner;
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


function verOfertaEmpleo(id){
 
    window.location.href = base_url + '/empleo/empleo/' + id
    console.log('sds');

}

