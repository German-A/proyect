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


<br>
<style>
    .encuesta {
        max-width: 1000px;
        margin: auto;

    }

    .pregunta {
        background-color: #0042a0;
        color: white;
        padding: 10px 10px;
        display: flex;
        flex-direction: column;
        font-size: 15px;
        margin-bottom: 20px;
        box-shadow: 10px 5px 5px #001b50;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .infopregunta {
        border: 5px solid #000;
        padding: 10px;
        max-width: 700px;
        margin: 10px auto;
        color: #0a2fff;
       
    }

    .infopreguntaicon {
        font-size: 80px;
    }
</style>

<div class="encuesta">
    <div class="col-12 col-xl-10">
        <div class="d-flex justify-content-around">
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoUse.jpg" alt="">
            </div>
            <div class="col-6 col-md-3 pt-4 pb-4 text-rigth">
                <img class="img-fluid" src="<?= media(); ?>/img/logoDpa.png" alt="">
            </div>
        </div>
    </div>
    <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">
        <div class="row">
            

            <h4 class="infopregunta text-primary">
                Lea detenidamente cada pregunta y elija la respuesta más pertinente
            </h4>

        </div>
        <div class="row">
            <div class="col-12 text-left">
                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta ">
                        <p>1. Tiempo que el/la egresado (a) labora en su empresa.</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="1">
                            <label class="form-check-label" for="p1"><h5>primera vez</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="2">
                            <label class="form-check-label" for="p1"><h5>menos de 1 año</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="3">
                            <label class="form-check-label" for="p1"><h5>1 a 2 años</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="4">
                            <label class="form-check-label" for="p1"><h5>3 años a más</h5></label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>2. Formación académica/profesional que exige principalmente a sus trabajadores (Seleccione sólo una opción).</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="1">
                            <label class="form-check-label" for="p2"><h5>Técnico</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="2">
                            <label class="form-check-label" for="p2"><h5>Bachiller</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="3">
                            <label class="form-check-label" for="p2"><h5>Titulado</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="4">
                            <label class="form-check-label" for="p2"><h5>Maestría</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="5">
                            <label class="form-check-label" for="p2"><h5>Doctorado</h5></label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>3. Señale el cargo que desempeña el/la egresado(a).</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="1">
                            <label class="form-check-label" for="p3"><h5>Practicante profesional</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="2">
                            <label class="form-check-label" for="p3"><h5>Auxiliar</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="3">
                            <label class="form-check-label" for="p3"><h5>Asistente</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="4">
                            <label class="form-check-label" for="p3"><h5>Directivo</h5></label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>4. Medios que utiliza para realizar los procesos de selección. (Puede marcar más de uno).</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="1">
                            <label class="form-check-label" for="p4"><h5>Prueba: Conocimientos.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="2">
                            <label class="form-check-label" for="p4"><h5>Entrevista: Selección individual.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="3">
                            <label class="form-check-label" for="p4"><h5>Entrevista: Selección grupal.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="4">
                            <label class="form-check-label" for="p4"><h5>Test: Aptitudes intelectuales.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="5">
                            <label class="form-check-label" for="p4"><h5>Test: Personalidad.</h5></label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>5. ¿Conoce si el egresado (a) ha desarrollo producción intelectual?.</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="1">
                            <label class="form-check-label" for="p5"><h5>Artículos en revistas indexadas.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="2">
                            <label class="form-check-label" for="p5"><h5>Artículos de opinión.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="3">
                            <label class="form-check-label" for="p5"><h5>Separatas.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="4">
                            <label class="form-check-label" for="p5"><h5>Libros.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="5">
                            <label class="form-check-label" for="p5"><h5>Blog.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="6">
                            <label class="form-check-label" for="p5"><h5>Página web.</h5></label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>6. Conoce si el/la egresado(a) ha desarrollado estudios complementarios.</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="1">
                            <label class="form-check-label" for="p6"><h5>Maestría.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="2">
                            <label class="form-check-label" for="p6"><h5>Doctorado.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="3">
                            <label class="form-check-label" for="p6"><h5>Segunda especialidad.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="4">
                            <label class="form-check-label" for="p6"><h5>Segunda profesión.</h5></label>
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>7. El/la egresado(a) ha recibido alguna capacitación por parte de entidad laboral.</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="1">
                            <label class="form-check-label" for="p7"><h5>De 1 a 2.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="2">
                            <label class="form-check-label" for="p7"><h5>De 3 a 5.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="3">
                            <label class="form-check-label" for="p7"><h5>De 6 a 8.</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="4">
                            <label class="form-check-label" for="p7"><h5>Más de 8.</h5></label>
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>8. El/la egresado(a) ha recibido algún tipo de reconocimiento por su destacado desempeño que sea demostrable (resoluciones, diplomas u otros) Si así fuera, mencione el tipo de reconocimiento, mes y año.</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" onchange="p51();" name="p8" type="radio" value="1">
                            <label class="form-check-label" for="p8"><h5>si</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" onchange="p52();" name="p8" type="radio" value="2">
                            <label class="form-check-label" for="p8"><h5>no</h5></label>
                        </div>
                        <div class="col-12" id="oficiomarsa" hidden>
                            <input class="col-12" type="text" id="textp8">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>9. Señale su satisfacción con el desempeño laboral del egresado(a).</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p9" type="radio" value="1">
                            <label class="form-check-label" for="p9"><h5>Muy satisfecha</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p9" type="radio" value="2">
                            <label class="form-check-label" for="p9"><h5>Satisfecha</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p9" type="radio" value="3">
                            <label class="form-check-label" for="p9"><h5>Medianamente satisfecha</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p9" type="radio" value="4">
                            <label class="form-check-label" for="p9"><h5>Medianamente insatisfecha</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p9" type="radio" value="5">
                            <label class="form-check-label" for="p9"><h5>Insatisfecha</h5></label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>10. ¿Como considera al egresado(a) de la Universidad Nacional de Trujillo?</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="1">
                            <label class="form-check-label" for="p10"><h5>Muy malo</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="2">
                            <label class="form-check-label" for="p10"><h5>Malo</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="3">
                            <label class="form-check-label" for="p10"><h5>Bueno</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="4">
                            <label class="form-check-label" for="p10"><h5>Muy bueno</h5></label>
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
<!-- MODAL ENCUESTA -->
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
    function p51() {
        $('#oficiomarsa').attr('hidden', true);
    }

    function p52() {
        $('#oficiomarsa').attr('hidden', false);
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
        } else {
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
        var pregunta5 = document.querySelector('input[name="p5"]:checked').value;
        var pregunta6 = document.querySelector('input[name="p6"]:checked').value;
        var pregunta7 = document.querySelector('input[name="p7"]:checked').value;

        if (document.querySelector('input[name="p8"]:checked').value == 1) {
            var pregunta8 = document.querySelector('input[name="p8"]:checked').value;
        } else {
            console.log('---------');
            var pregunta8 = document.getElementById('textp8').value;
            console.log(pregunta8);
        }

        var pregunta9 = document.querySelector('input[name="p9"]:checked').value;
        var pregunta10 = document.querySelector('input[name="p10"]:checked').value;


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