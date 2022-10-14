<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();

$perfiles = $año->selectañoEspecialidades();

?>

<br><br>

<div class="text-center">
    <a target="_blank" href="https://jobboard.universia.net/unitruoportunidades" class="btn btn-outline-primary m-2">BOLSA DE TRABAJO UNT</a>

    <a target="_blank" href="https://www.empleosperu.gob.pe/portal-mtpe/" class="btn btn-outline-primary m-2">PORTAL EMPLEOS PERÚ</a>

    <a target="_blank" href="<?= base_url(); ?>/solicitudempleo" class="btn btn-outline-primary m-2">SOLICITUD DE OFERTA LABORAL</a>

    <a target="_blank" href="<?= base_url(); ?>/encuestaempresas" class="btn btn-outline-primary m-2">ENCUESTA EMPLEADORES</a>


</div>




<br><br><br>

<div class="col-12">


    <div class="row d-flex justify-content-around" id="empleos">

        <div class="col-5 pb-4 cardempleo ">
            <div class="row bg-danger">
                <div class="col-3">
                    <img class="img-fluid" src="<?= media() ?>/images/avatar.png">
                </div>
                <div class="col-8">
                    <h4>puesto</h4>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam non quidem id quas neque consectetur esse nulla, fugit voluptatibus amet error! Enim omnis natus nemo ullam unde, alias rerum eligendi.</p>
                </div>
            </div>
        </div>





    </div>





</div>


<div class="col-md-6">
    <div id="empleos">

    </div>
</div>


<?php footer($data); ?>


<script>
    function empleos() {

        $.ajax({
            method: "GET",
            url: "" + base_url + "/bolsadetrabajo/get",
            //data: datax
            //data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            console.log(info.nombreEmpresa);

            listado = '';

            for (i = 0; i < info.length; i++) {
                listado = listado +

                `
                    <div class="col-5 pb-4 cardempleo ">
                        <div class="row ">
                            <div class="col-3">
                                <img class="img-fluid" src="<?= media() ?>/archivos/empresa/` + info[i].imagen + `">
                            </div>
                            <div class="col-8">
                                <h4>Nombre del Puesto: ` + info[i].NombrePuesto + `</h4>
                                <br>
                                <h4>Carreras: ` + info[i].escuelaid + `</h4>
                            </div>
                        </div>
                    </div>
                `;

            }

            console.log(listado);

            $("#empleos").html(listado);

        });
    }

    $(document).ready(function() {
        empleos();
    });
</script>