<?php headexpoferiaxvll($data); ?>


<style>
    .conten {
        max-width: 1200px;
        margin: 0 auto;
    }

    :root {
        --white: #fff;
        --bg: #dbebfa;
        --pink: #9b29b7;
        --blue-dark: #3b8acf;
        --font: "Roboto Mono", sans-serif;
    }


    .underline {
        color: var(--azul);
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

    .logo {
        max-width: 200px;
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
        <div class="col-md-4 text-center">
            <img class="logo " src="<?= media(); ?>/images/expoferiaxvll/usecicle.png" alt="" />
        </div>
    </div>

    <br><br>

    <style>
        .card_empleo {
            display: flex;
            flex-direction: row;
            margin: 0 auto;

        }

        .cardListempleos .card_foto {
            display: flex;
            flex-direction: column;
            max-width: 210px;
            min-height: 320px;
            background-color: rgb(255 255 255 / 70%);
            -webkit-box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 25px -1px rgba(0, 0, 0, 0.75);
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 5%;
            margin: 10px auto;
        }

        .cardequipo {
            display: grid;
            max-width: 90%;
            grid-template-columns: 1fr;
            column-gap: 1rem;
            margin: auto;
        }

        .imgnosotros {
            max-width: 190px;
        }

        @media (min-width: 768px) {
            .cardequipo {
                display: grid;
                max-width: 90%;
                grid-template-columns: 1fr 1fr;
                column-gap: 1rem;
            }
        }

        @media (min-width: 900px) {
            .cardequipo {
                display: grid;
                max-width: 90%;
                grid-template-columns: 1fr 1fr 1fr;
            }
        }

        @media (min-width: 1000px) {
            .cardequipo {
                display: grid;
                max-width: 90%;
                grid-template-columns: 1fr 1fr 1fr 1fr;
            }
        }

        @media (min-width: 1200px) {
            .cardequipo {
                display: grid;
                max-width: 90%;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            }
        }
    </style>

    <h1 class="underline">Equipo USE - UNT</h1>
    <br><br>
    <section class="card_empleo cardequipo">
 
        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/images/expoferiaxvll/sosa.png" alt="" />
                <br>
                <h6>EDUARDO TEÓFILO
                    <br>
                    SOSA ANCAJIMA
                </h6>
                <label for="">DIRECTOR DE LA UNIDAD DE <br>
                    SEGUIMIENTO DEL EGRESADO</label>
            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/images/expoferiaxvll/nureña.png" alt="" />
                <br>
                <h6>KATHERINE LIZETH
                    <br>
                    NUREÑA RODRÍGUEZ
                </h6>
                <label for="">SUBUNIDAD DE ESTADÍSTICA <br>
                    E INFORMÁTICA</label>
            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/images/expoferiaxvll/romero.png" alt="" />
                <br>
                <h6>JEAN PAÚL
                    <br>
                    ROMERO LOBATÓN
                </h6>
                <label for="">
                    ANALISTA DE <br>
                    PROCESOS
                </label>

            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/images/expoferiaxvll/isabel.png" alt="" />
                <br>
                <h6>MARIA ISABEL
                    <br>
                    HARO VALVERDE
                </h6>
                <label for="">
                    ÁREA DE <br>
                    TRAMITE DOCUMENTARIO
                </label>
            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/images/expoferiaxvll/andy.png" alt="" />
                <br>
                <h6>ANDY BRYAN
                    <br>
                    BENITES ZAVALETA
                </h6>
                <label for="">
                    ÁREA DE <br>
                    MARQUETÍN
                </label>
            </div>
        </div>
    </section>


</div>


<?php footerexpoferiaxvll($data); ?>