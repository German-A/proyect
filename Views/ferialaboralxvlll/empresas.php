<?php headferialaborlaxvll($data); ?>

<?php obj($data);
// $obj = new HomeModel();
// $perfiles = $obj->listaExpoferiaxvllLogoEmpresa();
?>

<style>
    .contenedor {
        max-width: 1400px;
        margin: auto;

    }
</style>

<div class="contenedor ">

    <div class="col-12 m-2">
        <div class="row m-auto">
            <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/empresas/fondo_emp1.png" alt="" />
        </div>
    </div>

    <br>

    <div class="col-12 m-2">
        <div class="row m-auto">
            <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/empresas/fondo_emp2.png" alt="" />
        </div>
    </div>

    <div class="col-12 m-2">
        <div class="row">
            <h1 class="underline m-5">Empresas Participantes</h1>
        </div>

        <div class="row">

            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/autopista_del_norte.png"></div>
            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/bravo_constructora.png"></div>
            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/centro_empleo.png"></div>
            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/corlad.png"></div>

            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/grupo_rocio.png"></div>
            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/hortifrud.png"></div>
            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/imcop.png"></div>
            <div class="col-4 col-md-2 "> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/mota_engil.jpg"></div>

        </div>
    </div>

    <!-- <div class="col-12">
        <div class="row d-flex justify-content-around">
            <?php foreach ($perfiles as $key => $fila) { ?>
                <a class="row p-3 col-md-5 mb-4  btn btn-outline-primary " style="display: flex;" href="<?php echo $fila['url'] ?>" target="_blank">
                    <div class="col-md-5 ">
                        <img class="img-fluid" style="max-height: 150px;" src="<?= media(); ?>/upload/exporiaxvll/<?php echo $fila['archivo'] ?>">
                    </div>
                    <div class="col-7">
                        <h2><?php echo $fila['nombre'] ?></h2>
                    </div>
                </a>
            <?php } ?>
        </div> -->
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

<?php footerferialaborlaxvll($data); ?>