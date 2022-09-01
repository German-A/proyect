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
          <h3 class="card-title">LISTA DE EMPLEOS PENDIENTES PARA VALIDAR EL ESTADO ACTUAL DEL RUC</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>ruc</th>
                <th>Nombre Empresa</th>
                <th>Dirección</th>
                <th>Fecha Inico</th>
                <th>Fecha Fin</th>
                <th>Nombre Puesto</th>
                <th>Lugar Trabajo</th>
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

<script>
  function buscar(ruc) {
    //var ruc = document.getElementById("ruc").value;
    cadena = "ruc=" + ruc;
    $.ajax({
      type: "GET",
      async: true,
      url: 'https://consultaruc.win/api/ruc/' + ruc,
      success: function(response) {
        if (response.response == true) {
          swal("Resultado!",
            response.result['razon_social'] + ' - ' + response.result['estado'] + ' - ' + response.result['condicion'],
            "success");
        } else {
          swal("Atención!", "Error en el Servidor, hacerlo de manera manual", "warning");
        }
      }
    });

  }
</script>