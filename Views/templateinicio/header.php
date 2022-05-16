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



    <title>UNIDAD DE SEGUIMIENTO DEL EGRESADO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



</head>

<body>
    <header>
        <span id="btnMenu" class="nav-bar">
            <h2><i class="fas fa-bars"></i></h2>
        </span>
        <nav class="main-nav">
            <ul class="menu " id="menu">
                <img class="logo" src="<?= media(); ?>/img/uselogoazul.jpg" style="height: 70px;">
                <li class="menu__item "><a scrollto href="home" class="menu__link  m select">INICIO</a></li>
                <li class="menu__item"><a href="<?= base_url(); ?>/manuales" class="menu__link m">MANUALES Y GUÍAS</a></li>
                <li class="menu__item container-submenu"><a href="#" class="menu__link submenu-btn">OFERTA LABORAL <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="menu__item"><a href="https://jobboard.universia.net/unitruoportunidades" target="_blank" class="al menu__link">BOLSA DE TRABAJO UNT</a></li>
                    </ul>
                </li>
                <li class="menu__item container-submenu"><a href="#" class="menu__link submenu-btn">PLATAFORMA SISEU <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="menu__item"><a href="https://siseu-rep.sineace.gob.pe:6041/login" target="_blank" class="al menu__link">PROGRAMA DE ESTUDIOS</a></li>
                        <li class="menu__item"><a href="https://siseu-rep.sineace.gob.pe:6040/" target="_blank" class="al menu__link">EGRESADOS</a></li>
                    </ul>
                </li>
                <li class="menu__item"><a href="<?= base_url(); ?>/bases" class="menu__link">NORMATIVA</a></li>

                <!-- <li class="menu__item"><a href="<?= base_url(); ?>/cursosmooc" class="menu__link">CURSOS MOOC</a></li> -->
                <li class="menu__item"><a href="<?= base_url(); ?>/expoferialaboral" class="menu__link">EXPOFERIAS LABORALES </a></li>
                <li class="menu__item"><a href="<?= base_url(); ?>/estadisticas" class="menu__link">TRANSPARENCIA</a></li>

                <li class="menu__item "><a href="<?= base_url(); ?>/login" class="menu__link">INICIAR SESION</a></li>
            </ul>
        </nav>
    </header>