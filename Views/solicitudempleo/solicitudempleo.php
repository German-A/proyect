<?php head($data); ?>

<div class="row">
    <div class="d-none d-xl-block col-xl-2 ">
        <img class="img-fluid" src="<?= media(); ?>/images/empleo/unt.jpg" alt="" style=" height: 100%; object-fit: cover;">

    </div>
    <div class="col-12 col-xl-10">
        <div class="row ">
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoUse.jpg" alt="">
            </div>
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoDpa.png" alt="">
            </div>

            <div class="col-12 col-md-6 col-xl-6 border-right-2 bg-danger">
                <h1 class="text-center">SOLICITUD DE <br> REQUERIMIENTO LABORAL</h1>
            </div>
        </div>
        <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">
            <input type="hidden" name="accion" id="accion" value="REGISTRAR_EMPLEO">

            <p class="text-primary">Campos obligatorios <span class="text-danger">*</span></p>

            <div class="row">

                <!-- izquierda -->
                <div class="col-md-6">
                    <div class="form-row">
                        <h5 class="text-center">Datos de la Empresa</h5>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ruc">Ruc <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  onchange="buscar()" id="ruc" name="ruc" x>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nombreempresa">Nombre de la Empresa<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombreempresa" name="nombreempresa" x>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="correo">Correo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="correo" name="correo" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="celular">Celular <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="celular" name="celular" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Foto:</label>
                            <input type="file" id="archivoSubido" name="archivoSubido">
                        </div>
                    </div>
                    <div class="form-row">
                        <h4 class="text-center">Acerca de la Oferta</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="NombrePuesto">Puesto<span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" name="NombrePuesto" id="NombrePuesto" placeholder="Ingresar Nombre Puesto" x></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TrabajoRemoto">Modalidad <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="TrabajoRemoto" id="TrabajoRemoto" data-live-search="true" class="mdb-select md-form" x>
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Remoto/Presencial">Remoto/Presencial</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="NumeroVacantes">Vacantes <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="NumeroVacantes" id="NumeroVacantes" placeholder="Ingresar el Número de Vacantes" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="LugarTrabajo">Lugar de Trabajo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="LugarTrabajo" id="LugarTrabajo" placeholder="Ingresar el Lugar Trabajo" x>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="FechaFin">Fecha inicio de postulación<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="FechaInico" id="FechaInico" placeholder="Ingresar FechaInico">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="FechaFin">Fecha límite de postulación<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="FechaFin" id="FechaFin" placeholder="Ingresar Fecha Fin">
                        </div>
                    </div>
                    <div class="form-row">
                        <h4 class="text-center">Acerca del Puesto</h4>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="DescripcionPuesto">Descripción del Puesto<span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control summernote" id="DescripcionPuesto" name="DescripcionPuesto" placeholder="Ingresar Descripción Puesto"></textarea>
                        </div>
                    </div>


                </div>

                <!-- derecha -->
                <div class="col-md-6">
                    <div class="form-row">
                        <h4 class="text-center">Requisitos</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nombreempresa">Carreras Profesionales<span class="text-danger">*</span></label>
                            <select class="carreras form-control" name="carreras[]" data-live-search="true" id="carreras" multiple="multiple" x>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="ruc">Grado Academico <span class="text-danger">*</span></label>
                            <select class="titulaciones form-control" name="titulaciones[]" data-live-search="true" id="titulaciones" multiple="multiple" x>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contacto">Experiencia <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="Experiencias" id="Experiencias" placeholder="Ingresar las Experiencias" x>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="logo">Idiomas <span class="text-danger">*</span></label>
                            <select class="idiomas form-control" name="idiomas[]" id="idiomas" multiple="multiple" x>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="InformacionAdicional">Información Adicional</label>
                            <textarea type="text" class="form-control summernote" id="InformacionAdicional" name="InformacionAdicional" id="InformacionAdicional" placeholder="Ingresar Informacion Adicional"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="InformacionAdicional">Elegir las Competencias</label>
                            <select class="competencias form-control" name="competencias[]" data-live-search="true" id="competencias" multiple="multiple" required>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="TipoContrato">Modalidad de Contrato<span class="text-danger">*</span></label>
                            <select class="form-control select2 narrow wrap " name="TipoContrato" id="TipoContrato" class="form-control-lg mdb-select md-form">
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Ofertalaboral">Oferta de Empleo</option>
                                <option value="preprofesionales">Practicas Pre Profesionales </option>
                                <option value="proprefesionales">Practicas Pro Profesionales</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="JornadaLaboral">JornadaLaboral<span class="text-danger">*</span></label>
                            <select class="form-control select2 narrow wrap " name="JornadaLaboral" id="JornadaLaboral" class="mdb-select md-form">
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Parcial">Parcial </option>
                                <option value="Completa">Completa</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="HorasSemanales">HorasSemanales</label>
                            <input type="number" class="form-control" name="HorasSemanales" id="HorasSemanales" placeholder="Ingresar la Horas Semanales" x>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="HorarioTrabajo">HorarioTrabajo</label>
                            <input type="text" class="form-control" name="HorarioTrabajo" id="HorarioTrabajo" placeholder="Ingresar las Horario Trabajo" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="RemuneracionBruta">Remuneración Bruta</label>
                            <input type="number" class="form-control" name="RemuneracionBruta" id="RemuneracionBruta" placeholder="Ingresar la Remuneración Bruta" x>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">

                                <button type="button" class="btn btn-primary col-6" onclick="publicarOferta()">PUBLICAR OFERTA LABORAL</button>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-danger col-6" class="close" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

    </div>

    </form>
