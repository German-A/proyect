<?php 
    headerAdmin($data); 
    getModal('modalUsuarios',$data);
?>

  <main class="app-content">    
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w']){ ?>
                <a class="btn btn-primary" type="button" href="<?= base_url(); ?>/Registrarempleo"> <i class="fas fa-plus-circle"></i> Nuevo</a>
              <?php } ?>
            </h1>
            <input type="hidden" id="idUser" name="idUser" value="<?php echo $data['idUser'] ?>">
            
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
                    <table class="table table-hover table-bordered" id="tableUsuarios">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NombrePuesto</th>
                          <th>Carreras</th>
                          <th>Titulaciones</th>
                          <th>FechaInico</th>
                          <th>FechaFin</th>
                          <th>Estado</th>          
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
    