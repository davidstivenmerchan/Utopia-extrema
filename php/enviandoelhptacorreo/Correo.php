<?php

$correo = $_POST['correo'];

$nombre = $_POST['nom'];



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



 


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'merchangonzalesstiven@gmail.com';                     //SMTP username
    $mail->Password   = 'DAVID159753456';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('merchangonzalesstiven@gmail.com', 'Shun');
    $mail->addAddress($correo, $nombre);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto muy Importante';
    $mail->Body    = 'porfiiiiiiiiiiiiiiiiiin funcionooooooooooo <3 alv';

    $mail->send();
    echo 'El mensaje de envio correctamente';
} catch (Exception $e) {
    echo "Error Presentado: {$mail->ErrorInfo}";
}

?>