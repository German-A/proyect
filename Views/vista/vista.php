<?php head($data); ?>

<style>
    .contenedor {
        max-width: 1200px;
        margin: auto;
    }

    td {
        padding: 4px 2px;
    }
</style>



<br>
<div class="contenedor">

    <!-- formulario 1 - Informe Estadistico Anual y Semestral de Inserción Laboral -->

    <h1>ESCUELA PROFESIONAL - PREGRADO</h1>
    <H3>Informe Estadisticó Anual sobre el Estado de los Egresados, Graduados y Titulados</H3>

    <div class="col-12">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="carrera">Escuela Profesional<span class="text-danger">*</span></label>
                <select class="carrera form-control selectmultiple" name="carrera[]" data-live-search="true" id="carrera" x>
                    <option value="0" selected>Seleccionar</option>
                </select>
            </div>



            <div class="form-group col-md-4">
                <div class="row">
                    <div class="col-6">
                        <label for="nombreempresa">Cohorte <span class="text-danger">*</span></label>
                        <select class="select2 form-control" name="fechaInicio[]" data-live-search="true" id="fechaInicio" x>
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
                    <div class="col-6">
                        <label for="nombreempresa"> <span class="text-danger"></span></label>
                        <select class="select2 form-control" name="fechaFin[]" data-live-search="true" id="fechaFin" x>
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
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <label for="ingresantesPromocion">N° de Ingresantes por Promoción <span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="ingresantesPromocion" name="ingresantesPromocion" required>
            </div>

            <div class="form-group col-md-2">
                <label for="egresadosPromocion">N° de <br> Egresados<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="egresadosPromocion" name="egresadosPromocion" required>
            </div>

            <div class="form-group col-md-2">
                <label for="tiempoEsperando">N° de Egresados en el Tiempo Esperado<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="tiempoEsperando" name="tiempoEsperando" required>
            </div>

            <div class="form-group col-md-2">
                <label for="cantidadGraduados">N° de Egresados Graduados<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="cantidadGraduados" name="cantidadGraduados" required>
            </div>

            <div class="form-group col-md-2">
                <label for="cantidadTitulados">Cantidad de <br>Titulados<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="cantidadTitulados" name="cantidadTitulados" required>
            </div>

            <div class="form-group col-md-12">
                <label for="observaciones">Observaciones<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="observaciones" name="observaciones" required>
            </div>

            <div class="form-group col-md-12">
                <label for="tomaDesiciones">Toma de desiciones<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="tomaDesiciones" name="tomaDesiciones" required>
            </div>

        </div>


    </div>



    <!-- formulario 2 - Informe Estadistico Anual y Semestral de Inserción Laboral -->
    <br><br><br>


    <div class="col-12">

        <h2>Informe Semestral y Anual sobre la Evaluación de Resultados de Planes de Accion</h2>

        <br>
        <div class="row">
            <div class="col-md-2">
                <label for="añoysemestre">Año y <br> Semestre<span class="text-danger">*</span></label>
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
            </div>

            <div class="form-group col-md-5">
                <label for="egresadosConsejoUniversiatario">Representación de Egresados en el Consejo de <br>Facultad y Consejo Universitario<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="egresadosConsejoUniversiatario[]" data-live-search="true" id="egresadosConsejoUniversiatario" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="egresadosConsejoUniversiatarioO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="programasEducacionContinua">Programas de educación<br> continua<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="programasEducacionContinua[]" data-live-search="true" id="programasEducacionContinua" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="programasEducacionContinuaO" rows="2"></textarea>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-3">
                <label for="asociacionEegresados">Asociacion de <br>Egresados<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="asociacionEegresados[]" data-live-search="true" id="asociacionEegresados" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="asociacionEegresadosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="asociacionEegresadosO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-3">
                <label for="reconocimientoEgresados">Premiacion o reconocimiento a <br> Egresados destacados<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="reconocimientoEgresados[]" data-live-search="true" id="reconocimientoEgresados" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="reconocimientoEgresadosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="reconocimientoEgresadosO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="desarrolloInvestigaciones">Participacion en el desarrollo de investigaciones basicas y aplicadas de <br>interés local, regional nacional e internacional<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="desarrolloInvestigaciones[]" data-live-search="true" id="desarrolloInvestigaciones" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="desarrolloInvestigacionesO">OBSERVACIONES (Si no cumplió proponer planes de mejora <br>y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="desarrolloInvestigacionesO" rows="2"></textarea>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-3">
                <label for="resultadosInvestigacion">Publicación de resultados e investigacion<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="resultadosInvestigacion[]" data-live-search="true" id="resultadosInvestigacion" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="resultadosInvestigacionO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="resultadosInvestigacionO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="destacadosInvestigacion">Promoción de la movilidad de egresados que destacan en investigacion<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="destacadosInvestigacion[]" data-live-search="true" id="destacadosInvestigacion" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="destacadosInvestigacionO">OBSERVACIONES (Si no cumplió proponer planes de <br>mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="destacadosInvestigacionO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-3">
                <label for="entreOtros">Entre otros.<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="entreOtros[]" data-live-search="true" id="entreOtros" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="entreOtrosO" rows="2"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="tiempoEsperando">Participación como grupo de interés en los procesos de:<span class="text-danger">*</span></label>
                <br>
                <label for="educacionContinua">
                    <li>Revisión periódica de sus politicas y objetivos institucionales<span class="text-danger">*</span></li>
                </label><br>

                <label for="educacionContinua">
                    <li>Revisión de la pertinencia del perfil del Egresado<span class="text-danger">*</span></li>
                </label><br>
                <label for="educacionContinua">
                    <li>Revisión, evaluación y actualización de los currículos<span class="text-danger">*</span></li>
                </label><br>
                <label for="educacionContinua">
                    <li>Otros<span class="text-danger">*</span></li>
                </label><br>
                <select class="select2 form-control" name="participacionProcesos[]" data-live-search="true" id="participacionProcesos" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="egresadosConsejo">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="participacionProcesosO" rows="2"></textarea>

            </div>




        </div>
    </div>



    <!-- formulario 3 - Informe Estadistico Anual y Semestral de Inserción Laboral -->
    <br><br><br>



    <div class="col-12">

        <h2>Informe Estadistico Anual y Semestral de Inserción Laboral</h2>
        <br>

        <div class="row">
            <div class="col-md-3">
                <label for="totalEgresados">Total de Egresados<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="totalEgresados" name="totalEgresados" required>
            </div>

            <div class="col-md-3">
                <label for="laboranCampo">Laboran en el campo de su Carrera<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="laboranCampo" name="laboranCampo" required>
            </div>

            <div class="col-md-3">
                <label for="noLaboranCampo">No laboran en el campo de su carrera<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="noLaboranCampo" name="noLaboranCampo" required>
            </div>

            <div class="col-md-3">
                <label for="laboranDependientes">Labora forma dependiente<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="laboranDependientes" name="laboranDependientes" required>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <label for="laboranIndependientes">Labora forma independiente<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="laboranIndependientes" name="laboranIndependientes" required>
            </div>

            <div class="col-md-3">
                <label for="nombrado">Nombrado<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="nombrado" name="nombrado" required>
            </div>

            <div class="col-md-3">
                <label for="contratado">Contratado<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="contratado" name="contratado" required>
            </div>

            <div class="col-md-3">
                <label for="sectorPublico">Sector Público<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="sectorPublico" name="sectorPublico" required>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <label for="sectorPrivado">Sector Privado<span class="text-danger">*</span></label>
                <input type="text" class="form-control" onchange="buscar()" id="sectorPrivado" name="sectorPrivado" required>
            </div>

            <div class="col-md-9">
                <label for="comentarios">Comentarios<span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="comentarios" rows="2"></textarea>
            </div>

        </div>

    </div>


</div>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <a href="javascript:void(0)" class="btn btn-success" onclick="enviar()">EXPORTAR INFORME</a>
        </div>

    </div>

</div>







<?php footer($data); ?>

<script>
    //get Idiomas
    $(".select2").select2({

    });

    function descargarpdf(response) {
        var blob = new Blob([response], {
            type: 'application/pdf'
        });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = "report.pdf";
        link.click();

    }

    function enviar() {

        /*FORMULARIO 1*/
        var carrera = $("#carrera").val();
        var fechaInicio = $("#fechaInicio").val();
        var fechaFin = $("#fechaFin").val();
        var ingresantesPromocion = $("#ingresantesPromocion").val();
        var egresadosPromocion = $("#egresadosPromocion").val();

        var tiempoEsperando = $("#tiempoEsperando").val();
        var cantidadGraduados = $("#cantidadGraduados").val();
        var cantidadTitulados = $("#cantidadTitulados").val();
        var observaciones = $("#observaciones").val();
        var tomaDesiciones = $("#tomaDesiciones").val();


        // if (carrera == 0) {
        //     swal("Atención!", "Seleccionar Carrera", "warning");
        //     return;
        // }

        // if (fechaInicio == 0) {
        //     swal("Atención!", "Seleccionar fecha de cohorte Inicial", "warning");
        //     return;
        // }

        // if (fechaFin == 0) {
        //     swal("Atención!", "Seleccionar fecha de cohorte Final", "warning");
        //     return;
        // }

        // if (ingresantesPromocion == '') {
        //     swal("Atención!", "Debe ingresar los ingresantes por Promoción", "warning");
        //     return;
        // }

        // if (egresadosPromocion == '') {
        //     swal("Atención!", "Debe ingresar el numero de Egresados", "warning");
        //     return;
        // }

        // if (tiempoEsperando == '') {
        //     swal("Atención!", "N° de egresados en el Tiempo esperado", "warning");
        //     return;
        // }

        // if (cantidadGraduados == '') {
        //     swal("Atención!", "N° de egresados de egresados Graduados", "warning");
        //     return;
        // }

        // if (cantidadTitulados == '') {
        //     swal("Atención!", "N° de egresados de egresados Graduados Titulados", "warning");
        //     return;
        // }

        // if (observaciones == '') {
        //     swal("Atención!", "Ingresar las Observaciones", "warning");
        //     return;
        // }

        // if (tomaDesiciones == '') {
        //     swal("Atención!", "Ingresar la tomas de Desiciones", "warning");
        //     return;
        // }





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

        if (egresadosConsejoUniversiatarioO == '') {
            swal("Atención!", "egresadosConsejoUniversiatarioO", "warning");
            return;
        }

        if (programasEducacionContinua == 0) {
            swal("Atención!", "programasEducacionContinua", "warning");
            return;
        }

        if (programasEducacionContinuaO == '') {
            swal("Atención!", "programasEducacionContinuaO", "warning");
            return;
        }

        if (asociacionEegresados == 0) {
            swal("Atención!", "asociacionEegresados", "warning");
            return;
        }

        if (asociacionEegresadosO == '') {
            swal("Atención!", "asociacionEegresadosO", "warning");
            return;
        }

        if (reconocimientoEgresados == 0) {
            swal("Atención!", "reconocimientoEgresados", "warning");
            return;
        }

        if (reconocimientoEgresadosO == '') {
            swal("Atención!", "reconocimientoEgresadosO", "warning");
            return;
        }

        if (desarrolloInvestigaciones == 0) {
            swal("Atención!", "desarrolloInvestigaciones", "warning");
            return;
        }

        if (desarrolloInvestigacionesO == '') {
            swal("Atención!", "desarrolloInvestigacionesO", "warning");
            return;
        }

        if (resultadosInvestigacion == 0) {
            swal("Atención!", "resultadosInvestigacion", "warning");
            return;
        }

        if (resultadosInvestigacionO == '') {
            swal("Atención!", "resultadosInvestigacionO", "warning");
            return;
        }

        if (destacadosInvestigacion == 0) {
            swal("Atención!", "destacadosInvestigacion", "warning");
            return;
        }

        if (destacadosInvestigacionO == '') {
            swal("Atención!", "destacadosInvestigacionO", "warning");
            return;
        }

        if (entreOtros == 0) {
            swal("Atención!", "entreOtros", "warning");
            return;
        }

        if (entreOtrosO == '') {
            swal("Atención!", "entreOtrosO", "warning");
            return;
        }


        if (participacionProcesos == 0) {
            swal("Atención!", "participacionProcesos", "warning");
            return;
        }

        if (participacionProcesosO == '') {
            swal("Atención!", "participacionProcesosO", "warning");
            return;
        }









        /*FORMULARIO 3*/
        var totalEgresados = $("#totalEgresados").val();
        var laboranCampo = $("#laboranCampo").val();
        var noLaboranCampo = $("#noLaboranCampo").val();
        var laboranDependientes = $("#laboranDependientes").val();
        var laboranIndependientes = $("#laboranIndependientes").val();
        var nombrado = $("#nombrado").val();
        var contratado = $("#contratado").val();
        var sectorPublico = $("#sectorPublico").val();
        var sectorPrivado = $("#sectorPrivado").val();
        var comentarios = $("#comentarios").val();

        if (totalEgresados == '') {
            swal("Atención!", "totalEgresados", "warning");
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
        /*FORMULARIO 1*/
        fd.append("carrera", carrera);
        fd.append("fechaInicio", fechaInicio);
        fd.append("fechaFin", fechaFin);
        fd.append("ingresantesPromocion", ingresantesPromocion);
        fd.append("egresadosPromocion", egresadosPromocion);

        fd.append("tiempoEsperando", tiempoEsperando);
        fd.append("cantidadGraduados", cantidadGraduados);
        fd.append("cantidadTitulados", cantidadTitulados);
        fd.append("observaciones", observaciones);
        fd.append("tomaDesiciones", tomaDesiciones);


        /*FORMULARIO 2*/

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


        /*FORMULARIO 3*/

        fd.append("totalEgresados", totalEgresados);
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
            url: "" + base_url + "/vista/informeAnual",
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
</script>