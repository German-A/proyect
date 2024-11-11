<?php
headerAdmin($data);
getModal('modalDifusion', $data);
?>

<main class="app-content">

    <form id="form" name="form" class="form-horizontal">
        <input type="hidden" id="id" name="id" value="">
        <p class="text-primary">Todos los campos son obligatorios.</p>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="programa_estudio">Programa de estudio</label><br>
                <select class="form-control programa_estudio" id="programa_estudio" data-live-search="true" name="programa_estudio" required>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="nombre_empresa">Empresa <a href="javascript:void(0);" class="btn btn-primary" onclick="AgregarEmpresa()"><i class="fas fa-plus-circle"></i></a></label>
                <select class="form-control nombre_empresa" id="nombre_empresa" data-live-search="true" name="nombre_empresa" required>
                </select>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre_puesto">Nombre Puesto</label>
                <input type="text" class="form-control" id="nombre_puesto" name="nombre_puesto" required="">
            </div>

            <div class="form-group col-md-6">
                <label for="modalidad_oferta">Modalidad</label>
                <input type="text" class="form-control" id="modalidad_oferta" name="modalidad_oferta" required="">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="descripcion">NOMBRE OFERTA</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required="">
            </div>
            <div class="form-group col-md-5">
                <label for="link">link</label>
                <input type="text" class="form-control" id="link" name="link" required="">
            </div>

            <div class="form-group col-md-2">
                <a href="javascript:void(0);" class="btn btn-primary" id="btnText" onclick="Agregar()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</a>
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>

            </div>
        </div>
    </form>

    <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <?php if ($_SESSION['permisosMod']['w']) { ?>
                    <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar</button>
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
                                    <th>descripcion</th>
                                    <th>link</th>
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


<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['lineHeights', ['0.2']],

            ]
        });
    });
</script>



<script>
    function copiarLinkOferta(e) {
        navigator.clipboard.writeText(e.getAttribute("lin-oferta")).then(function() {}).catch(function(err) {
            console.error('Error al copiar texto: ', err);
        });
    };

    function AgregarEmpresa(){
        
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
                document.getElementById('txtPosicion').value = info.data['posicion'];
                //   $(".summernote").summernote("your text");
                $('.summernote').summernote('code', info.data['descripcion']);
                // document.getElementsByClassName('summernote').value = info.data['descripcion'];
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
                "url": " " + base_url + "/difusion/getDifusion",
                "dataSrc": ""
            },
            "columns": [{
                    "data": "id_disusion"
                },
                {
                    "data": "descripcion"
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
</script>