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
        border: 4px solid #C00;

    }
</style>


<br>

<div class="">

    <h1>6465</h1>

</div>




<div class="contenedor">

    <!-- formulario 1 - Informe Estadistico Anual y Semestral de Inserción Laboral -->

    <section class="col-12 borde_preguntas">

        <H3>Informe Estadisticó Anual sobre el Estado de los Egresados, Graduados y Titulados</H3>

        <div class="form-group">
            <label for="carrera">Escuela Profesional<span class="text-danger">*</span></label>
            <select class="carrera form-control selectmultiple" name="carrera" data-live-search="true" id="carrera" x>
                <option value="0" selected>Seleccionar</option>
            </select>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="fechaInicio">Desde <span class="col-form-label text-danger">*</span></label>
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

            <div class="col-6">
                <div class="form-group">
                    <label for="fechaFin">Hasta<span class="col-form-label text-danger">*</span></label>
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

        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="anioEgreso">Año de Egreso<span class="col-form-label text-danger">*</span></label>
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

                </div>
            </div>

        </div>
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

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="observaciones">Observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" required>
            </div>

            <div class="form-group col-md-12">
                <label for="tomaDesiciones">Toma de desiciones</label>
                <input type="text" class="form-control" id="tomaDesiciones" name="tomaDesiciones" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <a href="javascript:void(0)" class="btn btn-success" onclick="formato1()">DESCARGAR</a>
                </div>
            </div>
        </div>

    </section>
    <br><br><br>

    <!-- formulario 2 - Informe Estadistico Anual y Semestral de Inserción Laboral -->
    <section class="col-12">

        <h2>Informe Semestral y Anual sobre la Evaluación de Resultados de Planes de Accion</h2>

        <div class="form-group">
            <label for="carreraf2">Escuela Profesional<span class="text-danger">*</span></label>
            <select class="carrera form-control selectmultiple" name="carreraf2" data-live-search="true" id="carreraf2" x>
                <option value="0" selected>Seleccionar</option>
            </select>
        </div>

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

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <a href="javascript:void(0)" class="btn btn-success" onclick="formato2()">DESCARGAR</a>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <br><br><br>

    <!-- formulario 3 - Informe Estadistico Anual y Semestral de Inserción Laboral -->

    <section class="col-12">

        <h2>Informe Estadistico Anual y Semestral de Inserción Laboral</h2>
        <br>

        <div class="form-group">
            <label for="carreraf3">Escuela Profesional<span class="text-danger">*</span></label>
            <select class="carrera form-control selectmultiple" name="carreraf3" data-live-search="true" id="carreraf3" x>
                <option value="0" selected>Seleccionar</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="añoysemestref3">Año y <br> Semestre<span class="text-danger">*</span></label>
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
        </div>


        <div class="row">
            <div class="col-md-3">
                <label for="totalEgresados">Total de Egresados<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="totalEgresados" name="totalEgresados" required>
            </div>

            <div class="col-md-3">
                <label for="laboranCampo">Laboran en el campo de su Carrera<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="laboranCampo" name="laboranCampo" required>
            </div>

            <div class="col-md-3">
                <label for="noLaboranCampo">No laboran en el campo de su carrera<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="noLaboranCampo" name="noLaboranCampo" required>
            </div>

            <div class="col-md-3">
                <label for="laboranDependientes">Labora forma dependiente<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="laboranDependientes" name="laboranDependientes" required>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <label for="laboranIndependientes">Labora forma independiente<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="laboranIndependientes" name="laboranIndependientes" required>
            </div>

            <div class="col-md-3">
                <label for="nombrado">Nombrado<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="nombrado" name="nombrado" required>
            </div>

            <div class="col-md-3">
                <label for="contratado">Contratado<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="contratado" name="contratado" required>
            </div>

            <div class="col-md-3">
                <label for="sectorPublico">Sector Público<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="sectorPublico" name="sectorPublico" required>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <label for="sectorPrivado">Sector Privado<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="sectorPrivado" name="sectorPrivado" required>
            </div>

            <div class="col-md-9">
                <label for="comentarios">Comentarios<span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="comentarios" rows="2"></textarea>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <a href="javascript:void(0)" class="btn btn-success" onclick="formato3()">DESCARGAR</a>
                </div>
            </div>
        </div>


    </section>
    <br><br><br>

    <!-- formulario 4 - Informe Estadistico Semestral y Anual de la mejora de la Inserción Laboral de los Egresados -->

    <section class="col-12">

        <h2>Informe Estadistico Semestral y Anual de la mejora de la Inserción Laboral de los Egresados</h2>
        <br>

        <div class="form-group">
            <label for="carreraf4">Escuela Profesional<span class="text-danger">*</span></label>
            <select class="carrera form-control selectmultiple" name="carreraf4" data-live-search="true" id="carreraf4" x>
                <option value="0" selected>Seleccionar</option>
            </select>
        </div>

        <div class="col-md-2">
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
        </div>

        <div class="row">

            <div class="form-group col-md-5">
                <label for="feriaslaborales">Ferias Laborales<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="feriaslaborales" data-live-search="true" id="feriaslaborales" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="feriaslaboralesO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="feriaslaboralesO" id="feriaslaboralesO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="showroom">Showroom<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="showroom" data-live-search="true" id="showroom" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="showroomO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="showroomO" id="showroomO" rows="2"></textarea>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-5">
                <label for="empleabilidad">Eventos de empleabilidad<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="empleabilidad" data-live-search="true" id="empleabilidad" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="empleabilidadO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="empleabilidadO" id="empleabilidadO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="bolsalaboral">Bolsa Laboral<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="bolsalaboral" data-live-search="true" id="bolsalaboral" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="bolsalaboralO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="bolsalaboralO" rows="2"></textarea>
            </div>

        </div>


        <div class="row">

            <div class="form-group col-md-5">
                <label for="redessociales">Manejo de redes sociales<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="redessociales" data-live-search="true" id="redessociales" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="redessocialesO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="redessocialesO" id="redessocialesO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="otros">Otros<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="otros" data-live-search="true" id="otros" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="otrosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="otrosO" rows="2"></textarea>
            </div>

        </div>





        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <a href="javascript:void(0)" class="btn btn-success" onclick="formato4()">DESCARGAR</a>
                </div>
            </div>
        </div>


    </section>

    <!-- formulario 5 - Informe de logro de los objetivos educacionales -->

    <section class="col-12">

        <h2>Informe de logro de los objetivos educacionales</h2>
        <br>

        <div class="form-group">
            <label for="carreraf5">Escuela Profesional<span class="text-danger">*</span></label>
            <select class="carrera form-control selectmultiple" name="carreraf5" data-live-search="true" id="carreraf5" x>
                <option value="0" selected>Seleccionar</option>
            </select>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="fechaIniciof5">Desde <span class="col-form-label text-danger">*</span></label>
                    <select class="select2 form-control" name="fechaIniciof5" data-live-search="true" id="fechaIniciof5" x>
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

            <div class="col-6">
                <div class="form-group">
                    <label for="fechaFinf5">Hasta<span class="col-form-label text-danger">*</span></label>
                    <select class="select2 form-control" name="fechaFinf5" data-live-search="true" id="fechaFinf5" x>
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

        <div class="col-md-2">
            <label for="añoysemestref5">Año y <br> Semestre<span class="text-danger">*</span></label>
            <select class="select2 form-control" data-live-search="true" id="añoysemestref5">
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

        <div class="row">

            <div class="form-group col-md-5">
                <label for="feriaslaborales">Ferias Laborales<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="feriaslaborales" data-live-search="true" id="feriaslaborales" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="feriaslaboralesO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="feriaslaboralesO" id="feriaslaboralesO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="showroom">Showroom<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="showroom" data-live-search="true" id="showroom" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="showroomO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="showroomO" id="showroomO" rows="2"></textarea>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-5">
                <label for="empleabilidad">Eventos de empleabilidad<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="empleabilidad" data-live-search="true" id="empleabilidad" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="empleabilidadO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="empleabilidadO" id="empleabilidadO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="bolsalaboral">Bolsa Laboral<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="bolsalaboral" data-live-search="true" id="bolsalaboral" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="bolsalaboralO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="bolsalaboralO" rows="2"></textarea>
            </div>

        </div>


        <div class="row">

            <div class="form-group col-md-5">
                <label for="redessociales">Manejo de redes sociales<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="redessociales" data-live-search="true" id="redessociales" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="redessocialesO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="redessocialesO" id="redessocialesO" rows="2"></textarea>
            </div>

            <div class="form-group col-md-5">
                <label for="otros">Otros<span class="text-danger">*</span></label>
                <select class="select2 form-control" name="otros" data-live-search="true" id="otros" x>
                    <option value="0" selected>Seleccionar</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <label for="otrosO">OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos) <span class="text-danger">*</span></label>
                <textarea class="form-group col-md-12" name="" id="otrosO" rows="2"></textarea>
            </div>

        </div>





        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <a href="javascript:void(0)" class="btn btn-success" onclick="formato4()">DESCARGAR</a>
                </div>
            </div>
        </div>


    </section>

</div>

<br><br><br>
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

        var programasEducacionContinua = $("#programasEducacionContinua").val();

        var asociacionEegresados = $("#asociacionEegresados").val();

        var reconocimientoEgresados = $("#reconocimientoEgresados").val();

        var desarrolloInvestigaciones = $("#desarrolloInvestigaciones").val();

        var resultadosInvestigacion = $("#resultadosInvestigacion").val();

        var destacadosInvestigacion = $("#destacadosInvestigacion").val();

        var entreOtros = $("#entreOtros").val();

        var participacionProcesos = $("#participacionProcesos").val();


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
</script>