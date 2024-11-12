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
                <select class="form-control" id="programa_estudio" multiple="multiple" name="programa_estudio" required>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="nombre_empresa">Empresa <a href="javascript:void(0);" class="btn btn-primary" onclick="openModalEmpresa()"><i class="fas fa-plus-circle"></i></a></label>
                <select class="form-control" id="nombre_empresa" data-live-search="true" name="nombre_empresa" required>

                </select>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre_puesto">Nombre Puesto</label>
                <input type="text" class="form-control" id="nombre_puesto" name="nombre_puesto" required="">
            </div>

            <div class="form-group col-md-6">
                <label for="modalidad_laboral">Modalidad</label>
                <input type="text" class="form-control" id="modalidad_laboral" name="modalidad_laboral" required="">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="condicion_laboral">condicion_laboral</label>
                <input type="text" class="form-control" id="condicion_laboral" name="condicion_laboral" required="">
            </div>
            <div class="form-group col-md-5">
                <label for="fecha_termino">fecha_termino</label>
                <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" required="">
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
                                    <th>nombre_puesto</th>
                                    <th>condicion_laboral</th>
                                    <th>modalidad_laboral</th>
                                    <th>fecha_termino</th>
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

    function openModalEmpresa() {
        document.querySelector('#id').value = "";
        document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
        document.querySelector('#btnText').classList.replace("btn-info", "btn-primary");
        document.querySelector('#btnText').innerHTML = "Publicar Imagen";
        document.querySelector('#titleModal').innerHTML = "Publicar Idocumento legalnacional";
        document.querySelector("#formmodal").reset();
        $('#modalEmpresa').modal('show');
    }

    function AgregarEmpresa() {
        var id = $("#id").val();
        var txtNombreEmpresa = $("#txtNombreEmpresa").val();
        var inputElement = document.getElementById("archivoSubido");
        var archivoSubido = inputElement.files[0];

        if (txtNombreEmpresa == "") {
            swal("Atención!", "Ingresar nombre de la Empresa", "warning");
            return;
        }

        if (id != 0) {} else {
            if (inputElement.files["length"] == 0) {
                swal("Atención", "Ingresar la Imagen.", "warning");
                return false;
            }
        }

        var fd = new FormData();
        fd.append("id", id);
        fd.append("txtNombreEmpresa", txtNombreEmpresa);

        fd.append("archivoSubido", archivoSubido);

        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/difusion/registro_empresa",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
        }).done(function(response) {
            var info = JSON.parse(response);

            if (info.status == true) {
                swal("Repositorio", info.msg, "success");
                datatable.api().ajax.reload();
                $("#modalRegistroRepositorio").modal("hide");
            }

            if (info.status == false) {
                swal("Error!", info.msg, "error");
            }

            divLoading.style.display = "none";
            return;
        });

    }




    function Agregar() {

        var id = $("#id").val();
        var nombre_puesto = $("#nombre_puesto").val();
        var nombre_empresa = $("#nombre_empresa").val();
        
        var programa_estudio = $("#programa_estudio").val();
        var modalidad_laboral = $("#modalidad_laboral").val();
        var condicion_laboral = $("#condicion_laboral").val();
        var fecha_termino = $("#fecha_termino").val();
        var link = $("#link").val();

        if (nombre_puesto == '') {
            swal("Atención!", "ingresar el nombre del nombre_puesto", "warning");
            return;
        }

        if (link == '') {
            swal("Atención!", "link", "warning");
            return;
        }

        var lista_programa_estudio = new Array();
        for (var i = 0; i < programa_estudio.length; i++) {
            lista_programa_estudio.push({
                programa_estudio: programa_estudio[i],
            });
        }

        var fd = new FormData();
        fd.append("id", id);
        fd.append("nombre_puesto", nombre_puesto);
        fd.append("nombre_empresa", nombre_empresa);
        fd.append("lista_programa_estudio", JSON.stringify(lista_programa_estudio));
        fd.append("modalidad_laboral", modalidad_laboral);
        fd.append("condicion_laboral", condicion_laboral);
        fd.append("fecha_termino", fecha_termino);
        fd.append("link", link);

        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/difusion/set",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);


            $('#programa_estudio').val(null).trigger('change');
            $('#programa_estudio').val(null).trigger('change');

            document.querySelector("#form").reset();

            if (info.status == true) {
                swal("Difusión", info.msg, "success");
                datatable.api().ajax.reload();
                $("#modal").modal("hide");
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



</script>