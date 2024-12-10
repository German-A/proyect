<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";

$obj3 = new HomeModel();
$perfiles = $obj3->selectBanner();
$n = 1;

?>

<style>
    .cuadro_enlace {
        min-width: 270px;
        min-height: 145px;
        max-width: 270px;
        max-height: 145px;
        
        margin: auto;
    }

    .list_feria{
        display: flex;
        flex-direction: column;     

    }

    @media (min-width: 1040px) {    
        .list_feria{
        display: flex;
        flex-direction: row;        
        align-items: center;
    }
    }
</style>



<div class="contedor90 m1">
    <div class="col-12 text-center">
        <h2 class="text-center">Feria laboral 2024</h2>
    </div>
    <div class="list_feria">

        <a target="_blank" href="<?= base_url(); ?>/ferialaboralxix">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">

                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XIX (21 y 22 de noviembre)</h5>
                </div>

            </div>
        </a>

        <a target="_blank" href="<?= base_url(); ?>/ferialaboralchambita" class=" m-4  p-2 ">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Mega feria laboral Chambita te busca (17 y 18 de octubre)</h5>
                </div>
            </div>
        </a>

        <a target="_blank" href="<?= base_url(); ?>/ferialaboralxvlll">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XVIII (11 y 12 de julio)</h5>
                </div>
            </div>
        </a>

    </div>
</div>


<div class="contedor90 m1">
    <div class="col-12 text-center">
        <h2 class="text-center">Feria laboral 2023</h2>
    </div>
    <div class="list_feria ">
        <a target="_blank" href="<?= base_url(); ?>/expoferialaboralxvlll" class=" m-4  p-2 ">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">

                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XVII Chambita te busca (20 y 21 de octubre)</h5>
                </div>

            </div>
        </a>
        <a target="_blank" href="<?= base_url(); ?>/expoferialaboralxvll">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">

                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XVI (07 y 08 de septiembre)</h5>
                </div>

            </div>
        </a>
    </div>
</div>


<div class="contedor90 m1">
    <div class="col-12 text-center">
        <h2 class="text-center">Feria laboral 2022</h2>
    </div>
    <div class="list_feria ">
        <a target="_blank" href="<?= base_url(); ?>/expoferialaboralxv" class=" m-4  p-2 ">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">

                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XV (18 al 20 de octubre)</h5>
                </div>

            </div>
        </a>
        <a target="_blank" href="<?= base_url(); ?>/expoferiavidaysalud">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">

                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XIV (25 al 27 de mayo)</h5>
                </div>

            </div>
        </a>


    </div>
</div>



<div class="contedor90 m1">
    <div class="col-12 text-center">
        <h2 class="text-center">Feria laboral 2021</h2>
    </div>
    <div class="list_feria ">
        <a target="_blank" href="https://unitru2021.wixsite.com/expoferialaboral" class="">
            <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace">

                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="fas fa-globe-americas"></i></h1>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Feria laboral XIII (07 al 14 de octubre)</h5>

                </div>

            </div>
        </a>
    </div>

</div>
















<br><br><br>

<script src="js/main.js"></script>
<script>
    $(document).ready(function() {
        $(".itemY").click(function() {
            let youtube_id = $(this).children("h1").attr("data-id");
            console.log(youtube_id);
            let newUrl = `${youtube_id}`;
            $("#video_id").attr("data", newUrl);
        })
    })
</script>
<br><br>

<br><br><br><br>

<?php footer($data); ?>