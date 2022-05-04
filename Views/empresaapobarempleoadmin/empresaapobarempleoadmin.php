<?php
headerAdmin($data);
getModal('modalEmpresa', $data);
?>


<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<main class="app-content">

  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Empresa</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/empresasadmin"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTA DE EMPLEOS POR APROBAR</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
                <tr>
                  <th>ID</th>
                  <th>NombrePuesto</th>
                  <th>Escuelas</th>
                  <th>titulacionesid</th>
                  <th>FechaInico</th>                  
                  <th>FechaFin</th>
                  <th>nombreEmpresa</th>                  
                  <th>NombrePuesto</th>
                  <th>DescripcionPuesto</th>
                  <th>InformacionAdicional</th>
                  <th>LugarTrabajo</th>                  
                  <th>TrabajoRemoto</th>
                  <th>NumeroVacantes</th>

                  <th>Experiencias</th>
                  <th>JornadaLaboral</th>
                  <th>HorasSemanales</th>
                  <th>HorarioTrabajo</th>                  
                  <th>RemuneracionBruta</th>
                  <th>Contacto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</main>

<?php footerAdmin($data); ?>



<script src="<?= media(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= media(); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= media(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= media(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= media(); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= media(); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

