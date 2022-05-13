<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles = $obj->selectBanner();
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
        <img src="<?= media(); ?>/archivos/banner/<?php echo $fila['NombreArchivo'] ?>">
      </div>
    <?php } ?>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>

<br>

<style>
  :root {
    --amarillo-mostaza: #e6ad09;
    --azul-claro: #0a2fff;
    --azul-medio: #12377b;
    --azul-oscuro: #000c4b;
  }

  .fondo {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 550px;
    margin: auto;
    background-color: red;
    padding: 5px 25px;
    border-radius: 20px;
    text-align: center;
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

  .portadaunt {
    width: 600px;
    height: 200px;
  }

  .cardmision {
    display: flex;
    flex-direction: row;
  }

  .logosvision {
    height: 60px;
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
    width: 90%;
    margin: auto;

  }

  .legalpdf {
    margin: auto;
    border-radius: 20px;
    border-color: #0a2fff;
    border: solid 1px #000;
    height: 150px;
    max-width: 1200px;
  }

  .pdfpng {
    background-color: red;
    width: 80px;
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
  .conteplataformas{
    padding: 20px;
  }
  
  .contepersonal{
    margin: auto;
  }

  .logosplaforma {
    width: 180px;
    margin: 0px 30px;
  }
  .equipoimg{
    width: 150px;
    height: 200px;

  }
  .areatitulo{
    color: var(--azul-claro); 
  }
  .cont-titulo{
    height: 80px;    
  }
  .cont-info{
    width: 90%;
    margin: auto;
    margin-top: 10px;
    border-radius: 20px;
    border-color: var(--amarillo-mostaza);
    border: solid 2px var(--amarillo-mostaza);
    padding: auto;
  }

</style>


<div class="fondo">
  <h3>Unidad de Seguimiento del Egresado UNT</h3>
</div>
<br>
<div class="divresultados">
  <div class="resultados">
    <div class="result-column">
      <h2 class="titulo-resultado text-center">98%</h2>
      <h4 class="texto-resultado text-center">De nuestros egresados trabajan actualmente</h4>
    </div>
  </div>
  <div class="resultados">
    <div class="result-column">
      <h2 class="titulo-resultado text-center">2688</h2>
      <h4 class="texto-resultado text-center">Egresados en el año 2020</h4>
    </div>
  </div>
  <div class="resultados">
    <div class="result-column">
      <h2 class="titulo-resultado text-center">+5000</h2>
      <h4 class="texto-resultado text-center">Ofertas laborales activas</h4>
    </div>
  </div>
</div>
<br><br><br>
<div class="contenedor-misionvision">
  <div class="cardmision" data-aos="fade-down-right">
    <div class="misiontext">
      <h3 class="titulomision">Nuestra Misión</h3>
      <h4>La DPA es un órgano técnico de gestión académica encargado de los diferentes procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</h4>
    </div>
    <img class="portadaunt" src="<?= media(); ?>/archivos/logos/portadaUNT.jpg">
  </div>
  <br>
  <div class="cardvision" data-aos="fade-down-left">
    <img class="logosvision" src="<?= media(); ?>/archivos/logos/logoDpa.png">
    <img class="logosvision" src="<?= media(); ?>/archivos/logos/logoUse.png">

    <div class="visiontext">
      <h3 class="titulomision">Nuestra Visión</h3>
      <h4>Al 2025 la DPA será un órgano técnico que integre de modo tecnológico, eficiente y eficaz, los procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</h4>
    </div>
  </div>

</div>
<br><br>

<div class="contenedorlegal" data-aos="fade-down-right">
  <h3 class="text-center titulos">
    BASE LEGAL
  </h3>
  <div class="legalpdf">
    <img class="pdfpng" src="<?= media(); ?>/archivos/logos/pdf.png" alt="">
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
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/cursomooc.png" alt="">
    <h4 class="text-center">Cursos mooc</h4>
  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/siseu.png" alt="">
    <h4 class="text-center">Siseu</h4>
  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/sineace.jpg" alt="">
    <h4 class="text-center">Sineace</h4>
  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/bolsatrabajo.png" alt="">
    <h4 class="text-center">Bolsa de Trabajo Unt</h4>
  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/expoferia.png" alt="">
    <h4 class="text-center">Expoferias Laboral</h4>
  </div>
  <div class="plataform-use  col-md-6 col-lg-4 col-xl-4">
    <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/manuales.png" alt="">
    <h4 class="text-center">Manuales y Guias de Usuario</h4>
  </div>
</div>


<br>
<h2 class="titulos text-center">NUESTRO EQUIPO</h2>
<br>

<div class="row contepersonal  d-flex justify-content-around text-center " data-aos="fade-down">
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
      <h7 class="areatitulo">DIRECTOR DE LA UNIDAD DE SEGUIMIENTO DEL EGRESADO</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/sosa.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>EDUARDO TEÓFILO SOSA ANCAJIMA</h6>
      <p>LICENCIADO EN EDUCACIÓN</p>
    </div>
  </div>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
       <h7 class="areatitulo">SUBUNIDAD DE ESTADÍSTICA E INFORMÁTICA</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/katherine.png" alt="">
    <div class="cont-info">
      <br>
      <h6>KATHERINE LIZETH NUREÑA RODRÍGUEZ</h6>
      <p>INGENIERA ESTADÍSTICO</p>
    </div>
  </div>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2 ">
    <div class="cont-titulo">
      <h7 class="areatitulo">ANALISTA DE PROCESOS</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/JEAN.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>JEAN PÁUL ROMERO LOBATÓN </h6>
      <p>ANALISTA DE PROCESOS</p>
    </div>
  </div>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
       <h7 class="areatitulo">SECRETARIADO LEGAL</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/milena.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>MILENA ALEXANDRA LÓPEZ ARIAS</h6>
      <p>SECRETARIADO LEGAL</p>
    </div>

  </div>
  <div class="col-12 col-sm-4 col-md-3 col-lg-2">
    <div class="cont-titulo">
    <h7 class="areatitulo">ÁREA DE MARKETING</h7>
    </div>
    <img class="equipoimg" src="<?= media(); ?>/img/renzo.jpeg" alt="">
    <div class="cont-info">
      <br>
      <h6>RENZO OMAR HURTADO CARBONEL</h6>
      <p>ÁREA DE MARKETING</p>
    </div>
  </div>
</div>



<?php footer($data); ?>