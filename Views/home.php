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


  <br><br><br><br>
  <!-- 
  <div class="col-12 text-center ml-4 mr-4">


    <div class="row">
      <h2>UNIDAD DE SEGUIMIENTO DEL EGRESADO UNT</h2>
    </div>
    <div class="row">
      <div class="col-2">
        <h2 class="mostaza" style="font-size: 35px;"><b>98%</b></h2>
        <h5 class="blueoscuro">De nuestros egresados <strong>actualmente trabajan</strong></h5>
      </div>
      <div class="col-2">
        <h2 class="mostaza" style="font-size: 35px;">3366</h2>
        <h5 class="blueoscuro">Egresados en el año<strong> 2021</strong> </h5>
      </div>
      <div class="col-2">
        <h2 class="mostaza" style="font-size: 35px;"><b>+2000</b> </h2>
        <h5 class="blueoscuro"> <strong>Ofertas laborales</strong> activas</h5>
      </div>
      <div class="col-6">
        <h3>APUNTAMOS A LOS MÁS ALTOS ESTANDRES DE </h3>
        <h3><b>CALIDAD</b></h3>

      </div>

    </div>
  </div> -->

  <div class="col-12 d-flex justify-content-center">
    <div class="col-10 col-md-6 col-xl-5 col-xg-6 p-1  text-center" style="border-radius:20px; background-color: var(--amarillo-mostaza);">
      <h5 class="blanco p-1">Unidad de Seguimiento del Egresado UNT</h5>
    </div>
  </div>
  <br>
  <br>

  <div class="col-12 d-flex justify-content-center text-center">
    <div class="col-4 col-md-3" data-aos="fade-down-left">
      <h2 class="mostaza" style="font-size: 35px;"><b>84%</b></h2>
      <h5 class="blueoscuro">De nuestros egresados <big><strong>actualmente trabajan</strong></big></h5>
    </div>
    <div class="col-4 col-md-3" data-aos="fade-down">
      <h2 class="mostaza" style="font-size: 35px;">3361</h2>
      <h5 class="blueoscuro">Egresados en el año<big><strong> 2023</strong></big> </h5>
    </div>
    <div class="col-4 col-md-3" data-aos="fade-down-right">
      <h2 class="mostaza" style="font-size: 35px;"><b>+5169</b> </h2>
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


  <style>
    .iconosPlaforma {
      height: 50px;
      width: 50px;
    }

    .fondo {
      min-width: max-content;
      padding: 5px;
    }

    .cuadro_texto {
      padding-right: 50px;
    }
    .container{
      margin: 20px auto;
    }
       .cuadro_enlace {
        min-width: 270px;
        min-height: 145px;
    }
  </style>

  <div class="container ">
    <div class="col-12 text-center">
      <h2 class=" mostaza text-center" data-aos="fade-up">PLATAFORMAS</h2>
    </div>
    <br>

    <div class="row d-flex justify-content-around ">

      <a href="<?= base_url(); ?>/encuestaempresas" target="_blank">
        <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace" data-aos="flip-down">
          <div class="text-right">
            <img class="iconosPlaforma" src="<?= media(); ?>/archivos/home/encuesta_empleadores.png" alt="">
          </div>
          <br>
          <div class="col-md-12 text-left cuadro_texto">
            <h5 class="">ENCUESTA <br>EMPLEADORES</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </a>

      <a href="https://siseu-rep.sineace.gob.pe:6040/" target="_blank">
        <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace" data-aos="flip-down">
          <div class="col-12 text-right col-md-12">
            <img class="iconosPlaforma" src="<?= media(); ?>/archivos/home/siseu.png" alt="">
          </div>
          <br>
          <div class="col-md-12 text-left cuadro_texto">
            <h5 class="">SISEU <br> EGRESADOS</h5>
          </div>
        </div>
      </a>

      <a target="_blank" href="https://jobboard.universia.net/unitruoportunidades">
        <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace" data-aos="flip-down">
          <div class="col-12 text-right col-md-12">
            <img class="iconosPlaforma" src="<?= media(); ?>/archivos/home/bolsa_trabajo.png" alt="">
          </div>
          <br>
          <div class="col-md-12 text-left cuadro_texto">
            <h5 class="">BOLSA DE <br>TRABAJO UNT</h5>
          </div>
        </div>
      </a>

      <a target="_blank" href="<?= base_url(); ?>/expoferialaboral">
        <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace" data-aos="flip-up">
          <div class="col-12 text-right col-md-12">
            <img class="iconosPlaforma" src="<?= media(); ?>/archivos/home/feria_laboral.png" alt="">
          </div>
          <br>
          <div class="col-md-12 text-left cuadro_texto">
            <h5 class="">FERIA <br>LABORAL</h5>
          </div>
        </div>
      </a>

      <a target="_blank" href="<?= base_url(); ?>/solicitudempleo">
        <div class="col-8 col-md-4 col-lg-3  fondo cuadro_enlace" data-aos="flip-up">
          <div class="col-12 text-right col-md-12">
            <img class="iconosPlaforma" src="<?= media(); ?>/archivos/home/publicar_oferta.png" alt="">
          </div>
          <br>
          <div class="col-md-12 text-left cuadro_texto">
            <h5 class="">PUBLICA <br>TU OFERTA LABORAL</h5>
          </div>
        </div>
      </a>

    </div>
  </div>
  <br>

  <style>
    .equipoimg {
      max-width: 200px;
      max-height: 200px;
    }
  </style>
  <h2 class="mostaza text-center" data-aos="fade-up">NUESTRO EQUIPO</h2>
  <br>

  <div class="row contepersonald-flex justify-content-around text-center " data-aos="fade-down">
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">DIRECTOR UNIDAD DE<br> SEGUIMIENTO DEL EGRESADO</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/s2024.png" alt="">
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
      <img class="equipoimg" src="<?= media(); ?>/img/kat2024.png" alt="">
      <div class="cont-info">
        <br>
        <h6>KATHERINE LIZETH <br> NUREÑA RODRÍGUEZ</h6>
        <p><small>INGENIERA ESTADÍSTICO</small> </p>
      </div>

    </div><br><br><br>


    <br><br><br>

    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo ">
        <h5 class="bluemedio text-area">ÁREA DE<br>MARQUETÍN</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/a2024.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6>ANDY BRYAN<br>BENITES ZAVALETA</h6>
        <p><small>COMUNICADOR/DISEÑADOR</small></p>
      </div>
    </div>



    <br><br><br>

    <br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo ">
        <h5 class="bluemedio text-area">ÁREA DE<br>SISTEMAS DE INFORMACIÓN</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/g2024.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6>GERSON DAVID <br>HUERTA HERRERA</h6>
        <p><small>CIENCIAS POLITICAS Y GOBERNABILIDAD</small></p>
      </div>
    </div>
    <br><br><br>

    <br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo ">
        <h5 class="bluemedio text-area">GESTIÓN<br>DOCUMENTARIA</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/k2024.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6>KEVIN JULIO<br>RAMOS AGUILAR</h6>
        <p><small>LICENCIADO EN PSICOLOGÍA</small></p>
      </div>
    </div>
    <br><br><br>


    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
      <div class="cont-titulo">
        <h5 class="bluemedio text-area">ANALISTA DE <br>PROCESOS</h5>
      </div>
      <img class="equipoimg" src="<?= media(); ?>/img/german1.png" alt="">
      <div class="col-4 cont-info">
        <br>
        <h6>SEGUNDO GERMAN<br>AYALA JILAPA</h6>
        <p><small>INGENIERO DE SISTEMAS</small></p>
      </div>

    </div><br><br><br> 


  </div>

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


  setTimeout(sayHi, 2000);
  setTimeout(slider, 4000);
</script>