<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" href="<?= media(); ?>/images/use.ico">
    <title><?= $data['page_tag'] ?></title>
    <!-- Main CSS-->

    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/summernote.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/select2.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="<?= media(); ?>/vendor/glightbox/css/glightbox.min.css">
</head>

<style>
    *:before,
    *::after {
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
        font-weight: 800;

    }

    body,
    html {
        overflow-x: hidden;
        /* background-image: linear-gradient(90deg, #0170b8, #0170b8);   */
        background-color: #ffffff;
    }

    :root {
        --azul: #003366;
        --celeste: #3b8acf;

    }

    .texto_azul {
        color: var(--azul);
    }

    .nav-barxv {
        padding: 10px;
        display: block;
        color: cornsilk;
        cursor: pointer;
        font-size: 15px;
        width: 100%;

    }

    .menuxv,
    .submenuxv {
        list-style: none;
        padding: 0;
        margin: 0;

    }

    .menu__itemxv {
        /* padding-top: 60px; */
    }

    .menu__itemxv:hover {
        background-color: var(--celeste);

    }

    /* barra de menu poner color */
    .menuxv {
        display: none;


        width: 100%;
        /*ddd*/
        margin-left: -100%;
    }

    .mostrarxv {
        display: block;
        height: 100%;
        transition: all 0.3s;
        margin-left: 0;
        overflow: visible;
    }

    /* color de letras*/
    .menu__linkxv {
        display: block;
        padding: 20px;
        font-size: 20px;
        text-decoration: none;
        color: --blue;
        font-weight: 900;
    }

    .menu__linkxv:hover {
        text-decoration: none;
        color: #ffffff;

    }

    .submenuxv {
        height: 0;
        overflow: hidden;
        transition: all 0.3s;
    }

    .submenuxv .menu__linkxv {
        background: var(--celeste);
        padding-left: 60px;
    }

    .naveg {
        display: flex;
        width: 100%;
        flex-direction: column;
    }

    .logoweb {
        display: none;
    }

    @media(min-width:1024px) {
        .nav-barxv {
            display: none;
        }

        .naveg {
            display: flex;
            width: 100%;
            flex-direction: row;
            justify-content: end;
        }

        .menuxv {
            margin-left: 0;
            overflow: visible;
            display: flex;
        }

        .container-submenuxv {
            position: relative;
        }

        .submenuxv {
            position: absolute;
            top: 20px;
            width: 200px;
            /*ancho de sub enlace*/
            overflow: visible;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
        }

        .container-submenuxv:hover .submenuxv {
            opacity: 1;
            visibility: visible;
        }

        .submenuxv {
            position: absolute;
            top: 60;
        }

        .logoweb {
            display: block;
        }
    }


    header {
        z-index: 999;
        background: linear-gradient(to bottom,
                var(--enlaceNavegador),
                var(--enlaceNavegador));
        width: 100%;
        justify-content: space-between;
        align-items: center;
        transition: 0.6s;

    }

    header.down {
        background: #e6ad09;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0px auto;
        padding: 5px 0;
    }

    header .brand {
        color: rgb(82, 8, 201);
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    header .menu__itemxvp0 {
        padding-top: 0px;
    }

    .menu .menu__link .enlacesDown {
        color: var(--celeste);
    }

    .titulos {
        color: #ffc107;
    }
</style>


<div class="text-center">
    <img src="<?= media() ?>/archivos/ferialaboralxvlll/home_banner.png" style="width:100%; max-height: 80vh; " alt="">
</div>
<header class="d-flex justify-content-around">


    <body>




        <span id="btnMenuExpoferiaxv" class="nav-barxv text-right">
            <div class="row">
                <div class="col-6 text-left">
                    <img class="logo" src="<?= media(); ?>/images/expoferiaxv/logoUse.png" style="height: 70px;">
                </div>

                <div class="col-6 text-right">
                    <h2><i class="fas fa-bars text-dark"></i></h2>
                </div>

            </div>

        </span>

        <nav class="main-navxv">
            <ul class="menuxv" id="menuxv">

                <div class="naveg">
                    <li class="menu__itemxv"><a href="<?= base_url(); ?>/ferialaboralxvlll" class="menu__linkxv">XVIII Feria Laboral</a></li>
                    <li class="menu__itemxv"><a href="<?= base_url(); ?>/ferialaboralxvlll/nosotros" class="menu__linkxv">Nosotros</a></li>
                    <li class="menu__itemxv"><a href="<?= base_url(); ?>/ferialaboralxvlll/empresas" class="menu__linkxv">Empresas</a></li>
                    <li class="menu__itemxv"><a href="<?= base_url(); ?>/ferialaboralxvlll/ponencias" class="menu__linkxv">Ponentes</a></li>
                    <li class="menu__itemxv"><a href="<?= base_url(); ?>/ferialaboralxvlll/galeria" class="menu__linkxv">Galería</a></li>
                </div>
            </ul>
        </nav>
</header>


<style>
    .titulo {
        font-size: 40px;
        font-weight: 900;
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
</style>