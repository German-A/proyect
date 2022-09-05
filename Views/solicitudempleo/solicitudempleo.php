<?php head($data); ?>
<style>
    .titulo {
        font-size: 35px;
        font-weight: 700;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }

    @media (min-width: 700px) {
        .titulo {
            font-size: 35px;
            font-weight: 700
        }
    }

    
    @media (min-width: 1400px) {
        .titulo {
            font-size: 35px;
            font-weight: 700
        }
    }
</style>

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

            <div class="d-flex align-items-center justify-content-center col-12 col-md-6 col-xl-6 border-right-2 " style="border-radius:20px; background-color: var(--amarillo-mostaza); ">
                <h1 class="text-center titulo">SOLICITUD DE <br> REQUERIMIENTO LABORAL</h1>
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
                            <input type="text" class="form-control" onchange="buscar()" id="ruc" name="ruc" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nombreempresa">Nombre de la Empresa<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombreempresa" disabled name="nombreempresa" x>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="correo">Correo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="correo" disabled name="correo" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="celular">Celular <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="celular" disabled name="celular" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Logo de la Empresa:</label>
                            <input type="file" id="archivoSubido" name="archivoSubido">
                        </div>
                    </div>
                    <div class="form-row">
                        <h4 class="text-center">Acerca de la Oferta</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="NombrePuesto">Puesto<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="NombrePuesto" id="NombrePuesto" placeholder="Ingresar Nombre Puesto" x>
                            <!-- <textarea type="text" class="form-control" name="NombrePuesto" id="NombrePuesto" placeholder="Ingresar Nombre Puesto" x></textarea> -->
                        </div>
                        <div class="form-group col-md-6">
                            <label for="TrabajoRemoto">Modalidad <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="TrabajoRemoto" id="TrabajoRemoto" data-live-search="true" class="mdb-select md-form" x>
                                <option disabled selected>Seleccionar</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Remoto/Presencial">Remoto/Presencial</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="NumeroVacantes">N° Vacantes <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="NumeroVacantes" id="NumeroVacantes" placeholder="Ingresar el Número de Vacantes" x>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="LugarTrabajo">Lugar de Trabajo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="LugarTrabajo" id="LugarTrabajo" placeholder="Ingresar el Lugar Trabajo" x>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="FechaFin">Fecha inicio para postulación<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="FechaInico" id="FechaInico" placeholder="Ingresar FechaInico">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="FechaFin">Fecha límite para postulación<span class="text-danger">*</span></label>
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
                            <label for="ruc">Grado Académico <span class="text-danger">*</span></label>
                            <select class="titulaciones form-control" name="titulaciones[]" data-live-search="true" id="titulaciones" multiple="multiple" x>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Experiencias">Experiencia <span class="text-danger">*</span></label>
                            <select class="form-control select2 narrow wrap " name="Experiencias" id="Experiencias" class="form-control-lg mdb-select md-form">
                                <option disabled selected>Seleccionar</option>
                                <option value="0">Sin Experiencia</option>
                                <option value="1">Menos de 1 año</option>
                                <option value="2">2 año</option>
                                <option value="3">3 año</option>
                                <option value="4">4 año a más</option>
                            </select>
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label for="logo">Idiomas</label>
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
                                <option disabled selected>Seleccionar</option>
                                <option value="Ofertalaboral">Oferta de Empleo</option>
                                <option value="preprofesionales">Prácticas PreProfesionales</option>
                                <option value="proprefesionales">Prácticas Profesionales</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="JornadaLaboral">Jornada Laboral<span class="text-danger">*</span></label>
                            <select class="form-control select2 narrow wrap " name="JornadaLaboral" id="JornadaLaboral" class="mdb-select md-form">
                                <option disabled selected>Seleccionar</option>
                                <option value="Parcial">Parcial </option>
                                <option value="Completa">Completa</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="HorasSemanales">Horas Semanales</label>
                            <input type="number" class="form-control" onchange="comprueba()" name="HorasSemanales" id="HorasSemanales" placeholder="" x>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="HorarioTrabajo">Horario de Trabajo</label>
                            <input type="text" class="form-control" name="HorarioTrabajo" id="HorarioTrabajo" placeholder="" x>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="RemuneracionBruta">S/. Remuneración</label>
                            <select class="form-control select2 narrow wrap " name="RemuneracionBruta" id="RemuneracionBruta" class="mdb-select md-form">
                                <option disabled selected>Seleccionar una Opción</option>
                                <option value="1025">1025 a 1500 </option>
                                <option value="1500">1500 a 2000</option>
                                <option value="2000">2000 a 2500</option>
                                <option value="2500">2500 a 3000</option>
                                <option value="4000">4000 a más</option>
                            </select>
                        </div>
                        <div class="form-group  text-center col-md-12">
                            <button type="button" class="btn btn-primary " onclick="publicarOferta()">ENVIAR PARA APROBACIÓN</button>
                        </div>
                    </div>
                </div>

        </form>
    </div>





