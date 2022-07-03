<?php

$nombre =$_POST["nombre"];
$correo =$_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje =$_POST["mensaje"];

// $body= "El usuario ".$nombre."<br>Correo: ".$correo."<br>Telefono:".$telefono."<br>Mensaje:".$mensaje;


$ruta ='   <h1 style="color:blue" >UNIDAD DE SEGUIMIENTO DEL EGRESADO</h1>
<img src="https://use-dpa.unitru.edu.pe/Assets/archivos/banner/2Articulo144.jpg" alt="" style="height: 100px; width:auto">
';
$body="<br>Mensaje:". $ruta;



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'use-dpa.unitru.edu.pe';    //server de servicio de correo                 //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'notificaciones@use-dpa.unitru.edu.pe';                     //SMTP username
    $mail->Password   = 'JPnotificaciones';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $use= 'UNIDAD DE SEGUIMIENTO DEL EGRESADO';
    //Recipients
    $mail->setFrom('notificaciones@use-dpa.unitru.edu.pe', $use);       //Correo de Envio
    $mail->addAddress('stifs.jprl18@gmail.com', 'USE WEB:');     //Correo de llegada
    $mail->addCC('use@unitru.edu.pe');


    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject ='USE: Empleabilidad';
    $mail->Body    = $body;
    $mail->CharSet='UTF-8';
    $mail->AltBody = 'Correo de Prueba';

    $mail->send();
    echo '
        <script>
        alert("El mensaje se envio correctamente");
        window.history.go(-1);
        </script>
    ';
} catch (Exception $e) {
    echo "Hubo un error al Enviar el mensaje: {$mail->ErrorInfo}";
}

