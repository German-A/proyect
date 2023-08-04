<?php headexpoferiaxvll($data); ?>

<br><br>
<style>
    .conten {
        max-width: 1200px;
        margin: 0 auto;
    }

    :root {
        --white: #fff;
        --bg: #dbebfa;
        --pink: #9b29b7;
        --blue-dark: #4763ef;
        --font: "Roboto Mono", sans-serif;
    }


    .underline {
        color: var(--blue-dark);
        display: inline-block;
        position: relative;
    }

    .underline:after {
        content: "";
        position: absolute;
        width: 100%;
        transform: scaleX(1);
        height: 5px;
        bottom: 0;
        left: 0;
        background: linear-gradient(90deg, rgba(231, 249, 7, 1) 19%, rgba(15, 196, 233, 1) 32%);
        transform-origin: bottom right;
        transition: transform 0.6s ease-out;
    }

    .underline:hover:after {
        background: linear-gradient(90deg, rgba(231, 249, 7, 1) 57%, rgba(15, 196, 233, 1) 76%);
        transform-origin: bottom left;
    }
</style>
<div class="conten">
    <div class="row">

        <div class="col-md-8">
            <h1 class="underline">Quiénes somos</h1>
            <br>
            <br>
            <h4>Tiene por finalidad planificar, promover, ejecutar y evaluar actividades asociadas con el cumplimiento de las condiciones básicas de calidad del Modelo de Licenciamiento de la SUNEDU, indicador 53, que expresa “Existencia de mecanismos de mediación e inserción laboral”; asimismo, al cumplimiento del estándar 34 denominado “Seguimiento a egresados y objetivos educacionales” del nuevo “Modelo de Acreditación para programas de Estudios de Educación Superior Universitaria” del SINEACE.
            </h4>
            <br>
            <h4>Para ello, a través de diferentes actividades conecta, asesora y capacita a los estudiantes y egresados de nuestra Universidad con las principales empresas de nuestro país.</h4>
        </div>
        <div class="col-md-4">
            <img class="img-fluid" src="<?= media(); ?>/images/expoferiaxvll/usecicle.png" alt="" />
        </div>
    </div>

    <br><br><br>

    <style>
        .card_empleo {
            background-color: rgb(255 255 255 / 70%);
            display: flex;
            margin: 1rem;
            padding: 1rem;
            -webkit-box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.75);
        }

        @media (min-width: 768px) {
            .cardListempleos {
                display: grid;
                max-width: 80%;
                margin: auto;
                grid-template-columns: 1fr 1fr 1fr 1fr;
                column-gap: 1rem;
            }
        }
    </style>

    <section class="card_empleo">

        <h1>Equipo USE-UNT</h1>

        <div class="cardListempleos">
            <img src="<?= media(); ?>/images/expoferiaxvll/jp.png" alt=""  width="20px"/>
        </div>
        <div class="cardListempleos">
            <img src="<?= media(); ?>/images/expoferiaxvll/jp.png" alt=""  width="20px"/>
        </div>
        <div class="cardListempleos">
            <img src="<?= media(); ?>/images/expoferiaxvll/jp.png" alt=""  width="20px"/>
        </div>
        <div class="cardListempleos">
            <img src="<?= media(); ?>/images/expoferiaxvll/jp.png" alt="" width="20px" />
        </div>







    </section>


</div>


<?php footerexpoferiaxvll($data); ?>