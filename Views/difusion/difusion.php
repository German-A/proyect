<?php
headerAdmin($data);
getModal('modalDifusionEmpresa', $data);
getModal('modalDifusion', $data);
?>

<main class="app-content">

    <form id="form" name="form" class="form-horizontal">
        <input type="hidden" id="id" name="id" value="">
        <p class="text-primary">Todos los campos son obligatorios.</p>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="programa_estudio">Programa de estudio</label><br>

                <select class="programa_estudio form-control selectmultiple" name="programa_estudio[]" data-live-search="true" id="programa_estudio" multiple="multiple" x>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="nombre_empresa">Empresa <a href="javascript:void(0);" class="btn btn-primary" onclick="openModalEmpresa()"><i class="fas fa-plus-circle"></i></a></label>
                <select class="form-control" id="nombre_empresa" data-live-search="true" name="nombre_empresa" required>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="nombre_puesto">Nombre Puesto</label>
                <input type="text" class="form-control" id="nombre_puesto" name="nombre_puesto" required="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="modalidad_laboral">Modalidad</label>
                <select class="form-control lista" name="modalidad_laboral" id="modalidad_laboral" data-live-search="true" class="mdb-select md-form" x>
                    <option value="0" disabled selected>Seleccionar</option>
                    <option value="hibrido">Hibrido</option>
                    <option value="presencial">Presencial</option>
                    <option value="remoto">Remoto</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="condicion_laboral">Tipo Oferta</label>
                <select class="form-control lista" name="condicion_laboral" id="condicion_laboral" data-live-search="true" class="mdb-select md-form" x>
                    <option value="0" disabled selected>Seleccionar</option>
                    <option value="empleo">empleo</option>
                    <option value="practicas_pre">Practicas Preprofesionales</option>
                    <option value="practicas_pro">Practicas Profesionales</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="fecha_termino">fecha_termino</label>
                <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" required="">
            </div>
            <div class="form-group col-md-6">
                <label for="link">link</label>
                <input type="text" class="form-control" id="link" name="link" required="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <a href="javascript:void(0);" class="btn btn-primary" id="btnText" onclick="Agregar()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</a>
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
            </div>
        </div>
    </form>
    <br><br>
    <div class="app-title">
        <h1>lista de difusiones registradas</h1>

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
        document.querySelector('#btnText').innerHTML = "Publicar";
        document.querySelector('#titleModal').innerHTML = "Publicar";
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
                swal("Oferta de Empleos", info.msg, "success");
                datatable.api().ajax.reload();
                $("#modalEmpresa").modal("hide");
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

    function fntEdit(id) {

        document.querySelector("#titleModal").innerHTML = "ACTUALIZAR";
        document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
        document.querySelector("#btnText").classList.replace("btn-primary", "btn-info");
        document.querySelector("#btnText").innerHTML = "Actualizar";

        $.ajax({
            method: "GET",
            url: "" + base_url + "/difusion/getOneDifusion/" + id,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);

            if (info.status == true) {
                document.querySelector("#formmodalEmpresa").reset();
                document.getElementById('id_difusion_cursos').value = info.data['id_difusion_cursos'];
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

            $("#modalDifusion").modal("show");
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