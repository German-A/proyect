<?php
headerAdmin($data);
getModal('modalBanner', $data);

obj($data);
$obj = new HomeModel();
$perfiles = $obj->empleo($data['idempleo']);

?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>

      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>


  <input type="hidden" id="idempleo" name="idempleo" value="<?= $data['idempleo'] ?>" id="">


  <div class="row text-center">
    <div class="col-md-6">
      <h5><i class="fas fa-globe"></i>NOMBRE EMPRESA: <?php echo $data['nombreEmpresa']; ?>  </h5>    
    </div>

    <div class="col-md-6">
      <h5>FECHA DE TERMINO: <?php echo $data['FechaFin']; ?><br></h5>           
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-md-4">
      <h5>Nombre del Puesto :</h5>      
      <?php echo $data['NombrePuesto']; ?>
    </div>
    <div class="col-md-4">
      <h5>Descripción del Puesto</h5><br>
      <?php echo $data['DescripcionPuesto']; ?><br>      
    </div>
    <div class="col-md-4">
      <h5>Información Adicional</h5><br>
      <?php echo $data['InformacionAdicional']; ?><br>     
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-md-4">
      <h5>LugarTrabajo:</h5>      
      <?php echo $data['LugarTrabajo']; ?>
    </div>
    <div class="col-md-4">
      <h5>TrabajoRemoto</h5><br>
      <?php echo $data['TrabajoRemoto']; ?><br>      
    </div>
    <div class="col-md-4">
      <h5>NumeroVacantes</h5><br>
      <?php echo $data['NumeroVacantes']; ?><br>     
    </div>
  </div>

  <br>

<div class="row">
  <div class="col-md-4">
    <h5>Experiencias :</h5>      
    <?php echo $data['Experiencias']; ?>
  </div>
  <div class="col-md-4">
    <h5>TipoContrato</h5><br>
    <?php echo $data['TipoContrato']; ?><br>      
  </div>
  <div class="col-md-4">
    <h5>JornadaLaboral</h5><br>
    <?php echo $data['JornadaLaboral']; ?><br>     
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-4">
    <h5>HorasSemanales :</h5>      
    <?php echo $data['HorasSemanales']; ?>
  </div>
  <div class="col-md-4">
    <h5>HorarioTrabajo</h5><br>
    <?php echo $data['HorarioTrabajo']; ?><br>      
  </div>
  <div class="col-md-4">
    <h5>RemuneracionBruta</h5><br>
    <?php echo $data['RemuneracionBruta']; ?><br>     
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <h5>HorasSemanales :</h5>      
    <?php echo $data['Contacto']; ?>
  </div>
</div>


<br>

<div class="col-6">
  <button type="button" onclick="ftnPostular(<?php echo $data['idEmpleos'];?>)" class="btn btn-primary float-right" style="margin-right: 5px;">
    <i class=""></i> Postular
  </button>
<!-- <a href="javascript:void(0)" onclick="imprimir()" rel="noopener" target="_blank" class="btn btn-success  float-right"><i class="fas fa-print"></i>IMPRIMIR</a> -->
</div>


<br>



<?php footerAdmin($data); ?>