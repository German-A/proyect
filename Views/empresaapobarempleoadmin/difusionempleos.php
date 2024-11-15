<?php
headerAdmin($data);
getModal('modalEmpresa', $data);
?>


<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<main class="app-content">

  <div class="app-title">

  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTA DE EMPLEOS PENDIENTES PARA DIFUNDIR</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
                <tr>
                  <th>ID</th>
                  <th>NombrePuesto</th>
                  <th>imagen</th>
                  <th>Escuelas</th>
                  <th>Titulaciones</th>
                  <th>Fecha Inico</th>                  
                  <th>Fecha Fin</th>
                  <th>Nombre Empresa</th>                  
                  <th>Nombre Puesto</th>
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

