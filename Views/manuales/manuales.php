<?php head($data); ?>

<?php obj($data);

$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles = $obj->selectManual();
$perfiless = $obj2->selectprimerManual();
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
        width: 91%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        grid-template-columns: 30% auto;
    }

    aside {
        padding: 0 15px;
    }

    aside .titulo {
        margin-bottom: 10px;
        font-size: 2rem;
    }

    aside .contenedor-temario {
        padding-top: 20px;
        position: sticky;
        top: 0;
    }

    aside .lista {
        list-style: none;
        border-left: 2px solid var(--color-temario);
        padding-left: 10px;
        margin-left: 10px;
    }

    aside .lista li {
        position: relative;
    }

    aside .lista li a {
        display: block;
        color: #5a5a5a;
        padding: 10px 10px;
        text-decoration: none;
        transition: .3s ease all;
        font-size: 1.6rem;
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


    .card {
        margin: 20px 0;
        padding: 40px;
        background: #fff;
    }

    @media screen and (max-width: 700px) {
        .contenedor {
            grid-template-columns: 1fr;
        }

        aside {
            margin-bottom: 40px;
        }
    }

    .pdfview {
        /* Centrado */
        margin: auto;
        display: block;
        /* Tamaño */
        width: 90%;
        height: 58rem;
        /* Mejorar aspecto */
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .colMd {
        display: flex;
    }

    .colMd1 {
        display: none;
    }

    @media(min-width:1024px) {
        .contenedor {
            width: 91%;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            justify-content: center;
            grid-template-columns: 30% auto;
        }

        .seccion1 {
            width: 80%;
        }

        .seccion2 {
            width: 80%;
        }

        .colMd {
            display: none;
        }

        .colMd1 {
            display: flex;
        }

        .pdfview {
            /* Centrado */
            margin: auto;
            display: block;
            /* Tamaño */
            width: 850px;
            height: 58rem;
            /* Mejorar aspecto */
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    }
</style>


<br><br><br>
<div class="contenedor">
    <div class="seccion1">
        <aside>
            <div class="contenedor-temario" id="temario">
                <h3 class="titulo">Manuales y Guías</h3>
                <ul class="lista">
                    <?php foreach ($perfiles as $key => $fila) { ?>
                        <?php if ($n == 1) { ?>
                            <li class="activo">
                                <?php $n = 0; ?>
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                            <div class="itemY">
                                <h1 data-id="<?php echo $fila['NombreArchivo'] ?>"></h1>
                                <a href="#"><?php echo $fila['Nombre'] ?></a>
                            </div>
                            </li>
                        <?php } ?>
                </ul>
            </div>
        </aside>
    </div>
    <div class="seccion2">
        <?php foreach ($perfiless as $key => $fila) { ?>
            <main>
                <div class="colMd1">
                    <object class="pdfview" type="application/pdf" id="video_id" data="<?= media(); ?>/archivos/manualesyguias/<?php echo $fila['NombreArchivo']  ?>"></object>
                </div>
                <div class="colMd">
                    <iframe id="video_id2" src="https://docs.google.com/viewer?url=<?= media(); ?>/archivos/manualesyguias/<?php echo $fila['NombreArchivo'] ?>&amp;embedded=true" frameborder="0" width="100%" height="500"> </iframe>
                </div>
            </main>
        <?php } ?>
    </div>
</div>
<br>

<!-- <iframe id="video_id2" src="https://docs.google.com/viewer?url=https://use-dpa.unitru.edu.pe/INTRANET/archivos/manualesyguias/EmpresaEmpleos-SAAE.pdf&embedded=true" frameborder="0" width="100%" height="1000"> </iframe>  -->
<?php footer($data); ?>

<script>
    document.querySelectorAll('#temario .lista  a').forEach((elemento) => {
        elemento.addEventListener('click', () => {
            document.querySelector('#temario .activo').classList.remove('activo');
            elemento.parentElement.parentElement.classList.add('activo');
        });
    });
</script>




<script>
    $(document).ready(function() {

        $(".itemY").click(function() {
            let youtube_id = $(this).children("h1").attr("data-id");
            console.log(youtube_id);
            let newUrl = `<?= media(); ?>/archivos/manualesyguias/${youtube_id}`;
            let amp = "&amp;embedded=true";
            let newUrl2 = `https://docs.google.com/viewer?url=<?= media(); ?>/archivos/manualesyguias/${youtube_id}`;
            $("#video_id").attr("data", newUrl);
            $("#video_id2").attr("src", newUrl2 + `&embedded=true`);
        })


    })
</script>