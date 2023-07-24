<?php
head($data);
obj($data);
?>

<?php
//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles = $obj->selectBanner();

?>


<div class="contenedorPrincipal ">

  <br>

  <div class="swiper mySwiper" data-aos="fade-down" data-aos-duration="500">
    <div class="swiper-wrapper" id="banner">
      <?php foreach ($perfiles as $key => $fila) { ?>
        <div class="swiper-slide">
          <img class="imgbanner" src="<?= media(); ?>/upload/portadas/<?php echo $fila['NombreArchivo'] ?>">
        </div>
      <?php } ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <style>
    .datosestad {
      background-color: rgb(81, 161, 212);
      padding: 40px;
      border-radius: 10px;
    }

    .amarillotitulo {
      color: rgb(255, 238, 10);
    }
  </style>
  <br><br><br><br>

  <div class="row  d-flex justify-content-center ml-4 mr-4">
    <div class="col-12  ml-4 mr-4 datosestad " data-aos="fade-down" data-aos-duration="500">

      <br>
      <div class="row">
        <b>
          <h1 class="col-md-12 amarillotitulo">UNIDAD DE SEGUIMIENTO DEL EGRESADO UNT</h1>
        </b>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-2">
          <h1 class="amarillotitulo" style="font-size: 35px;"><b>87%</b></h1>
          <h2 class="blanco">De nuestros egresados <strong>actualmente trabajan</strong></h2>
        </div>
        <div class="col-md-2">
          <h1 class="amarillotitulo" style="font-size: 35px;">1582</h1>
          <h2 class="blanco">Egresados en el año<strong> 2023</strong> </h2>
        </div>
        <div class="col-md-2">
          <h1 class="amarillotitulo" style="font-size: 35px;"><b>+2000</b> </h1>
          <h2 class="blanco"> <strong>Ofertas laborales</strong> activas</h2>
        </div>
        <div class="col-md-6">
          <h2 class="blanco">APUNTAMOS A LOS MÁS ALTOS ESTANDRES DE </h2>
          <h1 class="amarillotitulo"><b>CALIDAD</b></h1>

        </div>

      </div>
    </div>
  </div>

  <br><br><br>



  <div class="row  d-flex justify-content-center ml-4 mr-4">
    <div class="col-12  ml-4 mr-4 datosestad " data-aos="fade-down" data-aos-duration="500">

      <br>
      <div class="row text-center">
        <h1 class="col-md-12 amarillotitulo">Bolsa de TRABAJO </h1>
      </div>

      <div class="row d-flex justify-content-center">
        <h3 class="col-md-8 blanco">Apartir de este año hemos fortalecido el portal de empleos de las USE para acompañarte y apoyarte en tu desarrollo profesional. Te invitamos a que tu tambien seas parte de la nueva plataforma, ingresa y revisa las ofertas laborales exclusivas que tenemos para ti. </h3>
      </div>

      <br><br>
      <div class="row d-flex justify-content-center">
        <div class="col-3 text-center">imagen1</div>
        <div class="col-3 text-center">imagen1</div>
        <div class="col-3 text-center">imagen1</div>
        <div class="col-3 text-center">imagen1</div>
      </div>
    </div>
  </div>
  <br><br>

  <H1 class="text-center azul-oscuro">PLATAFORMAS</H1>



  <br><br><br>

  <div class="col-12 d-flex justify-content-center">
    <div class="col-10 col-md-6 col-xl-5 col-xg-6 p-1  text-center" style="border-radius:20px; background-color: var(--amarillo-mostaza);">
      <h5 class="blanco p-1">Unidad de Seguimiento del Egresado UNT</h5>
    </div>
  </div>
  <br>
  <br>

  <div class="col-12 d-flex justify-content-center text-center">
    <div class="col-4 col-md-3" data-aos="fade-down-left">
      <h2 class="mostaza" style="font-size: 35px;"><b>87%</b></h2>
      <h5 class="blueoscuro">De nuestros egresados <big><strong>actualmente trabajan</strong></big></h5>
    </div>
    <div class="col-4 col-md-3" data-aos="fade-down">
      <h2 class="mostaza" style="font-size: 35px;">1582</h2>
      <h5 class="blueoscuro">Egresados en el año<big><strong> 2023</strong></big> </h5>
    </div>
    <div class="col-4 col-md-3" data-aos="fade-down-right">
      <h2 class="mostaza" style="font-size: 35px;"><b>+5639</b> </h2>
      <h5 class="blueoscuro"> <big><strong>Ofertas laborales</strong></big> activas</h5>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>

  <div class="row d-flex justify-content-around" style="max-width: 900px; margin:auto">
    <div class="col-md-12">
      <div class="row" data-aos="fade-down-right">
        <div class="col-md-8 col-lg-6  text-left ">
          <h3 class="mostaza">Nuestra Misión</h3>
          <h4 class="blueoscuro">"Fomentar y fortalecer los vínculos entre la universidad con sus egresados de pre y posgrado, promoviendo la inserción laboral, el emprendimiento y su formación continua, coadyuva en la evaluación de los objetivos educacionales".</h4>
        </div>
        <div class="col-md-8 col-lg-6 d-flex align-items-center" data-aos="flip-left">
          <img class="col-10 img-fluid" src="<?= media(); ?>/archivos/logos/logoUse.png">
        </div>
      </div>
    </div>
    <br><br>
    <div class="col-md-12">
      <div class="row" data-aos="fade-down-left">
        <div class="col-md-8 col-lg-6 mt-5 d-flex align-items-center" data-aos="flip-left">
          <img class="col-10 img-fluid " src="<?= media(); ?>/archivos/logos/portadaUNT.jpg">
        </div>
        <div class="col-12 col-md-6  mt-5 text-right">
          <h3 class="mostaza">Nuestra Visión</h3>
          <h4 class="blueoscuro">"Al 2026, la USE, es reconocida nivel local y nacional por sus estrategias para fortalecer y actualizar información y conocimientos de los egresados de pre y posgrado; coadyuva en la evaluación de los objetivos educacionales como parte del proceso de mejora continua de los currículos de los programas de estudio de la UNT".</h4>
        </div>
      </div>
    </div>
  </div>
  <br><br>


  <br><br>
  <h2 class="mostaza text-center mb-5" data-aos="fade-down">PLATAFORMAS</h2>


  <div class="row d-flex justify-content-around text-center" style="max-width: 80%; margin:auto">

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
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/expoferiasuse.jpg" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">EXPOFERIA LABORAL</h5>
      </a>

    </div>
    <div class="plataform-use  col-md-6 col-lg-4 col-xl-4" data-aos="flip-down">
      <a href="<?= base_url(); ?>/solicitudempleo">
        <img class="logosplaforma" src="<?= media(); ?>/archivos/logos/publicarTrabajo.png" alt="">
        <br><br>
        <h5 class="text-cursosmooc text-center">PUBLICA TU OFERTA</h5>
      </a>

    </div>
  </div>
  <br>
  <br>
  <h2 class="mostaza text-center" data-aos="fade-down">NUESTRO EQUIPO</h2>
  <br>

  <div class="row contepersonald-flex justify-content-around text-center " data-aos="fade-down">
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">DIRECTOR DE LA UNIDAD DE <br> SEGUIMIENTO DEL EGRESADO</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/drEduardo.png" alt="">
      <div class="cont-info">
        <br>
        <h6>EDUARDO TEÓFILO <br> SOSA ANCAJIMA</h6>
        <p><small>LICENCIADO EN EDUCACIÓN</small></p>
      </div>
    </div><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">SUBUNIDAD DE ESTADÍSTICA <br> E INFORMÁTICA</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/mgLiseth.png" alt="">
      <div class="cont-info">
        <br>
        <h6>KATHERINE LIZETH <br> NUREÑA RODRÍGUEZ</h6>
        <p><small>INGENIERA ESTADÍSTICO</small> </p>
      </div>
    </div><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">ANALISTA DE <br>PROCESOS</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/ingPaul.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6>JEAN PAÚL<br> ROMERO LOBATÓN </h6>
        <p><small>INGENIERO DE SISTEMAS</small></p>
      </div>

    </div><br><br><br>

    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">ÁREA DE <br>TRAMITE DOCUMENTARIO</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/abogadaisa.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6 style="text-transform: uppercase;">Maria Isabel<br> Haro Valverde</h6>
        <p><small>ABOGADA</small></p>
      </div>

    </div>

    <br><br><br>

    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo ">
        <h5 class="bluemedio text-area">ÁREA DE<br>MARQUETÍN</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/licaandyb.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6>ANDY BRYAN<br>BENITES ZAVALETA</h6>
        <p><small>COMUNICADOR/DISEÑADOR</small></p>
      </div>
    </div>

    <br><br><br>
  </div>

  <br><br>

  </body>

</div>

<?php footer($data); ?>


<script>
  function sayHi() {
    $.ajax({
      url: " " + base_url + "/home/selectBannerFind/",
      type: "GET",
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      success: function(response) {
        bandera = true;
        var info = JSON.parse(response);
        var info = info.data;

        listado = "";

        for (i = 0; i < info.length; i++) {
          listado =
            listado +
            `
            <div class="swiper-slide" >
              <img class="imgbanner" src="<?= media(); ?>/upload/portadas/` + info[i].NombreArchivo + `">
            </div>
            `;
        }
        console.log('demas imaganes');
        $("#banner").append(listado);
      },
    });

  }



  function slider() {
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 4000,
      },
    });
  };

  setTimeout(sayHi, 7000);
  setTimeout(slider, 7000);
</script>