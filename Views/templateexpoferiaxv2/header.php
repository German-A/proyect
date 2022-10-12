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
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
    }

    .nav-barxv {

        padding: 20px;
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
    }

    .menu__linkxv:hover {
        background-color: #12377b;
        text-decoration: none;
        color: #ffc107;
    }

    .submenuxv {
        height: 0;
        overflow: hidden;
        transition: all 0.3s;
    }

    .submenuxv .menu__linkxv {
        background: #333;
        padding-left: 50px;
    }

    .naveg {
        display: flex;
        width: 100%;
        flex-direction: column;
    }
    .logoweb{
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

        .logoweb{
        display: block;
    }
    }
</style>


<body>
    <span id="btnMenuExpoferiaxv" class="nav-barxv text-right">
        <div class="row">
        <div class="col-6 text-left">
            <img class="logo" src="<?= media(); ?>/images/expoferiaxv/logoUse.png" style="height: 60px;">
        </div>

        <div class="col-6 text-right">
            <h2><i class="fas fa-bars text-dark"></i></h2>            
        </div>

        </div>

    </span>

    <nav class="main-navxv">
        <ul class="menuxv" id="menuxv">

            <img class="logoweb" src="<?= media(); ?>/images/expoferiaxv/logoUse.png" style="height: 60px;">

            <div class="naveg">
                <li class="menu__itemxv"><a href="<?= base_url(); ?>/expoferialaboralxv" class="menu__linkxv">INICIO</a></li>
                <li class="menu__itemxv"><a href="<?= base_url(); ?>/expoferialaboralxv/nosotros" class="menu__linkxv">NOSOTROS</a></li>
                <!-- <li class="menu__itemxv container-submenuxv">
                    <a href="#" class="menu__linkxv submenu-btnxv">OFERTA LABORAL</a>
                    <ul class="submenuxv">
                        <li class="menu__itemxv"><a href="" class="menu__linkxv">BOLSA DE TRABAJO UNT</a></li>
                        <li class="menu__itemxv"><a href="" class="menu__linkxv">BOLSA DE TRABAJO</a></li>
                    </ul>
                </li> -->
                <li class="menu__itemxv"><a href="<?= base_url(); ?>/expoferialaboralxv/ponencias" class="menu__linkxv">PONENCIAS</a></li>
                <li class="menu__itemxv"><a href="<?= base_url(); ?>/expoferialaboralxv/galeria" class="menu__linkxv">GALERIA</a></li>
                <li class="menu__itemxv"><a href="<?= base_url(); ?>/expoferialaboralxv/empresas" class="menu__linkxv">EMPRESAS</a></li>
            </div>
        </ul>
    </nav>