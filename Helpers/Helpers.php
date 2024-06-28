<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Libraries/phpmailer/Exception.php';
require 'Libraries/phpmailer/PHPMailer.php';
require 'Libraries/phpmailer/SMTP.php';

//Retorla la url del proyecto
function base_url()
{
    return BASE_URL;
}
//Retorla la url de Assets
function media()
{
    return BASE_URL . "/Assets";
}
function headerAdmin($data = "")
{
    $view_header = "Views/Template/header_admin.php";
    require_once($view_header);
}
function footerAdmin($data = "")
{
    $view_footer = "Views/Template/footer_admin.php";
    require_once($view_footer);
}

function head($data = "")
{
    $view_header = "Views/templateinicio/header.php";
    require_once($view_header);
}
function footer($data = "")
{
    $view_footer = "Views/templateinicio/footer.php";
    require_once($view_footer);
}

function headexpoferiaxv2($data = "")
{
    $view_header = "Views/templateexpoferiaxv2/header.php";
    require_once($view_header);
}
function footerexpoferiaxv2($data = "")
{
    $view_footer = "Views/templateexpoferiaxv2/footer.php";
    require_once($view_footer);
}


function headexpoferiaxv3($data = "")
{
    $view_header = "Views/templateexpoferiaxv23/header.php";
    require_once($view_header);
}
function footerexpoferiaxv3($data = "")
{
    $view_footer = "Views/templateexpoferiaxv23/footer.php";
    require_once($view_footer);
}

function headexpoferiaxvll($data = "")
{
    $view_header = "Views/templateexpoferiaxvll/header.php";
    require_once($view_header);
}
function footerexpoferiaxvll($data = "")
{
    $view_footer = "Views/templateexpoferiaxvll/footer.php";
    require_once($view_footer);
}


function headexpoferiaxvlll($data = "")
{
    $view_header = "Views/templateexpoferiaxvlll/header.php";
    require_once($view_header);
}
function footerexpoferiaxvlll($data = "")
{
    $view_footer = "Views/templateexpoferiaxvll/footer.php";
    require_once($view_footer);
}


function headferialaborlaxvll($data = "")
{
    $view_header = "Views/templateferialaboralxvlll/header.php";
    require_once($view_header);
}
function footerferialaborlaxvll($data = "")
{
    $view_footer = "Views/templateferialaboralxvlll/footer.php";
    require_once($view_footer);
}




function obj($data = "")
{
    $view_header = "Models/HomeModel.php";
    require_once($view_header);
}

function obj2($data = "")
{
    $view_header = "Models/usuariosModel.php";
    require_once($view_header);
}



//Muestra información formateada
function dep($data)
{
    $format  = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}
