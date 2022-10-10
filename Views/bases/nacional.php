<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles = $obj->selectLegal();
$primerabase = $obj->selectprimeraBase();
$perfiless = $obj2->selectinstitucional();
$perfilesss = $obj2->selectprimerNacional();
$n = 1;
?>


<style>
    .libro {
        display: none;
    }

    @media(min-width:994px) {
        .pdfview {
            /* Centrado */
            margin: auto;
            display: block;
            /* Tamaño */
            min-width: 100%;
            height: 58rem;
            /* Mejorar aspecto */
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .libro {
            display: block;
        }
    }


    @media(min-width:1024px) {

        .pdfview {
            /* Centrado */
            margin: auto;
            display: block;
            /* Tamaño */
            width: 100%;
            height: 50rem;
            /* Mejorar aspecto */
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .libro {
            display: block;
        }
    }
</style>


<div class="row text-center" style="max-width: 1600px; margin:auto">

    <br><br>
    <div class="col-12  col-lg-4">
        <br>
        <div class="col-md-10  m-auto">
            <h3 class="blueoscuro">Normativa Nacional</h3>
        </div>

        <div class="row">
            <div class="col-md-10  m-auto itemY">
                <?php foreach ($perfiles as $key => $fila) { ?>
                    <div class="col-md-12 ml-2 btn btn-outline-warning pl-3 pr-3 d-flex justify-content-center">
                        <div class="col-11 col-md-9">
                            <h5 class=""><?php echo $fila['Nombre'] ?></h5>
                      
                        </div>

                        <div class="col-1 col-md-5">
                            <div class="row">
                                <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('<?php echo $fila['NombreArchivo'] ?>');"><i class="fas fa-book-open"></i></a>
                                &nbsp
                                <a href="<?= media(); ?>/archivos/documentoslegales/<?php echo $fila['NombreArchivo'] ?>" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <br>


    </div>

    <div class="col-8 libro" id="elid">
        <br>
        <?php foreach ($primerabase as $key => $fila) { ?>
            <object class="pdfview" type="application/pdf" id="video_id" data="<?= media(); ?>/archivos/documentoslegales/<?php echo $fila['NombreArchivo'] ?>"></object>
        <?php } ?>
    </div>


</div>


<?php footer($data); ?>


<script>
    $(document).ready(function() {

    })

    function verArchivo(a) {
        var b = a;
        let newUrl = `<?= media(); ?>/archivos/documentoslegales/${b}`;
        let newUrl2 = `https://docs.google.com/viewer?url=https://use-dpa.unitru.edu.pe/INTRANET/archivos/base/${b}`;
        $("#video_id").attr("data", newUrl);
    }
</script>