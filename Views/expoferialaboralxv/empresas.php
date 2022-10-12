<?php headexpoferiaxv2($data); ?>


<?php obj($data);

$obj = new HomeModel();

$perfiles = $obj->listaExpoferiaxvEmpresas();

?>
<br><br><br>

<div class="text-center">
    <h4>EMPRESAS</h4>
</div>

<br><br><br>

<div class="col-12">

    <div class="row d-flex justify-content-around">
        <?php foreach ($perfiles as $key => $fila) { ?>
            <a class="row p-3 col-5 mb-4  btn btn-outline-primary " style="display: flex;" href="<?php echo $fila['url'] ?>" target="_blank">
                <div class="col-5 h-100">
                    <img class="img-fluid" src="<?= media(); ?>/archivos/exporiaxv/<?php echo $fila['archivo'] ?>">
                </div>
                <div class="col-7">
                    <h4><?php echo $fila['nombre'] ?></h4>
                </div>
            </a>
        <?php } ?>
    </div>



</div>