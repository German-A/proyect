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
                            <p>1. La egresada labora en su institución educativa.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="1">
                                <label class="form-check-label" for="p1">primera vez</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="2">
                                <label class="form-check-label" for="p1">1 a 2 años</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="3">
                                <label class="form-check-label" for="p1">3 a 5 años</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="4">
                                <label class="form-check-label" for="p1">5 años a más</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>2. Señale el cargo que desempeña la egresada</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="1">
                                <label class="form-check-label" for="p2">Docente de aula </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="2">
                                <label class="form-check-label" for="p2">Auxiliar de aula</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p2" type="radio" value="3">
                                <label class="form-check-label" for="p2">Otro</label>
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

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>4. Señale su satisfacción con el desempeño de la egresada en relación a la competencia de gestión del proceso de enseñanza aprendizaje (planificación, implementación, ejecución y evaluación de actividades de aprendizaje con niños de 0 a 6 años).</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="1">
                                <label class="form-check-label" for="p4">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="2">
                                <label class="form-check-label" for="p4">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="3">
                                <label class="form-check-label" for="p4">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="4">
                                <label class="form-check-label" for="p4">Medianamente Insatisfecha </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="5">
                                <label class="form-check-label" for="p4">Insatisfecha </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>5. La egresada desempeña algún cargo directivo en su trabajo.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="1">
                                <label class="form-check-label" for="p5">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="2">
                                <label class="form-check-label" for="p5">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="3">
                                <label class="form-check-label" for="p5">Medianamente Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="4">
                                <label class="form-check-label" for="p5">Medianamente Insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p5" type="radio" value="5">
                                <label class="form-check-label" for="p5">Insatisfecha </label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>6. La egresada ha desarrollado proyectos de innovación educativa, investigación científica o intervención sociocultural en su IE.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="1">
                                <label class="form-check-label" for="p6">Ningún trabajo de investigación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="2">
                                <label class="form-check-label" for="p6">De 1-3 trabajos de investigación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="3">
                                <label class="form-check-label" for="p6">Más de 4 trabajos de investigación</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>7. ¿Conoce si la egresada ha desarrollo producción intelectual?</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="1">
                                <label class="form-check-label" for="p7">Ningún trabajo de investigación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="2">
                                <label class="form-check-label" for="p7">De 1-3 trabajos de investigación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="3">
                                <label class="form-check-label" for="p7">Más de 4 trabajos de investigación</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>8. Señale su satisfacción con el desempeño de la egresada en relación a la competencia de gestión educativa</p>
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
                                <label class="form-check-label" for="p8">Medianamente satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="4">
                                <label class="form-check-label" for="p8">Insatisfecha</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>9. Conoce si la egresada ha desarrollado estudios complementarios</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="1">
                                <label class="form-check-label" for="p9">Maestría</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="2">
                                <label class="form-check-label" for="p9">Doctorado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="3">
                                <label class="form-check-label" for="p9">Segunda especialidad</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="4">
                                <label class="form-check-label" for="p9">Segunda profesión</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>10. Conoce si la egresada participa en capacitaciones y actualizaciones relacionadas con la educación</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="1">
                                <label class="form-check-label" for="p10">De 1 a 3 anualmente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="2">
                                <label class="form-check-label" for="p10">De 4 a 6 anualmente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="3">
                                <label class="form-check-label" for="p10">De 7 a 10 anualmente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p10" type="radio" value="4">
                                <label class="form-check-label" for="p10">Más de 10 anualmente</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>11. Conoce si la egresada ha desarrollado estudios complementarios</p>
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
                                <label class="form-check-label" for="p11">Medianamente satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="4">
                                <label class="form-check-label" for="p11">Medianamente insatisfecha </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p11" type="radio" value="5">
                                <label class="form-check-label" for="p11">Insatisfecha</label>
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