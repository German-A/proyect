<?php
headerAdmin($data);
getModal('modal_objetivos_educacionales', $data);
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisos'][3]['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Banner</button>
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
            <table class="table table-hover table-bordered" id="dataList">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>descripcion</th>
                  <th>status</th>
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

<script>

  $(".departamento").select2({
    dropdownParent: $(".formConvocatoria"),
    ajax: {
      url: base_url + "/objetivos_educacionales/getCarrera",
      type: "post",
      dataType: "json",
      delay: 250,
      data: function(params) {
        return {
          palabraClave: params.term // search term
        };
      },
      processResults: function(response) {
        return {
          results: response
        };
      },
      cache: true
    }
  });

  $(document).ready(function() {
    datatable = $('#dataList').dataTable({
      "aProcessing": true,
      "aServerSide": true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
      "ajax": {
        "url": " " + base_url + "/objetivos_educacionales/getAll",
        "dataSrc": ""
      },
      "columns": [{
          "data": "id_objetivos_educacionales"
        },
        {
          "data": "descripcion"
        },
        {
          "data": "status"
        },
        {
          "data": "options"
        }
      ],
      'dom': 'lBfrtip',
      'buttons': [{
        "extend": "copyHtml5",
        "text": "<i class='far fa-copy'></i> Copiar",
        "titleAttr": "Copiar",
        "className": "btn btn-secondary"
      }, {
        "extend": "excelHtml5",
        "text": "<i class='fas fa-file-excel'></i> Excel",
        "titleAttr": "Esportar a Excel",
        "className": "btn btn-success"
      }, {
        "extend": "pdfHtml5",
        "text": "<i class='fas fa-file-pdf'></i> PDF",
        "titleAttr": "Esportar a PDF",
        "className": "btn btn-danger"
      }, {
        "extend": "csvHtml5",
        "text": "<i class='fas fa-file-csv'></i> CSV",
        "titleAttr": "Esportar a CSV",
        "className": "btn btn-info"
      }],
      "resonsieve": "true",
      "bDestroy": true,
      "iDisplayLength": 10,

      "order": [
        [0, "desc"]
      ]
    });

  });

  function openModal() {
    document.querySelector('#id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnText').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Objetivo Educacional";
    document.querySelector("#formmodal").reset();


    $('.summernote').summernote('reset');
    $('#modalRegistro').modal('show');
  }

  function GuardarEmpresa() {

    var id = $("#id").val();
    var descripcion = $("#descripcion").val();
    var status = $("#status").val();

    if (descripcion == '') {
      swal("Atención!", "Ingresar el descripcion", "warning");
      return;
    }

    var fd = new FormData();
    fd.append("id", id);
    fd.append("descripcion", descripcion);
    fd.append("status", status);

    divLoading.style.display = "flex";
    $.ajax({
      method: "POST",
      url: "" + base_url + "/objetivos_educacionales/set",
      data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function(response) {
      var info = JSON.parse(response);
      if (info.status == true) {
        swal("Objetivos Educacionales", info.msg, "success");
        datatable.api().ajax.reload();
        $("#modalRegistro").modal("hide");
      }
      if (info.status == false) {
        swal("Error!", info.msg, "error");
      }
      divLoading.style.display = "none";
      return;
    });
  }

  function fntEditEmpresa(id) {

    document.querySelector("#titleEmpresa").innerHTML = "ACTUALIZAR";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector("#btnEmpresa").classList.replace("btn-primary", "btn-info");
    document.querySelector("#btnEmpresa").innerHTML = "Actualizar";

    $.ajax({
      method: "GET",
      url: "" + base_url + "/objetivos_educacionales/getOne/" + id,
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType

    }).done(function(response) {
      var info = JSON.parse(response);

      if (info.status == true) {
        document.querySelector("#formmodalEmpresa").reset();
        document.getElementById('id').value = info.data['idexpoferiaslaboralesempresas'];
        document.getElementById('txtNombre').value = info.data['nombre'];
        document.getElementById('txtPosicion').value = info.data['posicion'];
        //   $(".summernote").summernote("your text");
        $('.summernote').summernote('code', info.data['descripcion']);
        // document.getElementsByClassName('summernote').value = info.data['descripcion'];
        document.getElementById('txtPosicion').value = info.data['posicion'];

      }
      if (info.status == false) {
        swal("Error!", info.msg, "error");
      }

      $("#modalRegistro").modal("show");
    });
  }

  function fntDeleteEmpresa(id) {

    swal({
      title: "Eliminar Empresa",
      text: "¿Realmente quiere eliminar el Empresa?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, eliminar!",
      cancelButtonText: "No, cancelar!",
      closeOnConfirm: false,
      closeOnCancel: true
    }, function(isConfirm) {

      if (isConfirm) {

        $.ajax({
          method: "POST",
          url: "" + base_url + "/objetivos_educacionales/deleteEmpresa/" + id,
          processData: false, // tell jQuery not to process the data
          contentType: false, // tell jQuery not to set contentType

        }).done(function(response) {
          var info = JSON.parse(response);
          console.log(info);
          console.log(info.status);

          if (info.status == true) {
            swal("Empresa", info.msg, "success");
            datatable.api().ajax.reload();
          }
          if (info.status == false) {
            swal("Error!", info.msg, "error");
          }
        });

      }

    });




  }
</script>