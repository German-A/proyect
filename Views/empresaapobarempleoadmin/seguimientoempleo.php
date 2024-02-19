<?php
headerAdmin($data);
getModal('modalEmpresa', $data);
?>


<main class="app-content">


  <div class="row">
    <div class="col-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="example1">

              <thead>
                <tr>
                  <th>ID</th>
                  <th>NombrePuesto</th>
                  <th>Estado</th>
                  <th>Escuelas</th>
                  <th>titulacionesid</th>
                  <th>FechaInico</th>
                  <th>FechaFin</th>
                  <th>nombreEmpresa</th>
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
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</main>

<?php footerAdmin($data); ?>