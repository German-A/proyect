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

<br>

<div class="col-md-10 r m-auto">
<h3 class="mostaza">Normativa</h3>
</div>

<br>
<div class="col-md-10 r m-auto">
<h3 class="blueoscuro">Normativa Nacional</h3>
</div>
<div class="d-flex flex-row">   
    <div class="col-md-10  m-auto">
        <div class="row">
        <?php foreach ($perfiles as $key => $fila) { ?>
            <a class="col-md-6 p-1" href="<?= media();?>/archivos/documentoslegales/<?php echo$fila['NombreArchivo']  ?>" target="_blank">
            <h5 class="blueclaro"><img style="height: 30px;" src="<?= media();?>/archivos/logos/archivo.png" alt=""><?php echo $fila['Nombre'] ?></h5>
            </a>
        <?php } ?>   
        </div>
    </div>
</div>
<br>

<br>
<div class="col-md-10 r m-auto">
<h3 class="blueoscuro">Normativa Insititucional</h3>
</div>
<div class="d-flex flex-row">   
    <div class="col-md-10  m-auto">
        <div class="row">
        <?php foreach ($perfiless as $key => $fila) { ?>
            <a class="col-md-6" href="<?= media();?>/archivos/documentoslegales/<?php echo$fila['NombreArchivo']  ?>" target="_blank">
            <h5><h5 class="blueclaro"><img style="height: 30px;" src="<?= media();?>/archivos/logos/archivo.png" alt=""><?php echo $fila['Nombre'] ?></h5>
            </a>
        <?php } ?>   
        </div>
    </div>
</div>
<br>













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