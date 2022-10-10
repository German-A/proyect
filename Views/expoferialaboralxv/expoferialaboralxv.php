<?php headexpoferiaxv2($data); ?>

<?php obj($data);

$obj = new HomeModel();

$perfiles = $obj->listaExpoferiaxv();

?>



<style>
    .contenedorxv2 {

        margin: 0 auto;
        text-align: center;
    }
</style>

<div class="text-center">
    <img src="<?= media() ?>/images/expoferiaxv/expoferiaxv2.jpg" style="width: 100%;" alt="">
</div>
<br>

<div class="col-12">

    <div class="text-center">
        <h2>ORGANIZADORES</h2>
    </div>
    <br>

    <div class="row d-flex justify-content-around">

        <div class="col-6 col-md-3 text-center mb-4">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/images/expoferiaxv/vicerrectoradologo.png" alt="" style=" width: 100%; object-fit: cover;">
        </div>

        <div class="col-6 col-md-3 text-center mb-4">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/archivos/logos/logoDpa.png" alt="" style=" width: 100%; object-fit: cover;">
        </div>

        <div class="col-6 col-md-3 text-center mb-4">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/images/expoferiaxv/logoUse.png" alt="" style=" width: 100%; object-fit: cover;">
        </div>

        <div class="col-6 col-md-3 text-center mb-4">
            <img class="img-fluid col-md-12" src="<?= media(); ?>/images/expoferiaxv/CEIINDlogo1.png" alt="" style="width: 70%; object-fit: cover;">
        </div>

    </div>


</div>


<div class="contenedorxv2">

    <br>

    <div class="col-12 text-center">
        <h2>PONENCIAS</h2>
        <br>
        <h5>¡Participa de todas nuestras ponencias!</h3>
            <br><br>
    </div>
</div>


<style>
    .swiper {
        max-width: 1250px;
        height: 350px;
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
        min-width: 350px;
        height: 350px;
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



<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">

        <?php foreach ($perfiles as $key => $fila) { ?>
            <div class="swiper-slide">
                <div class="divexpoxv">

                    <img src="<?= media(); ?>/archivos/exporiaxv/<?php echo $fila['archivo'] ?>">
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="swiper-pagination"></div>
</div>





<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>














<?php footerexpoferiaxv2($data); ?>