function getModal(string $nameModal, $data)
{
    $view_modal = "Views/Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}
//Envio de correos
function sendEmail($data, $template)
{
    $asunto = $data['asunto'];
    $emailDestino = $data['email'];
    $empresa = NOMBRE_REMITENTE;
    $remitente = EMAIL_REMITENTE;
    //ENVIO DE CORREO
    $de = "MIME-Version: 1.0\r\n";
    $de .= "Content-type: text/html; charset=UTF-8\r\n";
    $de .= "From: {$empresa} <{$remitente}>\r\n";
    ob_start();
    require_once("Views/Template/Email/" . $template . ".php");
    $mensaje = ob_get_clean();
    $send = mail($emailDestino, $asunto, $mensaje, $de);
    return $send;
}

function sendMailLocal($data, $template)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //ob_start();
    //require_once("Views/Template/Email/" . $template . ".php");
    //$mensaje = ob_get_clean();
    //$mensaje = 'hola';

    $mensaje = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Recuperar cuenta</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
            .x_title_blue h1{
                color: #0a4661;
                font-size: 25px;
     
            }
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue"><p>Hola ' . $data['nombreUsuario'] . '</p>
                            <h1>' . $data['NOMBRE_EMPESA'] . '</h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Solicitud de acceso para el usuario: <strong> ' . $data['email'] . '</strong></p>
                        <p>Has solicitado los datos de tu usuario, accede al enlace de abajo para confirmar tu contraseña. </p>
                        <p class="x_text_white">
                        <a href=" ' . $data['url_recovery'] . '" target="_blank" class="x_button_link x_link_blue">Confirmar datos</a>
                        </p>
                        <br>
                        <p>Si no te funciona el botón puedes copiar y pegar la siguiente dirección en tu navegador.</p>
                        <span> ' . $data['url_recovery'] . '</span>
                        <p class="x_title_gray"><a href="<?= WEB_EMPRESA; ?>" target="_blanck"><?= WEB_EMPRESA; ?></a></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';


    try {
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'UNIDAD DE SEGUIMIENTO DEL EGRESADO');
        $mail->addAddress($data['email']);     //Add a recipient
        if (!empty($data['emailCopia'])) {
            $mail->addBCC($data['emailCopia']);
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['asunto'];
        $mail->Body    = $mensaje;

        $mail->send();
        return 1;
    } catch (Exception $e) {
        echo "Error en el envío del mensaje: {$mail->ErrorInfo}";
    }
}


function sendMailTicketLocal($data, $template)
{

    $mail = new PHPMailer(true);

    $mensaje = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Recuperar cuenta</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
            .x_title_blue h1{
                color: #0a4661;
                font-size: 25px;
     
            }
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue">
                            <p></p>                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Mensaje:</p><br>
                        <p> ' . $data['mensaje'] . '</p>
                        <p> Número de Contacto: </p><br>
                        <p> ' . $data['contacto'] . '</p>
                        <p> Email de Contacto:</p>
                        <p> ' . $data['email'] . '</p>
                        <div class="x_sgwrap x_title_blue">
                            <p>Tu mensaje ha sido registrado con Exito!</strong></p>                          
                        </div>                        
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';


    try {
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'UNIDAD DE SEGUIMIENTO DEL EGRESADO');
        $mail->addAddress('use@unitru.edu.pe');     //Add a recipient
        $mail->addCC($data['email']);
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Pagina Web';
        $mail->Body    = $mensaje;
        $mail->send();
        return 1;
    } catch (Exception $e) {
        echo "Error en el envío del mensaje: {$mail->ErrorInfo}";
    }
}

function sendMailPublicacionEmpleo($data, $template)
{
    $escu = '';

    foreach ($data['escuelas'] as &$escuela) {
        $escu = $escu . $escuela['nombreEscuela'] . ', ';
    }

    $mail = new PHPMailer(true);

    $mensaje = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Recuperar cuenta</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
         
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue">
                            <h1>' . $data['saludo'] . ' usuarios de la empresa <b>' . $data['nombreEmpresa'] . '</b></h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="x_sgwrap">
                            <p>La publicación de empleo para el puesto: ' . $data['NombrePuesto'] . '</p>
                            <p>para las carreras de:  ' . $escu . '</p>
                            <p>Con la fecha de termino: <strong>' . $data['FechaFin'] . '</strong></p>
                            <p>En breves momento será aprobada </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';


    try {
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'UNIDAD DE SEGUIMIENTO DEL EGRESADO');
        $mail->addAddress('use@unitru.edu.pe');     //Add a recipient
        $mail->addCC($data['email']);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Pagina Web';
        $mail->Body    = $mensaje;

        $mail->send();
        $arrResponse = array(
            'status' => true,
            'msg' => 'Tu publicación de empleo en breves momento será aprobada, así mismo se enviara una copia en el correo que registraste.'
        );
        return $arrResponse;
    } catch (Exception $e) {

        $arrResponse = array(
            'status' => true,
            //'msg' => "Correo invalido: " . $data['email']
            'msg' => "$mail->ErrorInfo"
        );
        return   $arrResponse;
    }
}


