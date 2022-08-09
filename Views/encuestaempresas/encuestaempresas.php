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
    .ancho {
        max-width: 1200px;
        margin: auto;

    }
</style>

<div class="ancho">

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


            <div class="col-12">
                <p>
                    La presente encuesta es ANÓNIMA Y CONFIDENCIAL, su objetivo es conocer su opinión (satisfacción), sobre
                    el desempeño del egresado de la Universidad Nacional de Trujillo, a fin de mejorar el proceso educativo.
                </p>
            </div>

            <br>

            <div class="col-12">
                <h1>Pregunta 1</h1>
                <div class="col-10">
                    <p>En su organización, tiene laborando trabajadores egresados de la Universidad Nacional de Trujillo</p>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Default radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Second default radio
                        </label>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-6">
                <h1>Pregunta 2</h1>
                <div class="col-10">
                    <p>Formación académica/profesional que exige principalmente a sus trabajadores (Seleccione sólo una opción)</p>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">TÉCNICO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">BACHILLER</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label" for="inlineCheckbox3">TITULADO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                        <label class="form-check-label" for="inlineCheckbox4">MAESTRÍA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                        <label class="form-check-label" for="inlineCheckbox5">DOCTORADO</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-6">
                <h1>Pregunta 3</h1>
                <div class="col-10">
                    <p>Medios utiliza para realizar los procesos de selección. (Puede seleccionar más de uno).</p>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                        <label class="form-check-label" for="inlineCheckbox6">Prueba: Conocimientos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                        <label class="form-check-label" for="inlineCheckbox7">Entrevista: Selección individual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8">
                        <label class="form-check-label" for="inlineCheckbox8">Entrevista: Selección grupal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option9">
                        <label class="form-check-label" for="inlineCheckbox9">Test: Aptitudes intelectuales</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option10">
                        <label class="form-check-label" for="inlineCheckbox10">Test: Personalidad</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-12 text-center">
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
                            <input class="form-check-input" name="p10" type="radio" value="1">
                            <label class="form-check-label" for="p10">Muy satisfecha</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="2">
                            <label class="form-check-label" for="p10">Satisfecha</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="3">
                            <label class="form-check-label" for="p10">Medianamente satisfecha</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="4">
                            <label class="form-check-label" for="p10">Medianamente insatisfecha </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="5">
                            <label class="form-check-label" for="p10">Insatisfecha</label>
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


<?php footer($data); ?>

<script>
    function enviarCuestionario() {

        if (!document.querySelector('input[name="p1"]:checked')) {
            swal("Atención!", "Debe seleccior la Pregunta Nº1", "warning");
            hasError = true;
        }

    }
</script>