<?php
headerAdmin($data);
getModal('modalConvocatoria', $data);
getModal('modalAsignacion', $data);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        <input type="hidden" value="<?=$data['id_empresa']?>" id="empresa">
          <h1 class="m-0"><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
            <?php if ($_SESSION['permisosMod']['w']) { ?>
              <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Agregar</button>
            <?php } ?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Concovatorias</h3>
              </div>

              <div class="card-body">
                <table class="table table-bordered table-striped" id="dataList">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Descripcion convocatoria</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Limite</th>
                      <th>Rango Sueldos</th>
                      <th>Archivo</th>
                      <th>Link</th>
                      <th>Empresa</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  <?php footerAdmin($data); ?>