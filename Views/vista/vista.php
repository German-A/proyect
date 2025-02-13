<?php head($data); ?>

<style>
    .contenedor {
        max-width: 1200px;
        margin: auto;
    }

    td {
        padding: 4px 2px;
    }

    .borde_preguntas {
        color: black;
        border: 1px solid #C00;
        padding: 8px 20px !important;
    }

    fieldset {
        border: 3px groove #ddd !important;
        padding: 0 1em 1.4em 1.4em !important;
        background-color: #f4f1ed;
        margin-top: 10px;
    }

    legend {
        width: auto;
        background-color: white;
        font-size: 13px !important;
        font-weight: bold !important;
        padding: 0 10px;
    }
    .tamaño{

        max-width: 100px ;
        margin: auto;

    }
</style>
<br><br></br>

<div class="col-12">
<div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.pinimg.com/736x/d6/65/cb/d665cb4fb1a3459389ecfa73befe5d3b.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= media(); ?>/img/k2024.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<br><br><br><br>



<?php footer($data); ?>

<script>
    //get Idiomas
    $(".select2").select2({});

    function descargarpdf(response) {
        var blob = new Blob([response], {
            type: 'application/pdf'
        });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = "report.pdf";
        link.click();

    }

    function formato1() {
        /*FORMULARIO 1*/
        var carrera = $("#carrera").val();
        var anioEgreso = $("#anioEgreso").val();
        var fechaInicio = $("#fechaInicio").val();
        var fechaFin = $("#fechaFin").val();
        var ingresantesPromocion = $("#ingresantesPromocion").val();
        var egresadosPromocion = $("#egresadosPromocion").val();

        var tiempoEsperando = $("#tiempoEsperando").val();
        var cantidadGraduados = $("#cantidadGraduados").val();
        var cantidadTitulados = $("#cantidadTitulados").val();
        var observaciones = $("#observaciones").val();
        var tomaDesiciones = $("#tomaDesiciones").val();


        if (carrera == 0) {
            swal("Atención!", "Seleccionar Carrera", "warning");
            return;
        }

        if (anioEgreso == 0) {
            swal("Atención!", "Seleccionar el año de egreso", "warning");
            return;
        }


        if (fechaInicio == 0) {
            swal("Atención!", "Seleccionar fecha de cohorte Inicial", "warning");
            return;
        }

        if (fechaFin == 0) {
            swal("Atención!", "Seleccionar fecha de cohorte Final", "warning");
            return;
        }

        if (ingresantesPromocion == '') {
            swal("Atención!", "Debe ingresar los ingresantes por Promoción", "warning");
            return;
        }

        if (egresadosPromocion == '') {
            swal("Atención!", "Debe ingresar el numero de Egresados", "warning");
            return;
        }

        if (tiempoEsperando == '') {
            swal("Atención!", "N° de egresados en el Tiempo esperado", "warning");
            return;
        }

        if (cantidadGraduados == '') {
            swal("Atención!", "N° de egresados de egresados Graduados", "warning");
            return;
        }

        if (cantidadTitulados == '') {
            swal("Atención!", "N° de egresados de egresados Graduados Titulados", "warning");
            return;
        }

        var fd = new FormData();
        /*FORMULARIO 1*/
        fd.append("carrera", carrera);
        fd.append("anioEgreso", anioEgreso);
        fd.append("fechaInicio", fechaInicio);
        fd.append("fechaFin", fechaFin);
        fd.append("ingresantesPromocion", ingresantesPromocion);
        fd.append("egresadosPromocion", egresadosPromocion);

        fd.append("tiempoEsperando", tiempoEsperando);
        fd.append("cantidadGraduados", cantidadGraduados);
        fd.append("cantidadTitulados", cantidadTitulados);
        fd.append("observaciones", observaciones);
        fd.append("tomaDesiciones", tomaDesiciones);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/vista/informe1",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            xhrFields: {
                responseType: 'blob'
            },

        }).done(function(response) {
            descargarpdf(response);

        });
    }

    function formato2() {

        var carreraf2 = $("#carreraf2").val();
        /*FORMULARIO 2*/
        var añoysemestre = $("#añoysemestre").val();
        var egresadosConsejoUniversiatario = $("#egresadosConsejoUniversiatario").val();
        var egresadosConsejoUniversiatarioO = $("#egresadosConsejoUniversiatarioO").val();
        
        var programasEducacionContinua = $("#programasEducacionContinua").val();
        var programasEducacionContinuaO = $("#programasEducacionContinuaO").val();

        var asociacionEegresados = $("#asociacionEegresados").val();
        var asociacionEegresadosO = $("#asociacionEegresadosO").val();

        var reconocimientoEgresados = $("#reconocimientoEgresados").val();
        var reconocimientoEgresadosO = $("#reconocimientoEgresadosO").val();

        var desarrolloInvestigaciones = $("#desarrolloInvestigaciones").val();
        var desarrolloInvestigacionesO = $("#desarrolloInvestigacionesO").val();

        var resultadosInvestigacion = $("#resultadosInvestigacion").val();
        var resultadosInvestigacionO = $("#resultadosInvestigacionO").val();

        var destacadosInvestigacion = $("#destacadosInvestigacion").val();
        var destacadosInvestigacionO = $("#destacadosInvestigacionO").val();

        var entreOtros = $("#entreOtros").val();
        var entreOtrosO = $("#entreOtrosO").val();

        var participacionProcesos = $("#participacionProcesos").val();
        var participacionProcesosO = $("#participacionProcesosO").val();


        if (añoysemestre == 0) {
            swal("Atención!", "Debe seleccionar el Semestre", "warning");
            return;
        }

        if (egresadosConsejoUniversiatario == 0) {
            swal("Atención!", "egresadosConsejoUniversiatario", "warning");
            return;
        }


        if (programasEducacionContinua == 0) {
            swal("Atención!", "programasEducacionContinua", "warning");
            return;
        }

        if (asociacionEegresados == 0) {
            swal("Atención!", "asociacionEegresados", "warning");
            return;
        }


        if (reconocimientoEgresados == 0) {
            swal("Atención!", "reconocimientoEgresados", "warning");
            return;
        }


        if (desarrolloInvestigaciones == 0) {
            swal("Atención!", "desarrolloInvestigaciones", "warning");
            return;
        }


        if (resultadosInvestigacion == 0) {
            swal("Atención!", "resultadosInvestigacion", "warning");
            return;
        }

        if (destacadosInvestigacion == 0) {
            swal("Atención!", "destacadosInvestigacion", "warning");
            return;
        }

        if (entreOtros == 0) {
            swal("Atención!", "entreOtros", "warning");
            return;
        }

        if (participacionProcesos == 0) {
            swal("Atención!", "participacionProcesos", "warning");
            return;
        }

        var fd = new FormData();
        /*FORMULARIO 1*/
        /*FORMULARIO 2*/
        fd.append("carreraf2", carreraf2);
        fd.append("añoysemestre", añoysemestre);
        fd.append("egresadosConsejoUniversiatario", egresadosConsejoUniversiatario);
        fd.append("egresadosConsejoUniversiatarioO", egresadosConsejoUniversiatarioO);
        fd.append("programasEducacionContinua", programasEducacionContinua);
        fd.append("programasEducacionContinuaO", programasEducacionContinuaO);
        fd.append("asociacionEegresados", asociacionEegresados);
        fd.append("asociacionEegresadosO", asociacionEegresadosO);
        fd.append("reconocimientoEgresados", reconocimientoEgresados);
        fd.append("reconocimientoEgresadosO", reconocimientoEgresadosO);

        fd.append("desarrolloInvestigaciones", desarrolloInvestigaciones);
        fd.append("desarrolloInvestigacionesO", desarrolloInvestigacionesO);
        fd.append("resultadosInvestigacion", resultadosInvestigacion);
        fd.append("resultadosInvestigacionO", resultadosInvestigacionO);

        fd.append("destacadosInvestigacion", destacadosInvestigacion);
        fd.append("destacadosInvestigacionO", destacadosInvestigacionO);
        fd.append("entreOtros", entreOtros);
        fd.append("entreOtrosO", entreOtrosO);
        fd.append("participacionProcesos", participacionProcesos);
        fd.append("participacionProcesosO", participacionProcesosO);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/vista/informe2",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            xhrFields: {
                responseType: 'blob'
            },

        }).done(function(response) {
            descargarpdf(response);

        });
    }

    function formato3() {

        var carreraf3 = $("#carreraf3").val();
        var añoysemestref3 = $("#añoysemestref3").val();

        /*FORMULARIO 3*/
        var laboranCampo = $("#laboranCampo").val();
        var noLaboranCampo = $("#noLaboranCampo").val();
        var laboranDependientes = $("#laboranDependientes").val();
        var laboranIndependientes = $("#laboranIndependientes").val();
        var nombrado = $("#nombrado").val();
        var contratado = $("#contratado").val();
        var sectorPublico = $("#sectorPublico").val();
        var sectorPrivado = $("#sectorPrivado").val();
        var comentarios = $("#comentarios").val();


        if (carreraf3 == 0) {
            swal("Atención!", "Seleccionar Carrera", "warning");
            return;
        }

        if (añoysemestref3 > 0) {
            swal("Atención!", "año y semestre", "warning");
            return;
        }

        if (laboranCampo == '') {
            swal("Atención!", "laboranCampo", "warning");
            return;
        }

        if (noLaboranCampo == '') {
            swal("Atención!", "noLaboranCampo", "warning");
            return;
        }

        if (laboranDependientes == '') {
            swal("Atención!", "laboranDependientes", "warning");
            return;
        }

        if (laboranIndependientes == '') {
            swal("Atención!", "laboranIndependientes", "warning");
            return;
        }

        if (nombrado == '') {
            swal("Atención!", "nombrado", "warning");
            return;
        }

        if (contratado == '') {
            swal("Atención!", "contratado", "warning");
            return;
        }

        if (sectorPublico == '') {
            swal("Atención!", "sectorPublico", "warning");
            return;
        }

        if (sectorPrivado == '') {
            swal("Atención!", "sectorPrivado", "warning");
            return;
        }
        if (comentarios == '') {
            swal("Atención!", "comentarios", "warning");
            return;
        }

        var fd = new FormData();
        /*FORMULARIO 3*/

        fd.append("carreraf3", carreraf3);
        fd.append("añoysemestref3", añoysemestref3);
        fd.append("laboranCampo", laboranCampo);
        fd.append("noLaboranCampo", noLaboranCampo);
        fd.append("laboranDependientes", laboranDependientes);
        fd.append("laboranIndependientes", laboranIndependientes);

        fd.append("nombrado", nombrado);
        fd.append("contratado", contratado);
        fd.append("sectorPublico", sectorPublico);
        fd.append("sectorPrivado", sectorPrivado);
        fd.append("comentarios", comentarios);




        $.ajax({
            method: "POST",
            url: "" + base_url + "/vista/informe3",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            xhrFields: {
                responseType: 'blob'
            },

        }).done(function(response) {
            descargarpdf(response);

        });
    }

    function formato4() {

        var carreraf4 = $("#carreraf4").val();
        /*FORMULARIO 2*/
        var añoysemestref4 = $("#añoysemestref4").val();

        var feriaslaborales = $("#feriaslaborales").val();
        var feriaslaboralesO = $("#feriaslaboralesO").val();

        var showroom = $("#showroom").val();
        var showroomO = $("#showroomO").val();

        var empleabilidad = $("#empleabilidad").val();
        var empleabilidadO = $("#empleabilidadO").val();

        var bolsalaboral = $("#bolsalaboral").val();
        var bolsalaboralO = $("#bolsalaboralO").val();

        var redessociales = $("#redessociales").val();
        var redessocialesO = $("#redessocialesO").val();

        var otros = $("#otros").val();
        var otrosO = $("#otrosO").val();


        if (carreraf4 == 0) {
            swal("Atención!", "Seleccionar Carrera", "warning");
            return;
        }

        if (añoysemestref4 == 0) {
            swal("Atención!", "Debe seleccionar el Semestre", "warning");
            return;
        }

        if (feriaslaborales == 0) {
            swal("Atención!", "feriaslaborales", "warning");
            return;
        }

        if (showroom == 0) {
            swal("Atención!", "showroom", "warning");
            return;
        }

        if (empleabilidad == 0) {
            swal("Atención!", "empleabilidad", "warning");
            return;
        }


        if (bolsalaboral == 0) {
            swal("Atención!", "bolsalaboral", "warning");
            return;
        }


        if (redessociales == 0) {
            swal("Atención!", "redessociales", "warning");
            return;
        }


        if (otros == 0) {
            swal("Atención!", "otros", "warning");
            return;
        }

        var fd = new FormData();
        /*FORMULARIO 1*/
        /*FORMULARIO 2*/
        fd.append("carreraf4", carreraf4);
        fd.append("añoysemestref4", añoysemestref4);
        fd.append("feriaslaborales", feriaslaborales);
        fd.append("feriaslaboralesO", feriaslaboralesO);
        fd.append("showroom", showroom);
        fd.append("showroomO", showroomO);
        fd.append("empleabilidad", empleabilidad);
        fd.append("empleabilidadO", empleabilidadO);
        fd.append("bolsalaboral", bolsalaboral);
        fd.append("bolsalaboralO", bolsalaboralO);

        fd.append("redessociales", redessociales);
        fd.append("redessocialesO", redessocialesO);
        fd.append("otros", otros);
        fd.append("otrosO", otrosO);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/vista/informe4",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            xhrFields: {
                responseType: 'blob'
            },

        }).done(function(response) {
            descargarpdf(response);

        });
    }

    function formato5() {

        var carreraf4 = $("#carreraf4").val();
        /*FORMULARIO 2*/
        var añoysemestref4 = $("#añoysemestref4").val();

        var feriaslaborales = $("#feriaslaborales").val();
        var feriaslaboralesO = $("#feriaslaboralesO").val();

        var showroom = $("#showroom").val();
        var showroomO = $("#showroomO").val();

        var empleabilidad = $("#empleabilidad").val();
        var empleabilidadO = $("#empleabilidadO").val();

        var bolsalaboral = $("#bolsalaboral").val();
        var bolsalaboralO = $("#bolsalaboralO").val();

        var redessociales = $("#redessociales").val();
        var redessocialesO = $("#redessocialesO").val();

        var otros = $("#otros").val();
        var otrosO = $("#otrosO").val();


        if (carreraf4 == 0) {
            swal("Atención!", "Seleccionar Carrera", "warning");
            return;
        }

        if (añoysemestref4 == 0) {
            swal("Atención!", "Debe seleccionar el Semestre", "warning");
            return;
        }

        if (feriaslaborales == 0) {
            swal("Atención!", "feriaslaborales", "warning");
            return;
        }

        if (showroom == 0) {
            swal("Atención!", "showroom", "warning");
            return;
        }

        if (empleabilidad == 0) {
            swal("Atención!", "empleabilidad", "warning");
            return;
        }


        if (bolsalaboral == 0) {
            swal("Atención!", "bolsalaboral", "warning");
            return;
        }


        if (redessociales == 0) {
            swal("Atención!", "redessociales", "warning");
            return;
        }


        if (otros == 0) {
            swal("Atención!", "otros", "warning");
            return;
        }

        var fd = new FormData();
        /*FORMULARIO 1*/
        /*FORMULARIO 2*/
        fd.append("carreraf4", carreraf4);
        fd.append("añoysemestref4", añoysemestref4);
        fd.append("feriaslaborales", feriaslaborales);
        fd.append("feriaslaboralesO", feriaslaboralesO);
        fd.append("showroom", showroom);
        fd.append("showroomO", showroomO);
        fd.append("empleabilidad", empleabilidad);
        fd.append("empleabilidadO", empleabilidadO);
        fd.append("bolsalaboral", bolsalaboral);
        fd.append("bolsalaboralO", bolsalaboralO);

        fd.append("redessociales", redessociales);
        fd.append("redessocialesO", redessocialesO);
        fd.append("otros", otros);
        fd.append("otrosO", otrosO);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/vista/informe4",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            xhrFields: {
                responseType: 'blob'
            },

        }).done(function(response) {
            descargarpdf(response);

        });
    }

    function verArchivo(id) {

        var expresion = id;

        console.log(expresion);

        switch (expresion) {
            case 1:
                var informe1 = `
                <section class="col-12">

                    <H3>Informe estadístico anual sobre el estado de los egresados, graduados y titulados</H3>

                    <div class="row form-group">
                        <!-- Escuela Profesional y Año de Egreso -->
                        <div class="col-md-8">

                            <fieldset>
                                <legend>Escuela Profesional <label for="anioEgreso"><span class="col-form-label text-danger">*</span></label></legend>
                                <select class="carrera form-control selectmultiple" name="carrera" data-live-search="true" id="carrera" x>
                                    <option value="0" selected>Seleccionar</option>
                                </select>
                            </fieldset>

                            <fieldset>
                                <legend>Año de Egreso <label for="anioEgreso"><span class="col-form-label text-danger">*</span></label></legend>
                                <select class="select2 form-control" name="anioEgreso" data-live-search="true" id="anioEgreso" x>
                                    <option value="0" selected>Seleccionar</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </fieldset>

                        </div>

                        <!-- cohorte -->
                        <div class="col-md-4">

                            <fieldset>
                                <legend>Cohorte <label for="anioEgreso"><span class="col-form-label text-danger">*</span></label></legend>
                                <!-- desde -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="select2 form-control" name="fechaInicio" data-live-search="true" id="fechaInicio" x>
                                            <option value="0" selected>Desde</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- hasta -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="select2 form-control" name="fechaFin" data-live-search="true" id="fechaFin" x>
                                            <option value="0" selected>Hasta</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </div>

                    <!-- DATOS y observaciones-->
                    <fieldset>
                        <legend>Datos <label for="anioEgreso"><span class="col-form-label text-danger">*</span></label></legend>


                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="ingresantesPromocion">N° de Ingresantes por Promoción <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="ingresantesPromocion" name="ingresantesPromocion" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="egresadosPromocion">N° de Egresados<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="egresadosPromocion" name="egresadosPromocion" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tiempoEsperando">N° de Egresados en el Tiempo Esperado<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="tiempoEsperando" name="tiempoEsperando" required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="cantidadGraduados">N° de Egresados Graduados<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="cantidadGraduados" name="cantidadGraduados" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cantidadTitulados">Cantidad de Titulados<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="cantidadTitulados" name="cantidadTitulados" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="observaciones">Observaciones</label>
                                <textarea class="form-group col-md-12" name="" id="observaciones" rows="2"></textarea>
                            </div>


                        </div>

                        <div class="row">

                            <div class="form-group col-md-9">
                                <label for="tomaDesiciones">Toma de desiciones</label>
                                <textarea class="form-group col-md-12" name="" id="tomaDesiciones" rows="2"></textarea>
                            </div>
                            <div class="col-md-3 align-self-center">
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success" onclick="formato1()">DESCARGAR</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>




                    </section>
                    <br><br><br>
                `;

                $(".libro").html(informe1);
                $(".select2").select2({});



                break;
            case 2:
                var informe2 = `
                    <section class="col-12">

                    <h2>Informe semestral y anual sobre la evaluación de resultados de planes de acción</h2>

                    <div class="row">
                        <div class="col-md-9">
                            <fieldset>
                                <legend>Escuela Profesional<span class="text-danger">*</span> <label for="anioEgreso"><span class="col-form-label text-danger">*</span></label></legend>
                                <div class="form-group">
                                    <select class="carrera form-control selectmultiple" name="carreraf2" data-live-search="true" id="carreraf2" x>
                                        <option value="0" selected>Seleccionar</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-3">
                            <fieldset>
                                <legend>Semestre<span class="text-danger">*</span> <label for="anioEgreso"><span class="col-form-label text-danger">*</span></label></legend>
                                <select class="select2 form-control" data-live-search="true" id="añoysemestre">
                                    <option value="0" selected>Seleccionar</option>
                                    <option value="2018-I">2018-I</option>
                                    <option value="2018-II">2018-II</option>
                                    <option value="2019-I">2019-I</option>
                                    <option value="2019-II">2019-II</option>
                                    <option value="2020-I">2020-I</option>
                                    <option value="2020-II">2020-II</option>
                                    <option value="2021-I">2021-I</option>
                                    <option value="2021-II">2021-II</option>
                                    <option value="2022-I">2022-I</option>
                                    <option value="2022-II">2022-II</option>
                                    <option value="2023-I">2023-I</option>
                                    <option value="2023-II">2023-II</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Representación de Egresados en el Consejo de Facultad y Consejo Universitario<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="egresadosConsejo">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="egresadosConsejoUniversiatario[]" data-live-search="true" id="egresadosConsejoUniversiatario" x>
                                            <option value="0" selected></option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="" id="egresadosConsejoUniversiatarioO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Programas de Educación Continua<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="programasEducacionContinua">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="programasEducacionContinua" data-live-search="true" id="programasEducacionContinua" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="programasEducacionContinuaO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="" id="programasEducacionContinuaO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Asociación de Egresados<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="egresadosConsejo">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="asociacionEegresados[]" data-live-search="true" id="asociacionEegresados" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="asociacionEegresadosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="asociacionEegresadosO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Premiación o reconocimiento a <br> Egresados destacados<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="reconocimientoEgresados">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="reconocimientoEgresados[]" data-live-search="true" id="reconocimientoEgresados" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="reconocimientoEgresadosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="reconocimientoEgresadosO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Participación en el desarrollo de investigaciones básicas y aplicadas de <br>interés local, regional nacional e internacional<span class="text-danger">*</span></legend>

                                <div class="row">

                                    <div class="col-md-3 align-self-center">
                                        <label for="desarrolloInvestigaciones">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="desarrolloInvestigaciones[]" data-live-search="true" id="desarrolloInvestigaciones" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="desarrolloInvestigacionesO">OBSERVACIONES (Si no cumplió proponer planes de mejora <br>y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="desarrolloInvestigacionesO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Publicación de resultados e investigación<span class="text-danger">*</span></legend>
                                <div class="row">

                                    <div class="col-md-3 align-self-center">
                                        <label for="desarrolloInvestigaciones">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="resultadosInvestigacion[]" data-live-search="true" id="resultadosInvestigacion" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="resultadosInvestigacionO">OBSERVACIONES (Si no cumplió proponer planes de mejora <br>y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="resultadosInvestigacionO" rows="2"></textarea>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Promoción de la movilidad de egresados que destacan en investigación<span class="text-danger">*</span></legend>
                                <div class="row">

                                    <div class="col-md-3 align-self-center">
                                        <label for="desarrolloInvestigaciones">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="destacadosInvestigacion[]" data-live-search="true" id="destacadosInvestigacion" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="destacadosInvestigacionO">OBSERVACIONES (Si no cumplió proponer planes de <br>mejora y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="destacadosInvestigacionO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>


                        <div class="col-md-6">
                            <fieldset>
                                <legend>Entre otros.<span class="text-danger">*</span></legend>
                                <div class="row">

                                    <div class="col-md-3 align-self-center">
                                        <label for="desarrolloInvestigaciones">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="entreOtros[]" data-live-search="true" id="entreOtros" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-9">
                                        <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="entreOtrosO" rows="2"></textarea>
                                    </div>

                                </div>

                            </fieldset>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10">

                            <fieldset>
                                <legend>Participación como grupo de interés en los procesos de:<span class="text-danger">*</span></legend>
                                <div class="row">

                                    <div class="col-md-5 align-self-center">

                                        <label for="educacionContinua">
                                            <li>Revisión periódica de sus políticas y objetivos institucionales<span class="text-danger">*</span></li>
                                        </label><br>

                                        <label for="educacionContinua">
                                            <li>Revisión de la pertinencia del perfil del Egresado<span class="text-danger">*</span></li>
                                        </label><br>
                                        <label for="educacionContinua">
                                            <li>Revisión, evaluación y actualización de los currículos<span class="text-danger">*</span></li>
                                        </label><br>
                                        <label for="educacionContinua">
                                            <li>Otros</li>
                                        </label><br>

                                    </div>

                                    <div class="col-md-7">
                                        <label for="desarrolloInvestigaciones">Seleccionar<span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="participacionProcesos[]" data-live-search="true" id="participacionProcesos" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>

                                        <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                                        <textarea class="form-group col-md-12" name="" id="participacionProcesosO" rows="2"></textarea>
                                    </div>

                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-2 align-self-center">
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-success" onclick="formato2()">DESCARGAR</a>
                            </div>
                        </div>
                    </div>

                    </section>
                `;

                $(".libro").html(informe2);
                $(".select2").select2({});

                break;
            case 3:
                var informe3 = `
                <section class="col-12">

                    <h2>Informe estadístico anual y semestral de inserción laboral</h2>
                    <br>


                    <div class="row">
                        <div class="col-md-9">
                            <fieldset>
                                <legend>Escuela Profesional<span class="text-danger">*</span></legend>
                                <div class="form-group">
                                    <select class="carrera form-control selectmultiple" name="carreraf3" data-live-search="true" id="carreraf3" x>
                                        <option value="0" selected>Seleccionar</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-3">
                            <fieldset>
                                <legend>Año y Semestre<span class="text-danger">*</span></legend>
                                <select class="select2 form-control" data-live-search="true" id="añoysemestref3">
                                    <option value="0" selected>Seleccionar</option>
                                    <option value="2018-I">2018-I</option>
                                    <option value="2018-II">2018-II</option>
                                    <option value="2019-I">2019-I</option>
                                    <option value="2019-II">2019-II</option>
                                    <option value="2020-I">2020-I</option>
                                    <option value="2020-II">2020-II</option>
                                    <option value="2021-I">2021-I</option>
                                    <option value="2021-II">2021-II</option>
                                    <option value="2022-I">2022-I</option>
                                    <option value="2022-II">2022-II</option>
                                    <option value="2023-I">2023-I</option>
                                    <option value="2023-II">2023-II</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Total de Egresados<span class="text-danger">*</span></legend>
                                <input type="text" class="form-control" id="totalEgresados" name="totalEgresados" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Laboran en el campo de su Carrera<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="laboranCampo" name="laboranCampo" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>No laboran en el campo de su carrera<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="noLaboranCampo" name="noLaboranCampo" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Labora de forma dependiente<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="laboranDependientes" name="laboranDependientes" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Labora de forma independiente<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="laboranIndependientes" name="laboranIndependientes" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Nombrado<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="nombrado" name="nombrado" required>
                            </fieldset>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Contratado<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="contratado" name="contratado" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Sector Público<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="sectorPublico" name="sectorPublico" required>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                <legend>Sector Privado<span class="text-danger">*</span></legend>
                                <input type="number" class="form-control" id="sectorPrivado" name="sectorPrivado" required>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <fieldset>
                                <legend>Comentarios<span class="text-danger">*</span></legend>
                                <textarea class="form-group col-md-12" name="" id="comentarios" rows="2"></textarea>
                            </fieldset>
                        </div>

                        <div class="col-md-4 align-self-center">
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-success" onclick="formato3()">DESCARGAR</a>
                            </div>
                        </div>
                    </div>

                    </section>
                `;

                $(".libro").html(informe3);
                $(".select2").select2({});
                break;
            case 4:
                var informe4 = `
                <section class="col-12">

                    <h2>Informe estadístico semestral y anual de la mejora de la inserción laboral de los egresados</h2>
                    <br>


                    <div class="row">
                        <div class="col-md-9">
                            <fieldset>
                                <legend>Escuela Profesional<span class="text-danger">*</span></legend>
                                <div class="form-group">
                                    <select class="carrera form-control selectmultiple" name="carreraf4" data-live-search="true" id="carreraf4" x>
                                        <option value="0" selected>Seleccionar</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-3">
                            <fieldset>
                                <label for="añoysemestref4">Año y <br> Semestre<span class="text-danger">*</span></label>
                                <select class="select2 form-control" data-live-search="true" id="añoysemestref4">
                                    <option value="0" selected>Seleccionar</option>
                                    <option value="2018-I">2018-I</option>
                                    <option value="2018-II">2018-II</option>
                                    <option value="2019-I">2019-I</option>
                                    <option value="2019-II">2019-II</option>
                                    <option value="2020-I">2020-I</option>
                                    <option value="2020-II">2020-II</option>
                                    <option value="2021-I">2021-I</option>
                                    <option value="2021-II">2021-II</option>
                                    <option value="2022-I">2022-I</option>
                                    <option value="2022-II">2022-II</option>
                                    <option value="2023-I">2023-I</option>
                                    <option value="2023-II">2023-II</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Ferias Laborales<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="feriaslaborales">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="feriaslaborales" data-live-search="true" id="feriaslaborales" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="feriaslaboralesO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="feriaslaboralesO" id="feriaslaboralesO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Programas de educación continua<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="programasEducacionContinua">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="programasEducacionContinua" data-live-search="true" id="programasEducacionContinua" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="programasEducacionContinuaO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="programasEducacionContinuaO" id="programasEducacionContinuaO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Showroom<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="showroom">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="showroom" data-live-search="true" id="showroom" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="programasEducacionContinuaO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="programasEducacionContinuaO" id="programasEducacionContinuaO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Eventos de empleabilidad<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="empleabilidad">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="empleabilidad" data-live-search="true" id="empleabilidad" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="empleabilidadO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="empleabilidadO" id="empleabilidadO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Bolsa Labora<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="bolsalaboral">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="bolsalaboral" data-live-search="true" id="bolsalaboral" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="bolsalaboralO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="" id="bolsalaboralO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>Manejo de redes sociales<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="redessociales">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="redessociales" data-live-search="true" id="redessociales" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="redessocialesO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="redessocialesO" id="redessocialesO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <fieldset>
                                <legend>Otros<span class="text-danger">*</span></legend>
                                <div class="row">
                                    <div class="col-md-3 align-self-center">
                                        <label for="otros">Seleccionar <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="otros" data-live-search="true" id="otros" x>
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="si">Si</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="otrosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</label>
                                        <textarea class="form-group col-md-12" name="" id="otrosO" rows="2"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-success" onclick="formato4()">DESCARGAR</a>
                            </div>
                        </div>
                    </div>

                    </section>

                `;

                $(".libro").html(informe4);
                $(".select2").select2({});
                break;
            default:
                //este código se ejecutará si ninguno de los casos coincide con la expresión
                break;
        }
        $(".select2").select2({});

        $(".carrera").select2({
            ajax: {
                url: " " + base_url + "/solicitudempleo/getCarreras",
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


    }
</script>