function sendMailLocalCarreras($data, $arrData)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //ob_start();
    //require_once("Views/Template/Email/" . $template . ".php");
    //$mensaje = ob_get_clean();
    //$mensaje = 'hola';

    $mensaje = $data;


    try {
        //Server settings
        // $mail->SMTPDebug = 0;                      //Enable verbose debug output
        // $mail->isSMTP();                                            //Send using SMTP
        // $mail->Host       = 'smtp.gmail.com';    //server de servicio de correo                 //Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        // $mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        // $mail->Password   = 'JPsistemas321';                               //SMTP password
        // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        // $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $data = ['jpromero@unitru.edu.pe', 'jeanromerolobaton@gmail.com', 'use@unitr.edu.pe'];

        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'UNT-UNIDAD DE SEGUIMIENTO DEL EGRESADO');
        $mail->addAddress('stifs.jprl18@gmail.com');     //Add a recipient
        foreach ($arrData as $email_user) {
            $mail->AddAddress($email_user['email_user']);
        }

        $mail->addCC('use@unitru.edu.pe');
        $mail->addBCC('jpromero@unitru.edu.pe');




        // for($i = 0; $i < count($arrData); $i++) {
        //     $mail->AddAddress($arrData[$i]);           
        // }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'use';
        $mail->Body    = $mensaje;

        $mail->send();
        return 1;
    } catch (Exception $e) {
        echo "Error en el envío del mensaje: {$mail->ErrorInfo}";
    }
}



/*

function sendMailLocalEmpleo($data, $template)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // ob_start();
    // require_once("Views/Template/Email/" . $template . ".php");
    // $mensaje = ob_get_clean();

    $mensaje='<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Oferta laboral</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
            .x_title_blue h1{
                color: #0a4661;
                font-size: 25px;
           
            }
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue">
                            <h1><?= NOMBRE_EMPESA ?></h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="x_sgwrap">
                            <p>Hola'. $data['nombreUsuario'].'</p>
                        </div>
                        <p>tenemos una oferta laboral para ti</p>
                        <p>La cuenta de Acceso a plataforma es: <strong>'.$data['email'].'</strong></p>
                        <p>La contraseña es tu numero de Dni. </p>
                        <p class="x_text_white">
                        <a href="<?=  base_url();  ?>" target="_blank" class="x_button_link x_link_blue">Ingresar al sistema</a>
                        </p>
                        <br>       
                        <p>Si no te funciona el botón puedes copiar y pegar la siguiente dirección en tu navegador.</p>
                        
                        <p class="x_title_gray"><a href="<?=  base_url(); ?>" target="_blanck"><?=  base_url(); ?></a></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        $mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('toolsfordeveloper@gmail.com', 'Servidor Local');
        $mail->addAddress($data['email']);     //Add a recipient
        if (!empty($data['emailCopia'])) {
            $mail->addBCC($data['emailCopia']);
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['asunto'];
        $mail->Body    = $mensaje;

        $mail->send();
        echo 'Mensaje enviado';
    } catch (Exception $e) {
        echo "Error en el envío del mensaje: {$mail->ErrorInfo}";
    }
}
*/



