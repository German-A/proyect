<?php
head($data);
obj($data);
?>

<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles = $obj->selectBanner();
$legal = $obj->selectLegalInicio();
?>

<div class="contenedorPrincipal ">



  <br>

  <div class="swiper mySwiper" data-aos="fade-down" data-aos-duration="500">
    <div class="swiper-wrapper">
      <?php foreach ($perfiles as $key => $fila) { ?>
        <div class="swiper-slide">
          <img class="imgbanner" src="<?= media(); ?>/archivos/banner/<?php echo $fila['NombreArchivo'] ?>">
        </div>
      <?php } ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <br>

  <div class="col-12 d-flex justify-content-center" >
    <div class="col-10 col-md-6 p-1  text-center" style="border-radius:20px; background-color: var(--amarillo-mostaza);" data-aos="fade-down">
      <h4 class="blanco">Unidad de Seguimiento del Egresado UNT</h4>
    </div>
  </div>
  <br>
  <br>

  <div class="col-12 d-flex justify-content-center text-center">
    <div class="col-4 col-md-3" data-aos="fade-down-left">
      <h2 class="mostaza" style="font-size: 35px;"><b>98%</b></h2>
      <h5 class="blueoscuro">De nuestros egresados <big><strong >actualmente trabajan</strong></big></h5>
    </div>
    <div class="col-4 col-md-3" data-aos="fade-down">
      <h2 class="mostaza" style="font-size: 35px;">2117</h2>
      <h5 class="blueoscuro">Egresados en el año<big><strong> 2021</strong></big> </h5>
    </div>
    <div class="col-4 col-md-3" data-aos="fade-down-right">
      <h2 class="mostaza" style="font-size: 35px;"><b>+2000</b> </h2>
      <h5 class="blueoscuro"> <big><strong>Ofertas laborales</strong></big> activas</h5>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>

  <div class="row d-flex justify-content-around text-center" style="max-width: 70%; margin:auto">
    <div class="col-md-12">
      <div class="row" data-aos="fade-down-right">
        <div class="col-md-4 pl-2 text-left">
          <h3 class="mostaza">Nuestra Misión</h3>
          <h5 class="blueoscuro">La DPA es un órgano técnico de gestión académica encargado de los diferentes procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</h5>
        </div>
        <div class="col-md-8" data-aos="flip-left">
          <img src="<?= media(); ?>/archivos/logos/portadaUNT.jpg" style=" min-width: 95%; max-height: 200px;">
        </div>
      </div>
    </div>
    <br><br>
    <div class="col-md-12">
      <div class="row" data-aos="fade-down-left">
        <div class="col-md-7 align-self-center mt-4" data-aos="flip-right">
          <br><br>
          <div class="row d-flex justify-content-center">
            <img class="col-6 col-md-6 imglogooo" src="<?= media(); ?>/archivos/logos/logoDpa.png">
            <img class="col-6 col-md-6 imglogooo" src="<?= media(); ?>/archivos/logos/logoUse.png">
          </div>
        </div>
        <br>
        <div class="col-md-5 mt-5 mt-4 text-right">
          <h3 class="mostaza">Nuestra Visión</h3>
          <h5 class="blueoscuro">Al 2025 la DPA será un órgano técnico que integre de modo tecnológico, eficiente y eficaz, los procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</h5>
        </div>
      </div>
    </div>
  </div>
  <br><br>


  <!-- <h3 class="mostaza text-center">BASE LEGAL</h3>
  <div class="border border-primary ml-5 mr-5">
    <div class="row d-flex  text-center" style="max-width: 95%; margin:auto">
      <?php foreach ($legal as $key => $fila) { ?>
        <a class="col-4" href="<?= media(); ?>/archivos/documentoslegales/<?php echo $fila['NombreArchivo'] ?>" target="_blank">
          <img src="<?= media(); ?>/archivos/logos/pdf.png" style="height: 50px;">
          <p><?php echo substr($fila['Nombre'], 0, 30) . '...';  ?></p>
        </a>
      <?php } ?>
    </div>
    <p class="text-center"><a href="<?= base_url(); ?>/bases">ver más</a></p>
  </div> -->


  <br><br>
  <h2 class="mostaza text-center mb-5"  data-aos="fade-down">PLATAFORMAS</h2>


  <div class="row d-flex justify-content-around text-center" style="max-width: 80%; margin:auto">
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-up">
      <a href="<?= base_url(); ?>/cursosmooc">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/cursomooc.png" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">CURSOS MOOC</h5>
      </a>
    </div>
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
      <a href="https://siseu-rep.sineace.gob.pe:6041/login" target="_blank">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/siseu.png" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">SISEU - PROGRAMA DE ESTUDIO</h5>
      </a>

    </div>
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-up">
      <a href="https://siseu-rep.sineace.gob.pe:6040/" target="_blank">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/sineace.jpg" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">SISEU - EGRESADOS</h5>
      </a>

    </div>
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
      <a href="https://jobboard.universia.net/unitruoportunidades" target="_blank">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/bolsatrabajo.png" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">BOLSA DE TRABAJO UNT</h5>
      </a>

    </div>
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-up">
      <a href="<?= base_url(); ?>/expoferiavidaysalud" target="_blank">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/expoferia.png" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">EXPOFERIA LABORAL</h5>
      </a>

    </div>
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
      <a href="<?= base_url(); ?>/manuales">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/manuales.png" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">MANUALES Y GUIAS DE USUARIO</h5>
      </a>

    </div>
  </div>
  <br>
  <br>
  <h2 class="mostaza text-center" data-aos="fade-down">NUESTRO EQUIPO</h2>
  <br>

  <div class="row contepersonald-flex justify-content-around text-center " data-aos="fade-down">
    <div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">DIRECTOR DE LA UNIDAD DE SEGUIMIENTO DEL EGRESADO</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/sosa.jpeg" alt="">
      <div class="cont-info">
        <br>
        <h6>EDUARDO TEÓFILO SOSA ANCAJIMA</h6>
        <p><small>LICENCIADO EN EDUCACIÓN</small></p>
      </div>
    </div><br><br><br>
    <div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">SUBUNIDAD DE ESTADÍSTICA E INFORMÁTICA</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/katherine.png" alt="">
      <div class="cont-info">
        <br>
        <h6>KATHERINE LIZETH NUREÑA RODRÍGUEZ</h6>
        <p><small>INGENIERA ESTADÍSTICO</small> </p>
      </div>
    </div><br><br><br>
    <div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">ANALISTA DE PROCESOS</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/JEAN.jpeg" alt="">
      <div class="cont-info">
        <br>
        <h6>JEAN PÁUL ROMERO LOBATÓN </h6>
        <p><small>INGENIERÍA DE SISTEMAS</small></p>
      </div>
    </div><br><br><br>
    <div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-2">
      <div class="cont-titulo ">
        <h5 class="bluemedio text-area">ÁREA LEGAL</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/milena.jpeg" alt="">
      <div class="cont-info">
        <br>
        <h6>MILENA ALEXANDRA LÓPEZ ARIAS</h6>
        <p><small>ABOGADA</small></p>
      </div>

    </div><br><br><br>
    <div class="col-12 col-sm-4 col-md-3 col-lg-2 mb-2">
      <div class="cont-titulo ">
        <h5 class="bluemedio text-area">ÁREA DE MARKETING</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/renzo.jpeg" alt="">
      <div class="cont-info">
        <br>
        <h8>RENZO OMAR HURTADO CARBONEL</h8>
        <p><small>COMUNICADOR/DISEÑADOR</small></p>
      </div>
    </div><br><br><br>
  </div>



  <br><br>



  </body>

</div>

<?php footer($data); ?>