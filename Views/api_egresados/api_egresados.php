<?php
headerAdmin($data);
getModal('modalDifusionCurso', $data);
?>

<link rel="stylesheet" href="<?= media(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if ($_SESSION['permisos'][32]['w']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar</button>
        <?php } ?>
      </h1>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header">
          <h3 class="card-title">LISTA DE EMPLEOS PENDIENTES PARA VALIDAR EL ESTADO ACTUAL DEL RUC</h3>
        </div>


        <div class="card-body">
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>anio_egreso</th>
                <th>periodo_egreso</th>
                <th>fecha_egreso</th>
                <th>sede</th>
                <th>escuela</th>
                <th>nro_documento</th>
                <th>apellidos</th>
                <th>nombres</th>
                <th>email_personal</th>
                <th>email_institucional</th>
                <th>celular</th>
                <th>telefono</th>
                <th>bachiller</th>
                <th>fecha_bachiller</th>
                <th>titulo_profesional</th>
                <th>fecha_titulo</th>
   
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>




<script>
  $(document).ready(function() {
    datatable = $("#datatable").dataTable({
      "aProcessing": true,
      "aServerSide": true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
      "ajax": {
        "url": " " + base_url + "/api_egresados/getList",
        "dataSrc": ""
      },

      "columns": [{
          "data": "anio_egreso"
        },
        {
          "data": "periodo_egreso"
        },
        {
          "data": "fecha_egreso"
        },
        {
          "data": "sede"
        },
        {
          "data": "escuela"
        },
        {
          "data": "nro_documento"
        },
        {
          "data": "apellidos"
        },
        {
          "data": "nombres"
        },
        {
          "data": "email_personal"
        },
        {
          "data": "email_institucional"
        },
        {
          "data": "celular"
        },
        {
          "data": "telefono"
        },
        {
          "data": "bachiller"
        },
        {
          "data": "fecha_bachiller"
        },
        {
          "data": "titulo_profesional"
        },
        {
          "data": "fecha_titulo"
        }
      ],

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
      "responsive": true,
      "bDestroy": true,
      "iDisplayLength": 10,
      "targets": [0,1,2,3,4],
      "order": [
        [0, "desc"]
      ]
    });
  });
</script>


<script src="<?= media(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>