</div>





</div>

<br><br>
<br>


<?php footer($data); ?>

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
    //get Idiomas
    $(".select2").select2({

    });
</script>


<script>
    function publicarOferta() {





        var titulaciones = $("#titulaciones").val();

        var NombrePuesto = $("#NombrePuesto").val();
        var carreras = $("#carreras").val();
        var DescripcionPuesto = $("#DescripcionPuesto").val();
        var InformacionAdicional = $("#InformacionAdicional").val();
        var LugarTrabajo = $("#LugarTrabajo").val();
        var TrabajoRemoto = $("#TrabajoRemoto").val();
        var NumeroVacantes = $("#NumeroVacantes").val();
        var competencias = $("#competencias").val();
        var idiomas = $("#idiomas").val();
        var Experiencias = $("#Experiencias").val();
        var TipoContrato = $("#TipoContrato").val();
        var HorasSemanales = $("#HorasSemanales").val();
        var HorarioTrabajo = $("#HorarioTrabajo").val();
        var RemuneracionBruta = $("#RemuneracionBruta").val();
        var FechaInico = $("#FechaInico").val();
        var FechaFin = $("#FechaFin").val();
        var Contacto = $("#Contacto").val();
        var JornadaLaboral = $("#JornadaLaboral").val();




        // if (NombrePuesto == 0) {
        //     swal("Atención!", "Ingresar el Nombre del Puesto", "warning");
        //     return;
        // }

        // if (carreras == 0) {
        //     swal("Atención!", "Seleccionar una Carrera ", "warning");
        //     return;
        // }
        // if (titulaciones == 0) {
        //     swal("Atención!", "Seleccionar una Titulaciones ", "warning");
        //     return;
        // }


        // if (DescripcionPuesto == 0) {
        //     swal("Atención!", "Ingresar una Descripción del Puesto", "warning");
        //     return;
        // }
        // if (LugarTrabajo == 0) {
        //     swal("Atención!", "Ingresar el Lugar de Trabajo", "warning");
        //     return;
        // }


        // if (TrabajoRemoto == null) {
        //     swal("Atención!", "Seleccionar la Modalidad de Trabajo", "warning");
        //     return;
        // }
        // if (NumeroVacantes == 0) {
        //     swal("Atención!", "Ingresar el Número de Vacantes", "warning");
        //     return;
        // }
        // if (competencias == 0) {
        //     swal("Atención!", "Seleccionar las Competencias", "warning");
        //     return;
        // }

        // if (idiomas == 0) {
        //     swal("Atención!", "Seleccionar el nivel del Idiomas", "warning");
        //     return;
        // }
        // if (Experiencias == 0) {
        //     swal("Atención!", "Ingresar si sé requiere Experencia", "warning");
        //     return;
        // }
        // if (TipoContrato == 0) {
        //     swal("Atención!", "Seleccionar el Tipo de Contrato", "warning");
        //     return;
        // }

        // if (JornadaLaboral == null) {
        //     swal("Atención!", "Ingresar la Jornada Laboral", "warning");
        //     return;
        // }


        // if (HorasSemanales == 0) {
        //     swal("Atención!", "Ingresar el número de Horas Semanales", "warning");
        //     return;
        // }
        // if (HorarioTrabajo == 0) {
        //     swal("Atención!", "Ingresar el Horario Trabajo", "warning");
        //     return;
        // }

        // if (Contacto == 0) {
        //     swal("Atención!", "Ingresar el correo o número de Contacto", "warning");
        //     return;
        // }


        // if (RemuneracionBruta == 0) {
        //     swal("Atención!", "Ingresar la Remuneración Bruta", "warning");
        //     return;
        // }

        // if (FechaInico == 0) {
        //     swal("Atención!", "Seleccione la Fecha Inicio", "warning");
        //     return;
        // }

        // if (FechaFin == 0) {
        //     swal("Atención!", "Seleccione la Fecha Fin", "warning");
        //     return;
        // }



        var datax = $("#frmempleo").serializeArray();

        var fd = new FormData(document.getElementById("frmempleo"));
        $.ajax({
            method: "POST",
            url: "" + base_url + "/solicitudempleo/registrarempleoEmpresa",
            //data: datax
            data: fd,
            processData: false,  // tell jQuery not to process the data
            contentType: false   // tell jQuery not to set contentType

        }).done(function() {
            //swal("Atención!", "TERMINADO", "warning");
            //window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin/" + idEmpresa + "";
        });
    }
</script>

<script>
     function buscar() {
        var ruc = document.getElementById("ruc").value;

        cadena = "ruc=" + ruc;

        $.ajax({
            type: "POST",
            async: true,
            url: "solicitudempleo/buscarruc",
            data: cadena,

            success: function(response) {
                console.log(response);

                var info = JSON.parse(response.data['nombreEmpresa']);
                //console.log(info.data[0]['bachiller']);

                //document.getElementById('correo').value = info.data[0]['bachiller'];
                //document.getElementById('email').innerHTML = info.data[0]['titulo'];
                //document.getElementById('segundaespecialidad').innerHTML = info.data[0]['segundaespecialidad'];
            }
        });
    }
</script>