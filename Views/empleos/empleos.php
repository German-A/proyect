<?php
headerAdmin($data);
getModal('modalBanner', $data);

obj($data);
$obj = new HomeModel();
$perfiles = $obj->empleosAll();
?>



<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
      </h1>
    </div>

  </div>

  <div class="row">
    <!-- <?php foreach ($perfiles as $key => $fila) { ?>
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-header text-muted">
            <h3 class="text-primary"><?php echo $fila['nombreEmpresa']; ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <h4><?php echo $fila['NombrePuesto']; ?></h4>
                <h6 class="text-muted text-sm"><b>DescripcionPuesto: </b>
                  <br> <?php echo $fila['DescripcionPuesto']; ?>
                </h6>
              </div>
              <div class="col-4">
                <?php $logoEmpresa = $fila['imagen']; ?>
                <?php if ($logoEmpresa != null) { ?>
                  <img class="col-12" src="<?= base_url(); ?>/Assets/archivos/empresa/<?php echo $logoEmpresa ?>" style="width: 200px; height: 50px; border-radius: 10% ;" alt="User Image">
                <?php } else { ?>
                  <img class="col-12" src="<?= base_url(); ?>/Assets/img/persona.jpg" style="width: 200px; height: 50px; border-radius: 10% ;" alt="User Image">
                <?php } ?>
              </div>
            </div>
            <div class="row">
              <ul class="ml-4 mb-0 fa-ul text-muted">
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                  <h5><b>Tipo De Contrato: </b>
                    <td><?php echo $fila['TipoContrato']; ?></td>
                </li>
                </h4>
              </ul>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="verOfertaEmpleo(<?php echo $fila['idEmpleos']; ?>)"> <i class="fas fa-user"></i> VER MÁS
              </a>
            </div>
          </div>
        </div>
        <br>
      </div>

    <?php } ?> -->


    <div class="input-group">
      <input class="form-control" type="text" name="producto" id="producto" placeholder="Buscar por Carrera, Nombre de Empresa, Nombre de Puesto..." />
      <div class="input-group-addon">
        <button type="button" class="btn btn-default" onclick="BuscarProducto()">
          <li class="fa fa-search"></li>
        </button>
      </div>
    </div>
  </div>


  <br>

  <div class="row" id="div_productos">

  </div>





</main>


<?php footerAdmin($data); ?>


<script type="text/javascript">
  function tiempoReal() {
    var tabla = $.ajax({
      url: " " + base_url + "/empleos/getBanners",
      dataType: 'text',
      async: false
    }).responseText;

    document.getElementById("miTabla").innerHTML = tabla;
  } //setInterval(tiempoReal, 1000);

  function cargarFunciones() {
    tiempoReal();
  }

  window.onload = cargarFunciones;
</script>



<script type="text/javascript">
  function BuscarProducto() {
    $.ajax({
        method: "POST",
        url: " " + base_url + "/empleos/getBanners/" + $("#producto").val(),
      })
      .done(function(text) {
        json = JSON.parse(text);
        console.log(json[0].nombreEmpresa);
        listado = '';
        for (i = 0; i < json.length; i++) {

          listado = listado +
            ` 
            <div class="col-12 col-md-6">     
          <div class="card">
          <div class="card-header ">
            <h3 class="text-primary">` + json[i].nombreEmpresa + `</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <h4>` + json[i].NombrePuesto + `</h4>
                <h6 class=" text-sm"><b>DescripcionPuesto: </b>
                  <br>` + json[i].DescripcionPuesto + `
                </h6>
              </div>
              <div class="col-4">

                  <img class="col-12" src="<?= base_url(); ?>/Assets/archivos/empresa/` + json[i].imagen + `" style="width: 200px; height: 50px; border-radius: 10% ;" alt="User Image">

              </div>
            </div>
            <div class="row">  
                <h6 class=""><b>Carreras: </b>&nbsp;&nbsp;` + json[i].escuelaid + `</h6>
            </div>
            <div class="row">
              <ul class="ml-4 mb-0 fa-ul ">
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                  <h5><b>Tipo De Contrato: </b>
                    <td>` + json[i].TipoContrato + `</td>
                </li>
                </h4>
              </ul>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="verOfertaEmpleo(` + json[i].idEmpleos + `)"> <i class="fas fa-user"></i> VER MÁS
              </a>
            </div>
          </div>
        </div>
        <br>
      </div>`;

        }


        $("#div_productos").html(listado);
      });
  } //setInterval(tiempoReal, 1000);

  function cargarFunciones() {
    BuscarProducto();
  }

  window.onload = cargarFunciones;
</script>