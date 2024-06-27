<?php headexpoferiaxvll($data); ?>

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
</style>




<style>
    .contenedorxv2 {
        margin: 0 auto;
        text-align: center;
    }
</style>

<div class="text-center">
    <img src="<?= media() ?>/images/expoferiaxvll/flyerexpo.png" style="width: 100%;" alt="">
</div>
<br>


<div class="contenedorxv2">
    <br>
    <div class="col-12 text-center">
        <h1 class="titulo"><b>Ponentes</b></h1>
    </div>
    <br>

    <div class="col-12">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php for ($i = 0; $i < count($data['listaponencias']); $i++) { ?>
                    <div class="swiper-slide">
                        <div class="divexpoxv">
                            <img src="<?= media(); ?>/upload/exporiaxvll/<?php echo $data['listaponencias'][$i]['archivo'] ?>">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <br>
    <div class="col-12 text-center">
        <h1 class="titulo"><b>Multimedia</b></h1>
        <br>
    </div>

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


    <section id="gallery">
        <div class="container-fluid text-center" data-aos="fade-up">

            <div class="row g-0 d-flex justify-content-center">

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                            <img src="<?= media(); ?>/upload/exporiaxvllll/vice.png">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                            <img src="<?= media(); ?>/upload/exporiaxvllll/sosa.png">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="https://www.youtube.com/embed/9uGj_eR-gYA" data-gall="portfolioGallery" class="gallery-lightbox">
                            <img src="<?= media(); ?>/upload/exporiaxvllll/dpa.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">

        <div class="col-12 text-center">
            <h1 class="titulo"><b>Empresas</b></h1>
            <br>
        </div>

        <div class="col-12 row d-flex justify-content-around">
            <?php for ($i = 0; $i < count($data['listempresas']); $i++) { ?>
                <div class=" text-center col-4 col-md-2 mb-2">
                    <img class="img-fluid" src="<?= media(); ?>/upload/exporiaxvll/<?php echo $data['listempresas'][$i]['archivo'] ?>" alt="">
                </div>
            <?php } ?>
        </div>

    </section>

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


<?php footerexpoferiaxvll($data); ?>