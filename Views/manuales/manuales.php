<?php head($data); ?>

<?php obj($data);

$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles = $obj->selectManual();
$perfiless = $obj2->selectprimerManual();
$tutoriales = $obj2->selectCursosTUTORIALES();
$capacitaciones = $obj2->selectCursosCAPACITACIONES();
$n = 1;

?>



<br><br>

<br>
<div style="margin: auto; max-width: 85%;">

    <div class="col-md-10 r m-auto">
        <h3 class="blueoscuro">Manuales y Guías</h3>
    </div>

    <br>
    <div class="col-md-10 r m-auto">

    </div>
    <div class="row">
        <div class="col-md-10  m-auto">
            <?php foreach ($perfiles as $key => $fila) { ?>
                <a class="col-md-12 ml-2 btn btn-outline-warning p-2 m-2  d-flex justify-content-center" href="<?= media(); ?>/archivos/manuales/<?php echo $fila['NombreArchivo']  ?>" target="_blank">
                    <h1 class="text-danger" style="height: 40px;"><i class="fas fa-file-pdf"></i></h1>
                    <div class="col-11">
                        <h5 class=""><?php echo $fila['Nombre'] ?></h5>
                    </div>
                    <h3 class="text-primary" style="height: 20px;"> <i class="fas fa-download"></i></h3>
                </a>
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
                    <h3 class="text-primary" style="height: 20px;"> <i class="fas fa-play"></i></h3>
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
                    <h3 class="text-primary" style="height: 20px;"> <i class="fas fa-play"></i></h3>
                </a>
            <?php } ?>
        </div>
    </div>

    <br>


    <br>
    <br>
    <br>
    <br>



</div>


<?php footer($data); ?>