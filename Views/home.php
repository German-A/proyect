<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles=$obj->selectBanner();

?>

<link rel="stylesheet" type="text/css" href="<?= media();?>/cssinicio/carrucelPrincipal.css">
<link rel="stylesheet" type="text/css" href="<?= media();?>/cssinicio/swiper8.0.6.min.css">
<link rel="stylesheet" type="text/css" href="<?= media();?>/cssinicio/sliderSwiper.css">
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


    <div class="contenedorfunciones"  data-aos="fade-down">

        <div class="carrusel">
            <div class="cards contenedorfunciones" id="cards">

                <div class="card ">
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

                <div class="card ">
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

                <div class="card ">
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

    <div class="contenedorR" >
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

    <div class="cardPersonal" >

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









<footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <!-- Left -->
          <div class="me-5 d-none d-lg-block">
            <h4>Unidad de Seguimiento del Egresado:</h4>
          </div>
          <!-- Left -->

          <!-- Right -->
          <div>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-github"></i>
            </a>
          </div>
          <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h3 class="text-uppercase fw-bold mb-4">
                  Unidad de Seguimiento del Egresado
                </h3>
                <h5>
                Tiene por finalidad planificar, promover, ejecutar y evaluar actividades asociadas 
                con el cumplimiento de las condiciones básicas de calidad del Modelo de Licenciamiento 
                de la SUNEDU, indicador 53, que expresa “Existencia de mecanismos de mediación e 
                inserción laboral”; asimismo, al cumplimiento del estándar 34 denominado “Seguimiento 
                a egresados y objetivos educacionales” del nuevo “Modelo de Acreditación para programas 
                de Estudios de Educación Superior Universitaria” del SINEACE. ​ Para ello, a través de 
                diferentes actividades conecta, asesora y capacita a los estudiantes y egresados de 
                nuestra Universidad con las principales empresas de nuestro país.</h5>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  FUNCIONES
                </h6>
                <p>
                  <a href="#!" class="text-reset">Angular</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">React</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Vue</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Laravel</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  UNIDAD
                </h6>
                <p>
                  <a href="#!" class="text-reset">Pricing</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Settings</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Orders</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Help</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  info@example.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2021 Copyright:
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>



<?php footer($data); ?>
    