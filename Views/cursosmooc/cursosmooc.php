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
<style>
    :root {
    /*sub menu*/
    --fondo: #F2F4F8;
    --plomo: #1B1811;
    --rojoc: #D90F2A;
    --azulc: #0506E6;
    --naranjac: #F05905;
    --moradoc: #B105F0;
    --amarillocrema: #E6AD09;
    --amarillo: #FDF107;
    --verde: #0C8F3D;
    --azulOsucuro: #000C4B;
    --azulClaro: #12377B;
    --azulAgua: #0A2FFF;
    --rojo: #D8261A;
    --colorsubmenubg: #ffffff;
    --colorTextoEnlacesySubEnlaces: #12377B;
    /*HeaderPrincipal*/
    --amarillo: #E6AD09;
    --texroBarra: #ffffff;
    --barra: #12377B;
    --enlaceNavegador: #11116f;
    --enlaceNavegadorHover: #E6AD09;
    /*HeaderSecundario*/
    --blanco: #ffffff;
    --primario: #FFC107;
    --secundario: #0097A7;
    --gris: #757575;
    --oscuro: #212121;
    --textoNagadorHover: #B36036;
    --fondoSubEnlaces: #ffffff;
    --alturaTexto: 100px;
    --texroBarra: #ffffff;
    --tipoTexto1: 'Montserrat', sans-serif;
    /* --tipoTexto1: 'Hind Siliguri', sans-serif;*/
}

.contedorYoutube {
    width: 100%;
    background-color: var(--fondo);
}

.tituloYou {
    text-align: center;
    padding: auto;
}

.rowYoutube {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
}

.ListaVideos {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.youtube_icon {
    display: flex;
    flex-direction: row;
}

.youtube_icon i {
    height: 20px;
}

.itemY {
    display: flex;
    align-items: center;
    border-color: var(--rojoc);
    color: var(--azulClaro);
    font-size: 1.6rem;
    /* border: blue 5px solid; */
    width: 44rem;
    height: 4rem;
    margin: 0.4rem;
    height: auto;
}

.descripcionYou {
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: 1.6rem;
}

.seccionI {
    display: flex;
    flex-direction: row;
}

.iconoY {
    font-size: 3rem;
    margin-right: 1rem;
}

.iconoY :hover {
    color: var(--rojoc);
}

.youtube_video {
    width: 42rem;
    height: 20rem;
}

.itemY:hover {
    color: var(--azulAgua);
}

.descripcionYou:hover {
    color: var(--azulAgua);
}

@media(min-width:1024px) {
    .rowYoutube {
        display: flex;
        flex-direction: row;
        width: 80%;
        margin: auto;
    }
    .tituloYou {
        text-align: center;
        width: 28rem;
        color: var(--azulOsucuro);
        margin: 2rem;
    }
    .youtube_video {
        width: 52rem;
        height: 30rem;
    }
}
</style>



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