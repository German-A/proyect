<?php
obj($data);
//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$perfiles = $obj->selectBannervidaysaluda2022();
$galeria = $obj->selectGaleriavidaysaluda2022();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>USE - Ciencias de la Vida y la Salud </title>-</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="assetsexpoferia/vendor/aos/aos.css" rel="stylesheet">
    <link href="assetsexpoferia/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetsexpoferia/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assetsexpoferia/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assetsexpoferia/img/use.ico" />
    <link rel="shortcut icon" href="<?= media();?>/images/use.ico" />
    <link href="assetsexpoferia/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/carrucelPrincipal.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/swiper8.0.6.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/sliderSwiper.css">
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent ">
        <div class="container d-flex justify-content-between align-items-center ">
            <div id="logo">
                <img href="expoFeria.html" src="assetsexpoferia/img/logoUse.png" alt="">
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">INICIO</a></li>
                    <li><a class="nav-link scrollto" href="#about">INFORMACIÓN</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">GALERÍA</a></li>
                    <li><a class="nav-link scrollto" href="#contact">CONTACTANOS</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url(); ?>/login">INICIAR SESIÓN</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <br><br><br>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <!-- <section id="hero">
        <br><br>
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
    </section> -->
    <!-- End Hero Section -->
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="section-bg">
            <div class="container-fluid" data-aos="fade-up">
                <div class="section-header">
                    <h3 class="section-title">Ciencias de la Vida y la Salud (25 al 27 de mayo)</h3>
                    <span class="section-divider"></span>
                    <h4 class="section-description">
                        ¡Porque las oportunidades laborales no se detienen!
                    </h4>

                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
                        <!-- <img src="assetsexpoferia/img/about-img.jpg" alt=""> -->
                        <img src="Assets/archivos/logos/expoferiavisaysalud.jpeg" alt="">
                    </div>

                    <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
                        <h2>PREMIOS Y SORPRESAS A NUESTROS PARTICIPANTES</h2>

                        <ul>
                            <li><i class="bi bi-check-circle" style="color:#11116f;"></i> ¡Podrás hacerte acreedor de diversos premios y ser testigo de grandes sorpresas durante este evento!!.</li>
                            <li><i class="bi bi-check-circle" style="color:#11116f;"></i> ¡Grandes premios! ¡Desde cursos pagados en Udemy, hasta becas y medias becas en diplomados!.</li>
                            
                        </ul>


                    </div>
                </div>

            </div>
        </section>


        <section id="gallery">
            <div class="container-fluid" data-aos="fade-up">
                <div class="section-header">
                    <h3 class="section-title">GALERIA</h3>
                </div>

                <div class="row g-0 d-flex justify-content-center">


                <?php foreach ($galeria as $key => $fila) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <a href="<?= media(); ?>/archivos/galeriavidaysalud/<?php echo $fila['NombreArchivo'] ?>" data-gall="portfolioGallery" class="gallery-lightbox">                   
                                <img src="<?= media(); ?>/archivos/galeriavidaysalud/<?php echo $fila['NombreArchivo'] ?>">
                            </a>    
                        </div>
                    </div>                    
                <?php } ?>





                </div>

            </div>
        </section>
        <!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-6 col-md-4">
                        <div class="contact-about">
                            <h2>Unidad de Seguimiento del Egresado</h2>
                            <p>Tiene por finalidad planificar, promover, ejecutar y evaluar actividades asociadas con el cumplimiento de las condiciones básicas de calidad del Modelo de Licenciamiento de la SUNEDU, indicador 53, que expresa “Existencia de
                                mecanismos de mediación e inserción laboral”; asimismo, al cumplimiento del estándar 34 denominado “Seguimiento a egresados y objetivos educacionales” del nuevo “Modelo de Acreditación para programas de Estudios de Educación
                                Superior Universitaria” del SINEACE. ​ Para ello, a través de diferentes actividades conecta, asesora y capacita a los estudiantes y egresados de nuestra Universidad con las principales empresas de nuestro país.</p>
             

                            <div class="social-links ">
                                <a href="https://www.facebook.com/profile.php?id=100072647775501"  target="_blank" class="facebook"><i class="bi bi-facebook" style="color:#0097A7;"></i></a>
                                <a href="https://www.instagram.com/use.unt/"  target="_blank" class="instagram"><i class="bi bi-instagram" style="color:#0097A7;"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4">
                        <div class="info">
                            <div>
                                <i class="bi bi-geo-alt glyphicon-plus" style="color:#11116f;"></i>
                                <p>Jr. Zepita<br>N 482</p>
                            </div>

                            <div>
                                <i class="bi bi-envelope" style="color:#11116f;"></i>
                                <p>use@unitru.edu.pe</p>
                            </div>

                            <div>
                                <i class="bi bi-phone" style="color:#11116f;"></i>
                                <p>+Numero</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="form">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Ingresar Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3 mt-lg-0">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Ingresar Correo" data-rule="email" data-msg="Please enter a valid email">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit" title="Send Message">Enviar Mensaje</button></div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section>


    </main>






    <script src="assetsexpoferia/vendor/aos/aos.js"></script>
    <script src="assetsexpoferia/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assetsexpoferia/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetsexpoferia/vendor/php-email-form/validate.js"></script>


    <script src="assetsexpoferia/js/main.js"></script>

    <script type="text/javascript" src="<?= media(); ?>/jsinicio/aos.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/jsinicio/Swiper8.0.6.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/jsinicio/sliderSwiper.js"></script>


</body>

</html>