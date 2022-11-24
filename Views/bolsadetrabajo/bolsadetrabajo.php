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




<div class="contedorlinkbolsa pt-4 pb-1">
    <div class="row d-flex justify-content-around ">
        <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://jobboard.universia.net/unitruoportunidades">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-briefcase"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">BOLSA DE TRABAJO UNT</h5>
            </div>
        </a>

        <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://www.empleosperu.gob.pe/portal-mtpe/">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-briefcase"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">PORTAL EMPLEOS PERÚ</h5>
            </div>
        </a>


        <a class="col-8 col-md-3 col-lg-2 fondo m-1" href="<?= base_url(); ?>/solicitudempleo">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-edit"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">SOLICITUD DE OFERTA LABORAL</h5>
            </div>
        </a>

        <a class="col-8 col-md-3 col-lg-2 fondo m-1" href="<?= base_url(); ?>/encuestaempresas">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-user-edit"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">ENCUESTA EMPLEADORES</h5>
            </div>
        </a>

    </div>
</div>






<br><br>


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
</div>
 -->

<style>
    .contenedor {
        max-width: 1200px;
        margin: auto;
    }

    .listempleos {
        min-height: 60vh;
        max-height: 60vh;
        overflow-y: auto;
    }
</style>



<!-- <div class="listempleos bg-danger">

 </div> -->

<div class="col-12 row contenedor">
    <div class="col-5 listempleos " id="empleos">
  

    </div>
    <div class="col-7 listempleos">
        <h5 id="nombrePuesto"></h5>
        <br>
        <h4>Descripcion Puesto:</h4>
        <p id="DescripcionPuesto"></p>
        <br>



        <!-- <a href="" class="btn btn-danger">aplicar</a> -->

    </div>



</div>

<style>
    .callout.callout-danger {
        border-left-color: #12377b;

    }

    .callout {
        border-radius: 0.25rem;
        box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
        background-color: #fff;
        border-left: 5px solid #e9ecef;
        margin-bottom: 1rem;
        padding: 1rem;
    }
</style>

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
            listado = '';

            for (i = 0; i < info.length; i++) {
                listado = listado +

                    `
                    <div class="col-12 row callout callout-danger">
                        <div class="col-4">
                            <img class="img-fluid" src="<?= media() ?>/archivos/empresa/` + info[i].imagen + `">
                            <a href="javascript:void(0);" class="btn btn-outline-primary" onclick="ver(` + info[i].idEmpleos + ` )" >VER</a>
                        </div>
                        <div class="col-8">
                            <h4>Desarrollador: <span>` + info[i].NombrePuesto + `</span></h4>
                            <h4>Empresa: <span>` + info[i].nombreEmpresa + `</span></h4>
                            <h4>Carreras:<span> ` + info[i].nombreEscuela + `</span></h4>
                        </div>
                       
                    </div>
                    
                `;

            }

            //console.log(listado);

            $("#empleos").html(listado);

        });
    }

    function ver(id) {

        $.ajax({
            method: "GET",
            url: "" + base_url + "/bolsadetrabajo/getOne/" + id,
            //data: datax
            //data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            console.log(info);
            console.log(info[0].NombrePuesto);

            $("#nombrePuesto").html(info[0].NombrePuesto);
            $("#DescripcionPuesto").html(info[0].DescripcionPuesto);


            //console.log(listado);



        });
    }


    $(document).ready(function() {
        empleos();
    });
</script>