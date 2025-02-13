<?php headexpoferiaxv3($data); ?>


<style>
    figure {
        position: relative;
        height: 250px;
        cursor: pointer;
        width: 450px;
        overflow: hidden;
        border-radius: 6px;
        box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.50);
    }

    figure img {
        width: 100%;
        height: 100%;
        transition: all 400ms ease-out;
        will-change: transform;
    }

    figure .capa {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 103, 123, 0.7);
        transition: all 400ms ease-out;
        opacity: 0;
        visibility: hidden;
        text-align: center;
    }

    figure:hover>.capa {
        opacity: 1;
        visibility: visible;
    }

    figure:hover>img {
        transform: scale(1.3);
    }


    figure .capa p {
        height: 250px;
        background-color: #fff;
        padding: 40px 0 40px;
        color: black;
        font-size: 15px;
        line-height: 1.5;
        width: 100%;
        max-width: 250px;
        margin-left: 20px;
    }
</style>

<div class="contenedor">

    <div class="col-12 row">

        <figure>
            <img class="equipoimg" src="<?= media(); ?>/upload/exporiaxvl/ingPaul.png" alt="">
            <div class="capa">

                <p>IDEOLOGIA DE GENERO O SUBERSION CULTURAL.</p>
            </div>
        </figure>

    </div>

</div>