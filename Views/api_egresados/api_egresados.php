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
    <div class="col-md-4">
      <h5 class="bluemedio">AÑO EGREGO</h5>
      <select class="form-control anio_egreso" name="anio_egreso" id="anio_egreso" data-live-search="true" class="mdb-select md-form" x>
        <option value="0" disabled selected>Seleccionar</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2018">2018</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
      </select>
    </div>
    <div class="col-md-4">
      <h5 class="bluemedio">Programa de estudio:</h5>
      <select class="id_escuela" data-placeholder="Seleccionar" id="id_escuela">
      </select>
    </div>

    <div class="col-md-3 d-flex align-items-center">
      <a href="javascript:void(0);" onclick="buscar()" class="btn btn-primary">BUSCAR</a>
    </div>
    <div class="col-md-4">

    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header">
          <h3 class="card-title">anio_egreso DE EMPLEOS PENDIENTES PARA VALIDAR EL ESTADO ACTUAL DEL RUC</h3>
        </div>


        <div class="card-body">
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>anio_egreso</th>
                <th>periodo_egreso</th>
                <th>fecha_egreso</th>
                <th>sede</th>
                <th>id_escuela</th>
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


  $(".anio_egreso").select2({});

  $(".id_escuela").select2({
    ajax: {
      url: " " + base_url + "/api_egresados/getSelectCarreras",
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

  function buscar() {
    var anio_egreso = $("#anio_egreso").val();
    var id_escuela = $("#id_escuela").val();
    var fd = new FormData();
    fd.append("anio_egreso", anio_egreso);
    fd.append("id_escuela", id_escuela);

    $.ajax({
      method: "POST",
      url: "" + base_url + "/api_egresados/getList",
      data: fd,
      processData: false, // tell jQuery not to process the data
      contentType: false // tell jQuery not to set contentType

    }).done(function(response) {
      datatable = $("#datatable").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "data":  response, 

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
            "data": "id_escuela"
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
        "targets": [0, 1, 2, 3, 4],
        "order": [
          [0, "desc"]
        ]
      });

    });


  }
</script>


<script src="<?= media(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>