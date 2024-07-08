<?php headferialaborlaxvll($data); ?>
<?php obj($data);
?>


<style>
    .swiper {
        max-width: 1250px;
        height: 515px;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
    }

    .swiper-slide img {
        display: block;
        min-width: 450px;
        height: 500px;
        object-fit: cover;
    }

    @media (min-width: 768px) {
        .swiper-slide {
            width: 40%;
        }

    }

    @media (min-width: 992px) {
        .swiper-slide {
            width: 30%;
        }
    }

    .contenedorxv2 {
        margin: 0 auto;
        text-align: center;
    }

    .contenedor_feria {
        max-width: 1650px;
        height: auto;
        margin: auto;
        padding: 10px;
        padding-left: 15px;
        padding-right: 15px;
        display: flex;
        flex-direction: column;
        position: relative;
    }
</style>

<br>
<style>
    /* Gallery Section--------------------------------*/

    #gallery {
        background: #fff;
        padding: 60px 0 0 0;
        overflow: hidden;
    }

    #gallery .container-fluid {
        padding: 0px;
    }

    #gallery .gallery-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 1;
        transition: all ease-in-out 0.4s;
    }

    #gallery .gallery-item {
        overflow: hidden;
        position: relative;
        padding: 0;
        vertical-align: middle;
        text-align: center;
    }

    #gallery .gallery-item img {
        transition: all ease-in-out 0.4s;
        width: 100%;
    }

    #gallery .gallery-item:hover img {
        transform: scale(1.1);
    }

    #gallery .gallery-item:hover .gallery-overlay {
        opacity: 1;
        background: rgba(0, 0, 0, 0.7);
    }
</style>



<div class="conten">

    <div class="row">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="gallery-item">
                        <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                            <img src="<?= media(); ?>/upload/exporiaxvllll/vice.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 text-left texto_azul p-4">
                    <h2>Que ofrece la feria</h2>
                    <br><br>
                    <h4><span class=""><i class="fas fa-check-square"></i></span> &nbsp; Charlas presenciales y stands virtuales</h4>
                    <h4><i class="fas fa-check-square"></i> &nbsp; Acceso a muchas empresas en un solo lugar</h4>
                    <h4><i class="fas fa-check-square"></i> &nbsp; Oportunidades labotales</h4>
                    <h4><i class="fas fa-check-square"></i> &nbsp; Conocer el mercado laboral y sus necesidades </h4>
                    <h4><i class="fas fa-check-square"></i> &nbsp; Contacto directo con recultadores </h4>
                    <h4><i class="fas fa-check-square"></i> &nbsp; Habilidades blandas</h4>
                </div>
                <!-- <div class="col-md-12 col-lg-2">
                    <h1 class="titulo" style="font-weight: 900;"><b>+ 3649</b></h1>
                    <h5 class="texto_azul">Ofertas laborales activas</h5>
                    <h1 class="titulo" style="font-weight: 900;"><b>84 %</b></h1>
                    <h5 class="texto_azul">De nuestros egresados actualmente trabajan</h5>
                </div> -->
            </div>
        </div>

        <section class="col-md-12" id="gallery">
            <div class="container-fluid text-center" data-aos="fade-up">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3">
                        <div class="gallery-item">
                            <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                                <img src="<?= media(); ?>/upload/exporiaxvllll/vice.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gallery-item">
                            <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                                <img src="<?= media(); ?>/upload/exporiaxvllll/sosa.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gallery-item">
                            <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                                <img src="<?= media(); ?>/upload/exporiaxvllll/dpa.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <style>
        .btn_pagina_principal {
            background-color: var(--azul);
            padding: 10px;
        }

        .btn_pagina_principal:hover {
            background-color: var(--azul);
            padding: 10px;
            text-decoration: none;
        }
    </style>

    <div class="row d-flex justify-content-around mt-5">
        <div class="col-md-2 m-2">
            <a href="javascript:void(0)" class="btn_pagina_principal d-flex justify-content-between text-white">
                <h3><span><i class="fas fa-book-reader"></i></span></h3>
                <p>Brochure</p>
                <h3><span><i class="fas fa-arrow-down"></i></span></h3>
            </a>
        </div>
        <div class="col-md-2 m-2">
            <a href="<?= media(); ?>/archivos/ferialaboralxvlll/programa.pdf"   download="file"   download="file" 00class="btn_pagina_principal d-flex justify-content-between text-white">
                <h3><i class="fas fa-calendar-alt"></i></h3>
                <p>Cronograma</p>
                <h3><span><i class="fas fa-arrow-down"></i></span></h3>
            </a>
        </div>
        <div class="col-md-2 m-2">
            <a href="https://use-dpa.unitru.edu.pe/bolsadetrabajo"class="btn_pagina_principal d-flex justify-content-between text-white">
                <h3><i class="fas fa-briefcase"></i></h3>
                <p>Bolsa de Trabajo</p>
                <h3><span><i class="fas fa-arrow-down"></i></span></h3>
            </a>
        </div>
    </div>
    <br><br>
    <br>
    <div class="col-12">
        <br><br>
        <div class="row ">
            <h1 class=" text-center underline">Empresas</h1>
        </div>
        <br><br>
        <div class="row d-flex justify-content-around">
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/autopista_del_norte.png"></div>
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/bravo_constructora.png"></div>
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/centro_empleo.png"></div>
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/corlad.png"></div>

            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/grupo_rocio.png"></div>
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/hortifrud.png"></div>
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/imcop.png"></div>
            <div class="col-6 col-md-4 logos_empresa"> <img class="img-fluid" src="<?= media(); ?>/archivos/ferialaboralxvlll/logos_empresa/mota_engil.jpg"></div>
        </div>
    </div>
    <br>

</div>

<script type="text/javascript" src="<?= media(); ?>/jsinicio/Swiper8.0.6.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
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
</script>


<script src="<?= media(); ?>/vendor/glightbox/js/glightbox.min.js"></script>

<script>
    /**
     * Initiate gallery lightbox 
     */
    const galleryLightbox = GLightbox({
        selector: '.gallery-lightbox'
    });
</script>
<!-- Swiper JS -->

<?php footerferialaborlaxvll($data); ?>