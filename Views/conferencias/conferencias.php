<?php
headerAdmin($data);
getModal('modalBanner', $data);

obj($data);
$obj = new HomeModel();
$perfiles = $obj->conferenciasAll();
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>

            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>

    <h2 class="text-center">Conferencia Programadas</h2>

    <div class="row d-flex justify-content-around">
        <?php foreach ($perfiles as $key => $fila) { ?>
            <div class="col-md-7 bg-white mb-4">
                <div class="col-md-12 d-flex justify-content-between m-2">
                    <img src="<?= base_url(); ?>/Assets/archivos/logos/logoUse.png" alt="sin-foto" style=" max-height: 3rem;">
                    <img src="<?= base_url(); ?>/Assets/archivos/logos/logoDpa.png" alt="sin-foto" style=" max-height: 3rem;">
                </div>
                <div class="row d-flex justify-content-center">
                    <h3 class="col-md-8 text-primary text-center font-weight-bold"><?php echo $fila['nombreConferencia']; ?></h3>
                    <br><br>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2 text-center">
                        <div class="bg-primary">
                            <h3 class=""><?php echo $fila['diafechaConferencia']; ?></h3>
                            <p> <?php
                                switch ($fila['mesfechaConferencia']) {
                                    case 1:
                                        echo  '<h4 class="font-weight-bold">Ene</h4>';
                                        break;
                                    case 2:
                                        echo '<h4 class="font-weight-bold">Feb</h4>';
                                        break;
                                    case 3:
                                        echo '<h4 class="font-weight-bold">Mar</h4>';
                                        break;
                                    case 4:
                                        echo '<h4 class="font-weight-bold">Abr</h4>';
                                        break;
                                    case 5:
                                        echo '<h4 class="font-weight-bold">May</h4>';
                                        break;
                                    case 6:
                                        echo '<h4 class="font-weight-bold">Jun</h4>';
                                        break;
                                    case 7:
                                        echo '<h4 class="font-weight-bold">Jul</h4>';
                                        break;
                                    case 8:
                                        echo '<h4 class="font-weight-bold">Ago</h4>';
                                        break;
                                    case 9:
                                        echo '<h4 class="font-weight-bold">Sep</h4>';
                                        break;
                                    case 10:
                                        echo '<h4 class="font-weight-bold">Oct</h4>';
                                        break;
                                    case 11:
                                        echo '<h4 class="font-weight-bold">Nov</h4>';
                                        break;
                                    case 12:
                                        echo '<h4 class="font-weight-bold">Dic</h4>';
                                        break;
                                }
                                ?></p>
                            <h4> <?php echo '' . $fila['hora'] . ':' . $fila['minuto'] ?> </h4>
                        </div>
                    </div>
                    <div class="col-3 ">
                        <?php $foto = $fila['fotoExpositor'] ?>
                        <?php if ($foto != null) { ?>

                            <img src="<?= base_url(); ?>/Assets/archivos/conferencia/<?php echo $foto; ?>" alt="sin-foto" style=" max-width: 100px; max-height: 100px;border-radius: 10% ;">
                        <?php } else { ?>
                            <img src="<?= base_url(); ?>/Assets/archivos/logos/logoUse.png" alt="sin-foto" style=" max-width: 100px; max-height: 100px;border-radius: 10% ;">
                        <?php } ?>
                    </div>
                    <div class="col-6 ">
                        <h5> <?php echo $fila['nombreExpositor']; ?> </h5>
                        <h class="text-justify text-center">Empresa: <?php echo $fila['nombreEmpresa']; ?></h><br>
                        <h class="text-justify text-center">Cargo: <?php echo $fila['cargoExpositor']; ?></h>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="<?php echo $fila['linkConferencia']; ?>" target="_blank" class="btn  btn-success  text-center">Enlace a la Reunion </a>
                    </div>
                </div>
                <br><br>
            </div>
        <?php } ?><br>
    </div>


</main>




<?php footerAdmin($data); ?>