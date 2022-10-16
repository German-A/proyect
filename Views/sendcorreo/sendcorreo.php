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
      <label for="descripcion">Descripción del Puesto</label>
      <textarea type="text" class="form-control summernote" id="descripcion" name="descripcion" placeholder="Ingresar Descripción Puesto"></textarea>
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

  <div class="col-4">
    <p id="resp"></p>
  </div>


  <div class="col-4">
    <input type="checkbox" onclick="marcarCheckbox(this);" />
    <label id="marcas">Marcar todos</label>
  </div>

  <?php
  $i = 1;
  foreach ($data['carreras'] as $line) { ?>
    <tr>
      <td>
        <?php echo $i; ?>
        <input type="checkbox" name="escuelas[]" id="escuelas" class="CheckedAK escuelas" value="<?php echo $line['idEscuela']; ?>" />
      </td>
      <td><?php echo $line['nombreEscuela']; ?></td>
    </tr>
  <?php $i++;
  } ?>



</main>


<?php footerAdmin($data); ?>
<script>
  $(document).ready(function() {
    $('.summernote').summernote({});
  });
</script>


<script>
  function publicarOferta() {

    var descripcion = $("#descripcion").val();



    var listaEscuelas = new Array();




    $('[name="escuelas[]"]:checked').each(function(index, check) {

      listaEscuelas.push({
        escuelas: check.value,
      });
    });


    // for (var i = 0; i < escuelas.length; i++) {
    //   listaEscuelas.push({
    //     escuelas: escuelas[i],
    //   });
    // }

    console.log(listaEscuelas);



    var fd = new FormData();
    fd.append("descripcion", descripcion);
    fd.append("listaEscuelas", JSON.stringify(listaEscuelas));
    //divLoading.style.display = "flex";

    $.ajax({
      method: "POST",
      url: "" + base_url + "/sendcorreo/enviarCorreo",
      //  data: datax,
      data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function() {
      console.log('fin');
      //swal("Atención!", "TERMINADO", "warning");
      //window.location.href = "" + base_url + "/empresaempleoadmin/empresaempleoadmin";
    });
  }
</script>


<script>
  $(document).click(function() { //Creamos la Funcion del Click
      var checked = $(".CheckedAK:checked").length;
      //Creamos una Variable y Obtenemos el Numero de Checkbox que esten Seleccionados
      $("#resp").text("Tienes Actualmente (" + checked + ") Registros " + "Seleccionado(s)");
      //Asignamos a la Etiqueta <p> el texto de cuantos Checkbox hay Seleccionados

      if (checked == 0) {
        $('#enviarform').hide(); //ocultar
      } else {
        $("#enviarform").fadeIn("slow"); //mostrar
        console.log(checked);
      }
    })
    .trigger("click");


  function marcarCheckbox(source) {
    //checkboxes = document.getElementsByTagName('input'); 
    checkboxes = document.getElementsByClassName('CheckedAK');
    //obtenemos todos los controles del tipo Input

    for (i = 0; i < checkboxes.length; i++)
    //recoremos todos los controles
    {
      if (checkboxes[i].type == "checkbox")
      //entramos si esta un checkbox
      {
        checkboxes[i].checked = source.checked;
        //si es un checkbox le damos el valor del checkbox
      }
    }
  }
</script>