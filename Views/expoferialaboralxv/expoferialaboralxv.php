<?php headexpoferiaxv2($data); ?>


<br><br><br><br><br>

<style>
    .contenedorxv2 {

        margin: 0 auto;
        text-align: center;
    }
</style>

<div class="text-center">
    <img src="<?= media() ?>/images/expoferiaxv/expoferiaxv2.jpg" style="width: 100%;" alt="">
</div>
<br><br><br>

<div class="col-12">

    <div class="text-center">
        <h1>ORGANIZADORES</h1>
    </div>
    <br><br>

    <div class="row d-flex justify-content-around">

        <div class="col-md-2 text-center">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/images/expoferiaxv/vicerrectoradologo.png" alt="" style=" width: 100%; object-fit: cover;">
        </div>

        <div class="col-md-2 text-center">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/archivos/logos/logoDpa.png" alt="" style=" width: 100%; object-fit: cover;">
        </div>

        <div class="col-md-2 text-center">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/images/expoferiaxv/logoUse.png" alt="" style=" width: 100%; object-fit: cover;">
        </div>

        <div class="col-md-2 text-center">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/images/expoferiaxv/CEIINDlogo1.png" alt="" style="width: 70%; object-fit: cover;">
        </div>

    </div>


</div>


<div class="contenedorxv2">

    <br><br><br><br>

    <div class="col-12 text-center">
        <h1>PONENCIAS</h1>
        <br>
        <h5>¡Participa de todas nuestras ponencias!</h3>
            <br><br>
    </div>
</div>


<style>
    .swiper {
        max-width: 1250px;
        height: 500px;
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
        width: 350px;
        height: 350px;
    }
</style>



<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="divexpoxv">
                <img src="<?= media(); ?>/images/expoferiaxv/expo1.png" alt="" />
                <br>
                <h4>EL FUTURO DE LA EDUCACIÓN</h4>
                <h5>11 de febrero de 2025</h5>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="divexpoxv">
                <img src="<?= media(); ?>/images/expoferiaxv/expo2.png" alt="" />
                <br>
                <h4>PRÓXIMOS CAMBIOS EN LAS POLÍTICAS</h4>
                <h5>11 de febrero de 2025</h5>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>





<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 100,
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>














<?php footerexpoferiaxv2($data); ?>