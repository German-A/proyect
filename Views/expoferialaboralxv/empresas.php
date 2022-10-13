<?php headexpoferiaxv2($data); ?>


<?php obj($data);

$obj = new HomeModel();

$perfiles = $obj->listaExpoferiaxvEmpresas();

?>
<br><br>

<div class="text-center">
    <h4>EMPRESAS</h4>
</div>

<br><br>

<!-- <div class="col-12">
    <div class="row d-flex justify-content-around">
        <?php foreach ($perfiles as $key => $fila) { ?>
            <a class="row p-3 col-5 mb-4  btn btn-outline-primary " style="display: flex;" href="<?php echo $fila['url'] ?>" target="_blank">
                <div class="col-5 h-100">
                    <img class="img-fluid" src="<?= media(); ?>/archivos/exporiaxv/<?php echo $fila['archivo'] ?>">
                </div>
                <div class="col-7">
                    <h2><?php echo $fila['nombre'] ?></h2>
                    <h5><?php echo $fila['descripcion'] ?></h5>
                </div>
            </a>
        <?php } ?>
    </div>
</div> -->




<div class="card-columns">

    <?php foreach ($perfiles as $key => $fila) { ?>


        <div class="card">
        <img class="card-img-top" src="<?= media(); ?>/archivos/exporiaxv/<?php echo $fila['archivo'] ?>"" alt="Card image cap">

        <div class="card-body">
            <h5 class="card-title text-primary"><?php echo $fila['nombre'] ?></h5>
            <p class="card-text"><?php echo $fila['descripcion'] ?></p>
        </div>
        <div class="text-center">
        <a class="btn btn-primary" target="_blank" href="<?php echo $fila['url'] ?>">Más Información</a>
        </div>
        <br>
        
    </div>

    <?php } ?>


</div>