function sendMailLocalEmpleo($data, $template)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // ob_start();
    // require_once("Views/Template/Email/" . $template . ".php");
    // $mensaje = ob_get_clean();


    $mensaje = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Oferta laboral</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
            .x_title_blue h1{
                color: #0a4661;
                font-size: 25px;
           
            }
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue">
                            <h1><?= NOMBRE_EMPESA ?></h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="x_sgwrap">
                            <p>Hola ' . $data['nombreUsuario'] . '</p>
                        </div>
                        <p>tenemos una oferta laboral para ti</p>
                        <p>La cuenta de Acceso a plataforma es: <strong>' . $data['email'] . '</strong></p>
                        <p>La contraseña es tu numero de Dni. </p>
                        <p class="x_text_white">
                        <a href="' . base_url() . '" target="_blank" class="x_button_link x_link_blue">Ingresar al sistema</a>
                        </p>
                        <br>       
                        <p>Si no te funciona el botón puedes copiar y pegar la siguiente dirección en tu navegador.</p>
                        
                        <p class="x_title_gray"><a href="' . base_url() . '" target="_blanck">' . base_url() . '</a></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'Oferta Laboral');
        $mail->addAddress($data['email']);     //Add a recipient
        if (!empty($data['emailCopia'])) {
            $mail->addBCC($data['emailCopia']);
        }
        $data['asunto'] = 'Oferta Laboral';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['asunto'];
        $mail->Body    = $mensaje;

        $mail->send();
        return 1;
    } catch (Exception $e) {
        $arrResponse = array(
            'status' => true,
            'msg' => "$mail->ErrorInfo"
        );
        return $arrResponse;
    }
}

function sendAprobacionCorreo($data, $template)
{

    $mail = new PHPMailer(true);

    $mensaje = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Oferta laboral</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
            .x_title_blue h1{
                color: #0a4661;
                font-size: 25px;
           
            }
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue">
                            <h1><?= NOMBRE_EMPESA ?></h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="x_sgwrap">
                            <p>Reciba un cordial saludos por parte de la Unidad de Seguimiento del Egresado UNT</p>
                        </div>
                        <p>Su oferta laboral, sobre el cargo de' . $data['NombrePuesto'] . ' será difundida 
                        con nuestros egresados y escuelas profesionales de acuerdo al perfil señalado, con fecha termino de' . $data['FechaFin'] . '</p>                        
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
    ';



    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'Oferta Laboral');
        $mail->addAddress($data['email_user']);     //Add a recipient
        $mail->addAddress('use@unitru.edu.pe');
        if (!empty($data['email_user'])) {
            $mail->addBCC($data['email_user']);
        }
        $data['asunto'] = 'Oferta Laboral';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['asunto'];
        $mail->Body    = $mensaje;

        $mail->send();
        return 1;
    } catch (Exception $e) {
        $arrResponse = array(
            'status' => true,
            'msg' => "$mail->ErrorInfo"
        );
        return $arrResponse;
    }
}

