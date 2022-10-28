<?php
headerAdmin($data);
//getModal('modalBanner', $data);
?>



<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisos'][3]['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModalBanner();"><i class="fas fa-plus-circle"></i> Registrar Banner</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>NombreArchivo</th>
                  <th>Posicion</th>
                  <th>FechaRegistro</th>
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


<!-- Modal  agregarPostrado-->
<div class="modal fade" id="modalRegistroBanner" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleBanner">Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formmodalBanner" name="formmodalBanner" class="form-horizontal">
                    <input type="hidden" id="idBanner" name="idBanner" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>


                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtPosicion">Posición</label>
                            <input type="number" class="form-control" id="txtPosicion" name="txtPosicion" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Archivo a subir:</label>
                            <input type="file" id="archivoSubido" name="archivoSubido">
                        </div>
                    </div>

                    <div class="tile-footer">
                        <a href="javascript:void(0)" class="btn btn-info" id="btnBanner" onclick="GuardarBanner()">Guardar</a>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
</script>