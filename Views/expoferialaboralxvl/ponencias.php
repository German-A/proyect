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

    figure:hover>.capa h3 {
        margin-top: 70px;
        margin-bottom: 15px;
    }

    figure:hover>img {
        transform: scale(1.3);
    }

    figure .capa h3 {
        color: #fff;
        font-weight: 400;
        margin-bottom: 120px;
        transition: all 400ms ease-out;
        margin-top: 30px;
    }

    figure .capa p {
        color: #fff;
        font-size: 15px;
        line-height: 1.5;
        width: 100%;
        max-width: 220px;
        margin: auto;
    }
</style>

<div class="contenedor">
    <figure>
        <img class="equipoimg" src="<?= media(); ?>/img/ingPaul.png" alt="">
        <div class="capa">
            <h3>jprl</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iste tempore ratione illum fugiat sed, voluptatem veritatis quidem quia inventore soluta, nemo quos voluptate, amet nesciunt provident laboriosam. Aliquid, nemo.</p>
        </div>

    </figure>


</div>



<?php footerexpoferiaxv3($data); ?>