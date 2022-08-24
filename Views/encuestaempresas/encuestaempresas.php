<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();

$perfiles = $año->selectañoEspecialidades();
$segundasEspecialidades = $año->SegundasEspecialidades();
$doctorados = $año->doctorados();
$idmaestria = $año->listaFacultadpostgrado();
//$perfiless = $año->selectañoEspecialidadesporaño($id);


?>

<div class="card-header">
    <h4 class="text-center">Transparencia - Unidad de Seguimiento del Egresado</h4>
</div>
<br><br><br>
<style>
    .encuesta {
        max-width: 1200px;
        margin: auto;

    }
</style>

<div class="encuesta">
    <div class="col-12 col-xl-10">
        <div class="row">
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoUse.jpg" alt="">
            </div>
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoDpa.png" alt="">
            </div>
        </div>
    </div>
    <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">
        <div class="row">
            <br>
            <div class="col-12 text-left">
                <h4>Lea detenidamente cada pregunta y elija la respuesta más pertinente</h1>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>1. En su organización, tiene laborando trabajadores egresados de la Universidad Nacional de Trujillo..</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="1">
                                <label class="form-check-label" for="p1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="2">
                                <label class="form-check-label" for="p1">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>2. Formación académica/profesional que exige principalmente a sus trabajadores (Seleccione sólo una opción)</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="1">
                                <label class="form-check-label" for="p2">TÉCNICO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="2">
                                <label class="form-check-label" for="p2">BACHILLER</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="3">
                                <label class="form-check-label" for="p2">TITULADO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="3">
                                <label class="form-check-label" for="p2">MAESTRÍA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="3">
                                <label class="form-check-label" for="p2">DOCTORADO</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>3. La egresada ha recibido algún tipo de reconocimiento por su destacado desempeño que sea demostrable (resoluciones, diplomas u otros) Si así fuera, mencione el tipo de reconocimiento, mes y año y la IE que se le otorgó.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p3" type="radio" value="1">
                                <label class="form-check-label" for="p3">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p3" type="radio" value="2">
                                <label class="form-check-label" for="p3">No</label>
                            </div>
                        </div>
                    </div>

                    <p class="bluemedio bg-danger">4. Seleccione una opción, De acuerdo a su satisfacción con el desempeño de la egresada en relación a la competencia de gestión del proceso de enseñanza aprendizaje (planificación, implementación, ejecución y evaluación de actividades de aprendizaje con niños de 0 a 6 años).</p>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>4. Cómo considera al estudiante de la Universidad Nacional de Trujillo</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="1">
                                <label class="form-check-label" for="p4">Muy insatisfactorio /Nunca </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="2">
                                <label class="form-check-label" for="p4">Insatisfactorio /Casi nunca</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="3">
                                <label class="form-check-label" for="p4">Satisfactorio /Casi siempre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="4">
                                <label class="form-check-label" for="p4">Muy satisfactorio /Siempre</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>5.La carrera estudiada</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="1">
                                <label class="form-check-label" for="p5">Muy insatisfactorio /Nunca </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="2">
                                <label class="form-check-label" for="p5">Insatisfactorio /Casi nunca</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="3">
                                <label class="form-check-label" for="p5">Satisfactorio /Casi siempre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="4">
                                <label class="form-check-label" for="p5">Muy satisfactorio /Siempre</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>6.Las notas del expediente académico.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="1">
                                <label class="form-check-label" for="p6">Muy insatisfactorio /Nunca </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="2">
                                <label class="form-check-label" for="p6">Insatisfactorio /Casi nunca</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="3">
                                <label class="form-check-label" for="p6">Satisfactorio /Casi siempre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="4">
                                <label class="form-check-label" for="p6">Muy satisfactorio /Siempre</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>7. La especialización dentro de la carrera.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="1">
                                <label class="form-check-label" for="p7">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="2">
                                <label class="form-check-label" for="p7">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="3">
                                <label class="form-check-label" for="p7">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="4">
                                <label class="form-check-label" for="p7">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="5">
                                <label class="form-check-label" for="p7">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>8. La reputación del centro universitario.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="1">
                                <label class="form-check-label" for="p8">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="2">
                                <label class="form-check-label" for="p8">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="3">
                                <label class="form-check-label" for="p8">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="4">
                                <label class="form-check-label" for="p8">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="5">
                                <label class="form-check-label" for="p8">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>9. Los conocimientos informáticos.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="1">
                                <label class="form-check-label" for="p9">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="2">
                                <label class="form-check-label" for="p9">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="3">
                                <label class="form-check-label" for="p9">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="4">
                                <label class="form-check-label" for="p9">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="5">
                                <label class="form-check-label" for="p9">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>10. La experiencia laboral previa.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="1">
                                <label class="form-check-label" for="p10">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="2">
                                <label class="form-check-label" for="p10">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="3">
                                <label class="form-check-label" for="p10">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="4">
                                <label class="form-check-label" for="p10">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="5">
                                <label class="form-check-label" for="p10">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>11. El conocimiento de idiomas.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="1">
                                <label class="form-check-label" for="p11">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="2">
                                <label class="form-check-label" for="p11">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="3">
                                <label class="form-check-label" for="p11">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="4">
                                <label class="form-check-label" for="p11">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="5">
                                <label class="form-check-label" for="p11">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>12. Estancias en el extranjero.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p12" type="radio" value="1">
                                <label class="form-check-label" for="p12">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p12" type="radio" value="2">
                                <label class="form-check-label" for="p12">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p12" type="radio" value="3">
                                <label class="form-check-label" for="p12">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p12" type="radio" value="4">
                                <label class="form-check-label" for="p12">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p12" type="radio" value="5">
                                <label class="form-check-label" for="p12">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>13. Capacidad para adaptarse a los cambios.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p13" type="radio" value="1">
                                <label class="form-check-label" for="p13">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p13" type="radio" value="2">
                                <label class="form-check-label" for="p13">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p13" type="radio" value="3">
                                <label class="form-check-label" for="p13">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p13" type="radio" value="4">
                                <label class="form-check-label" for="p13">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p13" type="radio" value="5">
                                <label class="form-check-label" for="p13">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>14. Capacidad de análisis.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p14" type="radio" value="1">
                                <label class="form-check-label" for="p14">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p14" type="radio" value="2">
                                <label class="form-check-label" for="p14">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p14" type="radio" value="3">
                                <label class="form-check-label" for="p14">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p14" type="radio" value="4">
                                <label class="form-check-label" for="p14">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p14" type="radio" value="5">
                                <label class="form-check-label" for="p14">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>15. Compromiso.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p15" type="radio" value="1">
                                <label class="form-check-label" for="p15">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p15" type="radio" value="2">
                                <label class="form-check-label" for="p15">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p15" type="radio" value="3">
                                <label class="form-check-label" for="p15">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p15" type="radio" value="4">
                                <label class="form-check-label" for="p15">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p15" type="radio" value="5">
                                <label class="form-check-label" for="p15">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>16. Trabajo en equipo.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p16" type="radio" value="1">
                                <label class="form-check-label" for="p16">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p16" type="radio" value="2">
                                <label class="form-check-label" for="p16">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p16" type="radio" value="3">
                                <label class="form-check-label" for="p16">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p16" type="radio" value="4">
                                <label class="form-check-label" for="p16">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p16" type="radio" value="5">
                                <label class="form-check-label" for="p16">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>17. Trabajo bajo presión.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p17" type="radio" value="1">
                                <label class="form-check-label" for="p17">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p17" type="radio" value="2">
                                <label class="form-check-label" for="p17">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p17" type="radio" value="3">
                                <label class="form-check-label" for="p17">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p17" type="radio" value="4">
                                <label class="form-check-label" for="p17">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p17" type="radio" value="5">
                                <label class="form-check-label" for="p17">Insatisfecha </label>
                            </div>
                        </div>
                    </div>
            </div>
            <br>

        </div>
        <button type="button" class="input bg-warning enviar pt-2 pb-2 pl-5 pr-5 text-white" onclick="enviarCuestionario()">
            <h4>ENVIAR</h4>
        </button>

    </form>
