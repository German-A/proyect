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
  <input type="hidden"  id="idobjetivos" >
    <div class="row">

      <div class="col-12 col-md-8">
        <label for="DescripcionPuesto">Objetivos Educacionales</label>
        <textarea type="text" id="textObjetivos" class="form-control summernote" id="DescripcionPuesto" name="DescripcionPuesto" placeholder=""></textarea>
        <a href="javascript:void(0);" class="btn btn-warning" onclick="enviarObjetivos()">Trabajo para Revisión</a>
      </div>

      <div class="col-12 col-md-8">
        <label for="DescripcionPuesto">Observaciones</label>
        <textarea type="text" class="form-control summernote" id="DescripcionPuesto" name="DescripcionPuesto" disabled placeholder=""></textarea>
      </div>
    </div>
    
    <br><br><br><br>

    <div class="row">
      <div class="col-6">
        <button type="button" class="btn btn-primary col-6" onclick="publicarOferta()">GUARDAR</button>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-danger col-6" class="close" data-dismiss="modal">Close</button>
      </div>
    </div>

  </form>





</main>

<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalPerfiles" tabindex="-1" role="dialog" aria-hidden="true">
<input type="hidden" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center" id="correoweb">


                </div>
            </div>
        </div>
    </div>
</div>




<?php footerAdmin($data); ?>
<script>
  $(document).ready(function() {
    $('.summernote').summernote({

    });
  });
</script>

<script>

$(document).ready(function() {

  console.log('sdsd');

  });




    function enviarObjetivos() {

      var textObjetivos = $("#textObjetivos").val();
      var idobetivos = $("#idobetivos").val();

      if (textObjetivos == 0) {
        swal("Atención!", "Aún no ha redactado los Objetivos Educacionales", "warning");
        return;
      }

      var fd = new FormData();
      fd.append("id", idobetivos);
      fd.append("textObjetivos", textObjetivos);

      $.ajax({
            method: "POST",
            url: "" + base_url + "/Objetivoseducacionales/set",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
          console.log(response);
            var info = JSON.parse(response);
            if (info.status == true) { 
                listado =
                        `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
                    $("#correoweb").html(listado);

            }
            if (info.status == false) { 
                listado =
                        `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
                    $("#correoweb").html(listado);

            }
            $('#modalPerfiles').modal('show');
            //swal("Atención!", "TERMINADO", "warning");
            //window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin/" + idEmpresa + "";
        });

    }
</script>