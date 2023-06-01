<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";

$obj3 = new HomeModel();
$perfiles = $obj3->selectBanner();
$n = 1;

?>

<style>
    :root {
        --fondo: #f2f2f2;
        --color-temario: #c9c9c9;
        --temario-active: #ffbd86;
        --temario-active-border: #ff7300;
    }

    .contenedor {
        max-width: 90%;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;

    }

    .video {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: auto;
        height: 200px;
    }

    @media(min-width:768px) {
        .video {
            height: 250px;
        }
    }

    @media(min-width:1024px) {
        .video {
            height: 300px;
        }
    }

    @media(min-width:1200px) {
        .video {
            width: 800px;
            height: 400px;
        }

        .contenedor {
            width: 91%;
            flex-direction: row;

        }
    }

    aside {
        padding: 0 15px;
        margin-bottom: 10px;
    }

    aside .contenedor-temario {
        padding-top: 20px;
        position: sticky;
        top: 0;
    }

    aside .lista {
        list-style: none;
        border-left: 4px solid var(--color-temario);
        padding-left: 10px;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    aside .lista li {
        position: relative;
        margin-bottom: 10px;
    }

    aside .lista li a {
        display: block;
        color: #5a5a5a;
        text-decoration: none;
        transition: .3s ease all;
    }

    aside .lista li.activo a,
    aside .lista li a:hover {
        color: red;
    }

    aside .lista li::before {
        content: "";
        display: block;
        height: 12px;
        width: 12px;
        background: var(--fondo);
        border: 2px solid var(--color-temario);
        position: absolute;
        left: -19px;
        top: calc(50% - 6px);
        transform: rotate(45deg);
        transition: .3s ease all;
    }

    aside .lista li.activo::before {
        background: var(--temario-active);
        border: 2px solid var(--temario-active-border);
    }

    aside .lista li:hover::before {
        border: 2px solid var(--temario-active-border);
    }
</style>


<style>
    .swiper {
        margin-left: auto;
        margin-right: auto;
    }

    .swiper {
        width: 480px;
        height: 200px;
        background-color: #131313;
    }

    .swiper-slide img {
        display: block;
        width: 430px;
        height: 200px;
    }

    @media (min-width: 700px) {
        .swiper {
            width: 720px;
            height: 400px;
            background-color: #131313;
        }

        .swiper-slide img {
            display: block;
            width: 680px;
            height: 400px;
        }
    }

    @media (min-width: 1000px) {
        .swiper {
            width: 700px;
            height: 240px;
            padding: 0px 10px;
            background-color: #131313;
        }

        .swiper-slide img {
            display: block;
            width: 600px;
            height: 240px;
        }
    }

    @media (min-width: 1800px) {
        .swiper {
            width: 900px;
            height: 340px;
            padding: 0px 10px;
            background-color: #131313;
        }

        .swiper-slide img {
            display: block;
            width: 800px;
            height: 340px;
        }
    }
</style>

<br><br>
<br><br>
<div class="contenedor">
    <aside>
        <div class="contenedor-temario" id="temario">
            <h4 class="text-center">Expoferia Laboral</h4>
            <br><br>
            <h4>2021</h4>
            <ul class="lista">
                <li class="activo">
                    <div class="itemY">
                        <h1 data-id="Documentos\MYG\Cuestionario-SISEU.pdf"></h1>
                        <a href="https://unitru2021.wixsite.com/expoferialaboral" target="_blank">
                            <h5>Expoferia Laboral Virtual 2021 (07 al 14 de octubre)</h5>
                        </a>
                    </div>
                </li>
            </ul>
            <br><br>
            <h4>2022</h4>
            <ul class="lista">
                <li>
                    <div class="itemY">
                        <h1 data-id=""></h1>
                        <a href="<?= base_url(); ?>/expoferiavidaysalud" target="_blank">
                            <h5>Ciencias de la Vida y la Salud (25 al 27 de mayo)</h5>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="itemY">
                        <h1 data-id=""></h1>
                        <a href="<?= base_url(); ?>/expoferialaboralxv" target="_blank">
                            <h5>Ciencias Básicas y Tecnológicas (18 al 20 de octubre)</h5>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="itemY">
                        <h1 data-id=""></h1>
                        <a href="<?= base_url(); ?>/expoferialaboralxvll" target="_blank">
                            <h5>expoferialaboral xvll</h5>
                        </a>
                    </div>
                </li>
             
            </ul>
        </div>
    </aside>
    <main><br><br>


        <div class="video">
            <div class="swiper mySwiper" data-aos="fade-down" data-aos-duration="500">
                <div class="swiper-wrapper">
                    <?php foreach ($perfiles as $key => $fila) { ?>
                        <div class="swiper-slide">
                            <img class="imgbanner" src="<?= media(); ?>/upload/portadas/<?php echo $fila['NombreArchivo'] ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>






    </main>
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