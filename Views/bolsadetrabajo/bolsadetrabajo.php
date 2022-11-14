<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();

$perfiles = $año->selectañoEspecialidades();

?>
<style>
.contedorlinkbolsa {
  max-width: 100%;
  margin: auto;
}

@media (min-width: 800px) {
  .contedorlinkbolsa {
      max-width: 900px;
      margin: auto;
  }
}

@media (min-width: 1024px) {
  .contedorlinkbolsa {
      max-width: 1200px;
      margin: auto;
  }
}
</style>


<br><br>

<div class="contedorlinkbolsa pt-4 pb-1">
<div class="row d-flex justify-content-around ">
    <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://jobboard.universia.net/unitruoportunidades" >
        <div class="col-12 text-right col-md-12">
            <h1 class="mostaza"><i class="fas fa-briefcase"></i></h1>
            <br><br> 
        </div>
        <div class="col-12 text-left col-md-12">
            <h5 class="">BOLSA DE TRABAJO UNT</h5>
        </div>
    </a>

    <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://www.empleosperu.gob.pe/portal-mtpe/">
        <div class="col-12 text-right col-md-12">
            <h1 class="mostaza"><i class="far fa-browser"></i></h1>
            <br><br> 
        </div>
        <div class="col-12 text-left col-md-12">
            <h5 class="">PORTAL EMPLEOS PERÚ</h5>
        </div>
    </a>


    <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="<?= base_url(); ?>/solicitudempleo">
        <div class="col-12 text-right col-md-12">
            <h1 class="mostaza"><i class="fas fa-university"></i></h1>
            <br><br> 
        </div>
        <div class="col-12 text-left col-md-12">
            <h5 class="">SOLICITUD DE OFERTA LABORAL</h5>
        </div>
    </a>

    <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="<?= base_url(); ?>/encuestaempresas">
        <div class="col-12 text-right col-md-12">
            <h1 class="mostaza"><i class="fas fa-university"></i></h1>
            <br><br> 
        </div>
        <div class="col-12 text-left col-md-12">
            <h5 class="">ENCUESTA EMPLEADORES</h5>
        </div>
    </a>

</div></div>


<div class="text-center">
    <a target="_blank" href="https://jobboard.universia.net/unitruoportunidades" class="btn btn-outline-primary m-2">BOLSA DE TRABAJO UNT</a>

    <a target="_blank" href="https://www.empleosperu.gob.pe/portal-mtpe/" class="btn btn-outline-primary m-2">PORTAL EMPLEOS PERÚ</a>

    <a target="_blank" href="<?= base_url(); ?>/solicitudempleo" class="btn btn-outline-primary m-2">SOLICITUD DE OFERTA LABORAL</a>

    <a target="_blank" href="<?= base_url(); ?>/encuestaempresas" class="btn btn-outline-primary m-2">ENCUESTA EMPLEADORES</a>


</div>




<br><br><br>

<!-- <div class="col-12">
    <div class="row d-flex justify-content-around" id="empleos">
        <div class="col-5 pb-4 cardempleo ">
            <div class="row">
                <div class="col-3">
                 
                </div>
                <div class="col-8">
                    <h4></h4>
                    <br>
                   <p></p>
                </div>
            </div>
        </div>
    </div>
</div> -->




<div class="col-12">

</div>

<div class="col-6">
    <div class="col-2">
        <img class="img-fluid" src="<?= media() ?>/archivos/empresa/11luffy.jpg">
    </div>
    <div class="col-10">
        <h3>Desarrollador</h3>
        <h4>Empresa:web</h4>
        <h5>Carreras:</h5>
    </div>
</div>

<div class="col-6">

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