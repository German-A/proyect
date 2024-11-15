<?php headferialaboralxiv($data); ?>


<style>
    .text-decoration {
        text-decoration: underline;
        text-decoration: underline #12377b;
        text-decoration: underline #12377b 10px;
    }

    .equipoimg {
        max-width: 200px;
        max-height: 200px;
    }

    .cont-titulo {
        height: 40px;
    }

    .cont-info {
        max-width: 200px;
        margin: auto;
        margin-top: 10px;
        border-radius: 20px;
        border-color: var(--amarillo-mostaza);
        border: solid 2px var(--amarillo-mostaza);
        color: var(--azul-medio);
        padding: auto;
    }

    @media (min-width: 1024px) {
        .cont-titulo {
            height: 80px;
        }
    }

    .info_equipo{
        padding: 20px;
    }
</style>

<br><br>
<div class="col-12 row">
    <h2 class="text-decoration">Nuestro <b>Equipo</b></h2>

    <h5 class="info_equipo">La XIX Feria Laboral, organizada por la UNT, busca vincular a estudiantes de los útimos ciclos y egresados con empresas públicas y privadas
    de la regíon, nacional e internacional; ayudándoles a ampliar su visión según las demandas del mercado laboral.</h5>
</div>

<br><br><br>

<div class="col-12 row contepersonald-flex justify-content-around text-center " data-aos="fade-down">
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
        <div class="cont-titulo">
            <h5 class="bluemedio text-area">DIRECTOR UNIDAD DE<br> SEGUIMIENTO DEL EGRESADO</h5>
        </div>
        <img class="equipoimg" src="<?= media(); ?>/img/s2024.png" alt="">
        <div class="cont-info">
            <br>
            <h6>EDUARDO TEÓFILO <br> SOSA ANCAJIMA</h6>
            <p><small>LICENCIADO EN EDUCACIÓN</small></p>
        </div>
    </div><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
        <div class="cont-titulo">
            <h5 class="bluemedio text-area">SUBUNIDAD DE ESTADÍSTICA <br> E INFORMÁTICA</h5>
        </div>
        <img class="equipoimg" src="<?= media(); ?>/img/kat2024.png" alt="">
        <div class="cont-info">
            <br>
            <h6>KATHERINE LIZETH <br> NUREÑA RODRÍGUEZ</h6>
            <p><small>INGENIERA ESTADÍSTICO</small> </p>
        </div>

    </div><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
        <div class="cont-titulo">
            <h5 class="bluemedio text-area">ANALISTA DE <br>PROCESOS</h5>
        </div>
        <img class="equipoimg" src="<?= media(); ?>/img/j2024.png" alt="">
        <div class="col-4 cont-info">
            <br>
            <h6>JEAN PAUL<br> ROMERO LOBATÓN </h6>
            <p><small>INGENIERO DE SISTEMAS</small></p>
        </div>

    </div><br><br><br><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
        <div class="cont-titulo ">
            <h5 class="bluemedio text-area">ÁREA DE<br>MARQUETÍN</h5>
        </div>
        <img class="equipoimg" src="<?= media(); ?>/img/a2024.png" alt="">
        <div class="col-4 cont-info">
            <br>
            <h6>ANDY BRYAN<br>BENITES ZAVALETA</h6>
            <p><small>COMUNICADOR/DISEÑADOR</small></p>
        </div>
    </div>
    <br><br><br><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
        <div class="cont-titulo ">
            <h5 class="bluemedio text-area">GESTIÓN<br>DOCUMENTARIA</h5>
        </div>
        <img class="equipoimg" src="<?= media(); ?>/img/k2024.png" alt="">
        <div class="col-4 cont-info">
            <br>
            <h6>KEVIN JULIO<br>RAMOS AGUILAR</h6>
            <p><small>LICENCIADO EN PSICOLOGÍA</small></p>
        </div>
    </div>
    <br><br><br><br><br><br>
    <div class="col-12 col-sm-5 col-md-5 col-lg-2 mb-2">
        <div class="cont-titulo ">
            <h5 class="bluemedio text-area">ÁREA DE<br>SISTEMAS DE INFORMACIÓN</h5>
        </div>
        <img class="equipoimg" src="<?= media(); ?>/img/g2024.png" alt="">
        <div class="col-4 cont-info">
            <br>
            <h6>GERSON DAVID <br>HUERTA HERRERA</h6>
            <p><small>CIENCIAS POLITICAS Y GOBERNABILIDAD</small></p>
        </div>
    </div>
    <br><br><br>
</div>

<?php footerferialaboralxiv($data); ?>