/*DIFUSION DE EMPLEOS PARA LOS EGRESADOS*/
function sendEmpleosEgresados($arrDataCorreos, $template)
{

    $mail = new PHPMailer(true);

    $mensaje = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Oferta laboral</title>
        <style type="text/css">
            p{
                font-family: arial;
                letter-spacing: 1px;
                color: #7f7f7f;
                font-size: 15px;
            }
            a{
                color: #3b74d7;
                font-family: arial;
                text-decoration: none;
                text-align: center;
                display: block;
                font-size: 18px;
            }
            .x_sgwrap p{
                font-size: 20px;
                line-height: 32px;
                color: #244180;
                font-family: arial;
                text-align: center;
            }
            .x_title_gray {
                color: #0a4661;
                padding: 5px 0;
                font-size: 15px;
                border-top: 1px solid #CCC;
            }
            .x_title_blue {
                padding: 08px 0;
                line-height: 25px;
                text-transform: uppercase;
                border-bottom: 1px solid #CCC;
            }
            .x_title_blue h1{
                color: #0a4661;
                font-size: 25px;
           
            }
            .x_bluetext {
                color: #244180 !important;
            }
            .x_title_gray a{
                text-align: center;
                padding: 10px;
                margin: auto;
                color: #0a4661;
            }
            .x_text_white a{
                color: #FFF;
            }
            .x_button_link {
                width: 100%;
                max-width: 470px;
                height: 40px;
                display: block;
                color: #FFF;
                margin: 20px auto;
                line-height: 40px;
                text-transform: uppercase;
                font-family: Arial Black,Arial Bold,Gadget,sans-serif;
            }
            .x_link_blue {
                background-color: #307cf4;
            }
            .x_textwhite {
                background-color: rgb(50, 67, 128);
                color: #ffffff;
                padding: 10px;
                font-size: 15px;
                line-height: 20px;
            }
        </style>
    </head>
    <body>
        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div class="x_sgwrap x_title_blue">
                            <h1><?= NOMBRE_EMPESA ?></h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="x_sgwrap">
                            <p>POSTULA A ESTE PUESTO de TRABAJO</p>
                        </div>
  </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
    ';


    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'use-dpa.unitru.edu.pe';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //$mail->Username   = 'jeanromerolobaton@gmail.com';                     //SMTP username
        //$mail->Password   = 'JPsistemas321';                               //SMTP password
        $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
        $mail->Password   = 'vN4Ud6,jKQ.?';
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', 'INFORMACIÓN LABORAL');
        $mail->AddAddress('use@unitru.edu.pe');

        //$mail->addCC($email_user['email_user']);
        foreach ($arrDataCorreos as $email_user) {
            $mail->addBCC($email_user['email_user']);
        }
        $mail->addBCC('jpromero@unitru.edu.pe');

        $data['asunto'] = 'Oferta Laboral';
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $data['asunto'];
        $mail->Body    = $mensaje;

        $mail->send();
        $arrResponse = array(
            'status' => true,
            'msg' => 'Tu publicación de empleo en breves momento será aprobada, así mismo se enviara una copia en el correo que registraste.'
        );
    } catch (Exception $e) {
        $arrResponse = array(
            'status' => true,
            'msg' => "$mail->ErrorInfo"
        );
        return $arrResponse;
    }
}
function getPermisos(int $idmodulo)
{
    require_once("Models/PermisosModel.php");
    $objPermisos = new PermisosModel();
    $idrol = $_SESSION['userData']['idrol'];

    $arrPermisos = $objPermisos->permisosModulo($idrol);
    $permisos = '';
    $permisosMod = '';
    if (count($arrPermisos) > 0) {
        $permisos = $arrPermisos;
        $permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
    }
    $_SESSION['permisos'] = $permisos;
    $_SESSION['permisosMod'] = $permisosMod;
}


//Elimina exceso de espacios entre palabras
function strClean($strCadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>", "", $string);
    $string = str_ireplace("</script>", "", $string);
    $string = str_ireplace("<script src>", "", $string);
    $string = str_ireplace("<script type=>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1'='1", "", $string);
    $string = str_ireplace('OR "1"="1"', "", $string);
    $string = str_ireplace('OR ´1´=´1´', "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace("LIKE ´", "", $string);
    $string = str_ireplace("OR 'a'='a", "", $string);
    $string = str_ireplace('OR "a"="a', "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    return $string;
}
//Genera una contraseña de 10 caracteres
function passGenerator($length = 10)
{
    $pass = "";
    $longitudPass = $length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena = strlen($cadena);

    for ($i = 1; $i <= $longitudPass; $i++) {
        $pos = rand(0, $longitudCadena - 1);
        $pass .= substr($cadena, $pos, 1);
    }
    return $pass;
}
//Genera un token
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    $token = $r1 . '-' . $r2 . '-' . $r3 . '-' . $r4;
    return $token;
}
//Formato para valores monetarios
function formatMoney($cantidad)
{
    $cantidad = number_format($cantidad, 2, SPD, SPM);
    return $cantidad;
}

function randKey($str = '', $long = 0)
{
    $key = null;
    $str = str_split($str);
    $start = 0;
    $limit = count($str) - 1;
    for ($x = 0; $x < $long; $x++) {
        $key .= $str[rand($start, $limit)];
    }
    return $key;
}

function removeFile($ruta, $temp)
{
    $path = $ruta . $temp;
    @unlink($path);
}