</div>

<br><br>
<br>

<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalPerfiles" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center" id="correoweb">


                </div>
            </div>
        </div>
    </div>
</div>


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
    $('#HorasSemanales').on('change', function(event) {
        const HorasSemanales = event.target.value;
        var inputHorasSemanales = document.getElementById("HorasSemanales");
        if (HorasSemanales < 0) {     
            swal("Atención!", "Las horas semanales no puden ser menor a 0", "warning");
            inputHorasSemanales.value = 1;
        }
    });

    $('#NumeroVacantes').on('change', function(event) {
        const NumeroVacantes = event.target.value;
        var inputNumeroVacantes = document.getElementById("NumeroVacantes");
        if (NumeroVacantes < 0) {     
            swal("Atención!", "El número de vacantes no puden ser menor a 0", "warning");
            inputNumeroVacantes.value = 1;
        }
    });




    function publicarOferta() {


        var ruc = $("#ruc").val();
        var nombreempresa = $("#nombreempresa").val();
        var correo = $("#correo").val();
        var celular = $("#celular").val();


        var inputElement = document.getElementById("archivoSubido");
        console.log(inputElement.files[0]);
        var archivoSubido = inputElement.files[0];

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


        if (ruc == 0) {
            swal("Atención!", "Debe Ingresar el número de Ruc", "warning");
            return;
        }


        if (NombrePuesto == 0) {
            swal("Atención!", "Ingresar el Nombre del Puesto", "warning");
            return;
        }

        if (carreras == 0) {
            swal("Atención!", "Seleccionar una Carrera ", "warning");
            return;
        }
        if (titulaciones == 0) {
            swal("Atención!", "Seleccionar un Grado Académico", "warning");
            return;
        }


        if (DescripcionPuesto == 0) {
            swal("Atención!", "Ingresar una Descripción del Puesto", "warning");
            return;
        }
        if (LugarTrabajo == 0) {
            swal("Atención!", "Ingresar el Lugar de Trabajo", "warning");
            return;
        }


        if (TrabajoRemoto == null) {
            swal("Atención!", "Seleccionar la Modalidad de Trabajo", "warning");
            return;
        }
        if (NumeroVacantes == 0) {
            swal("Atención!", "Ingresar el Número de Vacantes", "warning");
            return;
        }
        // if (competencias == 0) {
        //     swal("Atención!", "Seleccionar las Competencias", "warning");
        //     return;
        // }

        // if (idiomas == 0) {
        //     swal("Atención!", "Seleccionar el nivel del Idiomas", "warning");
        //     return;
        // }
        if (Experiencias == 0) {
            swal("Atención!", "Ingresar si sé requiere Experencia", "warning");
            return;
        }
        if (TipoContrato == 0) {
            swal("Atención!", "Seleccionar el Tipo de Contrato", "warning");
            return;
        }

        if (JornadaLaboral == null) {
            swal("Atención!", "Seleccionar la Jornada Laboral", "warning");
            return;
        }


        if (HorasSemanales == 0) {
            swal("Atención!", "Ingresar el número de Horas Semanales", "warning");
            return;
        }
        if (HorarioTrabajo == 0) {
            swal("Atención!", "Ingresar el Horario Trabajo", "warning");
            return;
        }

        if (Contacto == 0) {
            swal("Atención!", "Ingresar el correo o número de Contacto", "warning");
            return;
        }


        if (RemuneracionBruta == 0 || RemuneracionBruta==null) {
            swal("Atención!", "Ingresar la Remuneración Bruta", "warning");
            return;
        }

        if (FechaInico == 0) {
            swal("Atención!", "Seleccione la Fecha Inicio", "warning");
            return;
        }

        if (FechaFin == 0) {
            swal("Atención!", "Seleccione la Fecha Fin", "warning");
            return;
        }


        var listaLotes = new Array();
        for (var i = 0; i < carreras.length; i++) {
            listaLotes.push({
                carreras: carreras[i],
            });
        }

        var listaTitulaciones = new Array();
        for (var i = 0; i < titulaciones.length; i++) {
            listaTitulaciones.push({
                titulaciones: titulaciones[i],
            });
        }

        var listaCompetencias = new Array();
        for (var i = 0; i < competencias.length; i++) {
            listaCompetencias.push({
                competencias: competencias[i],
            });
        }

        var listaIdiomas = new Array();
        for (var i = 0; i < idiomas.length; i++) {
            listaIdiomas.push({
                idiomas: idiomas[i],
            });
        }





        var datax = $("#frmempleo").serializeArray();

        //var fd = new FormData(document.getElementById("frmempleo"));

        var fd = new FormData();
        fd.append("ruc", ruc);
        fd.append("nombreempresa", nombreempresa);
        fd.append("correo", correo);
        fd.append("celular", celular);
        fd.append("archivoSubido", archivoSubido);
        fd.append("titulaciones", JSON.stringify(listaTitulaciones));
        fd.append("NombrePuesto", NombrePuesto);
        fd.append("carreras", JSON.stringify(listaLotes));
        fd.append("DescripcionPuesto", DescripcionPuesto);
        fd.append("InformacionAdicional", InformacionAdicional);
        fd.append("LugarTrabajo", LugarTrabajo);
        fd.append("TrabajoRemoto", TrabajoRemoto);
        fd.append("NumeroVacantes", NumeroVacantes);
        fd.append("competencias", JSON.stringify(listaCompetencias));
        fd.append("idiomas", JSON.stringify(listaIdiomas));
        fd.append("Experiencias", Experiencias);
        fd.append("TipoContrato", TipoContrato);
        fd.append("HorasSemanales", HorasSemanales);
        fd.append("HorarioTrabajo", HorarioTrabajo);
        fd.append("JornadaLaboral", JornadaLaboral);
        fd.append("RemuneracionBruta", RemuneracionBruta);
        fd.append("FechaInico", FechaInico);
        fd.append("FechaFin", FechaFin);
        fd.append("Contacto", Contacto);
        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/solicitudempleo/registrarempleoEmpresa",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            console.log(info);
            divLoading.style.display = "none";
            if (info.status == true) {
                listado =
                    `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
                $("#correoweb").html(listado);
            }
            if (info.status == false) {
                console.log(info.status);
                listado =
                    `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
                $("#correoweb").html(listado);
            }
            $('#modalPerfiles').modal('show');
            //swal("Atención!", "TERMINADO", "warning");
            //window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin/" + idEmpresa + "";
        });
    }
