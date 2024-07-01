<?php headferialaborlaxvll($data); ?>


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
            <h4>La Unidad de Seguimiento del Egresado de la Direccion de Procesos Academicos UNT en
                colaboración con estudiantes de las areas de Ciencias Básicas Tecnológicas, y Ciencias
                Economicas, organiza la XVIII Feria Laboral, donde se busca vincular a los estudiantes y egresados
                de la UNT, con las mejores organizaciones del mercado laboral regional y nacional. Asimismo,
                busca ampliar su vision y perspectiva laboral y profesional, recibiendo sugerencias y
                requerimientos para el alineamiento de los perfiles de egreso por programa de estudio.
                <br> <br>
                ¿A quiénes nos dirigimos?
                <br> <br>
                Estudiantes de los egresadosúltimos ciclos y de todas los programas de estudio de la
                Universidad Nacional de Trujillo.
            </h4>
            <br>

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
                <img class="imgnosotros" src="<?= media(); ?>/archivos/ferialaboralxvlll/equipo/sosa.png" alt="" />
                <br>
                <h6>EDUARDO TEÓFILO
                    <br>
                    SOSA ANCAJIMA
                </h6>
                <label for="">Dir. UNIDAD DE <br>
                    SEGUIMIENTO DEL EGRESADO</label>
            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/archivos/ferialaboralxvlll/equipo/kathy.png" alt="" />
                <br>
                <h6>KATHERINE LIZETH
                    <br>
                    NUREÑA RODRÍGUEZ
                </h6>
                <label for="">ANALISTA DE <br>
                    PROCESOS</label>
            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/archivos/ferialaboralxvlll/equipo/jp.png" alt="" />
                <br>
                <h6>JEAN PAÚL
                    <br>
                    ROMERO LOBATÓN
                </h6>
                <label for="">
                    INGENIERO DE <br>
                    SISTEMAS
                </label>

            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/archivos/ferialaboralxvlll/equipo/isabel.png" alt="" />
                <br>
                <h6>MARIA ISABEL
                    <br>
                    HARO VALVERDE
                </h6>
                <label for="">
                    ABOGADA <br>

                </label>
            </div>
        </div>

        <div class="cardListempleos">
            <div class="card_foto">
                <img class="imgnosotros" src="<?= media(); ?>/archivos/ferialaboralxvlll/equipo/andy.png" alt="" />
                <br>
                <h6>ANDY BRYAN
                    <br>
                    BENITES ZAVALETA
                </h6>
                <label for="">
                    COMUNICADOR <br>
                    DISEÑADOR
                </label>
            </div>
        </div>
    </section>


</div>


<?php footerferialaborlaxvll($data); ?>