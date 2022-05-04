<?php
headerAdmin($data);
getModal('modalBanner', $data);

obj($data);
$obj = new HomeModel();
$perfiles = $obj->empleosAll();
?>


<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
    </ul>
  </div>

  <div class="row d-flex justify-content-center">
    <?php foreach ($perfiles as $key => $fila) { ?>
      <div class="col-sm-8 col-md-8 col-lg-8 col-xl-4  align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill style=" width: 18rem;">
          <div class="card-header text-muted border-bottom-0">
            <h2 class="text-primary"><?php echo $fila['nombreEmpresa']; ?></h2>

          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-9 ">
                <h4 class=" "><?php echo $fila['NombrePuesto']; ?></h4>
                <h6 class="text-muted text-sm"><b>DescripcionPuesto: </b><br> <?php echo $fila['DescripcionPuesto']; ?> </h6>
                <ul class="ml-4 mb-0 fa-ul text-muted">

                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                    <h5><b>Tipo De Contrato: </b>
                      <td><?php echo $fila['TipoContrato']; ?></td>
                  </li>
                  </h4>
                </ul>
              </div>

             
              <div class="col-3">
                <?php $logoEmpresa = $fila['imagen']; ?>
                <?php if ($logoEmpresa != null) { ?>
                  <img src="<?= base_url(); ?>/Assets/archivos/empresa/<?php echo $logoEmpresa ?>" style="width: 3rem;border-radius: 10% ;" alt="User Image">
                <?php } else { ?>
                  <img src="<?= base_url(); ?>/Assets/img/persona.jpg" style="width: 3rem;border-radius: 10% ;" alt="User Image">
                <?php } ?>

              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="verOfertaEmpleo(<?php echo $fila['idEmpleos']; ?>)"> <i class="fas fa-user"></i> VER MÁS
              </a>
            </div>
          </div>
        </div>
        <br>
      </div>
  
    <?php } ?>
   
  </div>









</main>
<?php footerAdmin($data); ?>