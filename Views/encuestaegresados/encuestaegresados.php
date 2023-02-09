<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();


?>

<div class="card-header">
    <h4 class="text-center">Encuesta Egresados</h4>
</div>
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
                        <p>Seleccione DOS CURSOS que CUMPLIERON SUS EXPECTATIVAS en estudios generales</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg1" type="radio" value="1">
                            <label class="form-check-label" for="pg1">Desarrollo del Pensamiento Lógico Matemático</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg2" type="radio" value="2">
                            <label class="form-check-label" for="pg2">Desarrollo Personal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg3" type="radio" value="3">
                            <label class="form-check-label" for="pg3">Lectura Crítica y Redacción de Textos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg4" type="radio" value="4">
                            <label class="form-check-label" for="pg4">Introducción al Análisis Matemático</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg5" type="radio" value="1">
                            <label class="form-check-label" for="pg5">Química General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg6" type="radio" value="2">
                            <label class="form-check-label" for="pg6">Física General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg7" type="radio" value="3">
                            <label class="form-check-label" for="pg7">Biología General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg8" type="radio" value="4">
                            <label class="form-check-label" for="pg8">Estadística General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg9" type="radio" value="4">
                            <label class="form-check-label" for="pg9">Sociedad Cultura y Ecología</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg10" type="radio" value="1">
                            <label class="form-check-label" for="pg10">Cultura Investigativa y Pensamiento Crítico</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg11" type="radio" value="2">
                            <label class="form-check-label" for="pg11">Ética, Convivencia Humana y Ciudadanía</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg12" type="radio" value="3">
                            <label class="form-check-label" for="pg12">Análisis Matemático</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg13" type="radio" value="4">
                            <label class="form-check-label" for="pg13">Dibujo Arquitectónico</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="pg14" type="radio" value="4">
                            <label class="form-check-label" for="pg14">Introducción a la Ingeniería</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta ">
                        <p>Seleccione DOS CURSOS que NO CUMPLIERON SUS EXPECTATIVAS en estudios generales</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="1">
                            <label class="form-check-label" for="p1">Desarrollo del Pensamiento Lógico Matemático</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="2">
                            <label class="form-check-label" for="p2">Desarrollo Personal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="3">
                            <label class="form-check-label" for="p3">Lectura Crítica y Redacción de Textos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="4">
                            <label class="form-check-label" for="p4">Introducción al Análisis Matemático</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="1">
                            <label class="form-check-label" for="p5">Química General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="2">
                            <label class="form-check-label" for="p6">Física General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="3">
                            <label class="form-check-label" for="p7">Biología General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p8" type="radio" value="4">
                            <label class="form-check-label" for="p8">Estadística General</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p9" type="radio" value="4">
                            <label class="form-check-label" for="p9">Sociedad Cultura y Ecología</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p10" type="radio" value="1">
                            <label class="form-check-label" for="p10">Cultura Investigativa y Pensamiento Crítico</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p11" type="radio" value="2">
                            <label class="form-check-label" for="p11">Ética, Convivencia Humana y Ciudadanía</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p12" type="radio" value="3">
                            <label class="form-check-label" for="p12">Análisis Matemático</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p13" type="radio" value="4">
                            <label class="form-check-label" for="p13">Dibujo Arquitectónico</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p14" type="radio" value="4">
                            <label class="form-check-label" for="p14">Introducción a la Ingeniería</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>1. La relación de los estudios generales con los demás cursos impartidos durante su formación académica</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="1">
                            <label class="form-check-label" for="p1">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="2">
                            <label class="form-check-label" for="p1">Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="3">
                            <label class="form-check-label" for="p1">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p1" type="radio" value="4">
                            <label class="form-check-label" for="p1">Mala</label>
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>2. El impacto que tuvo los estudios generales en tu formación integral</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="1">
                            <label class="form-check-label" for="p2">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="2">
                            <label class="form-check-label" for="p2">Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="3">
                            <label class="form-check-label" for="p2">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p2" type="radio" value="4">
                            <label class="form-check-label" for="p2">Mala</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>3. Su experiencia de compartir con alumnos de programas diversos en una misma clase</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="1">
                            <label class="form-check-label" for="p3">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="2">
                            <label class="form-check-label" for="p3">Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="3">
                            <label class="form-check-label" for="p3">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p3" type="radio" value="4">
                            <label class="form-check-label" for="p3">Mala</label>
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>4. La influencia de los talleres impartidos en su formación académica (danza, teatro, música y otros)</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="1">
                            <label class="form-check-label" for="p4">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="2">
                            <label class="form-check-label" for="p4">Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="3">
                            <label class="form-check-label" for="p4">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p4" type="radio" value="4">
                            <label class="form-check-label" for="p4">Mala</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>5. El desarrollo de los cursos por los docentes de estudios generales</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="1">
                            <label class="form-check-label" for="p5">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="2">
                            <label class="form-check-label" for="p5">Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="3">
                            <label class="form-check-label" for="p5">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p5" type="radio" value="4">
                            <label class="form-check-label" for="p5">Mala</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>6. La distribución de los horarios de los estudios generales</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="1">
                            <label class="form-check-label" for="p6">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="2">
                            <label class="form-check-label" for="p6">Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="3">
                            <label class="form-check-label" for="p6">Regular</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p6" type="radio" value="4">
                            <label class="form-check-label" for="p6">Mala</label>
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>7. La cantidad de cursos desarrollados en estudios generales durante tu proceso de formación</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="1">
                            <label class="form-check-label" for="p7">Muy Buena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="2">
                            <label class="form-check-label" for="p7">De 3 a 5.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="3">
                            <label class="form-check-label" for="p7">De 6 a 8.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="p7" type="radio" value="4">
                            <label class="form-check-label" for="p7">Más de 8.</label>
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-12 col-md-12 pregunta">
                        <p>8. La infraestructura para el desarrollo de los cursos en estudios generales</p>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" onchange="p51();" name="p8" type="radio" value="1">
                            <label class="form-check-label" for="p8">si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" onchange="p52();" name="p8" type="radio" value="2">
                            <label class="form-check-label" for="p8">no</label>
                        </div>
                        <div class="col-12" id="oficiomarsa" hidden>
                            <input class="col-12" type="text" id="textp8">
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