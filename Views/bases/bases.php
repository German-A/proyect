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
<br><br>
<div style="max-width: 40%;">
    <br>
    <div class="col-md-10 r m-auto">
        <h3 class="blueoscuro">Normativa Nacional</h3>
    </div>

    <div class="row">
        <div class="col-md-10  m-auto">
            <?php foreach ($perfiles as $key => $fila) { ?>
                <a class="col-md-12 ml-2 btn btn-outline-warning p-2 m-2  d-flex justify-content-center" href="<?= media(); ?>/archivos/documentoslegales/<?php echo $fila['NombreArchivo']  ?>" target="_blank">
                    <h1 class="text-danger" style="height: 40px;"><i class="fas fa-file-pdf"></i></h1>
                    <div class="col-11">
                        <h5 class=""><?php echo $fila['Nombre'] ?></h5>
                    </div>
                    <h3 class="text-primary" style="height: 20px;"> <i class="fas fa-download"></i></h3>
                </a>
            <?php } ?>
        </div>
    </div>

    <br>

    <div class="col-md-10 r m-auto">
        <h3 class="blueoscuro">Normativa Insititucional</h3>
    </div>



    <div class="row">
        <div class="col-md-10  m-auto">
            <?php foreach ($perfiless as $key => $fila) { ?>
                <a class="col-md-12 ml-2 btn btn-outline-warning pl-5 pr-5 m-2  d-flex justify-content-center" href="<?= media(); ?>/archivos/documentoslegales/<?php echo $fila['NombreArchivo']  ?>" target="_blank">
                    <h1 class="text-danger"> <img style="max-height: 40px;" src="<?= media(); ?>/archivos/logos/word.png" alt=""> </h1>
                    <div class="col-11">
                        <h5 class=""><?php echo $fila['Nombre'] ?></h5>
                    </div>
                    <h3 class="text-primary" style="height: 20px;"> <i class="fas fa-download"></i></h3>
                </a>
            <?php } ?>
        </div>
    </div>


    <br>






</div>


<div style="max-width: 60%;">
<object class="pdfview" type="application/pdf" id="video_id"  data="http://localhost/use/Assets/archivos/documentoslegales/0Reporte2Mayo2010.pdf"></object>
</div>

<div class="row"> 

</div>


<?php footer($data); ?>


<script>
    $(document).ready(function() {
        $(".itemY").click(function() {
            let youtube_id = $(this).children("h1").attr("data-id");
            console.log(youtube_id);
            let newUrl = `<?= media(); ?>/archivos/documentoslegales/${youtube_id}`;
            let amp = "&amp;embedded=true";
            let newUrl2 = `https://docs.google.com/viewer?url=<?= media(); ?>/archivos/documentoslegales/${youtube_id}`;
            $("#video_id").attr("data", newUrl);
            $("#video_id2").attr("src", newUrl2 + `&embedded=true`);
        })
    })
</script>