</script>

<script>
    function buscar() {
        var ruc = document.getElementById("ruc").value;
        cadena = "ruc=" + ruc;
        // $.ajax({
        //     type: "GET",
        //     async: true,
        //     url: 'https://consultaruc.win/api/ruc/'+ruc,
        //     success: function(response) {            
        //         console.log(response.result['razon_social']);
        //         console.log(response.result['estado']);
        //         console.log(response.result['condicion']);
        //     }
        // });
        $.ajax({
            type: "POST",
            async: true,
            url: "solicitudempleo/buscarruc",
            data: cadena,
            success: function(response) {
                var info = JSON.parse(response);
                if (info.status == true) {
                    $("#nombreempresa").attr("disabled", true);
                    $("#correo").attr("disabled", true);
                    $("#celular").attr("disabled", true);
                    $("#archivoSubido").attr("disabled", true);
                    document.getElementById('nombreempresa').value = info.data['nombreEmpresa'];
                    document.getElementById('correo').value = info.data['email_user'];
                    document.getElementById('celular').value = info.data['telefono'];
                    document.getElementById('archivoSubido').value = info.data['archivoSubido'];
                }
                if (info.status == false) {
                    $("#nombreempresa").attr("disabled", false);
                    $("#correo").attr("disabled", false);
                    $("#celular").attr("disabled", false);
                    $("#archivoSubido").attr("disabled", false);
                    document.getElementById('nombreempresa').value = "";
                    document.getElementById('correo').value = "";
                    document.getElementById('celular').value = "";
                    document.getElementById('archivoSubido').value = "";
                }
            }
        });
    }
</script>