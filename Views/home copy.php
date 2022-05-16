<div class="contenedorPrincipal">
<?php head($data); ?>

<?php obj($data);

?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles = $obj->selectBanner();
$legal = $obj->selectLegalInicio();
?>



<link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/swiper8.0.6.min.css">
<link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/sliderSwiper.css">
<!-- 
<link rel="stylesheet" href="css/carrucelPrincipal.css">

<link rel="stylesheet" href="css/swiper8.0.6.min.css">
<link rel="stylesheet" href="css/sliderSwiper.css"> -->
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

<style>

  body {
      overflow-x: hidden;
  }

  :root {
    --amarillo-mostaza: #e6ad09;
    --azul-claro: #0a2fff;
    --azul-medio: #12377b;
    --azul-oscuro: #000c4b;
  }

  .mostaza{
    color: var(--amarillo-mostaza);
  }
  .blueclaro{
    color: var(--azul-claro);
  }
  .bluemedio{
    color: var(--azul-medio);
  }
  .blueoscuro{
    color: var(--azul-oscuro);
  }


  .fondo {
    background-color: var(--amarillo-mostaza);
    color: #ffffff;
  }

  .divresultados {
    display: flex;
    margin: 0px 200px;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    justify-content: center;
  }

  .result-column {
    padding: 0px 40px;
  }

  .titulo-resultado {
    font-family: Arial, Helvetica, sans-serif;
    color: var(--amarillo-mostaza);
  }

  .texto-resultado {
    color: var(--azul-oscuro);
  }

  .contenedor-misionvision {
    margin: 0px 200px;
  }



  .cardmision {
    display: flex;
    flex-direction: row;
  }

  .logosvision {
    height: 64px;
  }

  .misiontext {
    color: var(--azul-oscuro);
    width: 500px;
    padding-right: 100px;
  }

  .titulomision {
    color: var(--amarillo-mostaza);
  }

  .titulos {
    color: var(--amarillo-mostaza);
  }

  .cardvision {
    display: flex;
    flex-direction: row;
  }

  .visiontext {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    text-align: end;
    width: 800px;
    padding-left: 250px;
    color: var(--azul-oscuro);
  }

  .contenedorlegal {
    width: 80%;
    margin: auto;

  }

  .legalpdf {  
    border-radius: 20px;
    border-color: #0a2fff;
    border: solid 1px #000;
    padding: 0 20px;
    margin: 0px auto;
  }

  .pdfpng {
    background-color: red;
    max-width: 80px;
    margin-top: 25px;
    margin-left: 25px;
  }

  .contenedor-plataformas {
    max-width: 80%;
    margin: auto;
  }

  .plataformasuse {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
  }

  .conteplataformas {
    padding: 20px;
  }

  .contepersonal {
    margin: auto;
  }

  .logosplaforma {
    width: 180px;
    margin: 0px 30px;
  }

  .equipoimg {
    width: 150px;
    height: 200px;

  }

  .areatitulo {
    color: var(--azul-claro);
  }


  .cont-info {
    width: 90%;
    margin: auto;
    margin-top: 10px;
    border-radius: 20px;
    border-color: var(--amarillo-mostaza);
    border: solid 2px var(--amarillo-mostaza);
    padding: auto;
  }

  .azuloscuro {
    color: var(--azul-oscuro);
  }

  .cont-titulo {
    height: 40px;
  }

  @media(min-width:1024px) {
    .cont-titulo {
      height: 80px;
    }

  }
</style>


<div class="col-12 d-flex justify-content-center" data-aos="fade-down">  
  <div class="col-10 col-md-5 p-2  text-center" style="border-radius:20px; background-color: var(--amarillo-mostaza);">
  <h4><b>Unidad de Seguimiento del Egresado UNT</b> </h4>
  </div>
</div>
<br>
<br>

