<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= media(); ?>/images/use.ico">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- menu -->


    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/aos/aos.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">

    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/swiper8.0.6.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/cssinicio/sliderSwiper.css">
    <!-- barra de navegacion -->

    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/cssjp.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/select2.min.css">


    <title>UNIDAD DE SEGUIMIENTO DEL EGRESADO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



</head>

<body>

<style>#divLoading {
    position: fixed;
    top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(254, 254, 255, .65);
    z-index: 9999;
    display: none;
}

#divLoading img {
    width: 150px;
    height: 150px;
}
</style>

    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div id="divLoading">
        <div>
            <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
        </div>
    </div>


    <header>
        <span id="btnMenu" class="nav-bar">
            <h2><i class="fas fa-bars"></i></h2>
        </span>
        <nav class="main-nav">
            <ul class="menu " id="menu">
                <img class="logo" src="<?= media(); ?>/archivos/logos/uselogoWhite.png" style="height: 80px;">
                <li class="menu__item "><a scrollto href="<?= base_url(); ?>/home" class="menu__link  m select">INICIO</a></li>
                <li class="menu__item"><a href="<?= base_url(); ?>/manuales" class="menu__link m">CAPACITACIÓN</a></li>
                <!-- <li class="menu__item"><a target="_blank" href="https://jobboard.universia.net/unitruoportunidades" class="menu__link m">BOLSA DE TRABAJO</a></li> -->
                <li class="menu__item container-submenu"><a href="#" class="menu__link submenu-btn">BOLSA DE TRABAJO&nbsp;<i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="menu__item"><a target="_blank" href="https://jobboard.universia.net/unitruoportunidades" class="al menu__link">BOLSA DE TRABAJO UNT</a></li>
                        <li class="menu__item"><a target="_blank" href="https://www.empleosperu.gob.pe/portal-mtpe/" class="al menu__link">PORTAL EMPLEOS PERÚ</a></li>
                        <li class="menu__item"><a href="<?= base_url(); ?>/solicitudempleo" class="al menu__link">SOLICITUD DE OFERTA LABORAL</a></li>
                        <li class="menu__item"><a href="<?= base_url(); ?>/encuestaempresas" class="al menu__link">ENCUESTA EMPLEADORES</a></li>
                        
                    </ul>
                </li>
                <li class="menu__item container-submenu"><a href="#" class="menu__link submenu-btn">PLATAFORMA SISEU&nbsp;<i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="menu__item"><a href="https://siseu-rep.sineace.gob.pe:6041/login" target="_blank" class="al menu__link">PROGRAMA DE ESTUDIOS</a></li>
                        <li class="menu__item"><a href="https://siseu-rep.sineace.gob.pe:6040/" target="_blank" class="al menu__link">EGRESADOS</a></li>
                    </ul>
                </li>
                <li class="menu__item"><a href="<?= base_url(); ?>/bases" class="menu__link">NORMATIVA</a></li>
                <li class="menu__item"><a href="<?= base_url(); ?>/expoferialaboral" class="menu__link">EXPOFERIAS LABORALES </a></li>
                <li class="menu__item container-submenu"><a href="#" class="menu__link submenu-btn">TRANSPARENCIA&nbsp;<i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="menu__item"><a href="<?= base_url(); ?>/transparencia" class="al menu__link">ESTADÍSTICA</a></li>
                        <li class="menu__item"><a href="<?= base_url(); ?>/transparencia/perfilesacademicos" class="al menu__link">PERFILES EGRESO</a></li>
                        <li class="menu__item"><a href="<?= base_url(); ?>/transparencia/objetivosEducacionales" class="al menu__link">OBJETIVOS EDUCACIONALES</a></li>
                        <li class="menu__item"><a href="<?= base_url(); ?>/transparencia/preguntasObjetivosEducacionales" class="al menu__link">PREGUNTAS OBJETIVOS EDUCACIONALES</a></li>
                        <li class="menu__item"><a href="<?= base_url(); ?>/transparencia/gradosytitulos" class="al menu__link">GRADOS Y TÍTULOS</a></li>
                        
                    </ul>
                </li>

                <li class="menu__item "><a href="<?= base_url(); ?>/login" class="menu__link">INICIAR SESIÓN</a></li>
            </ul>
        </nav>
    </header>