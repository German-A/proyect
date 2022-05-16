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


<div class="col-md-10 r m-auto">
<h3 class="mostaza">Manuales y Guías</h3>
</div>

<br>
<div class="col-md-10 r m-auto">

</div>
<div class="d-flex flex-row">   
    <div class="col-md-10  m-auto">
        <div class="row">
        <?php foreach ($perfiles as $key => $fila) { ?>
            <a class="col-md-6 p-1" href="<?= media();?>/archivos/manuales/<?php echo$fila['NombreArchivo']  ?>" target="_blank">
            <h5 class="blueclaro"><img style="height: 30px;" src="<?= media();?>/archivos/logos/archivo.png" alt=""><?php echo $fila['Nombre'] ?></h5>
            </a>
        <?php } ?>   
        </div>
    </div>
</div>
<br>



<br>


<div class="col-md-10 r m-auto">
<h3 class="mostaza">VIDEO TUTORIALES</h3>
</div>

<br>
<div class="col-md-10 r m-auto">

</div>
<div class="d-flex flex-row">   
    <div class="col-md-10  m-auto">
        <div class="row">
        <?php foreach ($tutoriales as $key => $fila) { ?>
            <a class="col-md-6 p-1" href="<?php echo $fila['UrlVideo'] ?>" target="_blank">
            <h5 class="blueclaro"><img style="height: 30px;" src="<?= media();?>/archivos/logos/archivo.png" alt=""><?php echo $fila['Nombre'] ?></h5>
            </a>
        <?php } ?>   
        </div>
    </div>
</div>
<br>

<br>


<div class="col-md-10 r m-auto">
<h3 class="mostaza">CAPACITACIONES</h3>
</div>

<br>
<div class="col-md-10 r m-auto">

</div>
<div class="d-flex flex-row">   
    <div class="col-md-10  m-auto">
        <div class="row">
        <?php foreach ($capacitaciones as $key => $fila) { ?>
            <a class="col-md-6 p-1" href="<?php echo $fila['UrlVideo'] ?>" target="_blank">
            <h5 class="blueclaro"><img style="height: 30px;" src="<?= media();?>/archivos/logos/archivo.png" alt=""><?php echo $fila['Nombre'] ?></h5>
            </a>
        <?php } ?>   
        </div>
    </div>
</div>
<br>




<?php footer($data); ?>
