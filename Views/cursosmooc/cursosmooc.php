<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles=$obj->selectCursosMOOC();
$perfiless=$obj2->selectCursosTUTORIALES();
$perfilesss=$obj2->selectCursosCAPACITACIONES();
$perfilessss=$obj2->selectCursosPRINCIPAL();
$n=1;

?>
<br><br><br>



<div class="contenedor">
    <aside>
        <div class="contenedor-temario" id="temario">


            <h3 class="titulo">MOOC</h3>
            <ul class="lista">
                <?php            $n = 1;
                ?>

                <?php foreach ($perfiles as $key => $fila) { ?>
                    <?php if ($n == 1) { ?>
                        <li class="activo">
                            <?php $n = 0; ?>
                        <?php } else { ?>
                        <li>
                        <?php } ?>
                        <div class="itemY">                            
                            <a data-id="<?php echo $fila['UrlVideo'] ?>" href="#"><?php echo $fila['Nombre'] ?></a>
                        </div>
                        </li>
                    <?php } ?>

            </ul>


            <h3 class="titulo">VIDEO TUTORIALES</h3>
            <ul class="lista">

                <?php
            
                $n = 1;
                ?>

                <?php foreach ($perfiless as $key => $fila) { ?>

                    <li>

                        <div class="itemY">
                            <a data-id="<?php echo $fila['UrlVideo'] ?>" href="#"><?php echo $fila['Nombre'] ?></a>
                        </div>
                    </li>
                <?php } ?>


            </ul>

            <h3 class="titulo">CAPACITACIONES</h3>
            <ul class="lista">

                <?php
   
                $n = 1;
                ?>

                    <?php foreach ($perfilesss as $key => $fila) { ?>
                    <li>
                        <div class="itemY">
                            <a data-id="<?php echo $fila['UrlVideo'] ?>" href="#"><?php echo $fila['Nombre'] ?></a>
                        </div>
                    </li>
                <?php } ?>


            </ul>
        </div>
    </aside>
    
    <!-- SECCION PRINCIPAL -->

   

    <?php foreach ($perfilessss as $key => $fila) { ?>
        <div class="row">
            <div class="youtube_video">
                <iframe width="100%" height="100%" id="video_id" src="https://www.youtube.com/embed/HGLiUSFPhuE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    <?php } ?>

</div>


<?php footer($data); ?>

<script>
    $(document).ready(function() {
        $(".itemY").click(function() {
            let youtube_id = $(this).children("a").attr("data-id");
            console.log(youtube_id);
            $("#video_id").attr("src", youtube_id);
        })


        $("#temario a").click(function() {
            $("li").removeClass("activo");         
            $(this).parent().parent().addClass("activo");
        })

    })
</script>