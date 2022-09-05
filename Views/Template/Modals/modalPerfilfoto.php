<!-- Modal -->
<div class="modal fade" id="modalFormPerfilFoto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="FormPerfilFoto" name="FormPerfilFoto" class="form-horizontal">

          <input type="hidden" id="idUsuario2" name="idUsuario2">
          <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>


          <div class="row text-center">
            <div class="col-md-4 text-center  col-12">
              <h5>Foto de Perfil</h5>
              <?php
              if (isset($_SESSION['userData']['imagen'])) { ?>
                <img class="user-img" src="<?= media() . '/archivos/usuarios/' . $_SESSION['userData']['imagen']; ?>" style="max-width: 120px; max-height: 100px; min-width: 120px; min-height: 100px;">
              <?php } else { ?>
                <img class="user-img" src="<?= media() ?>/images/avatar.png" style="max-width: 120px; max-height: 100px; min-width: 120px; min-height: 100px;">
              <?php } ?><br>
            </div>
            <div class="col-md-4 text-center col-12">
              <h5>Seleccionar Nueva Foto: <span class="required">*</span></h5>
              <div id="preview" class="m-auto" style="max-width: 120px; max-height: 100px; min-width: 120px; min-height: 100px;" ></div>

              <input id="file" name="file" type="file"  />
              <hr>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-end">    
                <button id="btnActionForm" class="btn btn-info" type="submit" style="max-height: 40px;"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Actualizar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal" style="max-height: 40px;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
            </div>


          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  document.getElementById("file").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
      let preview = document.getElementById('preview'),
        image = document.createElement('img');
        

      image.src = reader.result;
      image.style.cssText = "max-width: 120px; max-height: 100px; min-width: 120px; min-height: 100px;";

      preview.innerHTML = '';
      preview.append(image);
    };
  }
</script>