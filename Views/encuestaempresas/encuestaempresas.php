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
                            <p>1. Tiempo que el egresado (a) labora en su empresa.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="1">
                                <label class="form-check-label" for="p1">primera vez</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="2">
                                <label class="form-check-label" for="p1">menos de 1 año</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="2">
                                <label class="form-check-label" for="p1">1 a 2 años</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p1" type="radio" value="2">
                                <label class="form-check-label" for="p1">5 años a más</label>
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
                            <p>3. Señale el cargo que desempeña el egresado (a).</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p3" type="radio" value="1">
                                <label class="form-check-label" for="p3">Practicante profesional</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p3" type="radio" value="2">
                                <label class="form-check-label" for="p3">Auxiliar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p3" type="radio" value="2">
                                <label class="form-check-label" for="p3">Asistente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p3" type="radio" value="2">
                                <label class="form-check-label" for="p3">Directivo </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>4. Medios utiliza para realizar los procesos de selección. (Puede seleccionar más de uno).</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="1">
                                <label class="form-check-label" for="p4">Prueba: Conocimientos.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="2">
                                <label class="form-check-label" for="p4">Entrevista: Selección individual.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="3">
                                <label class="form-check-label" for="p4">Entrevista: Selección grupal.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="4">
                                <label class="form-check-label" for="p4">Test: Aptitudes intelectuales.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p4" type="radio" value="4">
                                <label class="form-check-label" for="p4">Test: Personalidad.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>5. El egresado (a) ha recibido algún tipo de reconocimiento por su destacado desempeño que sea demostrable (resoluciones, diplomas u otros) Si así fuera, mencione el tipo de reconocimiento, mes y año.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onchange="p51();" name="p5" type="radio" value="1">
                                <label class="form-check-label" for="p5">si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onchange="p52();" name="p5" type="radio" value="2">
                                <label class="form-check-label" for="p5">no</label>
                            </div>
                            <div class="col-12" id="oficiomarsa" hidden>
                                <input class="col-12" type="text" id="textp5">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>6. Señale su satisfacción con el desempeño laboral del egresado (a).</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="1">
                                <label class="form-check-label" for="p6">Muy satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="2">
                                <label class="form-check-label" for="p6">Satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="3">
                                <label class="form-check-label" for="p6">Medianamente satisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="4">
                                <label class="form-check-label" for="p6">Medianamente insatisfecha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p6" type="radio" value="4">
                                <label class="form-check-label" for="p6">Insatisfecha</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>7. ¿Conoce si el egresado (a) ha desarrollo producción intelectual?.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="1">
                                <label class="form-check-label" for="p7">Artículos en revistas indexadas.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="2">
                                <label class="form-check-label" for="p7">Artículos de opinión.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="3">
                                <label class="form-check-label" for="p7">Separatas.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="4">
                                <label class="form-check-label" for="p7">Libros.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="5">
                                <label class="form-check-label" for="p7">Blog.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p7" type="radio" value="5">
                                <label class="form-check-label" for="p7">Página web.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>8. Conoce si la egresada ha desarrollado estudios complementarios.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="1">
                                <label class="form-check-label" for="p8">Maestría.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="2">
                                <label class="form-check-label" for="p8">Doctorado.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="3">
                                <label class="form-check-label" for="p8">Segunda especialidad.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p8" type="radio" value="4">
                                <label class="form-check-label" for="p8">Segunda profesión.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-md-12">
                            <p>9. El/la egresado (a) ha recibido alguna capacitación por parte de entidad laboral.</p>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="1">
                                <label class="form-check-label" for="p9">De 1 a 2.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="2">
                                <label class="form-check-label" for="p9">De 3 a 5.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="3">
                                <label class="form-check-label" for="p9">De 6 a 8.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="p9" type="radio" value="4">
                                <label class="form-check-label" for="p9">Más de 8.</label>
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
    function p51(){
        $('#oficiomarsa').attr('hidden',true);
    }
    function p52(){
        $('#oficiomarsa').attr('hidden',false);
    }
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
        }else{
            console.log(document.querySelector('input[name="p5"]:checked').value);
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



        var pregunta1 = document.querySelector('input[name="p1"]:checked').value;
        var pregunta2 = document.querySelector('input[name="p2"]:checked').value;
        var pregunta3 = document.querySelector('input[name="p3"]:checked').value;
        var pregunta4 = document.querySelector('input[name="p4"]:checked').value;
        if(document.querySelector('input[name="p5"]:checked').value==1){
            var pregunta5 = document.querySelector('input[name="p5"]:checked').value;
        }else{
            console.log('---------');
            var pregunta5 = document.getElementById('textp5').value;
            console.log(pregunta5);
        }
     
        var pregunta6 = document.querySelector('input[name="p6"]:checked').value;
        var pregunta7 = document.querySelector('input[name="p7"]:checked').value;
        var pregunta8 = document.querySelector('input[name="p8"]:checked').value;
        var pregunta9 = document.querySelector('input[name="p9"]:checked').value;


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