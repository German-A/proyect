
    function openModalBanner() {
        document.querySelector('#idBanner').value = "";
        document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
        document.querySelector('#btnBanner').classList.replace("btn-info", "btn-primary");
        document.querySelector('#btnBanner').innerHTML = "Guardar";
        document.querySelector('#titleBanner').innerHTML = "Banner";
        document.querySelector("#formmodalBanner").reset();

        $('#modalRegistroBanner').modal('show');
    }

    function GuardarBanner() {

        var idBanner = $("#idBanner").val();
        var txtNombre = $("#txtNombre").val();
        var txtPosicion = $("#txtPosicion").val();
        var inputElement = document.getElementById("archivoSubido");
        var archivoSubido = inputElement.files[0];

        if (txtNombre == '') {
            swal("Atención!", "Ingresar el Nombre", "warning");
            return;
        }

        if (txtPosicion == '') {
            swal("Atención!", "Ingresar la Posición", "warning");
            return;
        }

        if (idBanner != 0) {

        } else {
            if (inputElement.files['length'] == 0) {
                swal("Atención", "Ingresar la Imagen.", "warning");
                return false;
            }
        }


        var fd = new FormData();
        fd.append("idBanner", idBanner);
        fd.append("txtNombre", txtNombre);
        fd.append("txtPosicion", txtPosicion);
        fd.append("archivoSubido", archivoSubido);
        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/banners/setBanner",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            if (info.status == true) {
                swal("Banner", info.msg, "success");
                datatable.api().ajax.reload();
                $("#modalRegistroBanner").modal("hide");
            }
            if (info.status == false) {
                swal("Error!", info.msg, "error");
            }
            divLoading.style.display = "none";
            return;
        });
    }

    function fntEditBanner(idBanner) {

        document.querySelector("#titleBanner").innerHTML = "ACTUALIZAR Banner";
        document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
        document.querySelector("#btnBanner").classList.replace("btn-primary", "btn-info");
        document.querySelector("#btnBanner").innerHTML = "Actualizar";

        $.ajax({
            method: "GET",
            url: "" + base_url + "/banners/getOneBanner/" + idBanner,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);

            if (info.status == true) {
                document.querySelector("#formmodalBanner").reset();
                document.getElementById('idBanner').value = info.data['IdBaner'];
                document.getElementById('txtNombre').value = info.data['Nombre'];
                document.getElementById('txtPosicion').value = info.data['Posicion'];


            }
            if (info.status == false) {
                swal("Error!", info.msg, "error");
            }
        
            $("#modalRegistroBanner").modal("show");
        });
    }

    function fntDeleteBanner(idBanner) {

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

                $.ajax({
                    method: "POST",
                    url: "" + base_url + "/banners/deleteBanner/" + idBanner,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType

                }).done(function(response) {
                    var info = JSON.parse(response);
                    console.log(info);
                    console.log(info.status);

                    if (info.status == true) {
                        swal("Banner", info.msg, "success");
                        datatable.api().ajax.reload();
                    }
                    if (info.status == false) {
                        swal("Error!", info.msg, "error");
                    }
                });

            }

        });




    }


    $(document).ready(function() {
        datatable = $('#datatable').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "ajax": {
                "url": " " + base_url + "/banners/get",
                "dataSrc": ""
            },
            "columns": [{
                    "data": "IdBaner"
                },
                {
                    "data": "Nombre"
                },
                {
                    "data": "NombreArchivo"
                },
                {
                    "data": "Posicion"
                },
                {
                    "data": "FechaRegistro"
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