<?php
headerAdmin($data);
getModal('modalEmpresaempleoadmin', $data);
?>


<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <a class="btn btn-primary" type="button" href="<?= base_url(); ?>/empresaempleoregistroadmin/empresaempleoregistroadmin/<?= $data['idempresa'] ?>"> <i class="fas fa-plus-circle"></i> Nuevo</a>
          
 
          <!-- <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Banner</button> -->
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
    <input type="hidden" id="idempresa" value="<?= $data['idempresa'] ?>">
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










<!-- subir archivos BANNER -->
<script>
  function subir_archivo() {

    let form = document.getElementById('form_subir');
    let barra_estado = form.children[1].children[0],
      span = barra_estado.children[0],
      botom_cancelar = form.children[3].children[1];
    //peticion
    let peticion = new XMLHttpRequest();

    //progreso
    peticion.upload.addEventListener("progress", (event) => {
      let porcentaje = Math.round((event.loaded / event.total) * 100);
      console.log(porcentaje);
      barra_estado.style.width = porcentaje + '%';
      span.innerHTML = porcentaje + '%';
    });

    //finalizado
    peticion.addEventListener("load", () => {
      barra_estado.classList.add('barra_verde');
      span.innerHTML = "proceso completado";
      setTimeout(completado, 1000);
    });

    function completado() {
      barra_estado.style.width = '0%'

      document.getElementsByClassName("inputArchivo")[0].value = "";
      document.getElementById("archivoNacional").value = "";
    }

    //enviar datos
    //peticion.open('post', '<?= base_url(); ?>/Controllers/banner/subirBanner');
    peticion.open('post', 'Views/banner/subirBanner.php');
    peticion.send(new FormData(form));

    //cancelar
    botom_cancelar.addEventListener("click", () => {
      peticion.abort();
      barra_estado.classList.remove('barra_verde');
      barra_estado.classList.add('barra_roja');
      span.innerHTML = "x cancelado";
      setTimeout(completado, 1000);
    });
  }
</script>