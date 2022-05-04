$(document).ready(function() {

    //getTitulaciones
    $(".titulaciones").select2({
        ajax: {
            url: " " + base_url + "/empresaempleoregistroadmin/getTitulaciones",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    //getCarreras
    $(".carreras").select2({
        ajax: {
            url: " " + base_url + "/empresaempleoregistroadmin/getCarreras",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    //get Competencias
    $(".competencias").select2({
        ajax: {
            url: " " + base_url + "/empresaempleoregistroadmin/getCompetencias",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    //get Idiomas
    $(".idiomas").select2({
        ajax: {
            url: " " + base_url + "/empresaempleoregistroadmin/getIdiomas",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    console.log();

});

function publicarOferta() {



    var idEmpresa = $("#idEmpresa").val();


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




    if (NombrePuesto == 0) {
        swal("Atención!", "Ingresar el Nombre del Puesto", "warning");
        return;
    }

    if (carreras == 0) {
        swal("Atención!", "Seleccionar una Carrera ", "warning");
        return;
    }
    if (titulaciones == 0) {
        swal("Atención!", "Seleccionar una Titulaciones ", "warning");
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
    if (competencias == 0) {
        swal("Atención!", "Seleccionar las Competencias", "warning");
        return;
    }

    if (idiomas == 0) {
        swal("Atención!", "Seleccionar el nivel del Idiomas", "warning");
        return;
    }
    if (Experiencias == 0) {
        swal("Atención!", "Ingresar si sé requiere Experencia", "warning");
        return;
    }
    if (TipoContrato == 0) {
        swal("Atención!", "Seleccionar el Tipo de Contrato", "warning");
        return;
    }

    if (JornadaLaboral == null) {
        swal("Atención!", "Ingresar la Jornada Laboral", "warning");
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


    if (RemuneracionBruta == 0) {
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


    var datax = $("#frmempleo").serializeArray();
    $.ajax({
        method: "POST",
        url: "" + base_url + "/empresaempleoregistroadmin/registrarempleoEmpresa",
        data: datax

    }).done(function() {
        //swal("Atención!", "TERMINADO", "warning");
        window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin/" + idEmpresa + "";
    });
}