<?php

$nombre = $_POST['nombr'];
$correo = $_POST['corr'];
$tarea = $_POST['tarea'];

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
    $mail->Username   = 'extremautopia@gmail.com';                     //SMTP username
    $mail->Password   = 'UtopiaExtrema123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('extremautopia@gmail.com', 'Utopia Extrema');
    $mail->addAddress('extremautopia@gmail.com', 'Utopia Extrema' );     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'SERVICIO AL CLIENTE ';
    $mail->Body    = "    <!DOCTYPE html>
    <html lang='es'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Mensaje de CLIENTE: </title> 
    
      <style>
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
    
        .container {
          max-width: 1000px;
          width: 90%;
          margin: 0 auto;
        }
        .bg-dark {
          background: #343a40;
          margin-top: 40px;
          padding: 20px 0;
        }
        .alert {
          font-size: 1.5em;
          position: relative;
          padding: .75rem 1.25rem;
          margin-bottom: 2rem;
          border: 1px solid transparent;
          border-radius: .25rem;
        }
        .alert-primary {
          color: #004085;
          background-color: #cce5ff;
          border-color: #b8daff;
        }
    
        .img-fluid {
          max-width: 60%;
          height: auto;
        }
    
        .mensaje {
          width: 80%;
          font-size: 15px;
          margin: 0 auto 40px;
          color: #eee;
        }
    
        .texto {
          margin-top: 20px;
          color:#ffffff;
        }

        .con{
          color:#ffffff;
        }
    
        .footer {
          width: 100%;
          background: #48494a;
          text-align: center;
          color: #ddd;
          padding: 10px;
          font-size: 14px;
        }

        .footer span {
          text-decoration: underline;
        }
      </style>
    </head>
    <body>
      <div class='container'>
        <div class='bg-dark'>
          <div class='alert alert-primary'>
            <strong>NOMBRE DE CLIENTE: </strong> '$nombre' <br>
            <strong>CORREO DE CLIENTE: </strong> '$correo'
            
          </div>

          <div class='mensaje'>
            <h1>MENSAJE DE CLIENTE</h1>
            '$tarea'
          
          </div>
    
          <div class='footer'>
             <span>DERECHOS RESERVADOR &copy; UTOPIA EXTREMA</span>
          </div>
        </div>
      </div>
    </body>
    </html>
  ";

      $mail->send();
      
  } catch (Exception $e) {
      echo "Error Presentado: {$mail->ErrorInfo}";
  }


