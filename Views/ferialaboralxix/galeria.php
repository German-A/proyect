<?php headferialaboralxiv($data); ?>


<?php obj($data);


?>



<section id="gallery">
    <div class="container-fluid text-center" data-aos="fade-up">

        <div class="row g-0 d-flex justify-content-center">

            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <a href="<?= media(); ?>/images/ferialaboralxix/ferial.png" data-gall="portfolioGallery" class="gallery-lightbox">
                        <img src="<?= media(); ?>/images/ferialaboralxix/ferial.png">
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>















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




<br><br><br><br><br>


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



<?php footerferialaboralxiv($data); ?>