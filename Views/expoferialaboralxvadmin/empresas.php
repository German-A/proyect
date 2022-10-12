<?php
headerAdmin($data);

?>



<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <?php if ($_SESSION['permisos'][29]['w']) { ?>
                    <button class="btn btn-primary" type="button" onclick="openModalEmpresa();"><i class="fas fa-plus-circle"></i>Publicar Empresa</button>
                <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Url</th>
                                    <th>Archivo</th>
                                    <th>Posicion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>


<!-- Modal  agregarPostrado-->
<div class="modal fade" id="modalRegistroEmpresa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleEmpresa">Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formmodalEmpresa" name="formmodalEmpresa" class="form-horizontal">
                    <input type="hidden" id="idexpoxvEmpresa" name="idexpoxvEmpresa" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>


                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtPosicion">Posición</label>
                            <input type="number" class="form-control" id="txtPosicion" name="txtPosicion" required="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txtUrl">Url</label>
                            <input type="text" class="form-control" id="txtUrl" name="txtUrl" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Archivo a subir:</label>
                            <input type="file" id="archivoSubido" name="archivoSubido">
                        </div>
                    </div>

                    <div class="tile-footer">
                        <a href="javascript:void(0)" class="btn btn-info" id="btnEmpresa" onclick="GuardarEmpresa()">Guardar</a>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function openModalEmpresa() {
        document.querySelector('#idexpoxvEmpresa').value = "";
        document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
        document.querySelector('#btnEmpresa').classList.replace("btn-info", "btn-primary");
        document.querySelector('#btnEmpresa').innerHTML = "Guardar";
        document.querySelector('#titleEmpresa').innerHTML = "Galería";
        document.querySelector("#formmodalEmpresa").reset();

        $('#modalRegistroEmpresa').modal('show');
    }

    function GuardarEmpresa() {

        var idexpoxvEmpresa = $("#idexpoxvEmpresa").val();
        var txtNombre = $("#txtNombre").val();
        var txtUrl = $("#txtUrl").val();
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

        if (idexpoxvEmpresa != 0) {

        } else {
            if (inputElement.files['length'] == 0) {
                swal("Atención", "Ingresar la Imagen.", "warning");
                return false;
            }
        }

        var fd = new FormData();
        fd.append("idexpoxvempresas", idexpoxvEmpresa);
        fd.append("txtNombre", txtNombre);
        fd.append("txtUrl", txtUrl);
        fd.append("txtPosicion", txtPosicion);
        fd.append("archivoSubido", archivoSubido);
        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/expoferialaboralxvadmin/setEmpresa",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            if (info.status == true) {
                swal("Empresa", info.msg, "success");
                datatable.api().ajax.reload();
                $("#modalRegistroEmpresa").modal("hide");
            }
            if (info.status == false) {
                swal("Error!", info.msg, "error");
            }
            divLoading.style.display = "none";
            return;
        });
    }

    function fntEditEmpresa(idexpoxvEmpresa) {

        document.querySelector("#titleEmpresa").innerHTML = "ACTUALIZAR GALERÍA";
        document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
        document.querySelector("#btnEmpresa").classList.replace("btn-primary", "btn-info");
        document.querySelector("#btnEmpresa").innerHTML = "Actualizar";

        $.ajax({
            method: "GET",
            url: "" + base_url + "/expoferialaboralxvadmin/getOneEmpresa/" + idexpoxvEmpresa,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);

            if (info.status == true) {
                document.querySelector("#formmodalEmpresa").reset();
                document.getElementById('idexpoxvEmpresa').value = info.data['idexpoxvempresas'];
                document.getElementById('txtNombre').value = info.data['nombre'];
                document.getElementById('txtUrl').value = info.data['url'];
                document.getElementById('txtPosicion').value = info.data['posicion'];

            }
            if (info.status == false) {
                swal("Error!", info.msg, "error");
            }
        
            $("#modalRegistroEmpresa").modal("show");
        });
    }

    function fntDeleteEmpresa(idexpoxvEmpresa) {

        swal({
            title: "Eliminar Empresa",
            text: "¿Realmente quiere eliminar el Empresa?",
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
                    url: "" + base_url + "/expoferialaboralxvadmin/deleteEmpresa/" + idexpoxvEmpresa,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType

                }).done(function(response) {
                    var info = JSON.parse(response);
                    console.log(info);
                    console.log(info.status);

                    if (info.status == true) {
                        swal("Empresa", info.msg, "success");
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
                "url": " " + base_url + "/expoferialaboralxvadmin/getEmpresa",
                "dataSrc": ""
            },
            "columns": [{
                    "data": "idexpoxvempresas"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "url"
                },
                {
                    "data": "archivo"
                },
                {
                    "data": "posicion"
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
</script>