</div>

<br>
<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalRespuesta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center" id="msgmodal">


                </div>
            </div>
        </div>
    </div>
</div>

<?php footer($data); ?>

<script>
    function enviarCuestionario() {

        if (!document.querySelector('input[name="p1"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº1", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p2"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº2", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p3"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº3", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p4"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº4", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p5"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº5", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p6"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº6", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p7"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº7", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p8"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº8", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p9"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº9", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p10"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº10", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p11"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº11", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p12"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº12", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p13"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº13", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p14"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº14", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p15"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº15", "warning");
            hasError = true;
            return;
        }
        if (!document.querySelector('input[name="p16"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº16", "warning");
            hasError = true;
            return;
        }

        if (!document.querySelector('input[name="p17"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº17", "warning");
            hasError = true;
            return;
        }

        var pregunta1 = document.querySelector('input[name="p1"]:checked').value;
        var pregunta2 = document.querySelector('input[name="p2"]:checked').value;
        var pregunta3 = document.querySelector('input[name="p3"]:checked').value;
        var pregunta4 = document.querySelector('input[name="p4"]:checked').value;
        var pregunta5 = document.querySelector('input[name="p5"]:checked').value;
        var pregunta6 = document.querySelector('input[name="p6"]:checked').value;
        var pregunta7 = document.querySelector('input[name="p7"]:checked').value;
        var pregunta8 = document.querySelector('input[name="p8"]:checked').value;
        var pregunta9 = document.querySelector('input[name="p9"]:checked').value;
        var pregunta10 = document.querySelector('input[name="p10"]:checked').value;
        var pregunta11 = document.querySelector('input[name="p11"]:checked').value;
        var pregunta12 = document.querySelector('input[name="p12"]:checked').value;
        var pregunta13 = document.querySelector('input[name="p13"]:checked').value;
        var pregunta14 = document.querySelector('input[name="p14"]:checked').value;
        var pregunta15 = document.querySelector('input[name="p15"]:checked').value;
        var pregunta16 = document.querySelector('input[name="p16"]:checked').value;
        var pregunta17 = document.querySelector('input[name="p17"]:checked').value;

        var fd = new FormData();
        fd.append("pregunta1", pregunta1);
        fd.append("pregunta2", pregunta2);
        fd.append("pregunta3", pregunta3);
        fd.append("pregunta4", pregunta4);
        fd.append("pregunta5", pregunta5);
        fd.append("pregunta6", pregunta6);
        fd.append("pregunta7", pregunta7);
        fd.append("pregunta8", pregunta8);
        fd.append("pregunta9", pregunta9);
        fd.append("pregunta10", pregunta10);
        fd.append("pregunta11", pregunta11);
        fd.append("pregunta12", pregunta12);
        fd.append("pregunta13", pregunta13);
        fd.append("pregunta14", pregunta14);
        fd.append("pregunta15", pregunta15);
        fd.append("pregunta16", pregunta16);
        fd.append("pregunta17", pregunta17);

        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/encuestaempresas/set",
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
                $("#msgmodal").html(listado);
            }
            if (info.status == false) {
                console.log(info.status);
                listado =
                    `
                        <div class="text-center  mb-2">
                            <h5 class="azul">` + info.msg + `</h5>
                        </div>                          
                    `;
                $("#msgmodal").html(listado);
            }
            $('#modalRespuesta').modal('show');
        });
    }
</script>