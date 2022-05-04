<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles=$obj->selectLegal();
$perfiless=$obj2->selectinstitucional();
$perfilesss=$obj2->selectprimerNacional();
$n=1;

?>
<br><br><br>



<div class="contenedor">
        <aside>
            <div class="contenedor-temario" id="temario">
                <h1>Expoferia Laboral</h1>
                <h3 class="titulo">2021</h3>
                <ul class="lista">
                    <li class="activo"> 
                        <div class="itemY">
                            <h1 data-id="Documentos\MYG\Cuestionario-SISEU.pdf"></h1>              
                            <a href="https://unitru2021.wixsite.com/expoferialaboral" target="_blank">Expoferia Laboral Virtual 2021 (07 al 14 de octubre)</a>                              
                        </div>
                    </li>
                </ul>
                <h3 class="titulo">2022</h3>
                <ul class="lista">
                    <li> 
                        <div class="itemY">
                            <h1 data-id=""></h1>              
                            <a href="<?= base_url(); ?>/expoferiavidaysalud" target="_blank">Ciencias de la Vida y la Salud (25 al 27 de mayo)</a>                              
                        </div>
                    </li>
                    <li > 
                        <div class="itemY">
                            <h1 data-id=""></h1>              
                            <a href="#">Ciencias Básicas y Tecnológicas (28 al 30 de septiembre)</a>                              
                        </div>
                    </li>
                    <li> 
                        <div class="itemY">
                            <h1 data-id=""></h1>              
                            <a href="#">Ciencias de la Persona | Ciencia Económicas (07 al 09 diciembre)</a>                              
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <main>

        <video class="video" autoplay loop muted width="540px" height="400px" >
            <source src="<?= media();?>/videos/expoferia.mp4"  type="video/mp4">
        </video>
      
        </main>
</div>

 
<script src="js/main.js"></script>
 <script>
        $(document).ready(function () {
            $(".itemY").click(function () {
                let youtube_id = $(this).children("h1").attr("data-id");
                console.log(youtube_id);
                let newUrl = `${youtube_id}`;
                $("#video_id").attr("data", newUrl);
            })
        })
</script>




