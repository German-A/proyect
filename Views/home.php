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



<style>
  /*#region funciones*/

.contenedorfunciones {
    width: 100%;
    /* display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center; */
    padding:20px 40px;
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





<h2 class="text-danger text-center"data-aos="fade-down">NUESTRAS FUNCIONES</h2>


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

<style>
  /*#region misionyvisions*/

.contenedorR {
    width: 100%;
}

.cardMisionVision {
    height: auto;
    margin-left: 10px;
    margin-right: 10px;
    padding: 0px 0.4px;
}

.cardTituloM {
    text-align: center;
    color: black;
}

.cardTituloV {
    text-align: center;
    color: black;
}

.cardTextoMV {
    background-color: var(--enlaceNavegadorHover);
    text-align: justify;
    padding: 20px;
    color: black;  
    border-radius: 15px;
}

@media(min-width:1024px) {
    .row {
        display: flex;
        flex-direction: row;
        margin-left: 25px;
        margin-right: 25px;
        justify-content: center;
        align-items: center;
    }
    .cardTituloV {
        text-align: center;
    }
    .cardTextoMV {
        background-color: var(--enlaceNavegadorHover);
        text-align: justify;
        width: 500px;
        padding: 20px;
        color: var(--barra);  
        border-radius: 10px;
    }
}


/*#endregion noticias*/

</style>

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

<h2 class="tituloPersonal text-center" data-aos="zoom-in">NUESTRO EQUIPO</h2>

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