<div class="col-12 d-flex justify-content-center text-center">  
  <div class="col-4 col-md-3" data-aos="fade-down-left">
  <h3 class="mostaza"><b>98%</b></h3>
  <h4 class="bluemedio">De nuestros egresados actualmente trabajan</h4>
  </div>
  <div class="col-4 col-md-3" data-aos="fade-down">
  <h3 class="mostaza"><b>2117</b> </h3>
  <h4 class="bluemedio">Egresados en el año 2021</h4>
  </div>
  <div class="col-4 col-md-3" data-aos="fade-down-right">
  <h3 class="mostaza"><b>+2000</b> </h3>
  <h4 class="bluemedio">Ofertas laborales activas</h4>
  </div>
</div>
<br>
<br>

<br><br><br>

<div class="row d-flex justify-content-around text-center" style="max-width: 90%; margin:auto">
  <div class="col-md-12">
    <div class="row " data-aos="fade-down-right">
      <div class="col-md-4 text-left">
        <h3 class="titulomision">Nuestra Misión</h3>
        <h4 class="azuloscuro">La DPA es un órgano técnico de gestión académica encargado de los diferentes procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</h4>
      </div>
      <div class="col-md-8 mt-5" data-aos="flip-left">
        <img src="<?= media(); ?>/archivos/logos/portadaUNT.jpg" style="max-width: 98%; ">
      </div>
    </div>
  </div>
  <br><br>
  <div class="col-md-12">
    <div class="row" data-aos="fade-down-left">
      <div class="col-md-6  mt-4" data-aos="flip-right">
        <br><br>
          <img class="col-5 col-md-6 imglogooo" src="<?= media(); ?>/archivos/logos/logoDpa.png" >
          <img class="col-5 col-md-6 imglogooo"  src="<?= media(); ?>/archivos/logos/logoUse.png"  >
      </div>
      <br>
      <div class="col-md-6 mt-5 text-right">
        <h3 class="titulomision ">Nuestra Visión</h3>
        <h4 class="azuloscuro">Al 2025 la DPA será un órgano técnico que integre de modo tecnológico, eficiente y eficaz, los procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</h4>
      </div>
    </div>
  </div>
</div>

<br><br>

<div class="contenedorlegal" data-aos="fade-down-right">
  <h3 class="text-center titulos">
    BASE LEGAL
  </h3>

  <div class="legalpdf text-center">
    <div class="row">
      <?php foreach ($legal as $key => $fila) { ?>
        <div class="text-center">
          <a href="<?= media(); ?>/archivos/documentoslegales/<?php echo $fila['NombreArchivo'] ?>" target="_blank">
            <img class="pdfpng mr-5" src="<?= media(); ?>/archivos/logos/pdf.png" alt="">
            <p class="text-center" style="max-width: 30px;"><?php echo substr($fila['Nombre'], 0, 30).'...';  ?></p>      
          </a>

        </div>
      <?php } ?>
    </div>
  </div>
  <p class="text-center"><a href="<?= base_url(); ?>/bases">ver más</a></p>
</div>

<br><br><br>




<style>
  /*#region funciones*/

  .contenedorfunciones {
    width: 100%;
    /* display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center; */
    padding: 20px 40px;
  }

  .contenedorfunciones figure {
    position: relative;
    height: 200px;
    width: 100%;
    overflow: hidden;
    border-radius: 6px;
  }

  .contenedorfunciones figure img {
    width: 100%;
    height: 100%;
    transition: all 500ms ease-out;
  }

  .contenedorfunciones figure .capa {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(252, 252, 252, 0.89);
    transition: all 500ms ease-out;
    opacity: 0;
    visibility: hidden;
    text-align: center;
  }

  .contenedorfunciones figure:hover>.capa {
    opacity: 1;
    visibility: visible;
  }

  .contenedorfunciones figure:hover>.capa h3 {
    margin-top: 10px;
    margin-bottom: 15px;
  }

  .contenedorfunciones figure:hover>img {
    transform: scale(1.3);
  }

  .contenedorfunciones figure .capa h3 {
    color: var(--barra);
    font-weight: bold;
    font-size: 15px;
    margin-bottom: 20px;
    transition: all 500ms ease-out;
    margin-top: 50px;
  }

  .contenedorfunciones figure .capa p {
    color: black;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.5;
    width: 100%;
    max-width: 220px;
    margin: auto;
  }

  @media(min-width:1024px) {
    .rowFunciones {
      display: flex;
      flex-direction: row;
    }

    .rowFunciones figure {
      margin: 20px;
    }

    .contenedorfunciones {
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      padding: 20px 40px;
    }
  }


  /*#endregion funciones*/
