<?php
headerAdmin($data);
getModal('modalBanner', $data);
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisosMod']['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Banner</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">

    <div class="col-6 col-md-12">
      <label for="DescripcionPuesto">Descripción del Puesto</label>
      <textarea type="text" class="form-control summernote" id="DescripcionPuesto" name="DescripcionPuesto" placeholder="Ingresar Descripción Puesto"></textarea>
    </div>



    <div class="row">
      <div class="col-6">
        <button type="button" class="btn btn-primary col-6" onclick="publicarOferta()">PUBLICAR OFERTA LABORAL</button>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-danger col-6" class="close" data-dismiss="modal">Close</button>
      </div>
    </div>

  </form>




</main>
<?php footerAdmin($data); ?>
<script>
  $(document).ready(function() {
    $('.summernote').summernote({

    });
  });
</script>


<script>
  function publicarOferta() {

    console.log('sdsd');

    var datax = $("#frmempleo").serializeArray();
    $.ajax({
        method: "POST",
        url: "" + base_url + "/sendcorreo/enviarCorreo",
        data: datax

    }).done(function() {
        //swal("Atención!", "TERMINADO", "warning");
        window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin";
    });
}
</script>