<?php
headerAdmin($data);
getModal('modalEgresado', $data);
?>


<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registro Egresado</button>
        <?php } ?>
      </h1>
    </div>
    <div class="col-12 col-md-6">
        <form action="" method="POST" enctype="multipart/form-data" id="filesForm">
            <input type="file" name="dataCliente" id="file-input" required>
            <input onclick="cargarExcel()" name="subir" class="btn btn-primary" value="Registro por Excel" />
        </form>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableUsuarios">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>email_user</th>
                  <th>imagen</th>
                  <th>dni</th>
                  <th>telefono</th>
                  <th>descripcion</th>
                  <th>status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>
