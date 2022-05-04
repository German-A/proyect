<?php
headerAdmin($data);
getModal('modalUsuarios', $data);
?>


<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
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



        <div class="col-12">
          <form action="" id="form_subir">
            <div class="form-1-2">
              <label for="">Archivo a subir:</label>
              <input type="file" id="archivoNacional" name="archivoSubido" required>
            </div>
            <div class="barra">
              <div class="barra_azul" id="barra_estado">
                <span></span>
              </div>
            </div>
            <div class="NombreArchivo">
              <label class="labelArchivo">Nombre del Archivo: </label>
              <input type="hidden" name="accion" id="accion" value="REGISTRAR_ALUMNO">
              <input class="inputArchivo" name="nombreArchivo" placeholder="INGRESAR NOMBRE" required>
            </div>
            <div class="acciones">
              <a type="submit" href="javascript:void(0)" class="iconSubir" value="enviar" onclick="subir_archivo()"><i class="fas fa-cloud-upload-alt"></i>Importar</a>
              <button type="button" class="iconCacelar" id="cancelar" value="cancelar">Cancelar</i></button>
            </div>
          </form>
        </div>



        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableUsuarios">
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