</style>

<div class="row d-flex justify-content-around text-center" style="max-width: 80%; margin:auto">
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-up">
    <a href="<?= base_url(); ?>/cursosmooc">
      <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/cursomooc.png" alt="">
      <h4 class="text-center">Cursos mooc</h4>
    </a>
  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
  <a href="https://siseu-rep.sineace.gob.pe:6041/login" target="_blank">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/siseu.png" alt="">
    <h4 class="text-center">SISEU - PROGRAMA DE ESTUDIOS</h4>
    </a>

  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-up">
    <a href="https://siseu-rep.sineace.gob.pe:6040/" target="_blank">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/sineace.jpg" alt="">
    <h4 class="text-center">SISEU - EGRESADOS</h4>
    </a>

  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
    <a href="https://jobboard.universia.net/unitruoportunidades" target="_blank">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/bolsatrabajo.png" alt="">
    <h4 class="text-center">Bolsa de Trabajo Unt</h4>
    </a>

  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-up">
    <a href="<?= base_url(); ?>/expoferiavidaysalud" target="_blank">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/expoferia.png" alt="">
    <h4 class="text-center">Expoferias Laboral</h4>
    </a>

  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
  <a href="<?= base_url(); ?>/manuales" >
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/manuales.png" alt="">
    <h4 class="text-center">Manuales y Guias de Usuario</h4>
    </a>

  </div>
</div>


<br>
<h2 id="NOSOTROS" class="titulos text-center">NUESTRO EQUIPO</h2>
<br>

<div class="row contepersonald-flex justify-content-around text-center " data-aos="fade-down">
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
      <h7 class="areatitulo">DIRECTOR DE LA UNIDAD DE SEGUIMIENTO DEL EGRESADO</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/sosa.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>EDUARDO TEÓFILO SOSA ANCAJIMA</h6>
      <p><small>LICENCIADO EN EDUCACIÓN</small></p>
    </div>
  </div><br><br><br>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
      <h7 class="areatitulo">SUBUNIDAD DE ESTADÍSTICA E INFORMÁTICA</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/katherine.png" alt="">
    <div class="cont-info">
      <br>
      <h6>KATHERINE LIZETH NUREÑA RODRÍGUEZ</h6>
      <p><small>INGENIERA ESTADÍSTICO</small> </p>
    </div>
  </div><br><br><br>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2 ">
    <div class="cont-titulo">
      <h7 class="areatitulo">ANALISTA DE PROCESOS</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/JEAN.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>JEAN PÁUL ROMERO LOBATÓN </h6>
      <p><small>ANALISTA DE PROCESOS</small></p>
    </div>
  </div><br><br><br>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
      <h7 class="areatitulo">SECRETARIADO LEGAL</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/milena.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>MILENA ALEXANDRA LÓPEZ ARIAS</h6>
      <p><small>SECRETARIADO LEGAL</small></p>
    </div>

  </div><br><br><br>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
      <h7 class="areatitulo">ÁREA DE MARKETING</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/renzo.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h8>RENZO OMAR HURTADO CARBONEL</h8>
      <p><small>ÁREA DE MARKETING</small></p>
    </div>
  </div><br><br><br>
</div>


</div>


<?php footer($data); ?>