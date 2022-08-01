<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles = $obj->selectLegal();
$perfiless = $obj2->selectinstitucional();
$perfilesss = $obj2->selectprimerNacional();
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
                        <a href="#">
                            <h5>Ciencias Básicas y Tecnológicas (03 al 05 de octubre)</h5>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="itemY">
                        <h2 data-id=""></h2>
                        <a href="#">
                            <h5>Ciencias de la Persona | Ciencia Económicas (07 al 09 diciembre)</h5>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <main><br><br>
        <video class="video" autoplay loop muted>
            <source src="<?= media(); ?>/videos/expoferia.mp4" type="video/mp4">
        </video>
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


<br><br><br><br>

<?php footer($data); ?>