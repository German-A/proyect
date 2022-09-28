<?php head($data); ?>

<?php obj($data);

$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles = $obj->selectManual();
$primermanual = $obj2->selectprimerManual();
$tutoriales = $obj2->selectCursosTUTORIALES();
$capacitaciones = $obj2->selectCursosCAPACITACIONES();

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

<br><br>

<br>

<div class="row text-center" style="max-width: 1600px; margin:auto">

    <div class="col-12  col-lg-4">
        <div class="col-md-10 m-auto">
            <h3 class="blueoscuro">Manuales y Guías</h3>
        </div>

        <br>

        <div class="row">
            <div class="col-md-10  m-auto">
                <?php foreach ($perfiles as $key => $fila) { ?>
                    <div class="col-md-12 ml-2 btn btn-outline-warning pl-3 pr-3 d-flex justify-content-center">
                        <div class="col-11 col-md-9">
                            <label class=""><?php echo $fila['Nombre'] ?></label>
                        </div>

                        <div class="col-1 col-md-5">
                            <div class="row">
                                <a href="#elid" class="btn btn-primary libro"  onclick="verArchivo('<?php echo $fila['NombreArchivo'] ?>');"><i class="fas fa-book-open"></i></a>
                                &nbsp
                                <a href="<?= media(); ?>/archivos/manuales/<?php echo $fila['NombreArchivo']?>" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <br><br><br>

        <div class="col-md-10 r m-auto">
            <h3 class="blueoscuro">Video Tutoriales</h3>
        </div>
        <br>

        <div class="row">
            <div class="col-md-10  m-auto">
                <?php foreach ($tutoriales as $key => $fila) { ?>
                    <a class="col-md-12 ml-2 btn btn-outline-warning p-2 m-2  d-flex justify-content-center" href="<?php echo $fila['UrlVideo'] ?>" target="_blank">
                        <h1 class="text-danger" style="height: 40px;"><i class="fab fa-youtube"></i></h1>
                        <div class="col-11">
                            <h5 class=""><?php echo $fila['Nombre'] ?></h5>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

        <br><br><br>

        <div class="col-md-10 r m-auto">
            <h3 class="blueoscuro">Video Conferencias</h3>
        </div>

        <br>


        <div class="row">
            <div class="col-md-10  m-auto">
                <?php foreach ($capacitaciones as $key => $fila) { ?>
                    <a class="col-md-12 ml-2 btn btn-outline-warning p-2 m-2  d-flex justify-content-center" href="<?php echo $fila['UrlVideo'] ?>" target="_blank">
                        <h1 class="text-danger" style="height: 40px;"><i class="fab fa-youtube"></i></h1>
                        <div class="col-11">
                            <h5 class=""><?php echo $fila['Nombre'] ?></h5>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

        <br>
        <br>

    </div>
    <div class="col-8 libro" id="elid">
        <br>
        <?php foreach ($primermanual as $key => $fila) { ?>
            <object class="pdfview" type="application/pdf" id="video_id" data="<?= media(); ?>/archivos/manuales/<?php echo $fila['NombreArchivo'] ?>"></object>
        <?php } ?>
    </div>

</div>




<?php footer($data); ?>

<script>
    function verArchivo(a) {
        var b = a;
        let newUrl = `<?= media(); ?>/archivos/manuales/${b}`;
        let newUrl2 = `https://docs.google.com/viewer?url=https://use-dpa.unitru.edu.pe/INTRANET/archivos/base/${b}`;
        $("#video_id").attr("data", newUrl);
    }
</script>