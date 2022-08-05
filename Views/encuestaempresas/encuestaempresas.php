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
        max-width: 1000px;
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

    <div class="row">

        <div class="col-12">
            <p>
                La presente encuesta es ANÓNIMA Y CONFIDENCIAL, su objetivo es conocer su opinión (satisfacción), sobre
                el desempeño del egresado de la Universidad Nacional de Trujillo, a fin de mejorar el proceso educativo.
            </p>
        </div>
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

    </div>

    <div class="row">

        <div class="col-12">
            <p>
                Marque con equis “X” frente a cada ítem, la respuesta que mejor represente su opinión, donde 1
                es la mínima y 4 es la máxima valoración
            </p>
        </div>
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



    </div>
</div>




<br>


<?php footer($data); ?>