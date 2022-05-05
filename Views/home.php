<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles = $obj->selectBanner();

?>

<link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/carrucelPrincipal.css">
<link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/swiper8.0.6.min.css">
<link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/sliderSwiper.css">
<!-- 
<link rel="stylesheet" href="css/carrucelPrincipal.css">

<link rel="stylesheet" href="css/swiper8.0.6.min.css">
<link rel="stylesheet" href="css/sliderSwiper.css"> -->


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









<h2 class="tituloPersonal">NUESTRAS FUNCIONES</h2>


<div class="contenedorfunciones" data-aos="fade-down">

  <div class="carrusel">
    <div class="cardsf contenedorfunciones" id="cardsf">

      <div class="cardf ">
        <a href="">
          <figure>
            <img src="<?= media(); ?>/img/capacitaciones.png" alt="" class="imagen__card">
            <div class=" capa">
              <h3 class="">CAPACITACIONES</h3>
              <p>
                Brindamos programas de formacion contiua a los egresados y estudiantes para su desarrollo competitivo en el mercado laboral.
              </p>
            </div>
          </figure>
        </a>
      </div>

      <div class="cardf">
        <a href="">
          <figure>
            <img src="<?= media(); ?>/img/manuales.png" alt="" class="imagen__card">
            <div class="capa">
              <h3 class="">MANUALES Y GUÍAS</h3>
              <p>
                Manuales y Guias.
              </p>
            </div>
          </figure>
        </a>
      </div>

      <div class="card ">
        <a href="">
          <figure>
            <img src="<?= media(); ?>/img/expoferia.png" alt="" class="imagen__card">
            <div class=" capa">
              <h3 class="">EXPOFERIAS LABORALES</h3>
              <p>
                Damos a conocer los requerimientos laborales de empresas e instituciones.
              </p>
            </div>
          </figure>
        </a>
      </div>

      <div class="cardf">
        <a href="">
          <figure>
            <img src="<?= media(); ?>/img/siseu.png" alt="" class="imagen__card">
            <div class=" capa">
              <h3 class="">OFERTAS LABORALES</h3>
              <p>Damos a conocer los requerimientos laborales de empresas e instituciones.</p>
            </div>
          </figure>
        </a>
      </div>

    </div>

    <div class="botones">
      <div class="slider__btn2 slider__btn2--right atras">&#62</div>
      <div class="slider__btn2 slider__btn2--left adelante">&#60</div>
    </div>


  </div>



</div>



<!--  MISION Y VISION  -->

<div class="contenedorR">
  <div class="row">
    <div class="cardMisionVision " data-aos="fade-down-right">
      <h2 class="tituloPersonal">MISIÓN</h2>
      <p class="cardTextoMV">La DPA es un órgano técnico de gestión académica encargado de los diferentes procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</p>
    </div>

    <div class="cardMisionVision" data-aos="fade-down-left">
      <h2 class="tituloPersonal">VISIÓN</h2>
      <p class="cardTextoMV">Al 2025 la DPA será un órgano técnico que integre de modo tecnológico, eficiente y eficaz, los procesos de implementación, ejecución y evaluación de las políticas académicas de la alta Dirección y del Vicerrectorado Académico, así como de los Programas y acciones que coadyuvan al fomento de la excelencia académica de la UNT.</p>
    </div>

  </div>
</div>

<h2 class="tituloPersonal">NUESTRO EQUIPO</h2>

<!--  EQUIPO  -->

<div class="cardPersonal">

  <div class="card__Personal" data-aos="zoom-in">
    <div class="head">
      <div class="circle"></div>
      <div class="img">
        <img src="<?= media(); ?>/img/sosa.jpeg" alt="">
      </div>
    </div>

    <div class="description">
      <h3>EDUARDO TEÓFILO SOSA ANCAJIMA</h3>
      <h5>LICENCIADO EN EDUCACIÓN</h5>
      <p>DIRECTOR DE LA UNIDAD DE SEGUIMIENTO DEL EGRESADO</p>
      <h4>esosa@unitru.edu.pe</h4>
      <br>
    </div>

    <!-- <div class="contact">
                    <a href="#">Contact</a>
                </div> -->
  </div>

  <div class="card__Personal" data-aos="zoom-in">
    <div class="head">
      <div class="circle"></div>
      <div class="img">
        <img src="<?= media(); ?>/img/katherine.png" alt="">
      </div>
    </div>

    <div class="description">
      <h3>KATHERINE LIZETH NUREÑA RODRÍGUEZ</h3>
      <h4>INGENIERA ESTADÍSTICO</h4>
      <p>SUBUNIDAD DE ESTADÍSTICA E INFORMÁTICA</p>
      <h4>knurena@unitru.edu.pe</h4>
    </div>

    <!-- <div class="contact">
                    <a href="#">Contact</a>
                </div> -->
  </div>




  <div class="card__Personal" data-aos="zoom-in">
    <div class="head">
      <div class="circle"></div>
      <div class="img">
        <img src="<?= media(); ?>/img/JEAN.jpeg" alt="">
      </div>
    </div>

    <div class="description">
      <h3>JEAN PÁUL ROMERO LOBATÓN</h3>
      <h4>INGENIERO DE SISTEMAS</h4>
      <p>ANALISTA DE PROCESOS</p>
      <h4>jpromero@unitru.edu.pe</h4>

    </div>
  </div>

  <div class="card__Personal" data-aos="zoom-in">
    <div class="head">
      <div class="circle"></div>
      <div class="img">
        <img src="<?= media(); ?>/img/milena.jpeg" alt="">
      </div>
    </div>

    <div class="description">
      <h3>MILENA ALEXANDRA LÓPEZ ARIAS</h3>
      <h4>ABOGADA</h4>
      <p>SECRETARIADO LEGAL</p>
      <h4>use@unitru.edu.pe</h4>

    </div>
  </div>

  <div class="card__Personal" data-aos="zoom-in">
    <div class="head">
      <div class="circle"></div>
      <div class="img">
        <img src="<?= media(); ?>/img/renzo.jpeg" alt="">
      </div>
    </div>

    <div class="description">
      <h3>RENZO OMAR HURTADO</h3>
      <h4>COMUNICADOR</h4>
      <p>ÁREA DE MARKETING</p>
      <h4>use@unitru.edu.pe</h4>

    </div>
  </div>


</div>







</div>










<?php footer($data); ?>