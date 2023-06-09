<?php headexpoferiaxvll($data); ?>


<?php obj($data);

$obj = new HomeModel();

$perfiles = $obj->listaExpoferiaxvEmpresas();

?>
<br><br>

<div class="text-center">
    <h4>EMPRESAS</h4>
</div>

<br><br>

<style>
    .contenedor {
        max-width: 1400px;
        margin: auto;

    }
</style>

<div class="contenedor ">

    <div class="col-12r">
        <div class="row d-flex justify-content-around">
            <?php foreach ($perfiles as $key => $fila) { ?>
                <a class="row p-3 col-md-5 mb-4  btn btn-outline-primary " style="display: flex;" href="<?php echo $fila['url'] ?>" target="_blank">
                    <div class="col-md-5 ">
                        <img class="img-fluid" style="max-height: 150px;" src="<?= media(); ?>/upload/exporiaxv/<?php echo $fila['archivo'] ?>">
                    </div>
                    <div class="col-7">
                        <h2><?php echo $fila['nombre'] ?></h2>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

</div>

<style>
    .card-columns .card {
        margin-bottom: 0.75rem;
    }

    @media (min-width: 576px) {
        .card-columns {
            -webkit-column-count: 5;
            -moz-column-count: 5;
            column-count: 5;
            -webkit-column-gap: 1.25rem;
            -moz-column-gap: 1.25rem;
            column-gap: 1.25rem;
            orphans: 1;
            widows: 1;
        }

        .card-columns .card {
            display: inline-block;
            width: 100%;
        }
    }
</style>


<?php footerexpoferiaxvll($data); ?>