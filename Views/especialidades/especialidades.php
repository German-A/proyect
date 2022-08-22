<?php
headerAdmin($data);
getModal('modalEspecialidad', $data);
getModal('modalPostgrado', $data);
?>

<main class="app-content">
  <div class="app-title text-center">
    <ul class="app-breadcrumb breadcrumb">
      <a href="<?= base_url(); ?>/especialidades/pefilesAcademicos" class="btn btn-primary">Perfiles academicos</a>
    </ul>
    <ul class="app-breadcrumb breadcrumb">
      <a href="<?= base_url(); ?>/especialidades/objetivosEducacionales" class="btn btn-primary">Objetivos Educacionales</a>
    </ul>
    <ul class="app-breadcrumb breadcrumb">
      <a href="<?= base_url(); ?>/especialidades/preguntasobjetivosEducacionales" class="btn btn-primary">Preguntas Objetivos Educacionales</a>
    </ul>
  </div>

  <div class="card-body bg-white">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Especialidades</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">MAESTRIAS</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade  show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="col-md-12">
          <div class="tile">

            <?php if ($_SESSION['permisosMod']['w']) { ?>
              <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Especialidades</button>
            <?php } ?>
            </h1>

            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="datatable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Bachiller</th>
                      <th>Titulo</th>
                      <th>Segundaespecialidad</th>
                      <th>Año</th>
                      <th>Nombre Escuela</th>
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

      <div class="tab-pane fade " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-12 col-md-10">
                <h4>Lista de Maestrias Registradas en la pagina Trasnparencia</h4>
              </div>
              <div class="col-12 col-md-2">
                <?php if ($_SESSION['permisosMod']['w']) { ?>
                  <button class="btn btn-primary" type="button" onclick="openModalPostGrado();"><i class="fas fa-plus-circle"></i> Registrar MAESTRIAS</button>
                <?php } ?>
              </div>
            </div>

            <div class="tile-body">
              <div class="table-responsive" style="width:100%;">
                <table class="table table-hover table-bordered" style="width:100%;" id="postgrado">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>tipopostgrado</th>
                      <th>escuelaid</th>
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
    </div>






  </div>



</main>






<?php footerAdmin($data); ?>


<script>
  $(document).ready(function() {

    $('.select2').select2();

    selectBachilleres();

    selecTitulo();


  });
</script>